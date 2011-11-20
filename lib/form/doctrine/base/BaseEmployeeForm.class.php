<?php

/**
 * Employee form base class.
 *
 * @method Employee getObject() Returns the current form's model object
 *
 * @package    RoomManager
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEmployeeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'empl_cd_key'  => new sfWidgetFormInputHidden(),
      'empl_nm_name' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'empl_cd_key'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('empl_cd_key')), 'empty_value' => $this->getObject()->get('empl_cd_key'), 'required' => false)),
      'empl_nm_name' => new sfValidatorString(array('max_length' => 40)),
    ));

    $this->widgetSchema->setNameFormat('employee[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Employee';
  }

}
