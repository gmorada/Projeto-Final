<?php

/**
 * Index actions.
 *
 * @package    RoomManager
 * @subpackage Index
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class IndexActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
  }

  public function executeReport(sfWebRequest $request)
  {
      $this->crowds = Doctrine::getTable('Crowd')->findAll();
  }

  public function executeReportExcel(sfWebRequest $request)
  {
      $this->crowds = Doctrine::getTable('Crowd')->findAll();
  }
}
