<?php

include "Auth.php";

$id = $_GET['id'];
$usuario=$_POST['usuario'];
$nombre= $_POST['nombre'];
$edad= $_POST['edad'];
$sexo= $_POST['sexo'];
$peso= $_POST['peso'];
$altura= $_POST['altura'];
$caloriasMeta=$_POST['meta'];
$imc=($peso/($altura/10*$altura/10))*100;
$af=$_POST['af'];
$afReal=0;
$tmb=0;


if ($sexo === "H") {
  #----Para Hombre
  $tmb= 66.473 + (13.7516*$peso) + (5.0033*$altura) - (6.755*$edad);
  switch ($af) {

    case "1":
      $afReal = 1.2;
      break;

    case "2":
      $afReal = 1.55;
      break;

    case "3":
      $afReal = 1.78;
      break;

    case "4":
      $afReal = 2.10;
      break;

  }
} else {
#---Para mujer
  $tmb= 655.0955 + (9.5634*$peso) + (1.8449*$altura) - (4.6756*$edad);
  switch ($af) {

    case "1":
      $afReal = 1.2;
      break;

    case "2":
      $afReal = 1.56;
      break;

    case "3":
      $afReal = 1.64;
      break;

    case "4":
      $afReal = 1.82;
      break;

  }
}

$kcalMantenimiento=($tmb*$afReal) + (($tmb*$afReal)*.1);


 $Auth=new Auth();


 if($Auth->editarUsuario($id, $usuario,$nombre,$edad,$sexo,$peso,$altura,$caloriasMeta,$imc,$kcalMantenimiento)){
   header("location:pagina_inicio_usuario.php");
   exit;
 }
 else{
  echo "<script>alert('No se ha podido registrar. Ya existe un usuario con ese nombre de usuario, elija otro por favor.');</script>";
  echo "<script>window.location.href = 'editar_perfil.php';</script>";
 }

?>