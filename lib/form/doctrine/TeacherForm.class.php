<?php

/**
 * Teacher form.
 *
 * @package    RoomManager
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TeacherForm extends BaseTeacherForm
{
  public function configure()
  {
    $this->widgetSchema->setLabels(array(
          'teac_nm_name'    => 'Nome',
          'teac_nm_email'    => 'Email'
      ));
    $this->validatorSchema->setPostValidator(
        new sfValidatorCallback(array('callback' => array($this, 'checkCode')))
    );
  }

  public function checkCode($validator, $values)
  {
        $errorSchema = new sfValidatorErrorSchema($validator);
        $name = $values['teac_nm_name'];
        if ($name != "")
        {
            $teachers = Doctrine::getTable('Teacher')->findByTeacNmName($name);
            foreach ($teachers as $teacher)
            {
                if($teacher->getTeacCdKey() != $values['teac_cd_key'])
                    $errorSchema->addError(new sfValidatorError($validator, 'Já existe um Professor com esse nome'), 'buil_nm_name');
            }
        }

        if (count($errorSchema))
        {
            throw new sfValidatorErrorSchema($validator, $errorSchema);
        }
        return $values;
  }
}
