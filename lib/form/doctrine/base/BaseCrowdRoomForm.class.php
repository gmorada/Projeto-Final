<?php

/**
 * CrowdRoom form base class.
 *
 * @method CrowdRoom getObject() Returns the current form's model object
 *
 * @package    RoomManager
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCrowdRoomForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'crro_cd_key' => new sfWidgetFormInputHidden(),
      'crow_cd_key' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Crowd'), 'add_empty' => false)),
      'room_cd_key' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Room'), 'add_empty' => false)),
      'crrs_cd_key' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CrowdRoomStatus'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'crro_cd_key' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('crro_cd_key')), 'empty_value' => $this->getObject()->get('crro_cd_key'), 'required' => false)),
      'crow_cd_key' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Crowd'))),
      'room_cd_key' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Room'))),
      'crrs_cd_key' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CrowdRoomStatus'))),
    ));

    $this->widgetSchema->setNameFormat('crowd_room[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CrowdRoom';
  }

}
