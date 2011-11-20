<?php


class RoomCrowdDatetimeStatusTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('RoomCrowdDatetimeStatus');
    }
}