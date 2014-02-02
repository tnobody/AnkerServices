<?php

/**
 * AnkerServices cross function lib. 
 *
 * @package    ankerservices
 * @subpackage AsLib
 * @author     Andreas Hanauska
 * @version    SVN: $Id: AsLib.php 23810 2009-11-12 11:07:44Z andreash $
 */
class AsLib {

    /**
     * Extrahiert aus dem Query-Parameter der Kompetenzsuche für Firmen die 
     * KompetenzkategorieIds und die KompetenzIds
     * Mehrfach auftretende Elemente werden auf eines reduziert
     * @param string $query 
     * @return array array($kk_ids, $k_ids)
     */
    public static function createKompetenzIdsFromQueryParam($query) {

        $kk_ids = array();
        $k_ids = array();

        $params = explode(',', $query);

        // evtl. leere Werte entfernen
        foreach ($params as $key => $param) {
            if (empty($param)) {
                unset($params[$key]);
            } else if (preg_match('/^([k]{1,2}_)\d+$/', $param)) {
                if (substr($param, 0, 2) == 'kk') {
                    $kk_ids[] = substr($param, 3);
                } else if (substr($param, 0, 1) == 'k') {
                    $k_ids[] = substr($param, 2);
                }
            }
        }

        return array(array_unique($kk_ids), array_unique($k_ids));
    }

    /**
     * Gibt ein Array aus Dateiobjekten für die Darstellung in der View zurück
     * @param array $dokumente Array von Dokumenten. Ein Dokument benötigt die
     * Attribute (Arraykeys) eines Dokumentenobjects
     * @return array Array aus Dateiobjekten
     */
    public static function get_file_objects($dokumente) {
        return array_map(array('AsLib', 'get_file_object'), $dokumente);
    }

    /**
     * Callbackfunktion, um Dateiobjekt mit Daten zufüllen
     * @param array $dokument Dokument 
     * @return object $file
     */
    public static function get_file_object($dokument) {

        $file_name = $dokument['pfad'];
        $file_path = sfConfig::get('dokumente_upload_dir') . $file_name;

        if (is_file($file_path) && $file_name[0] !== '.') {
            $file = new stdClass();
            $file->id = $dokument['id'];
            $file->name = $dokument['titel'];
            $file->size = filesize($file_path);
            $file->url = sfConfig::get('dokumente_upload_url') . rawurlencode($file_name);

            foreach (sfConfig::get('app_dokumente_image_versions') as $version => $options) {
                if (is_file(sfConfig::get('dokumente_upload_dir') . $file_name)) {
                    $split = explode('.', $file_name);
                    if ($split[count($split) - 1] == 'pdf') {
                        $file->{$version . '_url'} = sfConfig::get('dokumente_upload_url') . $options['upload_url']
                                . 'pdf.png';
                    } else {
                        $file->{$version . '_url'} = sfConfig::get('dokumente_upload_url') . $options['upload_url']
                                . rawurlencode($file_name);
                    }
                }
            }

            $file->delete_url = 'dokumente/delete'; ///' . $dokument['id'];
            $file->delete_type = 'DELETE';
            // Hole aktuellen CSRF-Token
            $form = new BaseForm();
            $file->token = $form->getCSRFToken();

            return $file;
        }
        return null;
    }

    /**
     * Erstellt ein skaliertes Bild nach Einstellungen $options
     * @param array $options Einstellungen für die Erstellung des Bilds 
     * @return boolean Gibt zurück, ob das erstellen des Bildes erfolgreich war
     */
    public static function create_scaled_image($file_name, $options) {
        $file_path = sfConfig::get('dokumente_upload_dir') . $file_name;
        $new_file_path = sfConfig::get('dokumente_upload_dir') . $options['upload_dir'] . $file_name;
        list($img_width, $img_height) = @getimagesize($file_path);
        if (!$img_width || !$img_height) {
            return false;
        }
        $scale = min(
                $options['max_width'] / $img_width, $options['max_height'] / $img_height
        );
        if ($scale > 1) {
            $scale = 1;
        }
        $new_width = $img_width * $scale;
        $new_height = $img_height * $scale;
        $new_img = @imagecreatetruecolor($new_width, $new_height);
        switch (strtolower(substr(strrchr($file_name, '.'), 1))) {
            case 'jpg':
            case 'jpeg':
                $src_img = @imagecreatefromjpeg($file_path);
                $write_image = 'imagejpeg';
                break;
            case 'gif':
                @imagecolortransparent($new_img, @imagecolorallocate($new_img, 0, 0, 0));
                $src_img = @imagecreatefromgif($file_path);
                $write_image = 'imagegif';
                break;
            case 'png':
                @imagecolortransparent($new_img, @imagecolorallocate($new_img, 0, 0, 0));
                @imagealphablending($new_img, false);
                @imagesavealpha($new_img, true);
                $src_img = @imagecreatefrompng($file_path);
                $write_image = 'imagepng';
                break;
            default:
                $src_img = $image_method = null;
        }
        $success = $src_img && @imagecopyresampled(
                        $new_img, $src_img, 0, 0, 0, 0, $new_width, $new_height, $img_width, $img_height
                ) && $write_image($new_img, $new_file_path);
        // Free up memory (imagedestroy does not delete files):
        @imagedestroy($src_img);
        @imagedestroy($new_img);
        return $success;
    }
    
    /**
     * Erstellt (rekursiv) eine Baumstruktur für Kompetenzen samt Kategorien
     * @param array $element Zweig eines Baums (Nested Set) das per Doctrine 
     * und setHydrationMode(Doctrine_Core::HYDRATE_ARRAY_HIERARCHY) ausgelesen 
     * wurde
     * @param int $profil_id Profil ID des Nutzers um Kennzeichnung von 
     * EInträgen vornehmen zu können, die der Nutzer besitzt
     * @return Kein Rückgabewert
     */
    public static function createSubTree($element, $profil_id, &$array) {

        //sfFirePHP::getInstance(true)->fb(memory_get_usage(). " in fct");

        // Kindelemente dieses Elements
        $children = array();
        
        //sfFirePHP::getInstance(true)->fb($element);
        
        // Wenn weitere Unterkategorien vorhanden
        if(isset($element['__children']) && count($element['__children']) > 0) {
            // Jede einzelne Unterkategorie zum Kindelemente-Array hinzufügen
            foreach($element['__children'] as $child) {
                // rekursiver Aufruf pusht alle Kindelemente auf das
                // Kindelemente-Array
                AsLib::createSubTree($child, $profil_id, $children); 
            }
        } 
        
        // Wenn Kompetenzen vorhanden, diese zu den Kinder hinzufügen
        if(isset($element['Kompetenzen']) && count($element['Kompetenzen'])) {
            $kompetenzen = array();
            
            foreach($element['Kompetenzen'] as $k) {
                // Niveaustufe zu einer Kompetenz, initial nicht vorhanden
                $niveau = false;
                // Überprüfen, ob das anfragende Profil eine Niveaustufe zu dieser
                // Kompetenz besitzt
                if(isset($k['Niveaus']) && !empty($k['Niveaus'])) {
                    foreach ($k['Niveaus'] as $n) {
                        if ($n['profil_id'] == $profil_id ) {
                            // Profil besitzt zur Kompetenz diese Niveaustufe
                            $niveau = $n['niveau'];
                            // Schleife kann abgebrochen werden, da die Niveaus 
                            // anderer Profile hier nicht interessieren
                            break;
                        }
                    }
                } 
                
                if($niveau) {
                    // Elemente im Kompetenzbaum bekommen die css-Klasse "mine"
                    $mine = array('class' => 'komp mine');                    
                } else {
                    $mine = array('class' => 'komp');  ;
                }
                
                $kompetenzen[] = array(
                    'data' => $k['bezeichnung'],
                    'attr' => $mine,
                    'metadata' => array(
                        'bezeichnung' => $k['bezeichnung'],
                        'beschreibung' => $k['beschreibung'],
                        'id' => $k['kompetenz_id'],
                        'niveau' => $niveau
                    )
                );
            }
            $children[] = $kompetenzen;
        }
        
        // Element selbst (Kompetenzkategorie) anlegen
        array_push($array, array(
            'data' => $element['bezeichnung'],
            'attr' => array('class' => 'kkat'),
            'metadata' => array(
                'bezeichnung' => $element['bezeichnung'],
                'beschreibung' => $element['beschreibung'],
            ),
            'children' =>  $children
        ));        
    }
    
}

?>
