
<div class="row">
    <div class="col-md-12">

        <nav class="navbar navbar-expand-lg">
           <!-- <a class="navbar-brand" href="#">Navbar</a> -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    
                    <a class="navbar-brand" href="<?php echo site_url("admin/index/") ?>">
                       <img width="36" height="30" src="<?php echo base_url("slike/logo_mali.png"); ?>" />
                        
                    </a>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo site_url("admin/index/")?>">Home <span class="sr-only">(current)</span></a>
                    </li>

                     <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Unos podataka
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <a class="dropdown-item padajuca_lista" href="<?php echo site_url("admin/ucenik/") ?>">Učenik</a>
                            <a class="dropdown-item padajuca_lista" href="<?php echo site_url("admin/profesor/") ?>">Profesor</a>
                            <a class="dropdown-item padajuca_lista" href="<?php echo site_url("admin/predmet/") ?>">Predmet</a>
                        </div>
                    </div>
                    
                    

                    <!--<li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url("admin/ucenik/")?>">Učenik</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url("admin/profesor/")?>">Profesor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url("admin/predmet/")?>">Predmet</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url("admin/prijava_ispita/")?>">Prijava ispita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url("admin/raspored/")?>">Raspored</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url("admin/statistika/")?>">Statistika</a>
                    </li>
                   
                </ul>
                <ul  class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link mr-sm-2"  href="<?php echo site_url("admin/do_logout/")?>">Izloguj se</a>
                </li>
                </ul>


            </div>
        </nav>
    </div>
</div>

<div class="container">