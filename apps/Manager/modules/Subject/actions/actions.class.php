<?php

/**
 * Subject actions.
 *
 * @package    RoomManager
 * @subpackage Subject
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SubjectActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->subjects = Doctrine::getTable('Subject')
      ->createQuery('a');
    
    if($request->getParameter('filter'))
    {
        $this->subjects = $this->subjects->where("UPPER(a.Course.cour_nm_name) LIKE ('%".$request->getParameter('filter')."%')");
        $this->getUser()->setFlash('filter', 'Filtrado por '.$request->getParameter('filter'));
    }

    $this->subjects = $this->subjects->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->subject = Doctrine::getTable('Subject')->find(array($request->getParameter('subj_cd_key')));
    $this->forward404Unless($this->subject);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new SubjectForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new SubjectForm();
    
    if($this->processForm($request, $this->form))
    {
        $this->getUser()->setFlash('notice', 'Cadastrado com sucesso!');
        $this->redirect('Subject/new');
    }
    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($subject = Doctrine::getTable('Subject')->find(array($request->getParameter('subj_cd_key'))), sprintf('Object subject does not exist (%s).', $request->getParameter('subj_cd_key')));
    $this->form = new SubjectForm($subject);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($subject = Doctrine::getTable('Subject')->find(array($request->getParameter('subj_cd_key'))), sprintf('Object subject does not exist (%s).', $request->getParameter('subj_cd_key')));
    $this->form = new SubjectForm($subject);

    if($this->processForm($request, $this->form))
    {
        $this->getUser()->setFlash('notice', 'Editado com sucesso!');
        $this->redirect('Subject/index');
    }
    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($subject = Doctrine::getTable('Subject')->find(array($request->getParameter('subj_cd_key'))), sprintf('Object subject does not exist (%s).', $request->getParameter('subj_cd_key')));
    
    if($subject->delete())
        $this->getUser()->setFlash('notice', 'Apagado com sucesso!');
    else
        $this->getUser()->setFlash('notice', 'Ocorreu algum erro na hora de apagar, tente novamente');

    $this->redirect('Subject/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      return $subject = $form->save();
    }
  }
}
