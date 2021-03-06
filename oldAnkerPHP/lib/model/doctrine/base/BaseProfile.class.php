<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Profile', 'doctrine');

/**
 * BaseProfile
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $profil_id
 * @property string $vornamen
 * @property string $nachname
 * @property date $geburtsdatum
 * @property enum $geschlecht
 * @property timestamp $angelegt
 * @property timestamp $letzte_aenderung
 * @property integer $aktiv
 * @property string $geburtsort
 * @property string $geburtsland
 * @property string $nationalitaet
 * @property bigint $sf_guard_user_id
 * @property integer $kontaktadresse
 * @property Doctrine_Collection $Adressen
 * @property Doctrine_Collection $Dokumente
 * @property Doctrine_Collection $Niveaus
 * @property Doctrine_Collection $Lebenslauf
 * @property Doctrine_Collection $ProfilMerkliste
 * @property Doctrine_Collection $Verfuegbarkeit
 * @property sfGuardUser $sfGuardUser
 * @property Anfragen $Anfragen
 * @property Doctrine_Collection $Zertifikate
 * 
 * @method integer             getProfilId()         Returns the current record's "profil_id" value
 * @method string              getVornamen()         Returns the current record's "vornamen" value
 * @method string              getNachname()         Returns the current record's "nachname" value
 * @method date                getGeburtsdatum()     Returns the current record's "geburtsdatum" value
 * @method enum                getGeschlecht()       Returns the current record's "geschlecht" value
 * @method timestamp           getAngelegt()         Returns the current record's "angelegt" value
 * @method timestamp           getLetzteAenderung()  Returns the current record's "letzte_aenderung" value
 * @method integer             getAktiv()            Returns the current record's "aktiv" value
 * @method string              getGeburtsort()       Returns the current record's "geburtsort" value
 * @method string              getGeburtsland()      Returns the current record's "geburtsland" value
 * @method string              getNationalitaet()    Returns the current record's "nationalitaet" value
 * @method bigint              getSfGuardUserId()    Returns the current record's "sf_guard_user_id" value
 * @method integer             getKontaktadresse()   Returns the current record's "kontaktadresse" value
 * @method Doctrine_Collection getAdressen()         Returns the current record's "Adressen" collection
 * @method Doctrine_Collection getDokumente()        Returns the current record's "Dokumente" collection
 * @method Doctrine_Collection getNiveaus()          Returns the current record's "Niveaus" collection
 * @method Doctrine_Collection getLebenslauf()       Returns the current record's "Lebenslauf" collection
 * @method Doctrine_Collection getProfilMerkliste()  Returns the current record's "ProfilMerkliste" collection
 * @method Doctrine_Collection getVerfuegbarkeit()   Returns the current record's "Verfuegbarkeit" collection
 * @method sfGuardUser         getSfGuardUser()      Returns the current record's "sfGuardUser" value
 * @method Anfragen            getAnfragen()         Returns the current record's "Anfragen" value
 * @method Doctrine_Collection getZertifikate()      Returns the current record's "Zertifikate" collection
 * @method Profile             setProfilId()         Sets the current record's "profil_id" value
 * @method Profile             setVornamen()         Sets the current record's "vornamen" value
 * @method Profile             setNachname()         Sets the current record's "nachname" value
 * @method Profile             setGeburtsdatum()     Sets the current record's "geburtsdatum" value
 * @method Profile             setGeschlecht()       Sets the current record's "geschlecht" value
 * @method Profile             setAngelegt()         Sets the current record's "angelegt" value
 * @method Profile             setLetzteAenderung()  Sets the current record's "letzte_aenderung" value
 * @method Profile             setAktiv()            Sets the current record's "aktiv" value
 * @method Profile             setGeburtsort()       Sets the current record's "geburtsort" value
 * @method Profile             setGeburtsland()      Sets the current record's "geburtsland" value
 * @method Profile             setNationalitaet()    Sets the current record's "nationalitaet" value
 * @method Profile             setSfGuardUserId()    Sets the current record's "sf_guard_user_id" value
 * @method Profile             setKontaktadresse()   Sets the current record's "kontaktadresse" value
 * @method Profile             setAdressen()         Sets the current record's "Adressen" collection
 * @method Profile             setDokumente()        Sets the current record's "Dokumente" collection
 * @method Profile             setNiveaus()          Sets the current record's "Niveaus" collection
 * @method Profile             setLebenslauf()       Sets the current record's "Lebenslauf" collection
 * @method Profile             setProfilMerkliste()  Sets the current record's "ProfilMerkliste" collection
 * @method Profile             setVerfuegbarkeit()   Sets the current record's "Verfuegbarkeit" collection
 * @method Profile             setSfGuardUser()      Sets the current record's "sfGuardUser" value
 * @method Profile             setAnfragen()         Sets the current record's "Anfragen" value
 * @method Profile             setZertifikate()      Sets the current record's "Zertifikate" collection
 * 
 * @package    ankerservices
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseProfile extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('profile');
        $this->hasColumn('profil_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('vornamen', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('nachname', 'string', 60, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 60,
             ));
        $this->hasColumn('geburtsdatum', 'date', 25, array(
             'type' => 'date',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('geschlecht', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'männlich',
              1 => 'weiblich',
             ),
             'primary' => false,
             'notnull' => true,
             ));
        $this->hasColumn('angelegt', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('letzte_aenderung', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0000-00-00 00:00:00',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('aktiv', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('geburtsort', 'string', 100, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 100,
             ));
        $this->hasColumn('geburtsland', 'string', 100, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 100,
             ));
        $this->hasColumn('nationalitaet', 'string', 100, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 100,
             ));
        $this->hasColumn('sf_guard_user_id', 'bigint', 20, array(
             'type' => 'bigint',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 20,
             ));
        $this->hasColumn('kontaktadresse', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Adressen', array(
             'local' => 'profil_id',
             'foreign' => 'profil_id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE'));

        $this->hasMany('Dokumente', array(
             'local' => 'profil_id',
             'foreign' => 'profil_id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE'));

        $this->hasMany('Niveaus', array(
             'local' => 'profil_id',
             'foreign' => 'profil_id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE'));

        $this->hasMany('Lebenslauf', array(
             'local' => 'profil_id',
             'foreign' => 'profil_id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE'));

        $this->hasMany('ProfilMerkliste', array(
             'local' => 'profil_id',
             'foreign' => 'profil_id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE'));

        $this->hasMany('Verfuegbarkeit', array(
             'local' => 'profil_id',
             'foreign' => 'profil_id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE'));

        $this->hasOne('sfGuardUser', array(
             'local' => 'sf_guard_user_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE'));

        $this->hasOne('Anfragen', array(
             'local' => 'profil_id',
             'foreign' => 'profil_id'));

        $this->hasMany('Zertifikate', array(
             'local' => 'profil_id',
             'foreign' => 'profil_id'));

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