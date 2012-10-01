<?php

class ManagerConfiguration extends sfApplicationConfiguration
{
  public function configure()
  {
      sfValidatorBase::setDefaultMessage('required', 'Obrigatório');
      sfValidatorBase::setDefaultMessage('invalid', 'Valor inválido');
      sfValidatorBase::setDefaultMessage('max_length', '"%value%" é muito grande (%max_length% caracateres no máximo).');      
  }
}
