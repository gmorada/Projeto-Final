<?php

/**
 * RoomCrowdDatetime actions.
 *
 * @package    RoomManager
 * @subpackage RoomCrowdDatetime
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CrowdDatetimeActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {    
      $this->crowds = Doctrine::getTable('Crowd')
        ->createQuery('a')
        ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->room_crowd_datetime = Doctrine::getTable('RoomCrowdDatetime')->find(array($request->getParameter('rocd_cd_key')));
    $this->forward404Unless($this->room_crowd_datetime);
  }

  public function executeNew(sfWebRequest $request)
  {
    $roomCrowdDatetime = new RoomCrowdDatetime();
    $roomCrowdDatetime->setCrowCdKey($request->getParameter('crow_cd_key'));

    $this->crowd = Doctrine::getTable('Crowd')->findOneByCrowCdKey($request->getParameter('crow_cd_key'));
    
    $this->form = new CrowdDatetimeForm($roomCrowdDatetime);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new CrowdDatetimeForm();
    
    if($crowdDatetime = $this->processForm($request, $this->form))
    {
        $this->getUser()->setFlash('notice', 'Cadastrado com sucesso!');
        $this->redirect('CrowdDatetime/new?crow_cd_key='.$crowdDatetime->Crowd->getCrowCdKey());
    }
    
    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($room_crowd_datetime = Doctrine::getTable('RoomCrowdDatetime')->find(array($request->getParameter('rocd_cd_key'))), sprintf('Object room_crowd_datetime does not exist (%s).', $request->getParameter('rocd_cd_key')));

    $this->crowd = Doctrine::getTable('Crowd')->findOneByCrowCdKey($room_crowd_datetime->getCrowCdKey());
    $this->form = new CrowdDatetimeForm($room_crowd_datetime);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($room_crowd_datetime = Doctrine::getTable('RoomCrowdDatetime')->find(array($request->getParameter('rocd_cd_key'))), sprintf('Object room_crowd_datetime does not exist (%s).', $request->getParameter('rocd_cd_key')));
    $this->form = new CrowdDatetimeForm($room_crowd_datetime);

    if($this->processForm($request, $this->form))
    {
        $this->getUser()->setFlash('notice', 'Editado com sucesso!');
        $this->redirect('CrowdDatetime/index');
    }
    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($room_crowd_datetime = Doctrine::getTable('RoomCrowdDatetime')->find(array($request->getParameter('rocd_cd_key'))), sprintf('Object room_crowd_datetime does not exist (%s).', $request->getParameter('rocd_cd_key')));    

    if($room_crowd_datetime->delete())
        $this->getUser()->setFlash('notice', 'Apagado com sucesso!');
    else
        $this->getUser()->setFlash('notice', 'Ocorreu algum erro na hora de apagar, tente novamente');
    
    $this->redirect('CrowdDatetime/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      return $room_crowd_datetime = $form->save();
    }
  }
}
