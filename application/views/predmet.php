<body>
        <div class="row col-md-12">
            <form name="predmet">
                
                    <div id="unos_podrucja_rada" class="form-group row form-inline">
                    <!--<input type="text" name="podrucje_rada" placeholder="Подручје рада" disabled>--><br>
                    <label class="col-form-label col-sm-4" for="podrucje_rada"><p>Подручје рада:</p></label>
                    <input type="text" class="form-control" name="podrucje_rada" placeholder="Унеси подручје рада" value="<?php echo set_value("podrucje_rada"); ?>"><?php echo form_error("podrucje_rada", '<span style="color:red">', '</span>'); ?><br>
                    <input class="dugme3 btn btn-primary btn-lg btn-block" type="submit" name="izmeni" value="Измени">
                    <input class="dugme3 btn btn-primary btn-lg btn-block" type="submit" name="obrisi" value="Обриши">
                    <input class="dugme1 btn btn-primary btn-lg btn-block" type="submit" name="snimi" value="Сними">
                </div>
                <div id="unos_obrazovnog_profila">
                    <!--<input type="text" name="obrazovni_profil" value="Образовни профил" disabled>--><br>
                    <p>Образовни профил</p>
                    <input type="text" name="obrazovni_profil" placeholder="Образовни профил">
                    <input type="submit" name="izmeni" value="Измени">
                    <input type="submit" name="obrisi" value="Обриши">
                    <input type="submit" name="snimi" value="Сними">
                </div>
                <div id="unos_predmeta">
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
                    <p>Додај предмет</p>
                    <input type="text" name="ime_predmeta" placeholder="Име предмета"><br>
                    <input type="text" name="godina_obrazovanja" placeholder="Година образовања"><br>
                    <input type="text" name="podrucje_rada" placeholder="Подручје рада"><br>
                    <input type="text" name="obrazovni_profil" placeholder="Образовни профил">
                    <input type="submit" name="izmeni" value="Измени">
                    <input type="submit" name="obrisi" value="Обриши">
                    <input type="submit" name="snimi" value="Сними"><br>
                    <a href="<?php echo site_url($controller."/ucenik")?>">Врати се назад</a><br>
                    <a href="<?php echo site_url($controller."/prijava_ispita")?>">Пријава испита</a>
                </div>
            </form>
        </div>
    </body>

