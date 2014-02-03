<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Adressen', 'doctrine');

/**
 * BaseAdressen
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $alias
 * @property string $strasse_und_hausnr
 * @property integer $plz
 * @property string $ort
 * @property string $land
 * @property integer $profil_id
 * @property timestamp $letzte_aenderung
 * @property Profile $Profile
 * 
 * @method integer   getId()                 Returns the current record's "id" value
 * @method string    getAlias()              Returns the current record's "alias" value
 * @method string    getStrasseUndHausnr()   Returns the current record's "strasse_und_hausnr" value
 * @method integer   getPlz()                Returns the current record's "plz" value
 * @method string    getOrt()                Returns the current record's "ort" value
 * @method string    getLand()               Returns the current record's "land" value
 * @method integer   getProfilId()           Returns the current record's "profil_id" value
 * @method timestamp getLetzteAenderung()    Returns the current record's "letzte_aenderung" value
 * @method Profile   getProfile()            Returns the current record's "Profile" value
 * @method Adressen  setId()                 Sets the current record's "id" value
 * @method Adressen  setAlias()              Sets the current record's "alias" value
 * @method Adressen  setStrasseUndHausnr()   Sets the current record's "strasse_und_hausnr" value
 * @method Adressen  setPlz()                Sets the current record's "plz" value
 * @method Adressen  setOrt()                Sets the current record's "ort" value
 * @method Adressen  setLand()               Sets the current record's "land" value
 * @method Adressen  setProfilId()           Sets the current record's "profil_id" value
 * @method Adressen  setLetzteAenderung()    Sets the current record's "letzte_aenderung" value
 * @method Adressen  setProfile()            Sets the current record's "Profile" value
 * 
 * @package    ankerservices
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAdressen extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('adressen');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('alias', 'string', 50, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 50,
             ));
        $this->hasColumn('strasse_und_hausnr', 'string', 100, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 100,
             ));
        $this->hasColumn('plz', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('ort', 'string', 50, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 50,
             ));
        $this->hasColumn('land', 'string', 100, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 100,
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
        $geographical0 = new Doctrine_Template_Geographical();
        $this->actAs($timestampable0);
        $this->actAs($geographical0);
    }
}