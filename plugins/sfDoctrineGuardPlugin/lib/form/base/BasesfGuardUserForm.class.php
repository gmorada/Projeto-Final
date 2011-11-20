<?php

/**
 * BasesfGuardUserAdminForm
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage form
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: BasesfGuardUserAdminForm.class.php 25546 2009-12-17 23:27:55Z Jonathan.Wage $
 */

abstract class BasesfGuardUserForm extends BaseFormDoctrine
{
    public function setup()
    {
        $this->setWidgets(array(
            'first_name' => new sfWidgetFormInputText(),
            'last_name' => new sfWidgetFormInputText(),
            'email_address' => new sfWidgetFormInputText(),
            'username' => new sfWidgetFormInputText(),
            'algorithm' => new sfWidgetFormInputText(),
            'salt' => new sfWidgetFormInputText(),
            'password' => new sfWidgetFormInputText(),
            'is_active' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
            'is_super_admin' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
            'last_login' => new sfWidgetFormDate(),
            'created_at' => new sfWidgetFormDate(),
            'updated_at' => new sfWidgetFormDate(),
            'groups_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardGroup')),
            'permissions_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardPermission'))
        ));

        $this->setValidators(array(
            'first_name' => new sfValidatorString(),
            'last_name' => new sfValidatorString(),
            'email_address' => new sfValidatorString(),
            'username' => new sfValidatorString(),
            'algorithm' => new sfValidatorString(),
            'salt' => new sfValidatorString(array('required' => false)),
            'password' => new sfValidatorString(array('required' => false)),
            'is_active' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
            'is_super_admin' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
            'last_login' => new sfValidatorDate(),
            'created_at' => new sfValidatorDate(),
            'updated_at' => new sfValidatorDate(),
            'groups_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardGroup', 'required' => false)),
            'permissions_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardPermission', 'required' => false))
        ));

        $this->widgetSchema->setNameFormat('sf_guard_user[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();

        parent::setup();
    }

    public function addGroupsListColumnQuery(Doctrine_Query $query, $field, $values)
    {

        if (!is_array($values))
        {
            $values = array($values);
        }

        if (!count($values)) {
            return;
        }

        $query->leftJoin('r.sfGuardUserGroup sfGuardUserGroup')
              ->andWhereIn('sfGuardUserGroup.group_id', $values);
    }

    public function addPermissionsListColumnQuery(Doctrine_Query $query, $field, $values) {

        if (!is_array($values)) {
            $values = array($values);
        }

        if (!count($values)) {
            return;
        }

        $query->leftJoin('r.sfGuardUserPermission sfGuardUserPermission')
              ->andWhereIn('sfGuardUserPermission.permission_id', $values);

    }

    public function getModelName()
    {
        return 'sfGuardUser';
    }

    public function getFields() 
    {
        return array(
            'id' => 'Number', 'username' => 'Text', 'algorithm' => 'Text', 'salt' => 'Text', 'password' => 'Text', 'is_active' => 'Boolean', 'is_super_admin' => 'Boolean', 'last_login' => 'Date', 'created_at' => 'Date', 'updated_at' => 'Date', 'groups_list' => 'ManyKey?', 'permissions_list' => 'ManyKey?',
        );
    }
}
?>
