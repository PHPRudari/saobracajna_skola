

<div class="row">



    <div class="col-md-6 ">
        <?php // echo validation_errors(); ?>
        <?php echo form_open($controller . '/unos_operatera'); ?>
       <!-- <form name="administracija" action="<?//php echo site_url($controller."/unos_operatera") ?>" method="POST">-->
        <br>
        <h3>Унос нових оператера:</h3>
        <br>
        <div class="form-group row form-inline">
            <label class="col-form-label col-sm-4" for="ime">Име:</label>
            <input type="text"  class="form-control" name="ime" placeholder="Унеси име" value="<?php echo set_value("ime"); ?>"><?php echo form_error("ime", '<span style="color:red">', '</span>'); ?><br>
        </div>

        <div class="form-group row form-inline">
            <label class="col-form-label col-sm-4" for="prezime">Презиме:</label>
            <input type="text"  class="form-control" name="prezime" placeholder="Унеси презиме" value="<?php echo set_value("prezime"); ?>"><?php echo form_error("prezime", '<span style="color:red">', '</span>'); ?><br>
        </div>

        <div class="form-group row form-inline">
            <label class="col-form-label col-sm-4" for="kor_ime">Корисничко име:</label>
            <input type="text"  class="form-control" name="kor_ime" placeholder="Унеси корисничко име" value="<?php echo set_value("kor_ime"); ?>"><?php echo form_error("kor_ime", '<span style="color:red">', '</span>'); ?><br>
        </div>

        <div class="form-group row form-inline">
            <label class="col-form-label col-sm-4" for="lozinka">Лозинка:</label>
            <input type="password"  class="form-control" name="lozinka" placeholder="Унеси лозинку" value="<?php echo set_value("lozinka"); ?>"><?php echo form_error("lozinka", '<span style="color:red">', '</span>'); ?><br>
        </div>

        <div class="form-group row form-inline">
            <label class="col-form-label col-sm-4" for="lozinka">Поновите лозинку:</label>
            <input type="password"  class="form-control" name="lozinka2" placeholder="Поновите лозинку" value="<?php echo set_value("lozinka2"); ?>"><?php echo form_error("lozinka2", '<span style="color:red">', '</span>'); ?><br>
        </div>

        <div class="form-group row form-inline">
            <label class="col-form-label col-sm-4" for="lozinka">Е-пошта:</label>
            <input type="email"  class="form-control" name="email" placeholder="Унесите е-пошту" value="<?php echo set_value("email"); ?>"><?php echo form_error("email", '<span style="color:red">', '</span>'); ?><br>
        </div>

        <div class="col-md-12">
            <input type="hidden" name="tip" value="1">
            <input type="submit" class="dugme2 btn btn-primary btn-lg btn-block" name="Sacuvaj" value="Сачувај"><br>
        </div>

        </form>
    </div>    

    <div class="col-md-6">

        <!--        <div class="something">
                    <input name="search_data" id="search_data" type="text" onkeyup="ajaxSearch();">
                    <div id="suggestions">
                        <div id="autoSuggestionsList"></div>
                    </div>
                </div>-->

        <br><h3>Списак оператера у бази:</h3><br>

        <div class="predmeti" style="overflow-y: scroll; height: 200px; width: 95%;"> 
            <?php
            //$query=$this->db->query("SELECT * FROM srednja_skola.korisnik where guid='1';");

            echo "Име Презиме E-пошта <br><br>";
            foreach ($korisnici as $row) {
                echo $row['ime'] . "&nbsp";
                echo $row['prezime'] . "&nbsp";
                echo $row ['email'] . "&nbsp";
                $ime = $row['idkorisnik'];
                ?>
                <a href="<?php echo site_url($controller . "/obrisi_operatera/" . $ime); ?>"
                   onclick="return confirm('Да ли сте сигурни да желите да обришете оператера?');">Obriši</a><br>
               <?php } ?>                

        </div>
        <br>
        <?php
        $poruka = $this->session->userdata('poruka');
        echo '<h3 style="color:red">'.$poruka.'</h3>';
        ?>

    </div>  

</div>    







<div class="row">   

    <div class="col-md-6">
        <?php echo form_open($controller . '/promena_lozinke'); ?>



        <h6><br>Промените своју лозинку за приступ:</h6>
        <br>
        <div class="form-group row form-inline">
            <label class="col-form-label col-sm-4" for="tren_lozinka">Тренутна лозинка:</label>
            <input type="password"  class="form-control" name="tren_lozinka" placeholder="Тренутна лозинка" value="<?php echo set_value("tren_lozinka"); ?>"><?php echo form_error("tren_lozinka", '<span style="color:red">', '</span>'); ?><br>
        </div>
        
       <div class="form-group row form-inline">
            <label class="col-form-label col-sm-4" for="nova_lozinka1">Нова лозинка:</label>
            <input type="password"  class="form-control" name="nova_lozinka1" placeholder="Нова лозинка" value="<?php echo set_value("nova_lozinka1"); ?>"><?php echo form_error("nova_lozinka1", '<span style="color:red">', '</span>'); ?><br>
        </div>
        
        <div class="form-group row form-inline">
            <label class="col-form-label col-sm-4" for="nova_lozinka2">Поновите лозинку:</label>
            <input type="password"  class="form-control" name="nova_lozinka2" placeholder="Поновите лозинку" value="<?php echo set_value("nova_lozinka2"); ?>"><?php echo form_error("nova_lozinka2", '<span style="color:red">', '</span>'); ?><br>
        </div>
        
        
        <div class="col-md-12">
            <input type="submit" class="dugme2 btn btn-primary btn-lg btn-block" name="Sacuvaj" value="Измени лозинку"><br>
        </div>
        
        </form>
    </div>
</div>


<script type="text/javascript">

    function ajaxSearch()
    {
        var input_data = $('#search_data').val();
        var kontroler = "<?php echo $controller ?>";
        if (input_data.length === 0)
        {
            $('#suggestions').hide();
        } else
        {
            var post_data = {
                'search_data': input_data,
                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
            };

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/<?php echo $controller ?>/autocomplete/",
                data: post_data,
                success: function (data) {
                    //return success
                    if (data.length > 0) {
                        $('#suggestions').show();
                        $('#autoSuggestionsList').addClass('auto_list');
                        $('#autoSuggestionsList').html(data);
                    }
                }
            });


        }
    }
</script>