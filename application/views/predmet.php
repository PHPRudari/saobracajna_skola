<?php
//var_dump($godina_obrazovanja);
?>
<!--   GRUPA     --->
<body>
    <div class="row">
        <div class="col-md-6">
            <?php echo form_open($controller . '/unesi_podrucje'); ?>

            <div id="podrucje_rada" class="form-group ">

<!--<input type="text" name="podrucje_rada" placeholder="Подручје рада" disabled>-->
                <label class="col-form-label col-sm-12" for="podrucje_rada"><p>Подручје рада:</p></label><br>
                <input type="text" class="form-control col-sm-12" name="podrucje_rada" placeholder="Унеси подручје рада" value="<?php echo set_value("podrucje_rada"); ?>"><?php echo form_error("podrucje_rada", '<span style="color:red">', '</span>'); ?><br>
                <!--<input class="dugme3 btn btn-primary btn-lg btn-block" type="submit" name="izmeni" value="Измени">-->
                <!--<input class="dugme3 btn btn-primary btn-lg btn-block" type="submit" name="obrisi" value="Обриши">-->
                <input class="dugme1 btn btn-primary btn-lg btn-block" type="submit" name="snimi" value="Сачувај">
            </div>
            </form>
        </div>

        <div class="col-md-6" >
            <br><br>
            <?php echo form_open($controller . '/unesi_podrucje'); ?>
            <div class="predmeti" style="overflow-y: scroll; height: 200px; width: 500px;">
                <?php
                //$query=$this->db->query("SELECT * FROM srednja_skola.korisnik where guid='1';");



                /* echo "<p>Подручје рада: </p><br>"; */
                ?>
                <!--<label class="col-form-label col-sm-12" for="podrucje_rada"><p>Подручје рада:</p></label>-->
                <?php
                // $result = $this->model_admin->dohvati_podrucje();
                //$data['podrucje'] = $result;
                //var_dump($result);
                /* foreach ($korisnici as $row) {
                  echo $row['ime'] . "&nbsp";
                  echo $row['prezime'] . "&nbsp";
                  echo $row ['email'] . "&nbsp"; */
                foreach ($podrucje as $row) {
                    //echo '<option value="' . $row['idpodrucje_rada'] . '">';
                    echo $row['naziv'] . "&nbsp&nbsp";
                    echo '</option>';
                    ?>
                    <a href="<?php echo site_url($controller . "/obrisi_podrucje/" . $row['idpodrucje_rada']); ?>"
                       onclick="return confirm('Да ли сте сигурни да желите да обришете подручје рада?');">Obriši</a><br>

<?php } ?>                
                </form>
            </div>
        </div>

    </div>





    <div class="row">
        <div class="col-md-6">
<?php echo form_open($controller . '/unesi_obrazovni_profil'); ?>



            <div id="unos_obrazovnog_profila" class="form-group">

<!--<input type="text" name="obrazovni_profil" value="Образовни профил" disabled>--><br>
                <label class="col-form-label col-sm-12" for="obrazovni_profil"><p>Образовни профил:</p></label>

<!--<label class="col-form-label col-sm-12" for="podrucje_rada"><p><p> </p></label>-->
<!--<input type="text" class="form-control col-sm-12" name="podrucje_rada" placeholder="Подручје рада" value="</?php echo set_value("podrucje_rada"); ?>"></?php echo form_error("podrucje_rada", '<span style="color:red">', '</span>'); ?><br>-->



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


                <input type="text" class="form-control col-sm-12" name="obrazovni_profil" placeholder="Образовни профил"value="<?php echo set_value("obrazovni_profil"); ?>"><?php echo form_error("obrazovni_profil", '<span style="color:red">', '</span>'); ?><br>
                <!--<input class="dugme3 btn btn-primary btn-lg btn-block" type="submit" name="izmeni" value="Измени">-->
                <!--<input class="dugme3 btn btn-primary btn-lg btn-block" type="submit" name="obrisi" value="Обриши">-->
                <input class="dugme1 btn btn-primary btn-lg btn-block" type="submit" name="snimi" value="Сачувај">
            </div>
            
        </div>
<!--  OVO ISPRAVLJAM  -->
        <div class="col-md-6" >
            <br><br>
            
            <div class="predmeti" style="overflow-y: scroll; height: 200px; width: 500px;">
                <?php
                //$query=$this->db->query("SELECT * FROM srednja_skola.korisnik where guid='1';");



                /* echo "<p>Подручје рада: </p><br>"; */
                ?>
                <!--<label class="col-form-label col-sm-12" for="podrucje_rada"><p>Подручје рада:</p></label>-->
                <?php
                // $result = $this->model_admin->dohvati_podrucje();
                //$data['podrucje'] = $result;
                //var_dump($result);
                /* foreach ($korisnici as $row) {
                  echo $row['ime'] . "&nbsp";
                  echo $row['prezime'] . "&nbsp";
                  echo $row ['email'] . "&nbsp"; */
              /*  foreach ($profil as $row) {
                    //echo '<option value="' . $row['idpodrucje_rada'] . '">';
                    echo $row['naziv'] . "&nbsp&nbsp";
                    echo '</option>';
                    ?>
                    <a href="<?php echo site_url($controller . "/obrisi_profil/" . $row['idobrazovni_profil']); ?>"
                       onclick="return confirm('Да ли сте сигурни да желите да обришете образовни профил?');">Obriši</a><br>

<?php } */?>                
                </form>
            </div>
        </div>
    </div>




    <div class="row">
        <div class="col-md-6">
<?php echo form_open($controller . '/unesi_novi_predmet'); ?>

            <div id="unos_predmeta" class="form-group">
               <!-- <input type="text" name="predmet" value="predmet" disabled><br>
                <select name="podrucje_rada">
                    <option value="podrucje">Подручје рада</option>
                    <option value="<?php ?>">Подручје рада</option>      
                </select><br>
                <select name="obrazovni_profil">
                    <option value="profil">Образовни профил</option>
                    <option value="<?php ?>">Образовни профил</option>      
                </select><br>
                <select name="godina_obrazovanja">
                    <option value="godina">Година образовања</option>
                    <option value="<?php ?>">Година образовања<</option>      
               </select><br>--><br>
                <label class="col-form-label col-sm-12" for="ime_predmeta"><p>Додај предмет:</p></label>


  <!--<label class="col-form-label col-sm-12" for="obrazovni_profil"><p><p> </p></label>-->
<!--<input type="text" class="form-control col-sm-12" name="obrazovni_profil" placeholder="Образовни профил" value="</?php echo set_value("obrazovni_profil"); ?>"></?php echo form_error("obrazovni_profil", '<span style="color:red">', '</span>'); ?><br>-->





                <select name="profil" id="profil" class="form-control">
                    <option selected hidden>Образовни профил</option>

                    <?php
                    foreach ($profil as $row) {
                        echo '<option value="' . $row['idobrazovni_profil'] . '">';
                        echo $row['naziv'];
                        echo '</option>';
                    }
                    ?>

                </select><br>



<!--<label class="col-form-label col-sm-12" for="godina_obrazovanja"><p><p> </p></label>-->
<!--<input type="text" class="form-control col-sm-12" name="godina_obrazovanja" placeholder="Година образовања" value="</?php echo set_value("godina_obrazovanja"); ?>"></?php echo form_error("godina_obrazovanja", '<span style="color:red">', '</span>'); ?><br>-->

                <select name="godina_obrazovanja" class="form-control ">
                    <option selected hidden>Година образовања:</option>
<?php
foreach ($godina_obrazovanja as $row) {
    echo '<option value="' . $row['idgodina_obrazovanja'] . '">';
    echo $row['naziv'];
    echo '</option>';
}
?> 
                </select><br>


                <input type="text" class="form-control col-sm-12" name="ime_predmeta" placeholder="Име предмета" value="<?php echo set_value("ime_predmeta"); ?>"><?php echo form_error("ime_predmeta", '<span style="color:red">', '</span>'); ?><br>



                <!--<input type="submit" class="dugme3 btn btn-primary btn-lg btn-block" name="izmeni" value="Измени">-->
                <!--<input type="submit" class="dugme3 btn btn-primary btn-lg btn-block" name="obrisi" value="Обриши">-->
                <input type="submit" class="dugme1 btn btn-primary btn-lg btn-block" name="snimi" value="Сачувај"><br><br><br><br>






        <!--<a href="<?php echo site_url($controller . "/prijava_ispita") ?>">Пријава испита</a>-->
            </div>
            </form>
        </div>


        <div class="col-md-6">
            <br><br><br>
            <div class="predmeti" style="overflow-y: scroll; height: 200px; width: 500px;">
                Tabela 3
            </div>
        </div>     

    </div>
    <div class="row">
        <div class="col-md-6">
        <a class="dugme3 btn btn-primary btn-lg btn-block" href="<?php echo site_url($controller . "/predmet/"); ?>">Освежи страну</a><br>    
        </div>
        <div class="col-md-6">
        <a class="dugme3 btn btn-primary btn-lg btn-block" href="<?php echo site_url($controller . "/ucenik/"); ?>">Врати се на ученика</a><br>
        </div>
    </div>
</body>

