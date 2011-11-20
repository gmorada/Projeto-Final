<?php

/**
 * CourseSubjectCrowd form base class.
 *
 * @method CourseSubjectCrowd getObject() Returns the current form's model object
 *
 * @package    RoomManager
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCourseSubjectCrowdForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cosc_cd_key'  => new sfWidgetFormInputHidden(),
      'cour_cd_key'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Course'), 'add_empty' => false)),
      'subj_cd_key'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Subject'), 'add_empty' => false)),
      'crow_cd_key'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Crowd'), 'add_empty' => false)),
      'cosc_nb_slot' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'cosc_cd_key'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('cosc_cd_key')), 'empty_value' => $this->getObject()->get('cosc_cd_key'), 'required' => false)),
      'cour_cd_key'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Course'))),
      'subj_cd_key'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Subject'))),
      'crow_cd_key'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Crowd'))),
      'cosc_nb_slot' => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('course_subject_crowd[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CourseSubjectCrowd';
  }

}
