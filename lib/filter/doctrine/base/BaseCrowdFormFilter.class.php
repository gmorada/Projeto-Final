<?php

/**
 * Crowd filter form base class.
 *
 * @package    RoomManager
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCrowdFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'teac_cd_key'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Teacher'), 'add_empty' => true)),
      'crow_nm_name'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'crow_nb_module' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'subj_cd_key'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Subject'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'teac_cd_key'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Teacher'), 'column' => 'teac_cd_key')),
      'crow_nm_name'   => new sfValidatorPass(array('required' => false)),
      'crow_nb_module' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'subj_cd_key'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Subject'), 'column' => 'subj_cd_key')),
    ));

    $this->widgetSchema->setNameFormat('crowd_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Crowd';
  }

  public function getFields()
  {
    return array(
      'crow_cd_key'    => 'Number',
      'teac_cd_key'    => 'ForeignKey',
      'crow_nm_name'   => 'Text',
      'crow_nb_module' => 'Number',
      'subj_cd_key'    => 'ForeignKey',
    );
  }
}
