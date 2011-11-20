<?php

/**
 * Teacher actions.
 *
 * @package    RoomManager
 * @subpackage Teacher
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TeacherActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->teachers = Doctrine::getTable('Teacher')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->teacher = Doctrine::getTable('Teacher')->find(array($request->getParameter('teac_cd_key')));
    $this->forward404Unless($this->teacher);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new TeacherForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TeacherForm();

    if($this->processForm($request, $this->form))
    {
        $this->getUser()->setFlash('notice', 'Cadastrado com sucesso!');
        $this->redirect('Teacher/new');
    }
    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($teacher = Doctrine::getTable('Teacher')->find(array($request->getParameter('teac_cd_key'))), sprintf('Object teacher does not exist (%s).', $request->getParameter('teac_cd_key')));
    $this->form = new TeacherForm($teacher);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($teacher = Doctrine::getTable('Teacher')->find(array($request->getParameter('teac_cd_key'))), sprintf('Object teacher does not exist (%s).', $request->getParameter('teac_cd_key')));
    $this->form = new TeacherForm($teacher);

    if($this->processForm($request, $this->form))
    {
        $this->getUser()->setFlash('notice', 'Editado com sucesso!');
        $this->redirect('Teacher/index');
    }
    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($teacher = Doctrine::getTable('Teacher')->find(array($request->getParameter('teac_cd_key'))), sprintf('Object teacher does not exist (%s).', $request->getParameter('teac_cd_key')));

    if($teacher->delete())
        $this->getUser()->setFlash('notice', 'Apagado com sucesso!');
    else
        $this->getUser()->setFlash('notice', 'Ocorreu algum erro na hora de apagar, tente novamente');

    $this->redirect('Teacher/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      return $teacher = $form->save();
    }
  }
}
