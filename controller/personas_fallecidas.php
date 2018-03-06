<?php
require_model('persona_fallecida.php');

class personas_fallecidas extends fs_controller {

   public function __construct() {
      $this->icon = "fa-address-card";               // PUT HERE YOUR CUSTOM ICON
      $this->title = "persona_fallecida";             // PUT HERE YOUR CUSTOM TITLE

      /* define fields list:
       * Array of Array(label, field name, display [none, left, center, right]
       */
      $this->fields = [
         ['label' => 'Id', 'field' => 'id', 'display' => 'left'],
         ['label' => 'Nombre', 'field' => 'nombre', 'display' => 'left'],
         ['label' => 'Razonsocial', 'field' => 'razonsocial', 'display' => 'left'],
         ['label' => 'Observaciones', 'field' => 'observaciones', 'display' => 'left'],
         ['label' => 'Provincia', 'field' => 'provincia', 'display' => 'left'],
         ['label' => 'Ciudad', 'field' => 'ciudad', 'display' => 'left'],
         ['label' => 'Codpostal', 'field' => 'codpostal', 'display' => 'none'],
         ['label' => 'Direccion', 'field' => 'direccion', 'display' => 'none'],
         ['label' => 'Tipodocumento', 'field' => 'tipodocumento', 'display' => 'none'],
         ['label' => 'Numdocumento', 'field' => 'numdocumento', 'display' => 'none'],
 //          ['label' => 'Titulo', 'field' => 'campo', 'display' => '[none/left/center/right]'],
      ];

      /* define orders fields:
       * Array(title => field)
       */
      $this->orderby = [
         'Id' => 'id ASC',
         'Id Desc' => 'id DESC',
         'Nombre' => 'nombre ASC',
         'Nombre Desc' => 'nombre DESC',
         'Razonsocial' => 'razonsocial ASC',
         'Razonsocial Desc' => 'razonsocial DESC',
 //          'Texto' => 'campo ASC',
      ];

      // define tables condition from extract data
      $this->from = "persona_fallecida";                // PUT HERE YOUR CUSTOM FROM CLAUSULE

      // run standard entry point
      parent::__construct(__CLASS__, 'Personas fallecidas', 'informes');   // PUT HERE MENU OPTION WHERE INSTALL CONTROLLER
   }

   protected function get_where() {
      $result = parent::get_where();

      /* Mount clause where based on the list of fields where you want to search */
      if ($this->get_value("query")) {
         $query = "LOWER('%" . $_REQUEST["query"] . "%')";

         // PUT HERE YOUR FIELDS WHERE APPLY FILTER

         /* EXAMPLE:
         $result .= " AND (t1.codcliente LIKE " . $query
             . " OR LOWER(t2.nombre) LIKE " . $query
             . " OR LOWER(t1.provincia) LIKE " . $query
             . " OR LOWER(t1.ciudad) LIKE " . $query
             . ")";
          */
      }

      return $result;
   }

   /* Custom fields list. Override parent get_fields()
    * Example:
   protected function get_fields() {
      $result = "";

      foreach ($this->fields as $item) {
         if ($result != "")
            $result .= ",";

         switch ($item['field']) {
            case "nombre":
            case "razonsocial":
               $result .= "t2." . $item['field'];
               break;

            default:
               $result .= "t1." . $item['field'];
               break;
         }
      }
      return $result;
   }
   */

   protected function private_core() {
      // configure delete action
      $pf = new persona_fallecida;
      $this->allow_delete = $this->user->allow_delete_on(__CLASS__);

      parent::private_core();                // Load data with estructure data
   }

}
