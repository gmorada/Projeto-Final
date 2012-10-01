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
        $errorSchema = new sfValidatorErrorSchema($validator);
        $code = $values['subj_nm_code'];
        if ($code != "")
        {
            $subjects = Doctrine::getTable('Subject')->findBySubjNmCode($code);
            foreach ($subjects as $subject)
            {
                if($subject->getSubjCdKey() != $values['subj_cd_key'])
                    $errorSchema->addError(new sfValidatorError($validator, 'Já existe uma Disciplina com esse código'), 'subj_nm_code');
            }
        }
        
        if (count($errorSchema))
        {
            throw new sfValidatorErrorSchema($validator, $errorSchema);
        }
        return $values;
  }
}
