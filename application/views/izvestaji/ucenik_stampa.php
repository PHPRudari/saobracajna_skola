<?php


$ispiti=$_SESSION['prijava_ucenik'];
//var_dump($ispiti);
?>


<style>
    
 body { 
     font-family: DejaVu Sans;
     font-size: 13px;
        
 }

 .red1 {
     width:700px;
    /* border-top: 1px solid black;*/
 }
 .table {
     text-align: left;
 }

 .table1 {
     text-align: right;
 }


</style>
<div class="row red1">
  <br><h4><?php echo $_SESSION['ucenik']['ime'] . " " . $_SESSION['ucenik']['prezime']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; " .  $_SESSION['ucenik']['jedinstveni_broj_ucenik'] ?></h4> 
<?php 

echo "<table  width='500'>";
echo "<tr>";
echo "<th width='250' class='table'>Назив предмета</th>";
echo "<th width='30' class='table'>Година </th>";
echo "<th width='70'class='table'>Рок</th>";
echo "<th width='50' class='table'>Оцена</th>";
echo "<th width='100'class='table'>Датум полагања</th>";

echo "</tr>";



foreach ($ispiti as $red) {
echo "<tr>";
    echo "<td>".$red['naziv_predmet']."</td>";
    echo "<td>".$red['godina_obrazovanja_idgodina_obrazovanja']."</td>"; 
    foreach ($_SESSION['rok'] as $rok) {
           if ($rok['idtip_roka']==$red['rok_idtip_roka']) {
                     
            echo "<td class='table'>".$rok['naziv']."</td>";
         
            echo "<td>________</td>";
             echo "<td>____________________</td>";
            
           }
}
 
 echo '</tr>';
}


echo "</table>"
?>
       <
</div>


