<?php

class CrowdValidatorSchema extends sfValidatorBase
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
        
        $crow_id = $values['crow_cd_key'];
        
        $modulo = $values['crow_nb_module'];
        
        $crowdDatetimes = Doctrine::getTable('RoomCrowdDatetime')->findByCrowCdKey($crow_id);
        
        $errorSchema = new sfValidatorErrorSchema($this);
        
        if($crowdDatetimes)
        {
            foreach($crowdDatetimes as $actualCrowdDatetime)
            {
                $room = Doctrine::getTable('Room')->findOneByRoomCdKey($actualCrowdDatetime->getRoomCdKey());
                
                if($room->getRoomNbVagas() < $modulo)
                    $errorSchema->addError(new sfValidatorError($this, 'O modulo da turma é maior do que o número de vagas das salas alocadas para essa turma'), 'crow_nb_module');
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
