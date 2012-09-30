<?php

class RoomCrowdDatetimeValidatorSchema extends sfValidatorBase
{
    protected function configure($options = array(), $messages = array())
    {        
        
    }

    protected function doClean($values)
    {
        if (!is_array($values))
        {
          throw new sfValidatorError($this, 'invalid');
        }
        
        $crowd = $values['crow_cd_key'];
        $room = $values['room_cd_key'];
        
        $roomCrowdDateTimes = Doctrine::getTable('RoomCrowdDatetime')->findByCrowCdKey($crowd);
        
        $crowds = Doctrine::getTable('Crowd')
                ->createQuery('c')                
                ->where('c.crow_cd_key <> ?', $crowd)
                ->execute();
        
        $errorSchema = new sfValidatorErrorSchema($this);
        
        if($crowds)
        {
            foreach($crowds as $actualCrowd)
            {                
                $actualRoomCrowdDateTimes = Doctrine::getTable('RoomCrowdDatetime')->findByCrowCdKeyAndRoomCdKey($actualCrowd->getCrowCdKey(), $room);
                
                foreach($actualRoomCrowdDateTimes as $first)
                {
                    foreach($roomCrowdDateTimes as $second)
                    {
                        if($first->getRocdNbWeekday() == $second->getRocdNbWeekday())
                        {
                            if(($first->getRocdDtStartTime() <= $second->getRocdDtStartTime()) && ($first->getRocdDtFinalTime() > $second->getRocdDtStartTime()))
                            {
                                $errorSchema->addError(new sfValidatorError($this, 'Esse sala não pode ser alocado nesse horário'), 'room_cd_key');
                            }
                            else if(($first->getRocdDtFinalTime() >= $second->getRocdDtFinalTime()) && ($first->getRocdDtStartTime() < $second->getRocdDtFinalTime()))
                            {
                                $errorSchema->addError(new sfValidatorError($this, 'Esse sala não pode ser alocado nesse horário'), 'room_cd_key');
                            }
                            else if(($second->getRocdDtStartTime() <= $first->getRocdDtStartTime()) && ($second->getRocdDtFinalTime() > $first->getRocdDtStartTime()))
                            {
                                $errorSchema->addError(new sfValidatorError($this, 'Esse sala não pode ser alocado nesse horário'), 'room_cd_key');
                            }
                            else if(($second->getRocdDtFinalTime() >= $first->getRocdDtFinalTime()) && ($second->getRocdDtStartTime() < $first->getRocdDtFinalTime()))
                            {
                                $errorSchema->addError(new sfValidatorError($this, 'Esse sala não pode ser alocado nesse horário'), 'room_cd_key');
                            }
                        }
                    }
                }
            }            
        }
        if (count($errorSchema))
        {
            throw new sfValidatorErrorSchema($this, $errorSchema);
        }
        
        return $values;
    }
}
?>
