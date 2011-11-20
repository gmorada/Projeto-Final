<?php

/**
 * Crowd form base class.
 *
 * @method Crowd getObject() Returns the current form's model object
 *
 * @package    RoomManager
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCrowdForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'crow_cd_key'    => new sfWidgetFormInputHidden(),
      'teac_cd_key'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Teacher'), 'add_empty' => true)),
      'crow_nm_name'   => new sfWidgetFormInputText(),
      'crow_nb_module' => new sfWidgetFormInputText(),
      'subj_cd_key'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Subject'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'crow_cd_key'    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('crow_cd_key')), 'empty_value' => $this->getObject()->get('crow_cd_key'), 'required' => false)),
      'teac_cd_key'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Teacher'), 'required' => false)),
      'crow_nm_name'   => new sfValidatorString(array('max_length' => 2)),
      'crow_nb_module' => new sfValidatorInteger(),
      'subj_cd_key'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Subject'))),
    ));

    $this->widgetSchema->setNameFormat('crowd[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Crowd';
  }

}
