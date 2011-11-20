<?php

/**
 * Course actions.
 *
 * @package    RoomManager
 * @subpackage Course
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CourseActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->courses = Doctrine::getTable('Course')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->course = Doctrine::getTable('Course')->find(array($request->getParameter('cour_cd_key')));
    $this->forward404Unless($this->course);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new CourseForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new CourseForm();

    if($this->processForm($request, $this->form))
    {
        $this->getUser()->setFlash('notice', 'Cadastrado com sucesso!');
        $this->redirect('Course/new');
    }
    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($course = Doctrine::getTable('Course')->find(array($request->getParameter('cour_cd_key'))), sprintf('Object course does not exist (%s).', $request->getParameter('cour_cd_key')));
    $this->form = new CourseForm($course);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($course = Doctrine::getTable('Course')->find(array($request->getParameter('cour_cd_key'))), sprintf('Object course does not exist (%s).', $request->getParameter('cour_cd_key')));
    $this->form = new CourseForm($course);

    $this->processForm($request, $this->form);

    if($this->processForm($request, $this->form))
    {
        $this->getUser()->setFlash('notice', 'Editado com sucesso!');
        $this->redirect('Course/index');
    }
    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($course = Doctrine::getTable('Course')->find(array($request->getParameter('cour_cd_key'))), sprintf('Object course does not exist (%s).', $request->getParameter('cour_cd_key')));
    if($course->delete())
        $this->getUser()->setFlash('notice', 'Apagado com sucesso!');
    else
        $this->getUser()->setFlash('notice', 'Ocorreu algum erro na hora de apagar, tente novamente');

    $this->redirect('Course/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      return $course = $form->save();
    }
  }
}
