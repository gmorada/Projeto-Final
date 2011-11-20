<?php

/**
 * Subject form.
 *
 * @package    RoomManager
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SubjectForm extends BaseSubjectForm
{
  public function configure()
  {
    $this->widgetSchema->setLabels(array(
          'subj_nm_name'    => 'Matéria',
          'subj_nm_code'    => 'Código',
          'cour_cd_key' => 'Curso'
      ));
  }
}
