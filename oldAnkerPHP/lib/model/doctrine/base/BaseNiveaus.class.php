<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Niveaus', 'doctrine');

/**
 * BaseNiveaus
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $niveau_id
 * @property integer $profil_id
 * @property integer $kompetenz_id
 * @property integer $zertifikat_id
 * @property integer $erwerb_id
 * @property text $art_kompetenzerwerb
 * @property integer $niveau
 * @property Profile $Profile
 * @property Kompetenzen $Kompetenzen
 * @property Zertifikate $Zertifikate
 * @property OrteKompetenzerwerb $OrteKompetenzerwerb
 * @property Doctrine_Collection $Lebenslauf
 * 
 * @method integer             getNiveauId()            Returns the current record's "niveau_id" value
 * @method integer             getProfilId()            Returns the current record's "profil_id" value
 * @method integer             getKompetenzId()         Returns the current record's "kompetenz_id" value
 * @method integer             getZertifikatId()        Returns the current record's "zertifikat_id" value
 * @method integer             getErwerbId()            Returns the current record's "erwerb_id" value
 * @method text                getArtKompetenzerwerb()  Returns the current record's "art_kompetenzerwerb" value
 * @method integer             getNiveau()              Returns the current record's "niveau" value
 * @method Profile             getProfile()             Returns the current record's "Profile" value
 * @method Kompetenzen         getKompetenzen()         Returns the current record's "Kompetenzen" value
 * @method Zertifikate         getZertifikate()         Returns the current record's "Zertifikate" value
 * @method OrteKompetenzerwerb getOrteKompetenzerwerb() Returns the current record's "OrteKompetenzerwerb" value
 * @method Doctrine_Collection getLebenslauf()          Returns the current record's "Lebenslauf" collection
 * @method Niveaus             setNiveauId()            Sets the current record's "niveau_id" value
 * @method Niveaus             setProfilId()            Sets the current record's "profil_id" value
 * @method Niveaus             setKompetenzId()         Sets the current record's "kompetenz_id" value
 * @method Niveaus             setZertifikatId()        Sets the current record's "zertifikat_id" value
 * @method Niveaus             setErwerbId()            Sets the current record's "erwerb_id" value
 * @method Niveaus             setArtKompetenzerwerb()  Sets the current record's "art_kompetenzerwerb" value
 * @method Niveaus             setNiveau()              Sets the current record's "niveau" value
 * @method Niveaus             setProfile()             Sets the current record's "Profile" value
 * @method Niveaus             setKompetenzen()         Sets the current record's "Kompetenzen" value
 * @method Niveaus             setZertifikate()         Sets the current record's "Zertifikate" value
 * @method Niveaus             setOrteKompetenzerwerb() Sets the current record's "OrteKompetenzerwerb" value
 * @method Niveaus             setLebenslauf()          Sets the current record's "Lebenslauf" collection
 * 
 * @package    ankerservices
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseNiveaus extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('niveaus');
        $this->hasColumn('niveau_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('profil_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('kompetenz_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('zertifikat_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('erwerb_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('art_kompetenzerwerb', 'text', null, array(
             'type' => 'text',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'default' => '',
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('niveau', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'range' => 
             array(
              0 => 1,
              1 => 5,
             ),
             'length' => 1,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Profile', array(
             'local' => 'profil_id',
             'foreign' => 'profil_id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE'));

        $this->hasOne('Kompetenzen', array(
             'local' => 'kompetenz_id',
             'foreign' => 'kompetenz_id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE'));

        $this->hasOne('Zertifikate', array(
             'local' => 'zertifikat_id',
             'foreign' => 'zertifikat_id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE'));

        $this->hasOne('OrteKompetenzerwerb', array(
             'local' => 'erwerb_id',
             'foreign' => 'erwerb_id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE'));

        $this->hasMany('Lebenslauf', array(
             'refClass' => 'KompetenzErworbenBei',
             'local' => 'niveau_id',
             'foreign' => 'll_id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             'created' => 
             array(
              'name' => 'angelegt',
             ),
             'updated' => 
             array(
              'name' => 'letzte_aenderung',
             ),
             ));
        $this->actAs($timestampable0);
    }
}