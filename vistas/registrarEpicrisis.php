<?php
  include_once('controlador/ControladorEpicrisis.php');

  //Instancia el Controlador de Epicrisis
  $controlador = new ControladorEpicrisis();

  //Indices de checkbox del HTML
  /*$enfermedades[0];//Hipertension
  $enfermedades[1];//Epilepsia
  $enfermedades[2];//Enfermedad Cardiaca
  $enfermedades[3];//Cancer
  $enfermedades[4];//diabetes
  $enfermedades[5];//Asma
  $enfermedades[6];//sida
  $enfermedades[7];//hepatitis
  $enfermedades[8];//Convulsiones
  $enfermedades[9];//hipoglicemia
  $enfermedades[10];//Anticuagulantes
  $enfermedades[11];//Alergias
  $enfermedades[12];//Embarazo
  $enfermedades[13];//Otro
  $enfermedades[14];//Usuarios*/

  if(!empty($_POST)){

    $enfermedades = array();
    //Validacion de Checkbox UNCHECKED o CHECKED
    for ($i=0; $i <=12 ; $i++) {
      if(!isset($_POST['enfermedades{'.$i.'}'])){
        $enfermedades[$i] = 0;
      }else {
        $enfermedades[$i] = 1;
      }
    }

      //Validacion de textArea de Otras enfermedades
      if($_POST['enfermedades{13}']=="")
        $enfermedades[13] = "Ninguna";
      else
        $enfermedades[13] = $_POST['enfermedades{13}'];

    //Llamada al controlador de Epicrisis
    $controlador-> crearEpicrisis($enfermedades[0],
                                  $enfermedades[2],
                                  $enfermedades[3],
                                  $enfermedades[6],
                                  $enfermedades[7],
                                  $enfermedades[1],
                                  $enfermedades[11],
                                  $enfermedades[5],
                                  $enfermedades[8],
                                  $enfermedades[10],
                                  $enfermedades[9],
                                  $enfermedades[12],
                                  $enfermedades[4],
                                  $enfermedades[13],
                                  $_POST['enfermedades{14}']);
    //Redireccionar a la pagina de Inicio
    echo "<script type='text/javascript'>document.location.href='?vista=inicio-usuario';</script>";
  }
?>
<h3>
   Formulario de Epicrisis
</h3>
 <form id="form-wizard-validate" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" class="wizard-content-lg">
   <!-- Paso 1 Enfermedades -->
    <h1>Tipo I</h1>
    <fieldset class="step-content">
       <h4 class="page-header">Indique si padece una enfermedad: </h4>
       <div class="row">

         <!-- Hipertension -->
         <div class="col-xs-4">
           <div class="form-group">
             <label class="col-sm-4 control-label" style="font-weight: normal;">Hipertensión</label>
             <div class="col-sm-10">
               <label class="switch">
                <input type="checkbox" name="enfermedades{0}" value="1">
                <span></span>
               </label>
              </div>
           </div>
         </div>

         <!-- Epilepsia -->
         <div class="col-xs-4">
           <div class="form-group">
             <label class="col-sm-4 control-label" style="font-weight: normal;">Epilepsia</label>
             <div class="col-sm-10">
               <label class="switch">
                <input type="checkbox" name="enfermedades{1}" value="1">
                <span></span>
               </label>
              </div>
           </div>
         </div>

         <!-- Enfermedad Cardiaca -->
         <div class="col-xs-4">
           <div class="form-group">
             <label class="col-sm-4 control-label" style="font-weight: normal;">Cardiaca</label>
             <div class="col-sm-10">
               <label class="switch">
                <input type="checkbox" name="enfermedades{2}" value="1" >
                <span></span>
               </label>
              </div>
           </div>
         </div>

         <!-- Cancer -->
         <div class="col-xs-4">
           <div class="form-group">
             <label class="col-sm-4 control-label" style="font-weight: normal;">Cáncer</label>
             <div class="col-sm-10">
               <label class="switch">
                <input type="checkbox" name="enfermedades{3}" value="1">
                <span></span>
               </label>
              </div>
           </div>
         </div>

         <!-- Diabetes -->
         <div class="col-xs-4">
           <div class="form-group">
             <label class="col-sm-4 control-label" style="font-weight: normal;">Diabetes</label>
             <div class="col-sm-10">
               <label class="switch">
                <input type="checkbox" name="enfermedades{4}" value="1">
                <span></span>
               </label>
              </div>
           </div>
         </div>

         <!-- Asma -->
         <div class="col-xs-4">
           <div class="form-group">
             <label class="col-sm-4 control-label" style="font-weight: normal;">Asma</label>
             <div class="col-sm-10">
               <label class="switch">
                <input type="checkbox" name="enfermedades{5}" value="1">
                <span></span>
               </label>
              </div>
           </div>
         </div>

         <!-- Sida -->
         <div class="col-xs-4">
           <div class="form-group">
             <label class="col-sm-4 control-label" style="font-weight: normal;">Sida</label>
             <div class="col-sm-10">
               <label class="switch">
                <input type="checkbox" name="enfermedades{6}" value="1">
                <span></span>
               </label>
              </div>
           </div>
         </div>

       </div>
    </fieldset>
    <!-- Fin Paso 1 Enfermedades -->
    <!-- Inicio Paso 2 Enfermedades -->
    <h1>Tipo II</h1>
    <fieldset class="step-content">
       <h4 class="page-header">Indique si sufre una Patología</h4>
       <div class="row">

       <!-- Hepatitis -->
       <div class="col-xs-4">
           <div class="form-group">
             <label class="col-sm-4 control-label" style="font-weight: normal;">Hepatitis</label>
             <div class="col-sm-10">
               <label class="switch">
                <input type="checkbox" name="enfermedades{7}" value="1">
                <span></span>
               </label>
              </div>
           </div>
         </div>

         <!-- Convulsiones -->
         <div class="col-xs-4">
           <div class="form-group">
             <label class="col-sm-4 control-label" style="font-weight: normal;">Convulsiones</label>
             <div class="col-sm-10">
               <label class="switch">
                <input type="checkbox" name="enfermedades{8}" value="1">
                <span></span>
               </label>
              </div>
           </div>
         </div>

         <!-- Hipoglicemia -->
         <div class="col-xs-4">
           <div class="form-group">
             <label class="col-sm-4 control-label" style="font-weight: normal;">Hipoglicemia</label>
             <div class="col-sm-10">
               <label class="switch">
                <input type="checkbox" name="enfermedades{9}" value="1">
                <span></span>
               </label>
              </div>
           </div>
         </div>

         <!-- Anticuagulante -->
         <div class="col-xs-4">
           <div class="form-group">
             <label class="col-sm-4 control-label" style="font-weight: normal;">Coagulante</label>
             <div class="col-sm-10">
               <label class="switch">
                <input type="checkbox" name="enfermedades{10}" value="1">
                <span></span>
               </label>
              </div>
           </div>
         </div>
       </div>
    </fieldset>
    <!-- Fin Paso 2 Enfermedades -->
    <!-- Inicio Paso 3 Enfermedades -->
    <h1>Leves</h1>
    <fieldset class="step-content">
     <h4 class="page-header">Indique si sufre una Enfermedad Leve o Embarazo</h4>
     <div class="row">

       <!-- Alergias -->
       <div class="col-xs-4">
         <div class="form-group">
           <label class="col-sm-4 control-label" style="font-weight: normal;">Alergias</label>
           <div class="col-sm-10">
             <label class="switch">
              <input type="checkbox" name="enfermedades{11}" value="1">
              <span></span>
             </label>
            </div>
         </div>
       </div>

       <!-- Embarazo -->
       <div class="col-xs-4">
         <div class="form-group">
           <label class="col-sm-4 control-label" style="font-weight: normal;">Embarazo</label>
           <div class="col-sm-10">
             <label class="switch">
              <input type="checkbox" name="enfermedades{12}" value="1">
              <span></span>
             </label>
            </div>
         </div>
       </div>

     </div>
    </fieldset>
    <!-- Fin Paso 3 Enfermendades -->
    <!-- Inicio Paso 4 Enfermedades -->
    <h1>Otro</h1>
    <fieldset class="step-content">
       <h4 class="page-header">Indique si padece otra enfermedad</h4>
         <!-- Otras Enfermedades -->
           <div class="form-group">
             <div class="col-sm-10">
                 <input  type="text" placeholder="Escriba su enfermedad" class="form-control" name="enfermedades{13}">
             </div>
           </div>
           <div class="form-group">
             <div class="col-lg-10">
               <div class="checkbox c-checkbox">
                 <label><input type="checkbox"><span class="fa fa-check"></span>No padezco ninguna enfermedad</label>
               </div>
             </div>
           </div>

         <!-- Cedula (Prueba) -->
         <div class="form-group">
           <div class="col-sm-10">
               <input  type="hidden"  name="enfermedades{14}" value="<?php echo $_SESSION['id_Usuario']; ?>">
           </div>
         </div>
    </fieldset>
    <!-- Fin paso 4 Enfermedades -->
 </form>
