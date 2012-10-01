<?php

/**
 * Building form.
 *
 * @package    RoomManager
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BuildingForm extends BaseBuildingForm
{
  public function configure()
  {
      $this->widgetSchema->setLabels(array(
          'buil_nm_name'    => 'Prédio'
        ));
      
      $this->validatorSchema->setPostValidator(
        new sfValidatorCallback(array('callback' => array($this, 'checkCode')))
    );
  }

  public function checkCode($validator, $values)
  {
        $errorSchema = new sfValidatorErrorSchema($validator);
        $name = $values['buil_nm_name'];
        if ($name != "")
        {
            $buildings = Doctrine::getTable('Building')->findByBuilNmName($name);
            foreach ($buildings as $building)
            {
                if($building->getBuilCdKey() != $values['buil_cd_key'])
                    $errorSchema->addError(new sfValidatorError($validator, 'Já existe um Prédio com esse nome'), 'buil_nm_name');
            }
        }

        if (count($errorSchema))
        {
            throw new sfValidatorErrorSchema($validator, $errorSchema);
        }
        return $values;
  }
}