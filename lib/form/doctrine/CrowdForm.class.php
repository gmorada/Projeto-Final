<?php

/**
 * Crowd form.
 *
 * @package    RoomManager
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CrowdForm extends BaseCrowdForm
{
  public function configure()
  {
      $this->widgetSchema->setLabels(array(
          'subj_cd_key'     => 'Disciplina',
          'teac_cd_key'     => 'Professor',
          'crow_nm_name'    => 'Turma',
          'crow_nb_module'  => 'Modulo'
      ));

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
