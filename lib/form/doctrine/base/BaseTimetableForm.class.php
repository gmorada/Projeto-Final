<?php

/**
 * Timetable form base class.
 *
 * @method Timetable getObject() Returns the current form's model object
 *
 * @package    RoomManager
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTimetableForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'time_cd_key'  => new sfWidgetFormInputHidden(),
      'time_dt_time' => new sfWidgetFormDate(),
    ));

    $this->setValidators(array(
      'time_cd_key'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('time_cd_key')), 'empty_value' => $this->getObject()->get('time_cd_key'), 'required' => false)),
      'time_dt_time' => new sfValidatorDate(),
    ));

    $this->widgetSchema->setNameFormat('timetable[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Timetable';
  }

}
