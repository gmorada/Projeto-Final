<?php

/**
 * Building actions.
 *
 * @package    RoomManager
 * @subpackage Building
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BuildingActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->buildings = Doctrine::getTable('Building')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->building = Doctrine::getTable('Building')->find(array($request->getParameter('buil_cd_key')));
    $this->forward404Unless($this->building);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new BuildingForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new BuildingForm();

    if($this->processForm($request, $this->form))
    {
        $this->getUser()->setFlash('notice', 'Cadastrado com sucesso!');
        $this->redirect('Building/new');
    }
    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($building = Doctrine::getTable('Building')->find(array($request->getParameter('buil_cd_key'))), sprintf('Object building does not exist (%s).', $request->getParameter('buil_cd_key')));
    $this->form = new BuildingForm($building);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($building = Doctrine::getTable('Building')->find(array($request->getParameter('buil_cd_key'))), sprintf('Object building does not exist (%s).', $request->getParameter('buil_cd_key')));
    $this->form = new BuildingForm($building);

    if($this->processForm($request, $this->form))
    {
        $this->getUser()->setFlash('notice', 'Editado com sucesso!');
        $this->redirect('Building/index');
    }
    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($building = Doctrine::getTable('Building')->find(array($request->getParameter('buil_cd_key'))), sprintf('Object building does not exist (%s).', $request->getParameter('buil_cd_key')));
    if($building->delete())
        $this->getUser()->setFlash('notice', 'Apagado com sucesso!');
    else
        $this->getUser()->setFlash('notice', 'Ocorreu algum erro na hora de apagar, tente novamente');
    
    $this->redirect('Building/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      return $building = $form->save();
    }
  }
}
