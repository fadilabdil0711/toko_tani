﻿<?php 
session_start();
//skrip konkesi
include 'koneksi.php';

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ForTani</title>
  <!-- BOOTSTRAP STYLES-->
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <!-- CUSTOM STYLES-->
  <link href="assets/css/custom.css" rel="stylesheet" />
  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
  <style>
			body {
				background: url('assets/img/Frame 2.png') no-repeat center center fixed; 
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
				overflow-x: hidden;
				font-family: 'Roboto', sans-serif;
				font-size: 16px;
        }
		</style>
</head>
<body>
  <div class="container">
    <div class="row text-center ">
      <div class="col-md-12">
        <br /><br />
        <h2> ForTani : Login Admin</h2>

        <h5>( Login terlebih dahulu untuk mendapatkan akses )</h5>
        <br />
      </div>
    </div>
    <div class="row ">

      <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">
            <strong>   Enter Details To Login </strong>  
          </div>
          <div class="panel-body">
            <form role="form" method="POST">
             <br />
             <div class="form-group input-group">
              <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
              <input type="text" class="form-control" name= "user" />
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
              <input type="password" class="form-control"  name= "pass" />
            </div>

           <button class="btn btn-primary" name="login">Login</button>
           <hr />
         </form>
         <?php
         if (isset($_POST['login']))
         {
           $ambil= $koneksi->query("SELECT * FROM admin WHERE user='$_POST[user]' AND pass='$_POST[pass]'");
           $cocok = $ambil->num_rows;
           if ($cocok==1)
           {
           $_SESSION['admin']=$ambil->fetch_assoc();
           echo "<div class='alert alert-info'>Login sukses</div>";
           echo "<meta http-equiv='refresh' content='1;url=index.php'>";
         }
         else
         {
          echo "<div class='alert alert-danger'>Login gagal</div>";
         }

         }
         ?>
       </div>

     </div>
   </div>


 </div>
</div>


<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="assets/js/jquery.metisMenu.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="assets/js/custom.js"></script>

</body>
</html>
