

<div class="row">



    <div class="col-md-6 ">
        <?php // echo validation_errors(); ?>
        <?php echo form_open($controller . '/unos_operatera'); ?>
       <!-- <form name="administracija" action="<?//php echo site_url($controller."/unos_operatera") ?>" method="POST">-->

        <h3 style="color:green">Унос нових оператера:</h3>
        Име:<br>                
        <input type="text" name="ime" value="<?php echo set_value("ime") ?>" placeholder="Унесите име"><?php echo form_error('ime', '<span style="color:red">', '</span>'); ?><br>

        Презиме:<br>
        <input type="text" name="prezime" value="<?php echo set_value("prezime") ?>"placeholder="Унесите презиме"><?php echo form_error('prezime', '<span style="color:red">', '</span>'); ?><br>

        Корисничко име:<br>
        <input type="text" name="kor_ime" value="<?php echo set_value("kor_ime") ?>"placeholder="Koр. име:"><?php echo form_error('kor_ime', '<span style="color:red">', '</span>'); ?><br>

        Лозинка:<br>
        <input type="password" name="lozinka" value="<?php echo set_value("lozinka") ?>" placeholder="Лозинка:"><?php echo form_error('lozinka', '<span style="color:red">', '</span>'); ?><br>

        Поновите лозинку:<br>
        <input type="password" name="lozinka2" value="<?php echo set_value("lozinka2") ?>"placeholder="Поновите лозинку..."><?php echo form_error('lozinka2', '<span style="color:red">', '</span>'); ?><br>

        E-mail:<br>
        <input type="email" name="email" value="<?php echo set_value("email") ?>" placeholder="Email"><?php echo form_error('email', '<span style="color:red">', '</span>'); ?><br><br>
        <input type="hidden" name="tip" value="1">
        <input type="submit" value="Сачувај"> <br>

        </form>
        <?php
        $poruka = $this->session->userdata('poruka');
        echo $poruka;
        ?>

        <?php echo form_open($controller . '/promena_lozinke'); ?>
        <h6><br>Промените своју лозинку за приступ</h6>
        Тренутна лозинка:
        <input type="password" name="tren_lozinka" placeholder="Тренутна лозинка">
        Нова лозинка:
        <input type="password" name="nova_lozinka1" placeholder="Нова лозинка">
        Поновите лозинку:
        <input type="password" name="nova_lozinka2" placeholder="Поновите лозинка">
        <input value="Измени лозинку" type="submit">
        </form>
        
    </div>



    <div class="col-md-6">

<!--        <div class="something">
            <input name="search_data" id="search_data" type="text" onkeyup="ajaxSearch();">
            <div id="suggestions">
                <div id="autoSuggestionsList"></div>
            </div>
        </div>-->


        <?php
        //$query=$this->db->query("SELECT * FROM srednja_skola.korisnik where guid='1';");




        echo '<h3 style="color:green">Списак оператера у бази:</h3><br><br>';
        echo "Име Презиме E-пошта <br><br>";
        foreach ($korisnici as $row) {
            echo $row['ime'] . "&nbsp";
            echo $row['prezime'] . "&nbsp";
            echo $row ['email'] . "&nbsp";
            $ime = $row['idkorisnik'];
            ?>
            <a href="<?php echo site_url($controller . "/obrisi_predmet/" . $ime); ?>"
               onclick="return confirm('Да ли сте сигурни да желите да обришете оператера?');">Obriši</a><br>


        <?php } ?>                



    </div>


</div>


<script type="text/javascript">

    function ajaxSearch()
    {
        var input_data = $('#search_data').val();
        var kontroler ="<?php echo $controller ?>";
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