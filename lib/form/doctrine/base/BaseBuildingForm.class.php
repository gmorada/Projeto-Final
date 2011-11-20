<?php

/**
 * Building form base class.
 *
 * @method Building getObject() Returns the current form's model object
 *
 * @package    RoomManager
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBuildingForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'buil_cd_key'  => new sfWidgetFormInputHidden(),
      'buil_nm_name' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'buil_cd_key'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('buil_cd_key')), 'empty_value' => $this->getObject()->get('buil_cd_key'), 'required' => false)),
      'buil_nm_name' => new sfValidatorString(array('max_length' => 40)),
    ));

    $this->widgetSchema->setNameFormat('building[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Building';
  }

}
