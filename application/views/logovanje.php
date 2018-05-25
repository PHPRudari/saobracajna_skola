<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Saobraćajno-tehnička škola Zemun - dobrodošli!</title>

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,500" rel="stylesheet">
              
        
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <?php echo link_tag('css/login_stylesheet.css'); ?>



    </head>     

    <body>

        



        <div class="top-content">
           
            <img class="login-logo"src="<?php echo base_url('slike/logo.png'); ?>" />
            <div class="inner-bg">
                <div class="container">
                    
                    <div class="row offset-md-2  naslov">
                       
                        <h2 class="naslov">Информациони систем саобраћајно-техничке школе</h2>
                        
                    </div>
                    
                    
                    <div class="row">
                        <div class="col-sm-6 offset-md-3 form-box">
                            <div class="form-top">
                                <div class="form-top-left">
                                     
                                    <h3>Добродошли!</h3>
                                    <p>Унесите Ваше корисничко име и лозинку:</p>
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-lock"></i>
                                </div>
                            </div>
                            <div class="form-bottom">
                                <form action="<?php echo site_url('login/process') ?>" method="POST" class="login-form" name='process'>
                               
                                    <div class="form-group">
                                        <label class="sr-only" for="form-username">Username</label>
                                        <?php if (!is_null($msg)) echo $msg; ?>
                                        <input type="text" name="username" id="username" placeholder="Корисничко име..." class="form-username form-control" id="form-username">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-password">Password</label>
                                        <input type="password" name="password" id="password" placeholder="Лозинка..." class="form-password form-control" id="form-password">
                                    </div>
                                    <button type="submit" class="btn">Улогуј се!</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

        </div>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
             
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>    
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js" integrity="sha384-u/bQvRA/1bobcXlcEYpsEdFVK/vJs3+T+nXLsBYJthmdBuavHvAW6UsmqO2Gd/F9" crossorigin="anonymous"></script>
        
         <script
			  src="https://code.jquery.com/jquery-3.3.1.js"
			  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
			  crossorigin="anonymous"></script>
        
    </body>

</html>

