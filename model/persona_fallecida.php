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

    public $limit  = 0;
    public $offset = 0;
    public $canPPagina = 1;

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

   public function getPaginas($url,$actual){
     $salida = [];

     $this->offset = 0;
     $this->limit  = 0;

     $resultados   = $this->getAll();
     $cantidad     = count($resultados);
     $paginas      = floor($cantidad/$this->canPPagina);

     for ($c=0;$c<$paginas;$c++){
        $n = $c+1;
        $e = ['actual' => 0, 'num' => $n, 'url' => $url.'&p='.$n];
        if ($c+1 == $actual){
          $e['actual'] = 1;
        }
        array_push($salida,$e);
     }

     return $salida;
   }

   private function getLimitOffset(){
     $t = '';

     if ($this->limit != 0){
       $t .= 'LIMIT '.$this->limit.' ';
     }

     if ($this->offset){
       $t .= 'OFFSET '.$this->offset.' ';
     }
     return $t;
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
     return $this->db->select("SELECT * FROM " . $this->table_name. ' WHERE 1 ORDER BY id DESC '.$this->getLimitOffset());
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

   public function update() {
      $sql = 'UPDATE persona_fallecida SET '
              .'Identificacion = "'.$this->Identificacion.'"
              ,Nombre = "'.$this->Nombre.'"
              ,Apellido = "'.$this->Apellido.'"
              ,Fecha_nacimiento = "'.$this->Fecha_nacimiento.'"
              ,Edad = "'.$this->Edad.'"
              ,Provincia = "'.$this->Provincia.'"
              ,Ciudad = "'.$this->Ciudad.'"
              ,Nacionalidad = "'.$this->Nacionalidad.'"
              ,EstadoCivil = "'.$this->EstadoCivil.'"
              ,Ficha_IESS = "'.$this->Ficha_IESS.'"
              ,Apoderado = "'.$this->Apoderado.'"
              ,Fecha_defuncion = "'.$this->Fecha_defuncion.'"
              ,Hora_defuncion = "'.$this->Hora_defuncion.'"
              ,Causa_defuncion = "'.$this->Causa_defuncion.'"
              ,Hospital_defuncion = "'.$this->Hospital_defuncion.'"
              ,Lugar_defuncion = "'.$this->Lugar_defuncion.'"
              ,lugar_cementerio = "'.$this->lugar_cementerio.'"
              ,tomo_cementerio = "'.$this->tomo_cementerio.'"
              ,acta_cementerio = "'.$this->acta_cementerio.'"
              ,folio_cementerio = "'.$this->folio_cementerio.'"
              ,valor_cementerio = "'.$this->valor_cementerio.'"
              ,observaciones = "'.$this->observaciones.'"
              ,servicio_religioso = "'.$this->servicio_religioso.'"
              ,hora_misa = "'.$this->hora_misa.'"
              ,lugar_velatorio = "'.$this->lugar_velatorio.'"
              ,Hora_sepelio = "'.$this->Hora_sepelio.'"'
              . ' WHERE id = "'.$this->id.'";';

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
