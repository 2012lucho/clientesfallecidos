<?php

class persona_fallecida extends \fs_model {

    public $id;
    public $Identificacion;
    public $Nombre;
    public $Apellido;
    public $Fecha_nacimiento;
    public $Edad;
    public $Provincia;
    public $Ciudad;
    public $Nacionalidad;
    public $EstadoCivil;
    public $Ficha_IESS;
    public $Apoderado;
    public $Fecha_defuncion;
    public $Hora_defuncion;
    public $Causa_defuncion;
    public $Hospital_defuncion;
    public $Lugar_defuncion;
    public $lugar_cementerio;
    public $tomo_cementerio;
    public $acta_cementerio;
    public $folio_cementerio;
    public $valor_cementerio;
    public $observaciones;
    public $servicio_religioso;
    public $hora_misa;
    public $lugar_velatorio;
    public $Hora_sepelio;

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
     $sql = 'DELETE FROM persona_fallecida WHERE id="'.$this->id.'"';
     return $this->db->exec($sql);
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

   public function get(){
     return $this->db->select("SELECT * FROM " . $this->table_name.' WHERE id="'.$this->id.'"');
   }

   public function load_from_data($data) {
     $this->Identificacion =  $data['Identificacion'];
     $this->Nombre =  $data['Nombre'];
     $this->Apellido =  $data['Apellido'];
     $this->Fecha_nacimiento =  $data['Fecha_nacimiento'];
     $this->Edad =  $data['Edad'];
     $this->Provincia =  $data['Provincia'];
     $this->Ciudad =  $data['Ciudad'];
     $this->Nacionalidad =  $data['Nacionalidad'];
     $this->EstadoCivil =  $data['EstadoCivil'];
     $this->Ficha_IESS =  $data['Ficha_IESS'];
     $this->Apoderado =  $data['Apoderado'];
     $this->Fecha_defuncion =  $data['Fecha_defuncion'];
     $this->Hora_defuncion =  $data['Hora_defuncion'];
     $this->Causa_defuncion =  $data['Causa_defuncion'];
     $this->Hospital_defuncion =  $data['Hospital_defuncion'];
     $this->Lugar_defuncion =  $data['Lugar_defuncion'];
     $this->lugar_cementerio =  $data['lugar_cementerio'];
     $this->tomo_cementerio =  $data['tomo_cementerio'];
     $this->acta_cementerio =  $data['acta_cementerio'];
     $this->folio_cementerio =  $data['Folio_cementerio'];
     $this->valor_cementerio =  $data['valor_cementerio'];
     $this->observaciones =  $data['observaciones'];
     $this->servicio_religioso =  $data['servicio_religioso'];
     $this->hora_misa =  $data['Hora_misa'];
     $this->lugar_velatorio = $data['lugar_velatorio'];
     $this->Hora_sepelio = $data['Hora_sepelio'];
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

   public function insert() {
      $sql = 'INSERT INTO persona_fallecida '
              . '(Identificacion,Nombre,Apellido,Fecha_nacimiento,Edad,Provincia,Ciudad,Nacionalidad,EstadoCivil,Ficha_IESS,
                  Apoderado,Fecha_defuncion,Hora_defuncion,Causa_defuncion,Hospital_defuncion,Lugar_defuncion,
                  lugar_cementerio,tomo_cementerio,acta_cementerio,folio_cementerio,valor_cementerio,observaciones,
                  servicio_religioso,hora_misa,lugar_velatorio,Hora_sepelio)'
              . ' VALUES '
              . '("'.$this->Identificacion.'","'.$this->Nombre.'","'.$this->Apellido.'","'.$this->Fecha_nacimiento.'","'
              .$this->Edad.'","'.$this->Provincia.'","'.$this->Ciudad.'","'.$this->Nacionalidad.'","'.$this->EstadoCivil.'",
               "'.$this->Ficha_IESS.'","'.$this->Apoderado.'","'.$this->Fecha_defuncion.'","'.$this->Hora_defuncion.'",
               "'.$this->Causa_defuncion.'","'.$this->Hospital_defuncion.'","'.$this->Lugar_defuncion.'",
               "'.$this->lugar_cementerio.'","'.$this->tomo_cementerio.'","'.$this->acta_cementerio.'","'.$this->folio_cementerio.'",
               "'.$this->valor_cementerio.'","'.$this->observaciones.'","'.$this->servicio_religioso.'","'.$this->hora_misa.'",
               "'.$this->lugar_velatorio.'","'.$this->Hora_sepelio.'");';

      return $this->db->exec($sql);
   }

}
