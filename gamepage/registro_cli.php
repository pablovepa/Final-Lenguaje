<?php
session_start();
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Vinoteca G1</title>
	<meta charset="UTF-8">
	<meta name="description" content="Game Warrior Template">
	<meta name="keywords" content="warrior, game, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
</head>
    <section class="page-section spad contact-page">
	<div class="container">
    <div class="col-lg-8">
	<div class="contact-form-warp">
	<h4 class="comment-title">Registrate</h4>

    <form class="comment-form" action="/Final-Lenguaje/Final-Lenguaje/crud_tipo/Usuarios/savecli.php" method="POST">
		<div class="row">
		<div class="col-md-6">
			<input type="text" name="usuario" clas="form-control" placeholder="Nombre de usuario" autofocus>
				</div>
        <div class="col-md-6">
			<input type="text" name="password" clas="form-control" placeholder="Contraseña" autofocus>
				</div>
        <div class="col-md-12">
			<input type="text" name="nombre_usuario" clas="form-control" placeholder="Ingrese su nombre" autofocus>
				</div>
        <div class="col-md-12">
			<input type="text" name="email" clas="form-control" placeholder="Ingrese su Email" autofocus>
				</div>
        <div class="col-md-12">
			<input type="text" name="telefono" clas="form-control" placeholder="Ingrese su Telefono" autofocus>
				</div>
                <hr>
		<div class="col-lg-6">				
			<button class="site-btn btn-sm" type="submit" name="guardar_registro">Registrarse</button>
				</div>
		<div class="col-lg-6">
        <a href="index_vis.php" class="site-btn btn-sm">Volver</a>
                </div>
        </form>