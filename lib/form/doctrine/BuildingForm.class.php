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
  }
}
