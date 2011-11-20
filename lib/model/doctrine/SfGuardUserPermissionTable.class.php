<?php


class SfGuardUserPermissionTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('SfGuardUserPermission');
    }
}