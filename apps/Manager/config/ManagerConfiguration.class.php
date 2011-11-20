<?php

class ManagerConfiguration extends sfApplicationConfiguration
{
  public function configure()
  {
      sfValidatorBase::setDefaultMessage('required', 'Obrigatório');
  }
}
