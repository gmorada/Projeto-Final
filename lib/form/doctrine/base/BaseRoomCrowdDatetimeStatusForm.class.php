<?php

/**
 * RoomCrowdDatetimeStatus form base class.
 *
 * @method RoomCrowdDatetimeStatus getObject() Returns the current form's model object
 *
 * @package    RoomManager
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRoomCrowdDatetimeStatusForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'rcds_cd_key'  => new sfWidgetFormInputHidden(),
      'rcds_nm_name' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'rcds_cd_key'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('rcds_cd_key')), 'empty_value' => $this->getObject()->get('rcds_cd_key'), 'required' => false)),
      'rcds_nm_name' => new sfValidatorString(array('max_length' => 40)),
    ));

    $this->widgetSchema->setNameFormat('room_crowd_datetime_status[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RoomCrowdDatetimeStatus';
  }

}
