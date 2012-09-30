<?php

/**
 * Crowd form.
 *
 * @package    RoomManager
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TeacherCrowdForm extends BaseCrowdForm
{
  public function configure()
  {
      $this->setWidget('subj_cd_key', new sfWidgetFormInputHidden());
      $this->setWidget('crow_nm_name', new sfWidgetFormInputHidden());
      $this->setWidget('crow_nb_module', new sfWidgetFormInputHidden());
      
      $this->widgetSchema->setLabels(array(
          'subj_cd_key'     => 'Disciplina',
          'teac_cd_key'     => 'Professor',
          'crow_nm_name'    => 'Turma',
          'crow_nb_module'  => 'Modulo'
      ));
            
      $this->mergePostValidator(new TeacherCrowdValidatorSchema());

      /*if($this->getObject()->isNew())
      {
        $courseSubjectCrowd = new CourseSubjectCrowd();
        $courseSubjectCrowd->setCrowd($this->getObject());
      }
      else
      {
        $courseSubjectCrowd = Doctrine::getTable('CourseSubjectCrowd')->findOneByCrowCdKey($this->getObject()->getCrowCdKey());
      }
      $this->embedForm('CourseSubjectCrowd_0', new CourseSubjectCrowdForm($courseSubjectCrowd));*/
  }
}
