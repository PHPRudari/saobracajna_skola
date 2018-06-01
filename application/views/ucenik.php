

<?php
//echo validation_errors();
//var_dump($_SESSION['ucenik']['iducenik']);
//var_dump($_SESSION['ucenik']);
//var_dump($godina_obrazovanja);
?>


<div class="form-group row pretraga">

        <!--<form name="registracija" method="POST" action="<?php echo site_url($controller . "/unesi_ucenika") ?>">-->

    <div class="row col-md-12">

        <label for="search_data" class="col-2 col-form-label"> <br>Претрага: </label>
        <div class="col-10">  <br>
            <input class="form-control col-10" name="search_data" id="search_data" type="text" onkeyup="ajaxSearchUcenik();">
            <div id="suggestions">
                <div id="autoSuggestionsList"></div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6 ">

        <a class="dugme1 btn btn-primary btn-lg btn-block " href="<?php echo site_url($controller . "/dokumentacija") ?>">Документација</a><br>
    </div>
    <div class="col-md-6 ">
      
            <a class="dugme1 btn btn-primary btn-lg btn-block col-sm-6" href="<?php echo site_url($controller . "/priznati_ispiti") ?>">Признати испити</a>
       
       
 <a class="dugme1 btn btn-primary btn-lg btn-block col-sm-6" href="<?php echo site_url($controller . "/prijava_ispita") ?>">Пријави испите</a><br>

        
    </div>

    <div class="row">
        <div class="col-md-6">
            <?php echo form_open($controller . '/unesi_ucenika'); ?>




            <div class="form-group row form-inline">
                <label class="col-form-label col-sm-4" for="jedinstveni_broj">Јединствени број:</label>
                <input type="text"  class="form-control" name="jedinstveni_broj" placeholder="Унеси јединствени број" value="<?php echo set_value("jedinstveni_broj_ucenik"); ?>"><?php echo form_error("jedinstveni_broj", '<span style="color:red">', '</span>'); ?><br>
            </div>

<!--Јединствени број: <input type="text" name="jedinstveni_broj" value="</?php echo set_value("jedinstveni_broj_ucenik") ?>" placeholder="Јединствени број"><br>-->


            <div class="form-group row form-inline">
                <label class="col-form-label col-sm-4 " for="delovodni">Деловодни број:</label>
                <input type="text" class="form-control " name="delovodni" placeholder="Унеси деловодни број" value="<?php echo set_value("delovodni_broj"); ?>"><?php echo form_error("delovodni", '<span style="color:red">', '</span>'); ?><br>
            </div>

<!--Деловодни број: <input type="text" name="delovodni" value="</?php echo set_value("delovodni_broj") ?>" placeholder="Деловодни број"><br>-->



            <div class="form-group row form-inline">
                <label class="col-form-label col-sm-4" for="ugovor">Број уговора:</label>
                <input type="text" class="form-control " name="ugovor" placeholder="Унеси број уговора" value="<?php echo set_value("broj_ugovor"); ?>"><?php echo form_error("ugovor", '<span style="color:red">', '</span>'); ?><br>
            </div>

<!--Број уговора: <input type="text" name="ugovor" value="</?php echo set_value("broj_ugovor") ?>" placeholder="Број уговора"><br>-->


            <div class="form-group row form-inline">
                <label class="col-form-label col-sm-4 " for="registar_broj">Регистарски број:</label>
                <input type="text" class="form-control " name="registar_broj" placeholder="Унеси број из регистра" value="<?php echo set_value("registar_broj"); ?>"><?php echo form_error("registar_broj", '<span style="color:red">', '</span>'); ?><br>
            </div>

<!--Регистарски број: <input type="text" name="registar_broj" value="</?php echo set_value("registar_broj") ?>" placeholder="Унеси број из регистра"><br><br>-->



            <div class="form-group row form-inline">
                <label class="col-form-label col-sm-4 " for="ime">Име:</label>
                <input type="text" class="form-control " name="ime" placeholder="Унеси име" value="<?php echo set_value("ime"); ?>"><?php echo form_error("ime", '<span style="color:red">', '</span>'); ?><br>
            </div>

<!--Име: <input  type="text" name="ime" value="</?php echo set_value("ime") ?>" placeholder="Унеси име"><br>-->



            <div class="form-group row form-inline">
                <label class="col-form-label col-sm-4 " for="prezime">Презиме:</label>
                <input type="text" class="form-control " name="prezime" placeholder="Унеси презиме" value="<?php echo set_value("prezime"); ?>"><?php echo form_error("prezime", '<span style="color:red">', '</span>'); ?><br>
            </div>

<!--Презиме: <input  type="text" name="prezime" value="</?php echo set_value("prezime") ?>" placeholder="Унеси презиме"><br>-->



            <div class="form-group row form-inline">
                <label class="col-form-label col-sm-4 " for="jmbg">ЈМБГ:</label>
                <input type="text" class="form-control " name="jmbg" placeholder="Унеси ЈМБГ" value="<?php echo set_value("jmbg"); ?>"><?php echo form_error("jmbg", '<span style="color:red">', '</span>'); ?><br>
            </div>

<!--ЈМБГ: <input  type="text" name="jmbg" value="</?php echo set_value("jmbg") ?>" placeholder="Унеси ЈМБГ"><br>-->


            <div class="form-group row form-inline">
                <label class="col-form-label col-sm-4 " for="ime_oca">Име оца:</label>
                <input type="text" class="form-control " name="ime_oca" placeholder="Унеси име оца" value="<?php echo set_value("ime_otac"); ?>"><?php echo form_error("ime_oca", '<span style="color:red">', '</span>'); ?><br>
            </div>

<!--Име оца: <input  type="text" name="ime_oca" value="</?php echo set_value("ime_otac") ?>" placeholder="Унеси име оца"><br>-->


            <div class="form-group row form-inline">
                <label class="col-form-label col-sm-4 " for="ime_majke">Име мајке:</label>
                <input type="text" class="form-control " name="ime_majke" placeholder="Унеси име мајке" value="<?php echo set_value("ime_majka"); ?>"><?php echo form_error("ime_majke", '<span style="color:red">', '</span>'); ?><br>
            </div>

<!--Име мајке: <input  type="text" name="ime_majke" value="</?php echo set_value("ime_majka") ?>" placeholder="Унеси име мајке"><br>-->


            <div class="form-group row form-inline">
                <label class="col-form-label col-sm-4 " for="prezime_majke">Презиме мајке:</label>
                <input type="text" class="form-control " name="prezime_majke" placeholder="Унеси презиме мајке" value="<?php echo set_value("prezime_majka"); ?>"><?php echo form_error("prezime_majke", '<span style="color:red">', '</span>'); ?><br>
            </div>

<!--Девојачко презиме мајке: <input  type="text" name="prezime_majke" value="</?php echo set_value("prezime_majka") ?>" placeholder="Девојачко презиме мајке"><br>-->


            <div class="form-group row form-inline">
                <label class="col-form-label col-sm-4 " for="datum">Датум рођења:</label>
                <input type="date" class="form-control " name="datum"  value="<?php echo set_value("datum_rodjenje"); ?>"><?php echo form_error("datum", '<span style="color:red">', '</span>'); ?><br>
            </div>

<!--Датум рођења: <input  type="date" value="</?php echo set_value("datum_rodjenje") ?>" name="datum" placeholder=""><br>-->


            <div class="form-group row form-inline">
                <label class="col-form-label col-sm-4 " for="mesto_rodj">Место рођења:</label>
                <input type="text" class="form-control " name="mesto_rodj" placeholder="Унеси место рођења" value="<?php echo set_value("mesto_rodjenje"); ?>"><?php echo form_error("mesto_rodj", '<span style="color:red">', '</span>'); ?><br>
            </div>

<!--Место рођења: <input type="text" name="mesto_rodj" value="</?php echo set_value("mesto_rodjenje") ?>" placeholder="Унеси место рођења"><br>-->


            <div class="form-group row form-inline">
                <label class="col-form-label col-sm-4 " for="drzava_rodj">Држава рођења:</label>
                <input type="text" class="form-control " name="drzava_rodj" placeholder="Унеси државу рођења" value="<?php echo set_value("drzava_rodjenje"); ?>"><?php echo form_error("drzava_rodj", '<span style="color:red">', '</span>'); ?><br>
            </div>

<!--Држава рођења: <input type="text" name="drzava_rodj" value="</?php echo set_value("drzava_rodjenje") ?>" placeholder="Унеси државу"><br>-->

<!--Општина рођења: <input type="text" name="opstina_rodj" value="</?php echo set_value("opstina_rodj") ?>" placeholder="Унеси општину рођења"><br>-->






        </div>


        <div class="col-md-6">

            <!--</?php echo form_open($controller . '/unesi_ucenika'); ?>-->


            <div class="form-group row form-inline">
                <label class="col-form-label col-sm-4 " for="adresa_stan">Адреса становања:</label>
                <input type="text" class="form-control " name="adresa_stan" placeholder="Унеси место рођења" value="<?php echo set_value("adresa_stanovanje"); ?>"><?php echo form_error("adresa_stan", '<span style="color:red">', '</span>'); ?><br>
            </div>

<!--Адреса становања: <input  type="text" name="adresa_stan" value="</?php echo set_value("adresa_stanovanje") ?>" placeholder="Унеси адресу"><br>-->


            <div class="form-group row form-inline">
                <label class="col-form-label col-sm-4 " for="mesto_stan">Место становања:</label>
                <input type="text" class="form-control " name="mesto_stan" placeholder="Унеси место становања" value="<?php echo set_value("mesto_stanovanje"); ?>"><?php echo form_error("mesto_stan", '<span style="color:red">', '</span>'); ?><br>
            </div>

<!--Место становања: <input type="text" name="mesto_stan" value="</?php echo set_value("mesto_stanovanje") ?>" placeholder="Унеси место становања"><br>-->

            <div class="form-group row form-inline">
                <label class="col-form-label col-sm-4 " for="broj_tel">Број телефона:</label>
                <input type="tel" class="form-control " name="broj_tel" placeholder="Унеси број телефона" value="<?php echo set_value("broj_telefon"); ?>"><?php echo form_error("broj_tel", '<span style="color:red">', '</span>'); ?><br>
            </div>

<!--Број телефона: <input  type="tel" name="broj_tel" value="</?php echo set_value("broj_telefon") ?>" placeholder="Унеси телефон"><br>-->


            <div class="form-group row form-inline">
                <label class="col-form-label col-sm-4 " for="mobilni">Број моб. телефона:</label>
                <input type="tel" class="form-control " name="mobilni" placeholder="Унеси број мобилног телефона" value="<?php echo set_value("telefon_mobilni"); ?>"><?php echo form_error("mobilni", '<span style="color:red">', '</span>'); ?><br>
            </div>

<!--Број мобилног телефона: <input  type="tel" name="mobilni" value="</?php echo set_value("telefon_mobilni") ?>" placeholder="Унеси мобилни телефон"><br>-->


            <div class="form-group row form-inline">
                <label class="col-form-label col-sm-4 " for="email">Адреса е-поште:</label>
                <input type="email" class="form-control " name="email" placeholder="Унеси e-mail" value="<?php echo set_value("e-mail"); ?>"><?php echo form_error("email", '<span style="color:red">', '</span>'); ?><br>
            </div>

<!--Адреса е-поште: <input  type="email" name="email" value="</?php echo set_value("e-mail") ?>" placeholder="Унеси e-mail"><br>-->

            <div class="form-group row form-inline">
                <label class="col-form-label col-sm-4 " for="datum_upis">Датум уписа:</label>
                <input type="date" class="form-control " name="datum_upis"  value="<?php echo set_value("datum_upis"); ?>"><?php echo form_error("datum_upis", '<span style="color:red">', '</span>'); ?><br>
            </div>
            <!--Датум уписа: <input type="date" name="datum_upis" value="</?php echo set_value("datum_upis") ?>" placeholder="Датум уписа"><br>-->

<!--        <select name="godina_upisa">
    <option selected hidden>Година уписа</option>
    
            <?php
            for ($i = 2000; $i <= date("Y"); $i++) {
                echo "<option value='$i'>";
                echo $i;
                echo "</option>";
            }
            ?>
    </select> <br>-->

        <!--<input type="checkbox" name="oslobodjen"> Oслобођен плаћања<br>-->
            <br>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="oslobodjen" id="oslobodjen">
                <label class="form-check-label" for="oslobodjen">Oслобођен плаћања</label>

            </div>
            <br>

            <div class="form-group row form-inline">

                <label class="col-sm-4 col-form-label" for="godina_obrazovanja">Година образовања:</label>
                <select name="godina_obrazovanja" class="form-control ">
                    <option selected hidden ><?php
                        if (!isset($_SESSION['ucenik']['iducenik'])) {
                            echo 'Година образовања';
                        } else {
                            foreach ($godina_obrazovanja as $go) {
                                if ($go['idgodina_obrazovanja'] == $_SESSION['ucenik']['godina_obrazovanja_idgodina_obrazovanja'])
                                    echo ($go['naziv']);
                            }
                        }
                        ?>
                    </option>
                    <?php
                    foreach ($godina_obrazovanja as $row) {
                        echo '<option value="' . $row['idgodina_obrazovanja'] . '">';
                        echo $row['naziv'];
                        echo '</option>';
                    }
                    ?> 
                </select><br>
            </div>

<!--<select name="datum_upis">
    <option selected hidden>Година уписа</option>
    <option value="</?php ?>">Година уписа</option>      
</select><br>-->



            <div class="form-group row form-inline">

                <label class="col-sm-4 col-form-label" for="podrucje_rada">Подручје рада:</label>
                <select id="podrucje" name="podrucje_rada" class="form-control ">

                    <option selected hidden ><?php
                        if (!isset($_POST['podrucje_rada'])) {
                            echo 'Подручје рада';
                        } else
                            echo set_value("podrucje_rada");
                        ?></option>
                    <?php
                    foreach ($podrucje as $row) {
                        echo '<option value="' . $row['idpodrucje_rada'] . '">';
                        echo $row['naziv'];
                        echo '</option>';
                    }
                    ?>

                </select><br>
            </div>

            <div class="form-group row form-inline">
                <label class="col-sm-4 col-form-label" for="profil">Образовни профил:</label>
                <select name="profil" id="profil" class="form-control ">
                    <option selected hidden>Прво изаберите подручје рада</option>
                </select>
            </div>



 <!--<select name="obrazovni_profil">
    <option selected hidden>Образовни профил</option>
    
    <?/*php 
    
    foreach ($profil as $row)
        
    {
    echo '<option value="'.$row['idobrazovni_profil'].'">';
    echo $row['naziv'];
    echo '</option>';
    }
    */?>
    
</select><br>-->


            <br>

            <div class="form-group row form-inline">

                <label class="col-sm-4 col-form-label" for="tip_ucenik">Тип ученика:</label>
                <select id="tip" name="tip_ucenik" class="form-control ">

                    <option selected hidden ><?php
                        if (!isset($_SESSION['ucenik']['iducenik'])) {
                            echo 'Тип ученика';
                        } else {
                            foreach ($tip_ucenik as $tip) {

                                if ($tip['idtip_ucenik'] == $_SESSION['ucenik']['tip_ucenik_idtip_ucenik'])
                                    echo ($tip['naziv_tip_ucenik']);
                            }
                        }
                        ?>


                    </option>
                    <?php
                    foreach ($tip_ucenik as $row) {
                        echo '<option value="' . $row['idtip_ucenik'] . '">';
                        echo $row['naziv_tip_ucenik'];
                        echo '</option>';
                    }
                    ?>

                </select><br>
            </div>


    <!--<input type="radio" name="tip_ucenika" value="p"> Преквалификација<br>
    <input type="radio" name="tip_ucenika" value="d"> Доквалификација<br>
    <input type="radio" name="tip_ucenika" value="up"> Упис у први разред школе<br>
    <input type="radio" name="tip_ucenika" value="un"> Упис у неки разред школе<br>
    <input type="radio" name="tip_ucenika" value="s"> Специјализација<br><br><br>-->



        </div>


        <div class="col-md-6">
            <a class="dugme3 btn btn-primary btn-lg btn-block" href="<?php echo site_url($controller . "/ubij_sesiju_ucenik/"); ?>">Освежи страну</a><br>

        </div>
        <div class="col-md-6">
            <input type="submit" class="dugme2 btn btn-primary btn-lg btn-block" name="Sacuvaj" value="Сачувај"><br>
        </div>




        </form>
    </div>



    <script type="text/javascript">
        $(document).ready(function () {
            $('#podrucje').on('change', function () {
                var idpodrucje = $(this).val();

                if (idpodrucje) {
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo base_url(); ?>index.php/admin/select_box/",
                        data: 'idpodrucje_rada=' + idpodrucje,
                        success: function (html) {
                            $('#profil').html(html);
                        }
                    });
                }
            });
        });

        function ajaxSearchUcenik()
        {
            var input_data = $('#search_data').val();

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
                    url: "<?php echo base_url(); ?>index.php/<?php echo $controller; ?>/trazi_ucenika/",
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