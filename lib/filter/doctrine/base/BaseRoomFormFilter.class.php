<?php

/**
 * Room filter form base class.
 *
 * @package    RoomManager
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseRoomFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'buil_cd_key'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Building'), 'add_empty' => true)),
      'room_nm_number' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'room_nb_vagas'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'buil_cd_key'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Building'), 'column' => 'buil_cd_key')),
      'room_nm_number' => new sfValidatorPass(array('required' => false)),
      'room_nb_vagas'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('room_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Room';
  }

  public function getFields()
  {
    return array(
      'room_cd_key'    => 'Number',
      'buil_cd_key'    => 'ForeignKey',
      'room_nm_number' => 'Text',
      'room_nb_vagas'  => 'Number',
    );
  }
}
