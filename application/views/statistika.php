
<!--<a href="</?php echo site_url($controller . "/stampa") ?>">Odstampaj</a><br>


<a  href="</?php echo site_url($controller . "/stampa/prijavljeni") ?>">Штампај пријављене испите</a>-->


    <div col-md-6> 
        <div class="form-group row form-inline">

            <label class="col-sm-2 col-form-label" for="godina_prijave">Година:</label>
            <?php echo form_open($controller . '/pregled_prijava'); ?>
            <br>
            <select name="godina_prijave" class="form-control">
                <option selected hidden>Година</option>

                <?php
                for ($i = date("Y"); $i >= 2010; $i--) {
                    echo "<option value='$i'>";
                    echo $i;
                    echo "</option>";
                }
                ?>
            </select> 

        </div>
     
        <div class="form-group row form-inline">

            <label class="col-sm-2 col-form-label" for="rok_prijave">Рок:</label>
            <select name="rok_prijave" class="form-control">
                <option selected hidden>Рок</option>


                <?php
                foreach ($_SESSION['rok'] as $rok) {
                    echo "<option value='" . $rok['idtip_roka'] . "'" . ">";
                    echo $rok['naziv'];
                    echo "</option>";
                }
                ?>

            </select>

        </div>
    </div>



    <div class="col-md-6 ">  
        <br>
        <input class="dugme1 btn btn-primary btn-lg btn-block" type="submit" value="Прикажи испите">
    </div> 
    <div class="col-md-6 ">

    </div>
</form>





