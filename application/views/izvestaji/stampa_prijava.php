<style>body { 
        font-size: 12px;
        font-family: DejaVu Sans }
    .tabela {
       padding-right:  10px;
       text-align: center;
    }
    td {
        text-aliggn: center;
    }
   
</style>
<div class="row">
    <div class="col-md-8">
        <h4> Списак пријављених испита за <?php
            if (isset($_SESSION['rokk'])) {
                foreach ($_SESSION['rok'] as $rok) {
                    if ($rok['idtip_roka'] == $_SESSION['rokk']) {

                        echo $rok['naziv'];
                    }
                }
            } else {
                echo "";
            }
            ?>  рок <?php
                 if (!isset($_SESSION['dattum'])) 
                    echo " ";
                 else {                 
            
            if (($_SESSION['dattum']) == "Година") {
                echo " ";
            } else {
                
                echo $_SESSION['dattum'];
            }
                 }
            ?>. године </h4>
    </div>
    
</div>    
<?php
//var_dump($_SESSION['rok']);
//var_dump($_SESSION['pregled_prijava']);
?>

<?php
echo "<table>";
echo "<tr>";
echo "<th >Редни број:</th>";
echo "<th>Ученик</th>";
echo "<th>Презиме </th>";
echo "<th>Име </th>";
//echo "<th style='width: 350px'>Naziv predmeta</th>;
echo "<th>Назив предмета</th>";
echo "<th>Година</th>";
echo "</tr>";
$i = 1;

if ($prijavljeni == NULL) {

    echo '<tr><td>Nema prijavljenih ispita u ovom roku</td></tr>';
} else
{
    $i=1;
    foreach ($prijavljeni as $row) {

            echo "<tr>";
            echo "<td  class='tabela' width='30'>".$i."</td>";
            echo "<td  class='tabela' width='50'>" . $row['jedinstveni_broj_ucenik'] . "</td>";
            echo "<td class='tabela' width='60'>" . $row['prezime'] . "</td>";
            echo "<td class='tabela' width='60'>" . $row['ime'] . "</td>";
            echo "<td class='naziv' width='200'>" . $row['naziv_predmet'] . "</td>";
            echo "<td class='tabela' width='60'>" . $row['godina_obrazovanja_idgodina_obrazovanja'] . "</td>";
            $i++;

    }
}
?>
</table>