<?php
if (isset($error))
    echo $error;
?>


<?php echo form_open_multipart('admin/do_upload'); ?>

Izaberite fajl:<br>
<input type="file" name="userfile" value="Izaberite fajl" size="20" />

<br /><br />

<input type="submit" value="Пошаљи" />
</form>


<div>
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


                if ($file != ".." && $file != ".")
                    if ($ext <> "jpg") {
                        echo "<br>filename:" . $file . "<br>";
                        echo "nije slika!<br>";
                    } else {

                        echo "filename:" . $file . "<br>";
                        //echo $ext."<br>";
                        ?>
    <img class="slika img img-fluid" src=<?php echo base_url("uploads/$id/$file"); ?>   <br> 
                    <?php
                    }
            }

            closedir($dh);
        }
    }
    ?>





</div>
