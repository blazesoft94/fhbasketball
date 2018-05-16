<?php ob_start(); ?>
<?php include_once('classes/translate.class.php'); ?>
<?php if (!isset($_SESSION)) session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Fhbasketball Login</title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Fhbasketball Login">
		<meta name="author" content="Fhbasketball | BlazeWeb">

		<!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- Le styles -->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="assets/css/jigowatt.css" rel="stylesheet">

		<link rel="shortcut icon" href="">
	</head>

	<body>

<!-- Navigation
================================================== -->
<?php 
	include "nav.php";
?>

<!-- Main content
================================================== -->
		<div class="container" >
			<div class="row">

				<div class="col-md-12">
