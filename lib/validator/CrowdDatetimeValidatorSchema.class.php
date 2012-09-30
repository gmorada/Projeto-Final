<?php

class CrowdDatetimeValidatorSchema extends sfValidatorBase
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
        
        $crowd_id = $values['crow_cd_key'];
        
        $startTime = false;
        $time = $values['rocd_dt_start_time'];        
        if($time)
        {
            $time = explode(':', $time);
            $startTime = date('H:i', mktime($time[0], $time[1], $time[2]));
        }
        
        $finalTime = false;
        $time = $values['rocd_dt_final_time'];        
        if($time)
        {
            $time = explode(':', $time);
            $finalTime = date('H:i', mktime($time[0], $time[1], $time[2]));
        }
        
        $errorSchema = new sfValidatorErrorSchema($this);
        
        if(($startTime) && ($finalTime))
        {
            $roomCrowdDateTimes = Doctrine::getTable('RoomCrowdDatetime')->findByCrowCdKey($crowd_id);
        
            foreach($roomCrowdDateTimes as $roomCrowdDateTime)
            {
                if($roomCrowdDateTime->getRocdNbWeekday() == $values['rocd_nb_weekday'])
                {
                    if(($roomCrowdDateTime->getRocdDtStartTime() <= $startTime) && ($roomCrowdDateTime->getRocdDtFinalTime() > $startTime))
                    {
                        $errorSchema->addError(new sfValidatorError($this, 'Esse horário não pode ser alocado para essa turma'), 'rocd_nb_weekday');
                    }
                    else if(($roomCrowdDateTime->getRocdDtFinalTime() >= $finalTime) && ($roomCrowdDateTime->getRocdDtStartTime() < $finalTime))
                    {
                        $errorSchema->addError(new sfValidatorError($this, 'Esse horário não pode ser alocado para essa turma'), 'rocd_nb_weekday');
                    }
                    else if(($startTime <= $roomCrowdDateTime->getRocdDtStartTime()) && ($finalTime > $roomCrowdDateTime->getRocdDtStartTime()))
                    {
                        $errorSchema->addError(new sfValidatorError($this, 'Esse horário não pode ser alocado para essa turma'), 'rocd_nb_weekday');
                    }
                    else if(($finalTime >= $roomCrowdDateTime->getRocdDtFinalTime()) && ($startTime < $roomCrowdDateTime->getRocdDtFinalTime()))
                    {
                        $errorSchema->addError(new sfValidatorError($this, 'Esse horário não pode ser alocado para essa turma'), 'rocd_nb_weekday');
                    }
                }

            }
            
            $crowd = Doctrine::getTable('Crowd')->find($crowd_id);
            $teacher = $crowd->getTeacCdKey();
            
            if($teacher)
            {
                $crowds = Doctrine::getTable('Crowd')
                    ->createQuery('c')
                    ->where('c.teac_cd_key = ?',$teacher)
                    ->andWhere('c.crow_cd_key <> ?', $crowd_id)
                    ->execute();
                
                if($crowds)
                {
                    foreach($crowds as $actualCrowd)
                    {                
                        $actualRoomCrowdDateTimes = Doctrine::getTable('RoomCrowdDatetime')->findByCrowCdKey($actualCrowd->getCrowCdKey());

                        foreach($actualRoomCrowdDateTimes as $roomCrowdDateTime)
                        {
                            if($roomCrowdDateTime->getRocdNbWeekday() == $values['rocd_nb_weekday'])
                            {
                                if(($roomCrowdDateTime->getRocdDtStartTime() <= $startTime) && ($roomCrowdDateTime->getRocdDtFinalTime() > $startTime))
                                {
                                    $errorSchema->addError(new sfValidatorError($this, 'Esse horário não pode ser alocado para essa turma, o professor dessa turma já está dando outra aula'), 'rocd_nb_weekday');
                                }
                                else if(($roomCrowdDateTime->getRocdDtFinalTime() >= $finalTime) && ($roomCrowdDateTime->getRocdDtStartTime() < $finalTime))
                                {
                                    $errorSchema->addError(new sfValidatorError($this, 'Esse horário não pode ser alocado para essa turma, o professor dessa turma já está dando outra aula'), 'rocd_nb_weekday');
                                }
                                else if(($startTime <= $roomCrowdDateTime->getRocdDtStartTime()) && ($finalTime > $roomCrowdDateTime->getRocdDtStartTime()))
                                {
                                    $errorSchema->addError(new sfValidatorError($this, 'Esse horário não pode ser alocado para essa turma, o professor dessa turma já está dando outra aula'), 'rocd_nb_weekday');
                                }
                                else if(($finalTime >= $roomCrowdDateTime->getRocdDtFinalTime()) && ($startTime < $roomCrowdDateTime->getRocdDtFinalTime()))
                                {
                                    $errorSchema->addError(new sfValidatorError($this, 'Esse horário não pode ser alocado para essa turma, o professor dessa turma já está dando outra aula'), 'rocd_nb_weekday');
                                }
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
