<?php

class RoomValidatorSchema extends sfValidatorBase
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
        
        $room_id = $values['room_cd_key'];
        
        $vagas = $values['room_nb_vagas'];
        
        $crowdDatetimes = Doctrine::getTable('RoomCrowdDatetime')->findByRoomCdKey($room_id);
        
        $errorSchema = new sfValidatorErrorSchema($this);
        
        if($crowdDatetimes)
        {
            foreach($crowdDatetimes as $actualCrowdDatetime)
            {
                $crowd = Doctrine::getTable('Crowd')->findOneByCrowCdKey($actualCrowdDatetime->getCrowCdKey());
                
                if($crowd->getCrowNbModule() > $vagas)
                    $errorSchema->addError(new sfValidatorError($this, 'O número de vagas é menor do que o módulo das turmas alocadas para essa sala'), 'room_nb_vagas');
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
