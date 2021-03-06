<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Dokumente', 'doctrine');

/**
 * BaseDokumente
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $profil_id
 * @property string $titel
 * @property timestamp $angelegt
 * @property timestamp $letzte_aenderung
 * @property string $pfad
 * @property Profile $Profile
 * 
 * @method integer   getId()               Returns the current record's "id" value
 * @method integer   getProfilId()         Returns the current record's "profil_id" value
 * @method string    getTitel()            Returns the current record's "titel" value
 * @method timestamp getAngelegt()         Returns the current record's "angelegt" value
 * @method timestamp getLetzteAenderung()  Returns the current record's "letzte_aenderung" value
 * @method string    getPfad()             Returns the current record's "pfad" value
 * @method Profile   getProfile()          Returns the current record's "Profile" value
 * @method Dokumente setId()               Sets the current record's "id" value
 * @method Dokumente setProfilId()         Sets the current record's "profil_id" value
 * @method Dokumente setTitel()            Sets the current record's "titel" value
 * @method Dokumente setAngelegt()         Sets the current record's "angelegt" value
 * @method Dokumente setLetzteAenderung()  Sets the current record's "letzte_aenderung" value
 * @method Dokumente setPfad()             Sets the current record's "pfad" value
 * @method Dokumente setProfile()          Sets the current record's "Profile" value
 * 
 * @package    ankerservices
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseDokumente extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('dokumente');
        $this->hasColumn('id', 'integer', 4, array(
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
        $this->hasColumn('titel', 'string', 75, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 75,
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
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('pfad', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
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