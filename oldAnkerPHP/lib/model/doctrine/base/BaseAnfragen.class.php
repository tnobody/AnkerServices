<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Anfragen', 'doctrine');

/**
 * BaseAnfragen
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $anfrage_id
 * @property bigint $sf_guard_user_id
 * @property string $kommentar
 * @property integer $profil_id
 * @property timestamp $angelegt
 * @property timestamp $letzte_aenderung
 * @property sfGuardUser $sfGuardUser
 * @property Profile $Profile
 * 
 * @method integer     getAnfrageId()        Returns the current record's "anfrage_id" value
 * @method bigint      getSfGuardUserId()    Returns the current record's "sf_guard_user_id" value
 * @method string      getKommentar()        Returns the current record's "kommentar" value
 * @method integer     getProfilId()         Returns the current record's "profil_id" value
 * @method timestamp   getAngelegt()         Returns the current record's "angelegt" value
 * @method timestamp   getLetzteAenderung()  Returns the current record's "letzte_aenderung" value
 * @method sfGuardUser getSfGuardUser()      Returns the current record's "sfGuardUser" value
 * @method Profile     getProfile()          Returns the current record's "Profile" value
 * @method Anfragen    setAnfrageId()        Sets the current record's "anfrage_id" value
 * @method Anfragen    setSfGuardUserId()    Sets the current record's "sf_guard_user_id" value
 * @method Anfragen    setKommentar()        Sets the current record's "kommentar" value
 * @method Anfragen    setProfilId()         Sets the current record's "profil_id" value
 * @method Anfragen    setAngelegt()         Sets the current record's "angelegt" value
 * @method Anfragen    setLetzteAenderung()  Sets the current record's "letzte_aenderung" value
 * @method Anfragen    setSfGuardUser()      Sets the current record's "sfGuardUser" value
 * @method Anfragen    setProfile()          Sets the current record's "Profile" value
 * 
 * @package    ankerservices
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAnfragen extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('anfragen');
        $this->hasColumn('anfrage_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
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
        $this->hasColumn('kommentar', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
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
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser', array(
             'local' => 'sf_guard_user_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE'));

        $this->hasOne('Profile', array(
             'local' => 'profil_id',
             'foreign' => 'profil_id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE'));

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