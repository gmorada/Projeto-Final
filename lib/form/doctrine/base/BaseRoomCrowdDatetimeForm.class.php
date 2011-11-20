<?php

/**
 * RoomCrowdDatetime form base class.
 *
 * @method RoomCrowdDatetime getObject() Returns the current form's model object
 *
 * @package    RoomManager
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRoomCrowdDatetimeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'rocd_cd_key'        => new sfWidgetFormInputHidden(),
      'rcds_cd_key'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('RoomCrowdDatetimeStatus'), 'add_empty' => false)),
      'crow_cd_key'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Crowd'), 'add_empty' => false)),
      'room_cd_key'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Room'), 'add_empty' => true)),
      'rocd_nb_weekday'    => new sfWidgetFormInputText(),
      'rocd_dt_start_time' => new sfWidgetFormTime(),
      'rocd_dt_final_time' => new sfWidgetFormTime(),
    ));

    $this->setValidators(array(
      'rocd_cd_key'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('rocd_cd_key')), 'empty_value' => $this->getObject()->get('rocd_cd_key'), 'required' => false)),
      'rcds_cd_key'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('RoomCrowdDatetimeStatus'))),
      'crow_cd_key'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Crowd'))),
      'room_cd_key'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Room'), 'required' => false)),
      'rocd_nb_weekday'    => new sfValidatorInteger(),
      'rocd_dt_start_time' => new sfValidatorTime(),
      'rocd_dt_final_time' => new sfValidatorTime(),
    ));

    $this->widgetSchema->setNameFormat('room_crowd_datetime[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RoomCrowdDatetime';
  }

}
