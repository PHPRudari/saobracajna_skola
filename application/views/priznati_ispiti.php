<?php

//r_dump($_POST);
//var_dump($predmet_ucenik);
//var_dump($_SESSION);
//var_dump($profil);


if (!isset($_SESSION['ucenik']['iducenik'])) {
    $this->session->set_flashdata('info', 'Нисте одабрали ученика!');
    redirect(site_url("/$this->controller/ucenik"));
}
?>


    <div class="row">
        <div class="col-md-6">
            <form name="ispiti">
                <br>   
                <h3>Ученик:</h3>
                <br>
                <div class="form-group row form-inline">
                    <label class="col-form-label col-sm-4 " for="ime">Име:</label>
                    <input type="text" class="form-control " name="ime" placeholder="Унеси име" value="<?php echo set_value("ime"); ?>"><?php echo form_error("ime", '<span style="color:red">', '</span>'); ?><br>
                </div>

                <div class="form-group row form-inline">
                    <label class="col-form-label col-sm-4 " for="prezime">Презиме:</label>
                    <input type="text" class="form-control " name="prezime" placeholder="Унеси презиме" value="<?php echo set_value("prezime"); ?>"><?php echo form_error("prezime", '<span style="color:red">', '</span>'); ?><br>
                </div>

                <div class="form-group row form-inline">
                    <label class="col-form-label col-sm-4" for="jedinstveni_broj">Јединствени број:</label>
                    <input type="text"  class="form-control" name="jedinstveni_broj" placeholder="Унеси јединствени број" value="<?php echo set_value("jedinstveni_broj_ucenik"); ?>"><?php echo form_error("jedinstveni_broj", '<span style="color:red">', '</span>'); ?><br>
                </div>

                <div class="form-group row form-inline">
                    <label class="col-form-label col-sm-4" for="obrazovni_profil">Образовни профил:</label>
                    <input type="text"  class="form-control" name="obrazovni_profil" placeholder="Унеси образовни профил" value="<?php 
                    foreach ($profil as $row) {
                        if($row['idobrazovni_profil']==$_SESSION['ucenik']['obrazovni_profil_idobrazovni_profil'])
                        echo $row['naziv'];
                    }
                    ?>"><?php echo form_error("obrazovni_profil", '<span style="color:red">', '</span>'); ?><br>
                </div>


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
            </form>  
        </div>

        <div class="col-md-6">
            <form name="prva_forma">
                <br>   
                <h3>Сведочанство:</h3>
                <br>

                <!--<div class="form-group row form-inline">
                    <label class="col-form-label col-sm-4 " for="skola">Школа:</label>
                    <input type="text" class="form-control " name="skola" placeholder="Унеси школу" value="<?php echo set_value("skola"); ?>"><?php echo form_error("skola", '<span style="color:red">', '</span>'); ?><br>
                </div>

                <div class="form-group row form-inline">
                    <label class="col-form-label col-sm-4 " for="svedocanstvo">Број сведочанства:</label>
                    <input type="text" class="form-control " name="svedocanstvo" placeholder="Унеси број сведочанства" value="<?php echo set_value("skola"); ?>"><?php echo form_error("svedocanstvo", '<span style="color:red">', '</span>'); ?><br>
                </div>

                <div class="form-group row form-inline">
                    <label class="col-form-label col-sm-4 " for="razred">Разред:</label>
                    <input type="text" class="form-control " name="razred" placeholder="Унеси разред" value="<?php echo set_value("razred"); ?>"><?php echo form_error("razred", '<span style="color:red">', '</span>'); ?><br>
                </div>
                <br>-->

                <div class="col-md-12">
                    <!--<input type="submit" class="dugme2 btn btn-primary btn-lg btn-block" name="dodaj" value="Сачувај"><br>-->
               
                    <h6>Обавезно сачувати скенирана сведочанства ученика у пољу Документација!</h6><br>
                
                <a class="dugme1 btn btn-primary btn-lg btn-block "  href="<?php echo site_url($controller . "/dokumentacija") ?>">Документација</a><br>
            </div>
                <div class="col-md-12">
                <a class="dugme3 btn btn-primary btn-lg btn-block" href="<?php echo site_url($controller . "/ucenik/"); ?>">Врати се на ученика</a><br>
            </div>
                 <?php if (isset ($_SESSION['priznaj']))
            echo '<h3 style="color:red">'.$_SESSION['priznaj'].'</h3>';
        
        ?>
            </form>   

        </div>

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
                        if ($row['godina_obrazovanja_idgodina_obrazovanja'] == '1' && $row['obrazovni_profil_idobrazovni_profil'] == $_POST['obrazovni_profil_idobrazovni_profil']) {
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
                        if ($row['godina_obrazovanja_idgodina_obrazovanja'] == '2' && $row['obrazovni_profil_idobrazovni_profil'] == $_POST['obrazovni_profil_idobrazovni_profil']) {
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
                        if ($row['godina_obrazovanja_idgodina_obrazovanja'] == '3' && $row['obrazovni_profil_idobrazovni_profil'] == $_POST['obrazovni_profil_idobrazovni_profil']) {
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
                        if ($row['godina_obrazovanja_idgodina_obrazovanja'] == '4' && $row['obrazovni_profil_idobrazovni_profil'] == $_POST['obrazovni_profil_idobrazovni_profil']) {
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
                        if ($row['godina_obrazovanja_idgodina_obrazovanja'] == '5' && $row['obrazovni_profil_idobrazovni_profil'] == $_POST['obrazovni_profil_idobrazovni_profil']) {
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
                <div>
                    <input class="dugme2 btn btn-primary btn-lg btn-block" type="submit" value="Unesi" name="priznaj" style="height: 100px;">
                    <!--<a href="</?php echo site_url($controller . "/dokumentacija") ?>">Документација</a><br>-->

                </div> 

            </div>
        </div> 
        <br>


        









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
    


$(".predmeti").each(function(){
    if($(this).children().length === 0)
        $(this).parent().remove();
})


</script>