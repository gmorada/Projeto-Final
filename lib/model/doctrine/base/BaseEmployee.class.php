<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Employee', 'doctrine');

/**
 * BaseEmployee
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $empl_cd_key
 * @property string $empl_nm_name
 * 
 * @method integer  getEmplCdKey()    Returns the current record's "empl_cd_key" value
 * @method string   getEmplNmName()   Returns the current record's "empl_nm_name" value
 * @method Employee setEmplCdKey()    Sets the current record's "empl_cd_key" value
 * @method Employee setEmplNmName()   Sets the current record's "empl_nm_name" value
 * 
 * @package    RoomManager
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseEmployee extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('employee');
        $this->hasColumn('empl_cd_key', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('empl_nm_name', 'string', 40, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 40,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}