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

    $this->validatorSchema->setPostValidator(
      new sfValidatorCallback(array('callback' => array($this, 'check')))
    );
  }

  public function check($validator, $values)
  {
        $errorSchema = new sfValidatorErrorSchema($validator);
        $code = $values['cour_nb_code'];
        $name = $values['cour_nm_name'];
        $field = 'cour_nb_code';
        
        $courses = array();
        if (($code == "") && ($name == ""))
        {
            $errorSchema->addError(new sfValidatorError($validator, 'O código ou o nome do Curso deve ser preenchido'), $field);
        }        
        if (($code != "") && ($name != ""))
        {
            $courses = Doctrine::getTable('Course')->findByCourNbCodeOrCourNmName($code, $name);
            $message = 'Já existe um curso com esse nome ou código';
        }
        else if($code != "")
        {
            $courses = Doctrine::getTable('Course')->findByCourNbCode($code);
            $message = 'Já existe um curso com esse código';
        }
        else if($name != "")
        {
            $courses = Doctrine::getTable('Course')->findByCourNmName($name);
            $message = 'Já existe um curso com esse nome';
            $field = 'cour_nm_name';
        }

        foreach ($courses as $course)
        {
            if($course->getCourCdKey() != $values['cour_cd_key'])
                $errorSchema->addError(new sfValidatorError($validator, $message), $field);
        }
        if (count($errorSchema))
        {
            throw new sfValidatorErrorSchema($validator, $errorSchema);
        }
        return $values;
  }
}