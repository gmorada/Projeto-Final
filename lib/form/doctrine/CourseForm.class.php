<?php

/**
 * Course form.
 *
 * @package    RoomManager
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CourseForm extends BaseCourseForm
{
  public function configure()
  {
    $this->widgetSchema->setLabels(array(
      'cour_nb_code'    => 'Código',
      'cour_nm_name' => 'Nome'
    ));
  }
}
