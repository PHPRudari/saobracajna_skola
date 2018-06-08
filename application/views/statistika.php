
<!--<a href="</?php echo site_url($controller . "/stampa") ?>">Odstampaj</a><br>


<a  href="</?php echo site_url($controller . "/stampa/prijavljeni") ?>">Штампај пријављене испите</a>-->


<div class="row">
    <?php echo form_open($controller . '/pregled_prijava'); ?>
    <br>
     <select name="godina_prijave">
    <option selected hidden>Година</option>
    
            <?php
            for ($i = date("Y"); $i >= 2010; $i--) {
                echo "<option value='$i'>";
                echo $i;
                echo "</option>";
            }
            ?>
    </select> 
    
     <select name="rok_prijave">
    <option selected hidden>Рок</option>
      

  <?php
        foreach ($_SESSION['rok'] as $rok) {
            echo "<option value='".$rok['idtip_roka']."'".">";
                echo $rok['naziv'];
                echo "</option>";
                
                
        }         
        
                    
                    ?>
    
     </select>
    
    <input type="submit" value="Прикажи испите">
    
</form>
    
    
</div>

