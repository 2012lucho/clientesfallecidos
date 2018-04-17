<?php
require_model('persona_fallecida.php');

class edit_persona_fallecida extends fs_controller {

   public function __construct() {
      parent::__construct(__CLASS__);
   }

   protected function private_core() {
      parent::private_core();

      $this->function = 'none';
      if(isset($_GET['function'])){
        $this->function = $_GET['function'];
      }

      if(!isset($_GET['id'])){
        //  echo json_encode(['error' => 'id not found']);
        //  exit();
      }

      $this->urlUpdate = '?page=edit_persona_fallecida&function=update&id='.$_GET['id'];

      if ($this->function == 'update'){
        $personaFallecidaModel                     = new persona_fallecida;
        $personaFallecidaModel->id                 = $_GET['id'];
        $personaFallecidaModel->acta_cementerio    = $_POST['acta_cementerio'];
        $personaFallecidaModel->Apellido           = $_POST['apellido'];
        $personaFallecidaModel->Apoderado          = $_POST['apoderado'];
        $personaFallecidaModel->Causa_defuncion    = $_POST['causa_defuncion'];
        $personaFallecidaModel->Edad               = $_POST['edad'];
        $personaFallecidaModel->Provincia          = $_POST['Provincia'];
        $personaFallecidaModel->Ciudad             = $_POST['Ciudad'];
        $personaFallecidaModel->Nacionalidad       = $_POST['Nacionalidad'];
        $personaFallecidaModel->EstadoCivil        = $_POST['estado_civil'];
        $personaFallecidaModel->Fecha_defuncion    = $_POST['fecha_defuncion'];
        $personaFallecidaModel->Fecha_nacimiento   = $_POST['fecha_nacimiento'];
        $personaFallecidaModel->folio_cementerio   = $_POST['folio_cementerio'];
        $personaFallecidaModel->hora_defuncion     = $_POST['hora_defuncion'];
        $personaFallecidaModel->Hora_sepelio       = $_POST['hora_sepelio'];
        $personaFallecidaModel->hora_misa          = $_POST['horario_misa'];
        $personaFallecidaModel->Hospital_defuncion = $_POST['hospital_defuncion'];
        $personaFallecidaModel->Identificacion     = $_POST['identificacion'];
        $personaFallecidaModel->Ficha_IESS         = $_POST['iess'];
        $personaFallecidaModel->lugar_cementerio   = $_POST['lugar_cementerio'];
        $personaFallecidaModel->Lugar_defuncion    = $_POST['lugar_defuncion'];
        $personaFallecidaModel->lugar_velatorio    = $_POST['lugar_velatorio'];
        $personaFallecidaModel->Nombre             = $_POST['nombre'];
        $personaFallecidaModel->observaciones      = $_POST['observaciones_cementerio'];
        $personaFallecidaModel->servicio_religioso = $_POST['servicio_religioso'];
        $personaFallecidaModel->tomo_cementerio    = $_POST['tomo_cementerio'];
        $personaFallecidaModel->valor_cementerio   = $_POST['valor_cementerio'];
        $personaFallecidaModel->update();
      }

      $personaFallecidaModel     = new persona_fallecida;
      $personaFallecidaModel->id = $_GET['id'];
      $this->pf                  = $personaFallecidaModel->get()[0];

   }
}
