<?php

/**
 * Crowd actions.
 *
 * @package    RoomManager
 * @subpackage Crowd
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TeacherCrowdActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->crowds = Doctrine::getTable('Crowd')
      ->createQuery('a');

/*    if($request->getParameter('filter'))
    {
        $this->subjects = $this->subjects->where("UPPER(a.subj_nm_name) LIKE ('%".$request->getParameter('filter')."%')");
        $this->getUser()->setFlash('filter', 'Filtrado por '.$request->getParameter('filter'));
    }*/

    $this->crowds = $this->crowds->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->crowd = Doctrine::getTable('Crowd')->find(array($request->getParameter('crow_cd_key')));
    $this->forward404Unless($this->crowd);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->crowd= Doctrine::getTable('Crowd')->findOneByCrowCdKey($request->getParameter('crow_cd_key'));

    $this->form = new TeacherCrowdForm($this->crowd);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TeacherCrowdForm();

    if($this->processForm($request, $this->form))
    {
        $this->getUser()->setFlash('notice', 'Cadastrado com sucesso!');
        $this->redirect('TeacherCrowd/new');
    }
    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($this->crowd = Doctrine::getTable('Crowd')->find(array($request->getParameter('crow_cd_key'))), sprintf('Object crowd does not exist (%s).', $request->getParameter('crow_cd_key')));
    $this->form = new TeacherCrowdForm($this->crowd);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($this->crowd = Doctrine::getTable('Crowd')->find(array($request->getParameter('crow_cd_key'))), sprintf('Object crowd does not exist (%s).', $request->getParameter('crow_cd_key')));
    $this->form = new TeacherCrowdForm($this->crowd);

    if($this->processForm($request, $this->form))
    {
        $this->getUser()->setFlash('notice', 'Professor alocado com sucesso!');
        $this->redirect('TeacherCrowd/index');
    }
    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($crowd = Doctrine::getTable('Crowd')->find(array($request->getParameter('crow_cd_key'))), sprintf('Object crowd does not exist (%s).', $request->getParameter('crow_cd_key')));
    $crowd->setTeacher(NULL);
    $crowd->save();

    $this->getUser()->setFlash('notice', 'Professor desalocado com sucesso!');

    $this->redirect('TeacherCrowd/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      return $crowd = $form->save();
    }
  }
}
