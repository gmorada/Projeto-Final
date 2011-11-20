<?php

/**
 * Room form base class.
 *
 * @method Room getObject() Returns the current form's model object
 *
 * @package    RoomManager
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRoomForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'room_cd_key'    => new sfWidgetFormInputHidden(),
      'buil_cd_key'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Building'), 'add_empty' => false)),
      'room_nm_number' => new sfWidgetFormInputText(),
      'room_nb_vagas'  => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'room_cd_key'    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('room_cd_key')), 'empty_value' => $this->getObject()->get('room_cd_key'), 'required' => false)),
      'buil_cd_key'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Building'))),
      'room_nm_number' => new sfValidatorString(array('max_length' => 10)),
      'room_nb_vagas'  => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('room[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Room';
  }

}
