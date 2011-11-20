<?php

/**
 * RoomCrowdDatetime form.
 *
 * @package    RoomManager
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CrowdDatetimeForm extends BaseRoomCrowdDatetimeForm
{
  public function configure()
  {
      $this->setWidget('crow_cd_key', new sfWidgetFormInputHidden());
      $this->setWidget('rcds_cd_key', new sfWidgetFormInputHidden());
      $this->setWidget('room_cd_key', new sfWidgetFormInputHidden());
      $this->setWidget('rocd_nb_weekday', new sfWidgetFormChoice(array('choices' => array(1 => 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado'))));

      $hours = range(06, 22);
      $minutes = array('0', '30');
      
      $this->setWidget('rocd_dt_start_time', new sfWidgetFormTime(array('hours' => array_combine($hours, $hours), 'minutes' => array_combine($minutes, $minutes))));
      $this->setWidget('rocd_dt_final_time', new sfWidgetFormTime(array('hours' => array_combine($hours, $hours), 'minutes' => array_combine($minutes, $minutes))));

      $this->setDefault('rcds_cd_key', 1);

      $this->widgetSchema->setLabels(array(
          'rocd_nb_weekday'    => 'Dia da Semana',
          'rocd_dt_start_time' => 'Horário de Inicio',
          'rocd_dt_final_time' => 'Horário de Término',
          'room_cd_key' => 'Sala',
          'crow_cd_key' => 'Turma'
        ));
  }
}
