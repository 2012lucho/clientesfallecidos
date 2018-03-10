<?php
require_model('persona_fallecida.php');

class personas_fallecidas extends fs_controller {

   public function __construct() {
      parent::__construct(__CLASS__, 'Personas fallecidas', 'informes');   // PUT HERE MENU OPTION WHERE INSTALL CONTROLLER
   }

   protected function private_core() {
      parent::private_core();

      $this->mostrar = 'todo';
      $this->url     = '?page=personas_fallecidas';

      if(isset($_GET['mostrar'])){
        $this->mostrar = $_GET['mostrar'];
      }

      if ($this->mostrar == 'todo') {
        $personaFallecidaModel    = new persona_fallecida;
        $this->personasFallecidas = $personaFallecidaModel->getAll();
      }

      if ($this->mostrar == 'nueva'){

      }

      if ($this->mostrar == 'editar'){

      }

      if ($this->mostrar == 'eliminar'){

      }
   }

}
