<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Saobracajno-tehnička škola Zemun</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <script
			  src="https://code.jquery.com/jquery-3.3.1.js"
			  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
			  crossorigin="anonymous"></script>
                          
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">   
        
        <?php echo link_tag('css/stylesheet.css'); ?>
  <!--   <script src="<?php echo base_url('javascript/funkcije.js'); ?>"></script>-->

    </head>
    <body>

        <div class="container">
            <div class="row" id="header">
		<div class="col-md-6">
                    <img class="login_logo img-fluid " src="<?php echo base_url('slike/logo.png'); ?>" />
		</div>
		<div class="col-md-6" id="right">
                     <?php
                  //  $name = $this->session->userdata('ime');
                  //  echo "Ulogovan je korisnik: $name";
                    ?>
		</div>
	</div>
            
            
            
            