<?php

/**
 * CourseSubjectCrowd form.
 *
 * @package    RoomManager
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CourseSubjectCrowdForm extends BaseCourseSubjectCrowdForm
{
  public function configure()
  {
      $this->setWidget('crow_cd_key', new sfWidgetFormInputHidden());

      $this->widgetSchema->setLabels(array(
          'cour_cd_key'    => 'Curso',
          'subj_cd_key'    => 'Disciplina',
          'cosc_nb_slot'    => 'Número de Vagas'
      ));

  }
}
