
<div class="row">
    <div class="col-md-12">

        <nav class="navbar navbar-expand-lg navbar-dark header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

                    <a class="navbar-brand" href="<?php echo site_url("admin/index/") ?>">
                        <img width="36" height="30" src="<?php echo base_url("slike/logo_mali.png"); ?>" />

                    </a>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo site_url("admin/index/") ?>">Почетна <span class="sr-only">(current)</span></a>
                    </li>

                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Унос података
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <a class="dropdown-item" href="<?php echo site_url("admin/ucenik/") ?>">Ученик</a>
                            <a class="dropdown-item" href="<?php echo site_url("admin/profesor/") ?>">Професор</a>
                            <a class="dropdown-item" href="<?php echo site_url("admin/predmet/") ?>">Предмет</a>
                        </div>
                    </div>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url("admin/prijava_ispita/") ?>">Пријава испита</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url("admin/raspored/") ?>">Распоред</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url("admin/statistika/") ?>">Статистика</a>
                    </li>

                </ul>
                <ul  class="navbar-nav ">
                    <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url("admin/index/") ?>">        
                        <?php
                        $name = $this->session->userdata('ime');
                        $tip = $this->session->userdata('tip');
                        echo "Улогован је " . $name;
                        ?></a>
                    </li>   
                    <li class="nav-item">
                        <a class="nav-link mr-sm-2"  href="<?php echo site_url("admin/do_logout/") ?>">Одјави се</a>
                    </li>
                </ul>


            </div>
        </nav>
    </div>
</div>

<div class="container">