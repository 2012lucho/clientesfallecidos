<?php

class persona_fallecida extends \fs_model {

    private $id;
    private $Identificacion;
    private $Nombre;
    private $Apellido;
    private $Fecha_nacimiento;
    private $Edad;
    private $Provincia;
    private $Ciudad;
    private $Nacionalidad;
    private $EstadoCivil;
    private $Ficha_IESS;
    private $Apoderado;
    private $Fecha_defuncion;
    private $Hora_defuncion;
    private $Causa_defuncion;
    private $Hospital_defuncion;
    private $Lugar_defuncion;
    private $lugar_cementerio;
    private $tomo_cementerio;
    private $acta_cementerio;
    private $folio_cementerio;
    private $valor_cementerio;
    private $observaciones;
    private $servicio_religioso;
    private $hora_misa;
    private $lugar_velatorio;
    private $Hora_sepelio;

   public function __construct($data = FALSE) {
      parent::__construct('persona_fallecida');

      if ($data) {
         $this->load_from_data($data);
      } else {
         $this->clear();
      }
   }

   public function save(){

   }

   public function delete(){

   }

   public function exists() {
      return parent::exists();
   }

   public function clear() {
     $this->id = '';
     $this->Identificacion = '';
     $this->Nombre = '';
     $this->Apellido = '';
     $this->Fecha_nacimiento = '';
     $this->Edad = '';
     $this->Provincia = '';
     $this->Ciudad = '';
     $this->Nacionalidad = '';
     $this->EstadoCivil = '';
     $this->Ficha_IESS = '';
     $this->Apoderado = '';
     $this->Fecha_defuncion = '';
     $this->Hora_defuncion = '';
     $this->Causa_defuncion = '';
     $this->Hospital_defuncion = '';
     $this->Lugar_defuncion = '';
     $this->lugar_cementerio = '';
     $this->tomo_cementerio = '';
     $this->acta_cementerio = '';
     $this->folio_cementerio = '';
     $this->valor_cementerio = '';
     $this->observaciones = '';
     $this->servicio_religioso = '';
     $this->hora_misa = '';
     $this->lugar_velatorio = '';
     $this->Hora_sepelio = '';
   }

   public function getAll(){
     return $this->db->select("SELECT * FROM " . $this->table_name);
   }

   public function load_from_data($data) {
      $this->id = $data['id'];
      $this->nombre = $data['nombre'];
      $this->razonsocial = $data['razonsocial'];
      $this->observaciones = $data['observaciones'];
      $this->provincia = $data['provincia'];
      $this->ciudad = $data['ciudad'];
      $this->codpostal = $data['codpostal'];
      $this->direccion = $data['direccion'];
      $this->tipodocumento = $data['tipodocumento'];
      $this->numdocumento = $data['numdocumento'];
   }

   protected function test() {
      return parent::test();
   }

   protected function update() {
      $sql = 'UPDATE persona_fallecida SET '
              . '  field1 = value1'
              . ', fieldN = valueN'
              . ' WHERE field_key1 = key_value1;';

      return $this->db->exec($sql);
   }

   protected function insert() {
      $sql = 'INSERT INTO persona_fallecida '
              . '(id,nombre,razonsocial,observaciones,provincia,ciudad,codpostal,direccion,tipodocumento,numdocumento)'
              . ' VALUES '
              . '(...);';

      return $this->db->exec($sql);
   }

}
