<?php


$ispiti=$_SESSION['prijava_ucenik'];
//var_dump($ispiti);
?>

<style>body { font-family: DejaVu Sans }</style>
<div class="row">
  <br><h4><?php echo $_SESSION['ucenik']['ime'] . " " . $_SESSION['ucenik']['prezime']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; " .  $_SESSION['ucenik']['jedinstveni_broj_ucenik'] ?></h4> 
<?php 

echo "<table class='table table-striped table-hover'>";
echo "<tr>";
echo "<th>Naziv predmeta</th>";
echo "<th>Godina </th>";
echo "<th>Rok</th>";
echo "<th>Оцена</th>";
echo "<th>Датум полагања</th>";
echo "</tr>";


foreach ($ispiti as $red) {
echo "<tr>";
    echo "<td>".$red['naziv_predmet']."</td>";
    echo "<td>".$red['rok_idtip_roka']."</td>"; 
    foreach ($_SESSION['rok'] as $rok) {
           if ($rok['idtip_roka']==$red['rok_idtip_roka']) {
                     
            echo "<td>".$rok['naziv']."</td>";
         
            echo "<td>____</td>";
             echo "<td>___________</td>";
            
           }
}
 
 echo '</tr>';
}


echo "</table>"
?>
       <
</div>


