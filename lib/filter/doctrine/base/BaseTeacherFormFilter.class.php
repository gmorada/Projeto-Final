<?php

/**
 * Teacher filter form base class.
 *
 * @package    RoomManager
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTeacherFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'teac_nm_name'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'teac_nm_email' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'teac_nm_name'  => new sfValidatorPass(array('required' => false)),
      'teac_nm_email' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('teacher_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Teacher';
  }

  public function getFields()
  {
    return array(
      'teac_cd_key'   => 'Number',
      'teac_nm_name'  => 'Text',
      'teac_nm_email' => 'Text',
    );
  }
}
