<?php


class RoomCrowdDatetimeTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('RoomCrowdDatetime');
    }
}