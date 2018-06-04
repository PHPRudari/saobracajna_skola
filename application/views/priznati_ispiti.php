<?php
if (isset($error))
    echo $error;
//var_dump($_POST);
//var_dump($predmet_ucenik);


if (!isset($_SESSION['ucenik']['iducenik'])) {
    $this->session->set_flashdata('info', 'Нисте одабрали ученика!');  
    redirect(site_url("/$this->controller/ucenik"));
}
?>
<body>


    <div>
        <form name="ispiti">
            <input type="text" name="ime" value="<?php echo set_value("ime") ?>" placeholder="Име">
            <input type="text" name="prezime" value="<?php echo set_value("prezime") ?>" placeholder="Презиме">
            <input type="text" name="jedinstveni_broj" value="<?php echo set_value("jedinstveni_broj_ucenik") ?>" placeholder="Јединствени број"><br>



            <input type="text" value="<?php echo set_value("obrazovni_profil_idobrazovni_profil") ?>" name="obrazovni_profil" placeholder="Назив образовног профила">

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

        </form>  


        <form name="prva_forma">
            <input type="text" name="skola" value="<?php echo set_value("skola") ?>" placeholder="Школа">
            <input type="text" name="svedocanstvo" value="<?php echo set_value("svedocanstvo") ?>" placeholder="Број сведочанства">
            <input type="text" name="razred" value="<?php echo set_value("razred") ?>" placeholder="Разред">

            <input type="submit" name="dodaj" value="Додај"><br>

        </form>   

    </div>
    
    
    
    <div> 
        <?php echo form_open($controller . '/priznaj_ispite'); ?>

        <div class="row">

            <div class="col-md-6"><br>

                <p>I godina:</p>

                <div class="predmeti" style="overflow-y: scroll; height: 200px; width: 95%;">
                    <?php
                    foreach ($predmet_ucenik as $row) {
                       // var_dump($row)
                        if ($row['godina_obrazovanja_idgodina_obrazovanja']=='1' && $row['obrazovni_profil_idobrazovni_profil']==$_POST['obrazovni_profil_idobrazovni_profil']) {
                            echo "<div class='row'>";
                            echo "<div class='col-md-10'>";
                            echo '<input type="checkbox" value="' . $row['idpredmet'] . '" name="predmet[]" disabled>' . $row['naziv_predmet'];
                            echo "</div>";
                            echo "<div class='col-md-2'>";
                            echo '<input type="text" name="ocena[' . $row['idpredmet'] . ']" style="width:60px" placeholder="Ocena">' . "<br>";
                            echo "</div>";
                            echo "</div>";
                        }
                        
                    }
                    
                    ?>
                </div>


            </div>



            <div class="col-md-6"><br>
                <p>II godina:</p>

                <div class="predmeti" style="overflow-y: scroll; height: 200px; width: 95%;;">
                    <?php
                    foreach ($predmet_ucenik as $row) {
                        if ($row['godina_obrazovanja_idgodina_obrazovanja']=='2' && $row['obrazovni_profil_idobrazovni_profil']==$_POST['obrazovni_profil_idobrazovni_profil']) {
                            echo "<div class='row'>";
                            echo "<div class='col-md-10'>";
                            echo '<input type="checkbox" value="' . $row['idpredmet'] . '" name="predmet[]" disabled>' . $row['naziv_predmet'];
                            echo "</div>";
                            echo "<div class='col-md-2'>";
                            echo '<input type="text" name="ocena[' . $row['idpredmet'] . ']" style="width:60px" placeholder="Ocena">' . "<br>";
                            echo "</div>";
                            echo "</div>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        
        
        <div class="row">

            <div class="col-md-6 "><br>

                <p>III godina:</p>

                <div class="predmeti" style="overflow-y: scroll; height: 200px; width: 95%;;">
<?php
foreach ($predmet_ucenik as $row) {
    if ($row['godina_obrazovanja_idgodina_obrazovanja']=='3' && $row['obrazovni_profil_idobrazovni_profil']==$_POST['obrazovni_profil_idobrazovni_profil']) {
        echo "<div class='row'>";
        echo "<div class='col-md-10'>";
        echo '<input type="checkbox" value="' . $row['idpredmet'] . '" name="predmet[]" disabled>' . $row['naziv_predmet'];
        echo "</div>";
        echo "<div class='col-md-2'>";
        echo '<input type="text" value="" name="ocena[' . $row['idpredmet'] . ']" style="width:60px" placeholder="Ocena">' . "<br>";
        echo "</div>";
        echo "</div>";
    }
}
?>
                </div>


            </div>



            <div class="col-md-6"><br>
                <p>IV godina:</p>

                <div class="predmeti" style="overflow-y: scroll; height: 200px; width: 95%;;">
<?php
foreach ($predmet_ucenik as $row) {
    if ($row['godina_obrazovanja_idgodina_obrazovanja']=='4' && $row['obrazovni_profil_idobrazovni_profil']==$_POST['obrazovni_profil_idobrazovni_profil']) {
        echo "<div class='row'>";
        echo "<div class='col-md-10'>";
        echo '<input type="checkbox" value="' . $row['idpredmet'] . '" name="predmet[]" disabled>' . $row['naziv_predmet'];
        echo "</div>";
        echo "<div class='col-md-2'>";
        echo '<input type="text" name="ocena[' . $row['idpredmet'] . ']" style="width:60px" placeholder="Ocena">' . "<br>";
        echo "</div>";
        echo "</div>";
    }
}
?>
                </div>
            </div>
        </div>

        
        
        <div class="row">

            <div class="col-md-6"><br>
                <p>Специјализација:</p>

                <div class="predmeti" style="overflow-y: scroll; height: 200px; width: 95%;;">
<?php
foreach ($predmet_ucenik as $row) {
    if ($row['godina_obrazovanja_idgodina_obrazovanja']=='5' && $row['obrazovni_profil_idobrazovni_profil']==$_POST['obrazovni_profil_idobrazovni_profil']) {
        echo "<div class='row'>";
        echo "<div class='col-md-10'>";
        echo '<input type="checkbox" value="' . $row['idpredmet'] . '" name="predmet[]" disabled>' . $row['naziv_predmet'];
        echo "</div>";
        echo "<div class='col-md-2'>";
        echo '<input type="text" name="ocena[' . $row['idpredmet'] . ']" style="width:60px" placeholder="Ocena">' . "<br>";
        echo "</div>";
        echo "</div>";
    }
}
?>
                </div>
            </div>
            <div class="col-md-6"><br><br><br><br>
                <div class="dugme">
                    <input  type="submit" value="Unesi" name="priznaj" style="height: 100px; width: 200px">
                    <!--<a href="</?php echo site_url($controller . "/dokumentacija") ?>">Документација</a><br>-->

                </div> 

            </div>
        </div> 
        <br>
        
        
        <div class="row">
            <div class="col-md-6">       
                <a class="dugme3 btn btn-primary btn-lg btn-block" href="<?php echo site_url($controller . "/dokumentacija"); ?>">Документација</a><br>
            </div>
            <div class="col-md-6">
                <a class="dugme3 btn btn-primary btn-lg btn-block" href="<?php echo site_url($controller . "/ucenik/"); ?>">Врати се на ученика</a><br>
            </div>
        </div>









    </form>
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