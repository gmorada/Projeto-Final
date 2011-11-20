<?php

/**
 * RoomCrowdDatetime filter form base class.
 *
 * @package    RoomManager
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseRoomCrowdDatetimeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'rcds_cd_key'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('RoomCrowdDatetimeStatus'), 'add_empty' => true)),
      'crow_cd_key'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Crowd'), 'add_empty' => true)),
      'room_cd_key'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Room'), 'add_empty' => true)),
      'rocd_nb_weekday'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'rocd_dt_start_time' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'rocd_dt_final_time' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'rcds_cd_key'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('RoomCrowdDatetimeStatus'), 'column' => 'rcds_cd_key')),
      'crow_cd_key'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Crowd'), 'column' => 'crow_cd_key')),
      'room_cd_key'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Room'), 'column' => 'room_cd_key')),
      'rocd_nb_weekday'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'rocd_dt_start_time' => new sfValidatorPass(array('required' => false)),
      'rocd_dt_final_time' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('room_crowd_datetime_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RoomCrowdDatetime';
  }

  public function getFields()
  {
    return array(
      'rocd_cd_key'        => 'Number',
      'rcds_cd_key'        => 'ForeignKey',
      'crow_cd_key'        => 'ForeignKey',
      'room_cd_key'        => 'ForeignKey',
      'rocd_nb_weekday'    => 'Number',
      'rocd_dt_start_time' => 'Text',
      'rocd_dt_final_time' => 'Text',
    );
  }
}
