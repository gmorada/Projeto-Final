<?php

/**
 * CrowdRoom filter form base class.
 *
 * @package    RoomManager
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCrowdRoomFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'crow_cd_key' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Crowd'), 'add_empty' => true)),
      'room_cd_key' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Room'), 'add_empty' => true)),
      'crrs_cd_key' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CrowdRoomStatus'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'crow_cd_key' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Crowd'), 'column' => 'crow_cd_key')),
      'room_cd_key' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Room'), 'column' => 'room_cd_key')),
      'crrs_cd_key' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CrowdRoomStatus'), 'column' => 'crrs_cd_key')),
    ));

    $this->widgetSchema->setNameFormat('crowd_room_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CrowdRoom';
  }

  public function getFields()
  {
    return array(
      'crro_cd_key' => 'Number',
      'crow_cd_key' => 'ForeignKey',
      'room_cd_key' => 'ForeignKey',
      'crrs_cd_key' => 'ForeignKey',
    );
  }
}
