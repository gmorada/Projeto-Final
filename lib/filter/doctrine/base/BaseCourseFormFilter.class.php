<?php

/**
 * Course filter form base class.
 *
 * @package    RoomManager
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCourseFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cour_nb_code' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cour_nm_name' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'cour_nb_code' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cour_nm_name' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('course_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Course';
  }

  public function getFields()
  {
    return array(
      'cour_cd_key'  => 'Number',
      'cour_nb_code' => 'Number',
      'cour_nm_name' => 'Text',
    );
  }
}
