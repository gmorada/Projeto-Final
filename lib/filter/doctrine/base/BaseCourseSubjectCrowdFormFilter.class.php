<?php

/**
 * CourseSubjectCrowd filter form base class.
 *
 * @package    RoomManager
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCourseSubjectCrowdFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cour_cd_key'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Course'), 'add_empty' => true)),
      'subj_cd_key'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Subject'), 'add_empty' => true)),
      'crow_cd_key'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Crowd'), 'add_empty' => true)),
      'cosc_nb_slot' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'cour_cd_key'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Course'), 'column' => 'cour_cd_key')),
      'subj_cd_key'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Subject'), 'column' => 'subj_cd_key')),
      'crow_cd_key'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Crowd'), 'column' => 'crow_cd_key')),
      'cosc_nb_slot' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('course_subject_crowd_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CourseSubjectCrowd';
  }

  public function getFields()
  {
    return array(
      'cosc_cd_key'  => 'Number',
      'cour_cd_key'  => 'ForeignKey',
      'subj_cd_key'  => 'ForeignKey',
      'crow_cd_key'  => 'ForeignKey',
      'cosc_nb_slot' => 'Number',
    );
  }
}
