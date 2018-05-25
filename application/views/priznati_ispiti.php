<body>
        <div>
            <form name="ispiti">
                <input type="text" name="godina_obrazovanja" placeholder="Година образовања">
                <input type="text" name="obrazovni_profil" placeholder="Назив образовног профила">
                <input type="text" name="ime_prezime" placeholder="Име и Презиме">
                <input type="text" name="jedinstveni_broj" placeholder="Јединствени број"><br>
                <input type="text" name="skola" placeholder="Школа">
                <input type="text" name="svedocanstvo" placeholder="Сведочанство">
                <input type="text" name="delovodni_broj" placeholder="Деловодни број">
                <input type="text" name="razred" placeholder="Разред">
                <a href="<?php echo site_url($controller."/dokumentacija")?>">Документација</a>
                <input type="submit" name="dodaj" value="Додај"><br>
                <input type="text" name="prvi_razred" value="Први разред" disabled><br>
                <input type="text" name="pr_ispiti" value="<?php ?>">
                <input type="checkbox" name="priznat" value="<?php ?>">Признат испитt<br>
                <input type="text" name="drugi_razred" value="Други разред" disabled><br>
                <input type="text" name="dr_ispiti" value="<?php ?>">
                <input type="checkbox" name="priznat" value="<?php ?>">Признат испит<br>
                <input type="text" name="treci_razred" value="трећи разред" disabled><br>
                <input type="text" name="tr_ispiti" value="<?php ?>">
                <input type="checkbox" name="priznat" value="<?php ?>">Признат испит<br>
                <input type="text" name="cetvrti_razred" value="Четврти разред" disabled><br>
                <input type="text" name="cr_ispiti" value="<?php ?>">
                <input type="checkbox" name="priznat" value="<?php ?>">Признат испит<br>
                <input type="text" name="specijalizacija" value="Специјализација" disabled><br>
                <input type="text" name="spec" value="<?php ?>">
                <input type="checkbox" name="priznat" value="<?php ?>">Специјализација<br>
                <input type="submit" name="nazad" value="Врати се назад">
                <input type="submit" name="sacuvaj" value="Сачувај">
                    
            </form>
        </div>
    </body>
