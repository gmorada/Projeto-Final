<?php

/**
 * Room actions.
 *
 * @package    RoomManager
 * @subpackage Room
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class RoomActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
      $this->rooms = Doctrine::getTable('Room')
            ->createQuery('a');
      
      if($request->getParameter('filter'))
      {
          $this->rooms = $this->rooms->where("UPPER(a.Building.buil_nm_name) LIKE ('%".$request->getParameter('filter')."%')");
          $this->getUser()->setFlash('filter', 'Filtrado por '.$request->getParameter('filter'), $persist=false);
      }
      
      $this->rooms = $this->rooms->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->room = Doctrine::getTable('Room')->find(array($request->getParameter('room_cd_key')));
    $this->forward404Unless($this->room);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new RoomForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new RoomForm();
    
    if($this->processForm($request, $this->form))
    {
        $this->getUser()->setFlash('notice', 'Cadastrado com sucesso!');
        $this->redirect('Room/new');
    }
    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($room = Doctrine::getTable('Room')->find(array($request->getParameter('room_cd_key'))), sprintf('Object room does not exist (%s).', $request->getParameter('room_cd_key')));
    $this->form = new RoomForm($room);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($room = Doctrine::getTable('Room')->find(array($request->getParameter('room_cd_key'))), sprintf('Object room does not exist (%s).', $request->getParameter('room_cd_key')));
    $this->form = new RoomForm($room);

    if($this->processForm($request, $this->form))
    {
        $this->getUser()->setFlash('notice', 'Editado com sucesso!');
        $this->redirect('Room/index');
    }
    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($room = Doctrine::getTable('Room')->find(array($request->getParameter('room_cd_key'))), sprintf('Object room does not exist (%s).', $request->getParameter('room_cd_key')));
    
    if($room->delete())
        $this->getUser()->setFlash('notice', 'Apagado com sucesso!');
    else
        $this->getUser()->setFlash('notice', 'Ocorreu algum erro na hora de apagar, tente novamente');

    $this->redirect('Room/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      return $room = $form->save();
    }
  }
}
