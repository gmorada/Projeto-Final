<?php

/**
 * Room form.
 *
 * @package    RoomManager
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class RoomForm extends BaseRoomForm
{
  public function configure()
{
    $this->widgetSchema->setLabels(array(
          'buil_cd_key'    => 'Prédio',
          'room_nm_number' => 'Número',
          'room_nb_vagas'  => 'Número de vagas'
      ));
    $this->validatorSchema->setPostValidator(
        new sfValidatorCallback(array('callback' => array($this, 'checkCode')))
    );
  }

  public function checkCode($validator, $values)
  {
        $errorSchema = new sfValidatorErrorSchema($validator);
        $number = $values['room_nm_number'];
        if ($number != "")
        {
            $rooms = Doctrine::getTable('Room')->findByRoomNmNumber($number);
            foreach ($rooms as $room)
            {
                if($room->getRoomCdKey() != $values['room_cd_key'] && $room->getBuilCdKey() == $values['buil_cd_key'])
                    $errorSchema->addError(new sfValidatorError($validator, 'Já existe uma sala com esse número no Prédio'), 'room_nm_number');
            }
        }

        if (count($errorSchema))
        {
            throw new sfValidatorErrorSchema($validator, $errorSchema);
        }
        return $values;
  }
}