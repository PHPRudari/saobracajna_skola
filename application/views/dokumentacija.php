<?php
if (isset($error))
    echo $error;

if (!isset($_SESSION['ucenik']['iducenik'])) {
    echo 'Niste odabrali učenika';
    exit;
}
?>


<?php echo form_open_multipart('admin/do_upload'); ?>

Izaberite fajl(maksimalna veličina 2 Mb):<br>
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
<div class="row">
    <div class="col-md-12">
    <br><br>
    <a href="<?php echo site_url($controller . "/priznati_ispiti") ?>">Признати испити</a><br>
    <a href="<?php echo site_url($controller . "/ucenik") ?>">Ученик</a><br>
    </div>
</div>
