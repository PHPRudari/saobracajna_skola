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

        <br><h4> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Изабран је ученик: <?php echo $_SESSION['ucenik']['ime'] . " " . $_SESSION['ucenik']['prezime'] ?></h4>
        <br><h4><?php echo " &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Јединствени број ученика: " . $_SESSION['ucenik']['jedinstveni_broj_ucenik'] ?></h4>

    </div>
</div><br>

<?php echo form_open($controller . '/prijavi_ispite'); ?>

<div class="col-md-6 form-group row form-inline">

    <label class="col-sm-4 col-form-label" for="rok">Изаберите рок:</label>
        <select name="rok" class="form-control col-sm-8">
        <?php
        foreach ($_SESSION['rok'] as $row) {
            echo '<option value="' . $row['idtip_roka'] . '">';
            echo $row['naziv'];
            echo '</option>';
        }
        ?> 

    </select>


</div>

<div class="row">

       
       
    
    <div class="col-md-6"><br>

        <p>I godina:</p>

        <div class="predmeti" style="overflow-y: scroll; height: 200px; width: 100%;">
            <?php
            
           
            
            foreach ($_SESSION['nepolozeni_ispiti'] as $row) {
                // var_dump($row)
                if ($row['godina_obrazovanja_idgodina_obrazovanja'] == '1') {
                    echo "<div class='row'>";
                    echo "<div class='col-md-10'>";
                    echo '<input type="checkbox" value="' . $row['idpredmet'] . '" name="predmet[]">' . $row['naziv_predmet'];
                    echo "</div>";

                    echo "</div>";
                }
               
            }
            ?>
        </div>
    </div>



    <div class="col-md-6"><br>
        <p>II godina:</p>

        <div class="predmeti" style="overflow-y: scroll; height: 200px; width: 100%;;">
            <?php
            foreach ($_SESSION['nepolozeni_ispiti'] as $row) {
                // var_dump($row)
                if ($row['godina_obrazovanja_idgodina_obrazovanja'] == '2') {
                    echo "<div class='row'>";
                    echo "<div class='col-md-10'>";
                    echo '<input type="checkbox" value="' . $row['idpredmet'] . '" name="predmet[]">' . $row['naziv_predmet'];
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

        <div class="predmeti" style="overflow-y: scroll; height: 200px; width: 100%;;">
            <?php
            foreach ($_SESSION['nepolozeni_ispiti'] as $row) {
                // var_dump($row)
                if ($row['godina_obrazovanja_idgodina_obrazovanja'] == '3') {
                    echo "<div class='row'>";
                    echo "<div class='col-md-10'>";
                    echo '<input type="checkbox" value="' . $row['idpredmet'] . '" name="predmet[]">' . $row['naziv_predmet'];
                    echo "</div>";

                    echo "</div>";
                }
               
            }
            ?>
        </div>


    </div>



    <div class="col-md-6"><br>
        <p>IV godina:</p>

        <div class="predmeti" style="overflow-y: scroll; height: 200px; width: 100%;;">
            <?php
            
            
            
            foreach ($_SESSION['nepolozeni_ispiti'] as $row) {
                // var_dump($row)
                if ($row['godina_obrazovanja_idgodina_obrazovanja'] == '4') {
                    echo "<div class='row'>";
                    echo "<div class='col-md-10'>";
                    echo '<input type="checkbox" value="' . $row['idpredmet'] . '" name="predmet[]">' . $row['naziv_predmet'];
                    echo "</div>";

                    echo "</div>";
                }
                        
            //    else echo '<h5 style="color:red">Положени су сви испити са ове године.</h5>';
            }
            ?>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-md-6"><br>
        <p>V godina:</p>

        <div class="predmeti" style="overflow-y: scroll; height: 200px; width: 100%;;">
           
            <?php
            foreach ($_SESSION['nepolozeni_ispiti'] as $row) {
                // var_dump($row)
                if ($row['godina_obrazovanja_idgodina_obrazovanja'] == '5') {
                    echo "<div class='row'>";
                    echo "<div class='col-md-10'>";
                    echo '<input type="checkbox" value="' . $row['idpredmet'] . '" name="predmet[]">' . $row['naziv_predmet'];
                    echo "</div>";

                    echo "</div>";
                }
                
            }
            ?>
          
        </div>
    </div>
    <div class="col-md-6"><br><br><br><br>
        <div>
             <?php if (isset ($_SESSION['prijava']))
            echo $_SESSION['prijava'];
        
        ?>
            <input class="dugme2 btn btn-primary btn-lg btn-block" type="submit" value="Unesi" name="priznaj" style="height: 100px;">

        </div> 

    </div>
</div> 
</form>
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

<script>

$(".predmeti").each(function(){
    if($(this).children().length === 0)
        $(this).parent().remove();
})

</script>