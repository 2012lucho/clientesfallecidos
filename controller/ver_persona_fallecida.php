<?php
require_model('persona_fallecida.php');

class ver_persona_fallecida extends fs_controller {

   public function __construct() {
      parent::__construct(__CLASS__);
   }

   protected function private_core() {
      parent::private_core();

      $personaFallecidaModel     = new persona_fallecida;
      $personaFallecidaModel->id = $_GET['id'];
      $this->pf                  = $personaFallecidaModel->get()[0];

   }
}
