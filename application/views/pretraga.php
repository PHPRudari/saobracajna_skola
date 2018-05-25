<?php
 echo "Ime Prezime  <br>";
 foreach ($pretraga as $row)     {
 echo $row['ime']."&nbsp";
 echo $row['prezime']."&nbsp";
 echo $row['idprofesor']."<br>";
 }
 //echo $pretraga;
 $POST[]=$pretraga;
 
// print_r ($pretraga);
 ?>

<?php echo form_open($controller . '/unesi_profesora'); ?>
<!--<form name="profesor" method="POST" action="<//?php echo site_url("admin/unesi_profesora") ?>">-->


<?php
//foreach ($data as $imena) {
 //   echo $imena['ime'];
//}
?>

<!--<a href="<?//php echo site_url($controller."/unesi_profesora/".$idprofesor); ?>"
                               onclick="return confirm('Da li ste sigurni da zelite da izmenite profesora?' );">Izmeni</a><br>-->
<input type="text" name="idprofesor" placeholder="Идентификациони број"><br><br><br>
Име: <input  type="text" name="ime" value="<?php echo $row["ime"]; ?>" 
             placeholder="Унеси име"><?php echo form_error("ime", '<span style="color:red">', '</span>'); ?><br>
Презиме: <input  type="text" name="prezime" value="<?php echo $row["prezime"]; ?>" 
                 placeholder="Унеси презиме"><?php echo form_error("prezime", '<span style="color:red">', '</span>'); ?><br>
Адреса: <input  type="text" name="adresa" value="<?php echo $row["adresa"]; ?>" 
                placeholder="Унеси адресу"><?php echo form_error("adresa", '<span style="color:red">', '</span>'); ?><br>
Број телефона: <input  type="tel" name="broj_telefon" value="<?php echo $row["broj_telefon"]; ?>" 
                       placeholder="Унеси телефон"><?php echo form_error("broj_telefon", '<span style="color:red">', '</span>'); ?><br>
Адреса електронске поште: <input type="email" name="e-mail" value="<?php echo $row["e-mail"]; ?>" 
                                 placeholder="Унеси e-mail"><?php echo form_error("e-mail", '<span style="color:red">', '</span>'); ?><br>
<select name="titula">
    <option value="<?php ?>">Титула</option>      
</select><br>
<!-- treba uneti predmete -->
<select name="predmet">
    <option value="<?php ?>">Предмет</option>      
</select>
<input type="submit" name="dodaj" value="Додај"><br>
<input type="radio" name="angazovan" value="1" checked>Редован
<input type="radio" name="angazovan" value="2" >Ангажован<br>
<!-- <a href="<//?php echo site_url("admin/index")?>">Врати се назад</a>-->
<input type="submit" name="sacuvaj" value="Сачувај">

</form>
