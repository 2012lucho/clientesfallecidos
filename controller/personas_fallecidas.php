<?php
require_model('persona_fallecida.php');

class personas_fallecidas extends fs_controller {

   public function __construct() {
      parent::__construct(__CLASS__, 'Personas fallecidas', 'informes');   // PUT HERE MENU OPTION WHERE INSTALL CONTROLLER
   }

   public $canPPagina = 20; //cantida de elementos por pagina

   protected function private_core() {
      parent::private_core();

      $this->personasFallecidas = [];
      $this->mostrar            = 'todo';
      $this->urlGuardar         = '?page=personas_fallecidas&mostrar=nueva';
      $this->urlEditar          = '?page=edit_persona_fallecida';
      $this->urlBorrar          = '?page=personas_fallecidas&function=borrar';
      $this->urlVer             = '?page=ver_persona_fallecida';

      $limit      = 0;
      $offset     = 0;
      $page       = 1;

      if (isset($_GET['p'])){
        $page   = $_GET['p'];
      }
      $limit  = $this->canPPagina;
      $offset = $this->canPPagina*($page-1);

      if(isset($_GET['mostrar'])){
        $this->mostrar = $_GET['mostrar'];
      }
      $this->pg = $page;

      if ($this->mostrar == 'nueva'){
        $personaFallecidaModel                     = new persona_fallecida;
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
        $personaFallecidaModel->insert();

        $personaFallecidaModel    = new persona_fallecida;
        $personaFallecidaModel->limit  = $limit;
        $personaFallecidaModel->offset = $offset;
        $personaFallecidaModel->canPPagina = $this->canPPagina;
        $this->personasFallecidas = $personaFallecidaModel->getAll();
      }

      if (isset($_GET['function'])){
        $funcion = $_GET['function'];

        if ($funcion == 'borrar'){
          $personaFallecidaModel     = new persona_fallecida;
          $personaFallecidaModel->id = $_POST['id'];
          $personaFallecidaModel->delete();
          echo  json_encode(["success" => true]);
          exit();
        }

      }

      if($this->mostrar == 'todo'){
        $personaFallecidaModel    = new persona_fallecida;
        $personaFallecidaModel->limit  = $limit;
        $personaFallecidaModel->offset = $offset;
        $personaFallecidaModel->canPPagina = $this->canPPagina;
        $this->personasFallecidas = $personaFallecidaModel->getAll();
      }
   }

   public function paginas()
   {
       $p = 1;
       if (isset($_GET['p'])){
         $page   = $_GET['p'];
       }
       $personaFallecidaModel    = new persona_fallecida;
       $personaFallecidaModel->canPPagina = $this->canPPagina;
       return $personaFallecidaModel->getPaginas('?page=personas_fallecidas',$p);
   }

}
