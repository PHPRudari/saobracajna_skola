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
                //var_dump($ext);

                if ($file != ".." && $file != ".") {
                   
                                                         
                    
                    
                    if ($ext == "txt" ) {
                        echo "<br>filename:" . $file . "<br>";
                        echo "<i class='far fa-file-alt fa-10x'></i><br>";
                    } 
                    
                    else if ($ext == "jpg" || $ext=="png" ) {
                            echo "<br>filename:" . $file . "<br>";
                            echo "<i class='far fa-image fa-10x'></i><br>";
                        }
                        else if ($ext == "pdf") {
                                echo "<br>filename:" . $file . "<br>";
                                echo "<i class='far fa-file-pdf fa-10x'></i><br>";
                            }
                        
                    
                }
                        ?>

                        <?php
                    
                
            }

            closedir($dh);
        }
    }
    ?>





</div>
