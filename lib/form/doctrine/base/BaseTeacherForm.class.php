<?php

/**
 * Teacher form base class.
 *
 * @method Teacher getObject() Returns the current form's model object
 *
 * @package    RoomManager
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTeacherForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'teac_cd_key'   => new sfWidgetFormInputHidden(),
      'teac_nm_name'  => new sfWidgetFormInputText(),
      'teac_nm_email' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'teac_cd_key'   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('teac_cd_key')), 'empty_value' => $this->getObject()->get('teac_cd_key'), 'required' => false)),
      'teac_nm_name'  => new sfValidatorString(array('max_length' => 80)),
      'teac_nm_email' => new sfValidatorString(array('max_length' => 80, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('teacher[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Teacher';
  }

}
