<body>
    <div class="row">
        <div class="col-md-6">
            <?php echo form_open($controller . '/unesi_podrucje'); ?>

            <div id="podrucje_rada" class="form-group row form-inline">

<!--<input type="text" name="podrucje_rada" placeholder="Подручје рада" disabled>--><br>
                <label class="col-form-label col-sm-12" for="podrucje_rada"><p>Подручје рада:</p></label><br>
                <br><input type="text" class="form-control col-sm-12" name="podrucje_rada" placeholder="Унеси подручје рада" value="<?php echo set_value("podrucje_rada"); ?>"><?php echo form_error("podrucje_rada", '<span style="color:red">', '</span>'); ?><br>
                <!--<input class="dugme3 btn btn-primary btn-lg btn-block" type="submit" name="izmeni" value="Измени">-->
                <!--<input class="dugme3 btn btn-primary btn-lg btn-block" type="submit" name="obrisi" value="Обриши">-->
                <input class="dugme1 btn btn-primary btn-lg btn-block" type="submit" name="snimi" value="Сачувај">
            </div>
            </form>
        </div>

        <div class="col-md-6">

            <?php
            //$query=$this->db->query("SELECT * FROM srednja_skola.korisnik where guid='1';");



            echo "Подручје рада: <br>";
            $result = $this->model_admin->dohvati_podrucje();
            $data['podrucje'] = $result;
            //var_dump($result);
            /* foreach ($korisnici as $row) {
              echo $row['ime'] . "&nbsp";
              echo $row['prezime'] . "&nbsp";
              echo $row ['email'] . "&nbsp"; */
            foreach ($result as $row) {
                //echo '<option value="' . $row['idpodrucje_rada'] . '">';
                echo $row['naziv'] . "&nbsp&nbsp";
                echo '</option>';
                ?>
                <a href="<?php echo site_url($controller . "/obrisi_podrucje/" . $row['idpodrucje_rada']); ?>"
                   onclick="return confirm('Да ли сте сигурни да желите да обришете подручје рада?');">Obriši</a><br>

            <?php } ?>                


        </div>



    </div>

    <div class="row">
        <div class="col-md-6">
            <?php echo form_open($controller . '/unesi_obrazovni_profil'); ?>


            <div id="unos_obrazovnog_profila" class="form-group row form-inline">
                <!--<input type="text" name="obrazovni_profil" value="Образовни профил" disabled>--><br>
                <label class="col-form-label col-sm-4" for="obrazovni_profil"><p>Образовни профил:</p></label>
                <input type="text" class="form-control col-sm-8" name="obrazovni_profil" placeholder="Образовни профил"value="<?php echo set_value("podrucje_rada"); ?>"><?php echo form_error("obrazovni_profil", '<span style="color:red">', '</span>'); ?><br>
                <!--<input class="dugme3 btn btn-primary btn-lg btn-block" type="submit" name="izmeni" value="Измени">-->
                <!--<input class="dugme3 btn btn-primary btn-lg btn-block" type="submit" name="obrisi" value="Обриши">-->
                <input class="dugme1 btn btn-primary btn-lg btn-block" type="submit" name="snimi" value="Сачувај">
            </div>
            </form>
        </div>

        <div class="col-md-6">
            Tabela 2
        </div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <?php echo form_open($controller . '/unesi_novi_predmet'); ?>

            <div id="unos_predmeta" class="form-group row form-inline">
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
                <label class="col-form-label col-sm-4" for="ime_predmeta"><p><p>Додај предмет:</p></label>
                <input type="text" class="form-control col-sm-8" name="ime_predmeta" placeholder="Име предмета" value="<?php echo set_value("ime_predmeta"); ?>"><?php echo form_error("ime_predmeta", '<span style="color:red">', '</span>'); ?><br><br>
                <label class="col-form-label col-sm-4" for="godina_obrazovanja"><p><p> </p></label>
                <input type="text" class="form-control col-sm-8" name="godina_obrazovanja" placeholder="Година образовања" value="<?php echo set_value("godina_obrazovanja"); ?>"><?php echo form_error("godina_obrazovanja", '<span style="color:red">', '</span>'); ?><br><br>

                <label class="col-form-label col-sm-4" for="podrucje_rada"><p><p> </p></label>
                <input type="text" class="form-control col-sm-8" name="podrucje_rada" placeholder="Подручје рада" value="<?php echo set_value("podrucje_rada"); ?>"><?php echo form_error("podrucje_rada", '<span style="color:red">', '</span>'); ?><br><br>

                <label class="col-form-label col-sm-4" for="obrazovni_profil"><p><p> </p></label>
                <input type="text" class="form-control col-sm-8" name="obrazovni_profil" placeholder="Образовни профил" value="<?php echo set_value("obrazovni_profil"); ?>"><?php echo form_error("obrazovni_profil", '<span style="color:red">', '</span>'); ?><br><br>


                <!--<input type="submit" class="dugme3 btn btn-primary btn-lg btn-block" name="izmeni" value="Измени">-->
                <!--<input type="submit" class="dugme3 btn btn-primary btn-lg btn-block" name="obrisi" value="Обриши">-->
                <input type="submit" class="dugme1 btn btn-primary btn-lg btn-block" name="snimi" value="Сачувај"><br><br>
                <a href="<?php echo site_url($controller . "/ucenik") ?>">Врати се назад</a><br>
                <a href="<?php echo site_url($controller . "/prijava_ispita") ?>">Пријава испита</a>
            </div>
            </form>
        </div>
        <div class="col-md-6">
            Tabela 3
        </div>     

    </div>
</body>

