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

    $this->validatorSchema->setPostValidator(
      new sfValidatorCallback(array('callback' => array($this, 'checkCode')))
    );
  }

  public function checkCode($validator, $values)
  {
  	$code = $values['subj_nm_code'];
    if ($code != "")
    {
    	$subjects = Doctrine::getTable('Subject')->findOneBySubjNmCode($code);
    	if($subjects)
    	{
    		throw new sfValidatorError($validator, 'Já existe uma Disciplina com esse código');
    	}
    }
    return $values;
  }
}
