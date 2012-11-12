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
      $this->setWidget('crow_cd_parent', new sfWidgetFormDoctrineChoice(array(
          'model' => $this->getRelatedModelName('Crowd'), 
          'method' => 'getCrowdName', 
          'add_empty' => true)
      ));
      
      $this->setValidator('crow_cd_parent', new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Crowd'), 'required' => false)));
      
      $this->widgetSchema->setLabels(array(
          'subj_cd_key'     => 'Disciplina',
          'teac_cd_key'     => 'Professor',
          'crow_nm_name'    => 'Turma',
          'crow_nb_module'  => 'Modulo',
          'crow_cd_parent'  => 'Turma Junta'
      ));
      
      $this->validatorSchema->setPostValidator(
        new sfValidatorCallback(array('callback' => array($this, 'check')))
      );
      
      $this->mergePostValidator(new CrowdValidatorSchema());

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
  
  public function check($validator, $values)
  {
        $errorSchema = new sfValidatorErrorSchema($validator);        
        $name = $values['crow_nm_name'];
        $subject = $values['subj_cd_key'];
        
        $crowds = Doctrine::getTable('Crowd')->findByCrowNmNameAndSubjCdKey($name, $subject);
        foreach ($crowds as $crowd)
        {
            if($crowd->getCrowCdKey() != $values['crow_cd_key'])
                $errorSchema->addError(new sfValidatorError($validator, 'Já existe uma Turma com esse nome na Disciplina'), 'crow_nm_name');
        }
        
        $id = $values['crow_cd_key'];
        
        if($id)
        {
            $parent = $values['crow_cd_parent'];
            
            if($id == $parent)
                $errorSchema->addError(new sfValidatorError($validator, 'Você não pode juntar uma turma nela mesma'), 'crow_cd_parent');
        }
        
        if (count($errorSchema))
        {
            throw new sfValidatorErrorSchema($validator, $errorSchema);
        }
        return $values;
  }
}
