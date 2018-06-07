<style>body { 
        font-size: 12px;
        font-family: DejaVu Sans }
    .tabela {
       padding-right:  20px;
       text-align: center;
    }
</style>



<div class="row">
    <div class="col-md-8">
        <div class="row">
  <br><h4><?php echo $_SESSION['ucenik']['ime'] . " " . $_SESSION['ucenik']['prezime']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; " .  $_SESSION['ucenik']['jedinstveni_broj_ucenik'] ?></h4> 
        <h4> Списак признатих испита</h4>
    </div>
    
</div>    
<?php
//var_dump ($_SESSION['priznati']);
//var_dump($_SESSION['pregled_prijava']);
?>

<?php
echo "<table class='table table-striped table-hover'>";
echo "<tr>";
echo "<th>Назив предмета</th>";
echo "<th>Година </th>";
echo "<th>Оцена </th>";
echo "</tr>";
$i = 1;

if ($_SESSION['priznati'] == NULL) {

    echo '<td>Ученик нема признатих испита.</td>';
} else
    foreach ($_SESSION['priznati'] as $row) {
   

        echo "<tr>";
        echo "<td>" . $row['naziv_predmet'] . "</td>";
        echo "<td class='tabela'>" . $row['godina_obrazovanja_idgodina_obrazovanja'] . "</td>";
        echo "<td class='tabela'>" . $row['ocena'] . "</td>";
       // echo "<td>" . $row['naziv_predmet'] . "</td>";
       // echo "<td class='tabela'>" . $row['godina_obrazovanja_idgodina_obrazovanja'] . "</td>";

           
    }
?>
