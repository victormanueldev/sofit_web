<?php
 include_once('Conexion.php');

 /**
  * @author Dayana Murillo
  */
 class Regional
 {
   private $id_Regional;
   private $nombre_Regional;
   private $conex;


   function __construct()
   {
     $this-> conex = new Conexion();
   }


   /**
   * Devuelve cualquier Atributo de la Clase Regional
   * @param $atributo (Nombre del Atributo)
   */
   public function getRegional($atributo){
     return $this-> $atributo;
   }


   /**
   * Lista todos los registros de la tabla Regional
   * @return $resultado (Resultado de la Consulta SQL)
   */
   public function listarRegional()
   {
     $sql = "SELECT * FROM regional";
     $resultado = $this-> conex-> consultaRetorno($sql);
     return $resultado;
   }

   public function obtenerNombreRegional($numeroId_Usuario)
   {
     $sql = "SELECT r.nombre_Regional FROM Usuario u
             JOIN Regional r ON u.id_Regional = r.id_Regional
             WHERE u.numeroId_Usuario = $numeroId_Usuario";
     $resultado = $this-> conex-> consultaRetorno($sql);
     return $resultado;
   }


 }


?>
