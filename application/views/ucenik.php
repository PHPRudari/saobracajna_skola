

<?php 
echo validation_errors(); ?>
<?php echo form_open($controller . '/unesi_ucenika'); ?>

        <!--<form name="registracija" method="POST" action="<?php echo site_url($controller . "/unesi_ucenika") ?>">-->
<div class="form-group row pretraga">

    <label for="search_data" class="col-2 col-form-label"> Pretraga: </label>
    <div class="col-10">  
        <input class="form-control col-10" name="search_data" id="search_data" type="text" onkeyup="ajaxSearchUcenik();">
        <div id="suggestions">
            <div id="autoSuggestionsList"></div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-md-6">


        Јединствени број: <input type="text" name="jedinstveni_broj" value="<?php echo set_value("jedinstveni_broj_ucenik") ?>" placeholder="Јединствени број"><br>
        Деловодни број: <input type="text" name="delovodni" value="<?php echo set_value("delovodni_broj") ?>" placeholder="Деловодни број"><br>
        Број уговора: <input type="text" name="ugovor" value="<?php echo set_value("broj_ugovor") ?>" placeholder="Број уговора"><br>
        
        Регистарски број: <input type="text" name="registar_broj" value="<?php echo set_value("registar_broj") ?>" placeholder="Унеси број из регистра"><br><br>
        
        Име: <input  type="text" name="ime" value="<?php echo set_value("ime") ?>" placeholder="Унеси име"><br>
        Презиме: <input  type="text" name="prezime" value="<?php echo set_value("prezime") ?>" placeholder="Унеси презиме"><br>
        ЈМБГ: <input  type="text" name="jmbg" value="<?php echo set_value("jmbg") ?>" placeholder="Унеси ЈМБГ"><br>
        Име оца: <input  type="text" name="ime_oca" value="<?php echo set_value("ime_otac") ?>" placeholder="Унеси име оца"><br>
        Име мајке: <input  type="text" name="ime_majke" value="<?php echo set_value("ime_majka") ?>" placeholder="Унеси име мајке"><br>
        Девојачко презиме мајке: <input  type="text" name="prezime_majke" value="<?php echo set_value("prezime_majka") ?>" placeholder="Девојачко презиме мајке"><br>
        Датум рођења: <input  type="date" value="<?php echo set_value("datum_rodjenje") ?>" name="datum" placeholder=""><br>
        Место рођења: <input type="text" name="mesto_rodj" value="<?php echo set_value("mesto_rodjenje") ?>" placeholder="Унеси место рођења"><br>
        Држава рођења: <input type="text" name="drzava_rodj" value="<?php echo set_value("drzava_rodjenje") ?>" placeholder="Унеси државу"><br>

<!--Општина рођења: <input type="text" name="opstina_rodj" value="</?php echo set_value("opstina_rodj") ?>" placeholder="Унеси општину рођења"><br>-->
        Адреса становања: <input  type="text" name="adresa_stan" value="<?php echo set_value("adresa_stanovanje") ?>" placeholder="Унеси адресу"><br>
        Место становања: <input type="text" name="mesto_stan" value="<?php echo set_value("mesto_stanovanje") ?>" placeholder="Унеси место становања"><br>
        Број телефона: <input  type="tel" name="broj_tel" value="<?php echo set_value("broj_telefon") ?>" placeholder="Унеси телефон"><br>
        Број мобилног телефона: <input  type="tel" name="mobilni" value="<?php echo set_value("telefon_mobilni") ?>" placeholder="Унеси мобилни телефон"><br>
        Адреса е-поште: <input  type="email" name="email" value="<?php echo set_value("e-mail") ?>" placeholder="Унеси e-mail"><br>


    </div>
    <div class="col-md-6">


        Датум уписа: <input type="date" name="datum_upis" value="<?php echo set_value("datum_upis") ?>" placeholder="Датум уписа"><br>

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

        <input type="checkbox" name="oslobodjen"> Oслобођен плаћања<br>

        <select name="godina_obrazovanja" >
            <option selected hidden><?php
                if (!isset($_POST['godina_obrazovanja']))
                    echo 'Година образовања';
                else
                    echo set_value("godina_obrazovanja");
                ?></option>
            <?php
            foreach ($godina_obrazovanja as $row) {
                echo '<option value="' . $row['idgodina_obrazovanja'] . '">';
                echo $row['naziv'];
                echo '</option>';
            }
            ?>

        </select><br>

<!--<select name="datum_upis">
    <option selected hidden>Година уписа</option>
    <option value="<?php ?>">Година уписа</option>      
</select><br>-->





        <select id="podrucje" name="podrucje_rada">
            <option selected hidden>Подручје рада</option>

            <?php
            foreach ($podrucje as $row) {
                echo '<option value="' . $row['idpodrucje_rada'] . '">';
                echo $row['naziv'];
                echo '</option>';
            }
            ?>

        </select><br>


        <select name="profil" id="profil">
            <option selected hidden>Прво изаберите подручје рада</option>
        </select>





<!-- <select name="obrazovni_profil">
    <option selected hidden>Образовни профил</option>
    
    <?/*php 
    
    foreach ($profil as $row)
        
    {
    echo '<option value="'.$row['idobrazovni_profil'].'">';
    echo $row['naziv'];
    echo '</option>';
    }
     */?>
    
</select><br> -->


        <br>

        Тип ученика:<br>
        
        <select id="tip" name="tip_ucenik">
            <option selected hidden>Тип ученика</option>

            <?php
            foreach ($tip_ucenik as $row) {
                echo '<option value="' . $row['idtip_ucenik'] . '">';
                echo $row['naziv_tip_ucenik'];
                echo '</option>';
            }
            ?>

        </select><br><br>
        
        <!--<input type="radio" name="tip_ucenika" value="p"> Преквалификација<br>
        <input type="radio" name="tip_ucenika" value="d"> Доквалификација<br>
        <input type="radio" name="tip_ucenika" value="up"> Упис у први разред школе<br>
        <input type="radio" name="tip_ucenika" value="un"> Упис у неки разред школе<br>
        <input type="radio" name="tip_ucenika" value="s"> Специјализација<br><br><br>-->
        <input type="submit" name="Sacuvaj" value="Сачувај"><br>
<a href="<?php echo site_url($controller . "/ubij_sesiju_ucenik/"); ?>">Osveži stranu</a><br><br>



        <div class="col-md-12">
            <a href="<?php echo site_url($controller . "/dokumentacija") ?>">Документација</a><br>
            <a href="<?php echo site_url($controller . "/priznati_ispiti") ?>">Признати испити</a>

        </div>
    </div>
</div>
</form>


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