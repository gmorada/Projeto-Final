<?php

/**
 * Subject filter form base class.
 *
 * @package    RoomManager
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSubjectFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'subj_nm_code' => new sfWidgetFormFilterInput(),
      'subj_nm_name' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cour_cd_key'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Course'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'subj_nm_code' => new sfValidatorPass(array('required' => false)),
      'subj_nm_name' => new sfValidatorPass(array('required' => false)),
      'cour_cd_key'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Course'), 'column' => 'cour_cd_key')),
    ));

    $this->widgetSchema->setNameFormat('subject_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Subject';
  }

  public function getFields()
  {
    return array(
      'subj_cd_key'  => 'Number',
      'subj_nm_code' => 'Text',
      'subj_nm_name' => 'Text',
      'cour_cd_key'  => 'ForeignKey',
    );
  }
}
