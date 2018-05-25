<body>
        <div>
            <form name="prijava">
                <input type="text" name="ime_prezime" placeholder="Име и Презиме">
                <input type="text" name="delovodni_broj" placeholder="Деловодни број">
                <input type="submit" name="pretraga" value="Унеси"><br>
                <p>Ispiti</p>
                <input type="text" name="испит" value="<?php ?>" placeholder="Унеси документ"><?php ?>
                <input type="submit" name="dodaj" value="Додај"><br>
                <select name="izborni_predmet">
                    <option value="<?php ?>">Изборни предмет</option>      
                </select><br>
                <input type="file" name="file_upload" id="file_upload">
                <input type="submit" name="submit" value="Додај уплатницу"><br>
                <input type="submit" name="snimi"><br>
                <a href="<?php echo site_url($controller."/predmet")?>">Предмет</a>
                <a href="<?php echo site_url($controller."/raspored")?>">Распоред</a>
                
            </form>
        </div>
    </body>


