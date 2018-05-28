<?php
if (isset($error))
    echo $error;

if (!isset($_SESSION['ucenik']['iducenik'])) {
    echo 'Niste odabrali učenika';
    exit;
}
?>


<?php echo form_open_multipart('admin/do_upload'); ?>

Izaberite fajl:<br>
<input type="file" name="userfile" value="Izaberite fajl" size="20" />

<br /><br />

<input type="submit" value="Пошаљи">
</form>








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
                    echo "<br><i class='far fa-file-alt fa-4x'></i><br>";
                    echo "<a href=" . base_url("uploads/$id/$file") . ">$file</a>";
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
