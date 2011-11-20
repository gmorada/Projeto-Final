<?php

/**
 * Subject form base class.
 *
 * @method Subject getObject() Returns the current form's model object
 *
 * @package    RoomManager
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSubjectForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'subj_cd_key'  => new sfWidgetFormInputHidden(),
      'subj_nm_code' => new sfWidgetFormInputText(),
      'subj_nm_name' => new sfWidgetFormInputText(),
      'cour_cd_key'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Course'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'subj_cd_key'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('subj_cd_key')), 'empty_value' => $this->getObject()->get('subj_cd_key'), 'required' => false)),
      'subj_nm_code' => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'subj_nm_name' => new sfValidatorString(array('max_length' => 40)),
      'cour_cd_key'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Course'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('subject[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Subject';
  }

}
