<?php

/**
 * RoomCrowdDatetime actions.
 *
 * @package    RoomManager
 * @subpackage RoomCrowdDatetime
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class RoomCrowdDatetimeActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
   // $this->room_crowd_datetimes = Doctrine::getTable('RoomCrowdDatetime')
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
    $this->roomCrowdDatetime = Doctrine::getTable('RoomCrowdDatetime')->findOneByRocdCdKey($request->getParameter('rocd_cd_key'));

    $this->form = new RoomCrowdDatetimeForm($this->roomCrowdDatetime);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new RoomCrowdDatetimeForm();

    $parameters = $request->getPostParameters('RoomCrowdDatetime');
    $crow_cd_key = $parameters['room_crowd_datetime']['crow_cd_key'];

    if($this->processForm($request, $this->form))
    {
        $this->getUser()->setFlash('notice', 'Cadastrado com sucesso!');
        $this->redirect('RoomCrowdDatetime/new?crow_cd_key='.$crow_cd_key);
    }

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($room_crowd_datetime = Doctrine::getTable('RoomCrowdDatetime')->find(array($request->getParameter('rocd_cd_key'))), sprintf('Object room_crowd_datetime does not exist (%s).', $request->getParameter('rocd_cd_key')));

    $this->roomCrowdDatetime = $room_crowd_datetime;
    
    $this->form = new RoomCrowdDatetimeForm($room_crowd_datetime);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($room_crowd_datetime = Doctrine::getTable('RoomCrowdDatetime')->find(array($request->getParameter('rocd_cd_key'))), sprintf('Object room_crowd_datetime does not exist (%s).', $request->getParameter('rocd_cd_key')));
    $this->form = new RoomCrowdDatetimeForm($room_crowd_datetime);

    if($this->processForm($request, $this->form))
    {
        $this->getUser()->setFlash('notice', 'Alocado com sucesso!');
        $this->redirect('RoomCrowdDatetime/index');
    }
    $this->roomCrowdDatetime = $room_crowd_datetime;
    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($room_crowd_datetime = Doctrine::getTable('RoomCrowdDatetime')->find(array($request->getParameter('rocd_cd_key'))), sprintf('Object room_crowd_datetime does not exist (%s).', $request->getParameter('rocd_cd_key')));
    $crow_cd_key = $room_crowd_datetime->getCrowCdKey();
    $room_crowd_datetime->setRoomCdKey(NULL);
    $room_crowd_datetime->save();

    $this->getUser()->setFlash('notice', 'Sala desalocada com sucesso!');

    $this->redirect('RoomCrowdDatetime/index?crow_cd_key='.$crow_cd_key);
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
