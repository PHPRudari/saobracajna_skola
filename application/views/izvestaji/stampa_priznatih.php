<style>body { 
        font-size: 14px;
        font-family: DejaVu Sans ;
        
            
    }
    .tabela {
       padding-right:  20px;
       text-align: center;
    }
    .table {
     text-align: left;
     line-height: 150%;
 }
</style>



<div class="row">
    <div class="col-md-8">
        <div class="row">
  <br><h4><?php echo $_SESSION['ucenik']['ime'] . " " . $_SESSION['ucenik']['prezime']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; " .  $_SESSION['ucenik']['jedinstveni_broj_ucenik'] ?></h4> 
        <h3> Списак признатих испита</h3>
    </div>
    
</div>    
<?php
//var_dump ($_SESSION['priznati']);
//var_dump($_SESSION['pregled_prijava']);
?>

<?php
echo "<table class='table'>";
echo "<tr>";
echo "<th class='table' width='400'>Назив предмета</th>";
echo "<th width='50'>Година </th>";
echo "<th width='50'>Оцена </th>";
echo "</tr>";
$i = 1;


    foreach ($_SESSION['priznati'] as $row) {
   

        echo "<tr>";
        echo "<td>" . $row['naziv_predmet'] . "</td>";
        echo "<td class='tabela'>" . $row['godina_obrazovanja_idgodina_obrazovanja'] . "</td>";
        echo "<td class='tabela'>" . $row['ocena'] . "</td>";
       // echo "<td>" . $row['naziv_predmet'] . "</td>";
       // echo "<td class='tabela'>" . $row['godina_obrazovanja_idgodina_obrazovanja'] . "</td>";

           
    }
?>
