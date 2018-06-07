<?php
if (isset($error))
    echo $error;

if (!isset($_SESSION['ucenik']['iducenik'])) {
    $this->session->set_flashdata('info', 'Нисте одабрали ученика!');  
    redirect(site_url("/$this->controller/ucenik"));
}
?>

<div>
    <?php echo form_open_multipart('admin/do_upload'); ?>
    <br>
    <h3>Изаберите фајл (максимална величина 2 Mb):</h3><br>
    <div class="col-md-6">
        <div class="form-group row form-inline">
            <label class="col-form-label col-sm-4" for="userfile">Изаберите фајл:</label>
            <input type="file"  class="form-control" name="userfile" placeholder="Изаберите фајл" value="<?php echo set_value("userfile"); ?>" ><?php echo form_error("userfile", '<span style="color:red">', '</span>'); ?><br>
        </div>
        </div>
        <!--<input type="file" name="userfile" value="Izaberite fajl" size="20" />-->
    <br>
        <div class="col-md-6">
            <input type="submit" class="dugme2 btn btn-primary btn-lg btn-block" name="Sacuvaj" value="Сачувај"><br>
            
        <a class="dugme3 btn btn-primary btn-lg btn-block" href="<?php echo site_url($controller . "/ucenik/"); ?>">Врати се на ученика</a><br>    
            
        </div>

        <!--<input type="submit" value="Пошаљи">-->
    
    </form>
</div>






<div class="row">

    <?php
    $id = $_SESSION['ucenik']['iducenik'];
    $dir = "./uploads/$id";

// Open a directory, and read its contents
    if (is_dir($dir)) {
        if ($dh = opendir($dir)) {
            while (($file = readdir($dh)) !== false) {
                // echo "filename:" . $file . "<br>";

                $path = "$dir/$file";
                $ext = pathinfo($file, PATHINFO_EXTENSION);




                if ($file != ".." && $file != ".") {


                    echo "<div class='col-md-4'>";
                    echo "<br><br>";
                    //echo "<br><i class='far fa-file-alt fa-4x'></i><br>";
                    echo "<a class='white' href=" . base_url("uploads/$id/$file") . "><i class='far fa-file-alt fa-4x'></i><br>$file</a>";
                    echo "</div>";
                }
                ?>

                <?php
            }
        }
        closedir($dh);
    }
    ?>




</div>
<br><br>

        <div class="row">
    <div class="col-md-6">
        <!--<a class="dugme3 btn btn-primary btn-lg btn-block" href="<?php echo site_url($controller . "/ucenik/"); ?>">Врати се на ученика</a><br>-->
    </div>
    <div class="col-md-6">       
        <!--<a class="dugme1 btn btn-primary btn-lg btn-block" href="<?php echo site_url($controller . "/priznati_ispiti"); ?>">Признати испити</a><br>-->
    </div>
</div>