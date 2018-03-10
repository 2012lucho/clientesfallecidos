<?php

class persona_fallecida extends \fs_model {

   private $id;
   private $nombre;
   private $razonsocial;
   private $observaciones;
   private $provincia;
   private $ciudad;
   private $codpostal;
   private $direccion;
   private $tipodocumento;
   private $numdocumento;

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
      $this->nombre = '';
      $this->razonsocial = '';
      $this->observaciones = '';
      $this->provincia = '';
      $this->ciudad = '';
      $this->codpostal = '';
      $this->direccion = '';
      $this->tipodocumento = '';
      $this->numdocumento = '';
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
      /*
        PUT HERE MODEL DATA VALIDATIONS
        EXAMPLE:
        if($this->field_Numeric == 0) {
        $this->new_error_msg('Must be inform a code value');
        return FALSE;
        }
        return TRUE;
       */
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
