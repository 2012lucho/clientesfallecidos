<?php

/*
 * @author Christian Puchaicela      christianmls@hotmail.com
 * @copyright 2017, InfinityCSoft. All Rights Reserved.
 */


class personas_fallecidas extends fs_controller
{
  public $mostrar;

  public function __construct()
  {
    parent::__construct(__CLASS__, 'Personas fallecidas', 'informes');
  }

  protected function private_core()
  {
    $this->mostrar = 'todo';
  }
}
