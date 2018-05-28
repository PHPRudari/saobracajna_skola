<?php if (!isset($_SESSION['ucenik']['iducenik'])) {
    echo 'Niste odabrali učenika';
    exit;
}

?>

<body>

    
    <div>
            <form name="ispiti">
                <input type="text" name="ime" value="<?php echo set_value("ime") ?>" placeholder="Име">
                <input type="text" name="prezime" value="<?php echo set_value("prezime") ?>" placeholder="Презиме">
                <input type="text" name="jedinstveni_broj" value="<?php echo set_value("jedinstveni_broj_ucenik") ?>" placeholder="Јединствени број"><br>
             <!--dodao-->   
            <!--    <select id="podrucje" name="podrucje_rada">
            <option selected hidden>Подручје рада</option>

            <?php/*
            foreach ($podrucje as $row) {
                echo '<option value="' . $row['idpodrucje_rada'] . '">';
                echo $row['naziv'];
                echo '</option>';
            }*/
            ?>
-->
        </select>
                
                <!--<input type="text" name="obrazovni_profil" placeholder="Назив образовног профила">-->
                <!--dodao-->
                <select name="obrazovni_profil">
    <option selected hidden>Образовни профил</option>
    
    <?php 
    
    foreach ($profil as $row)
        
    {
    echo '<option value="'.$row['idobrazovni_profil'].'">';
    echo $row['naziv'];
    echo '</option>';
    }
     ?>
    
</select>
                
                <!--<input type="text" name="godina_obrazovanja" placeholder="Година образовања">-->
                <!--dodao-->
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
                <br>
                <input type="text" name="skola" value="<?php echo set_value("skola") ?>" placeholder="Школа">
                <input type="text" name="svedocanstvo" value="<?php echo set_value("svedocanstvo") ?>" placeholder="Број сведочанства">
                <input type="text" name="razred" value="<?php echo set_value("razred") ?>" placeholder="Разред">
                
                <input type="submit" name="dodaj" value="Додај"><br>
                <input type="text" name="prvi_razred" value="Први разред" disabled><br>
                <input type="text" name="pr_ispiti" value="<?php ?>">
                <input type="checkbox" name="priznat" value="<?php ?>">Признат испитt<br>
                <input type="text" name="drugi_razred" value="Други разред" disabled><br>
                <input type="text" name="dr_ispiti" value="<?php ?>">
                <input type="checkbox" name="priznat" value="<?php ?>">Признат испит<br>
                <input type="text" name="treci_razred" value="Трећи разред" disabled><br>
                <input type="text" name="tr_ispiti" value="<?php ?>">
                <input type="checkbox" name="priznat" value="<?php ?>">Признат испит<br>
                <input type="text" name="cetvrti_razred" value="Четврти разред" disabled><br>
                <input type="text" name="cr_ispiti" value="<?php ?>">
                <input type="checkbox" name="priznat" value="<?php ?>">Признат испит<br>
                <input type="text" name="specijalizacija" value="Специјализација" disabled><br>
                <input type="text" name="spec" value="<?php ?>">
                <input type="checkbox" name="priznat" value="<?php ?>">Специјализација<br>
               
                <input type="submit" name="sacuvaj" value="Сачувај">
                    
            </form>
        
        
        
        </div>
    
    <div class="row">
    <div class="col-md-12">
    <br><br>
    <a href="<?php echo site_url($controller."/dokumentacija")?>">Документација</a><br>
    <a href="<?php echo site_url($controller . "/ucenik") ?>">Ученик</a><br>
    </div>
</div>
    </body>
    <script>
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