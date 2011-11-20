<?php

/**
 * Course form base class.
 *
 * @method Course getObject() Returns the current form's model object
 *
 * @package    RoomManager
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCourseForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cour_cd_key'  => new sfWidgetFormInputHidden(),
      'cour_nb_code' => new sfWidgetFormInputText(),
      'cour_nm_name' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'cour_cd_key'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('cour_cd_key')), 'empty_value' => $this->getObject()->get('cour_cd_key'), 'required' => false)),
      'cour_nb_code' => new sfValidatorInteger(),
      'cour_nm_name' => new sfValidatorString(array('max_length' => 80)),
    ));

    $this->widgetSchema->setNameFormat('course[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Course';
  }

}
