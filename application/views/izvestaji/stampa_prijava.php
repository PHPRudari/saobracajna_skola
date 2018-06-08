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


<?php var_dump($results);
?>
<br>
<h3>Преглед пријава</h3>
<div class="row">
    <div class="col-md-6">
        <h5> Списак пријављених испита за <?php
              if ($rok) {
               
                foreach ($_SESSION['rok'] as $rokk) {
                    if ($rokk['idtip_roka'] == $rok) {

                        echo $rokk['naziv'];
                    }
                }
            } else {
                echo "";
            }
            ?>  рок <?php
                 if (!isset($godina)) 
                    echo " ";
                 else {                 
            
                        if ($godina == "Година") {
                            echo " ";
                        } else {

                            echo $godina;
                        }
                 }
            ?>. године </h5>
    </div>
    <div class="col-md-6"> 
        <a class="dugme1 btn btn-primary btn-lg btn-block" target="_blank" href="<?php echo site_url($controller . "/pregled_prijava_stampa/".$godina."/".$rok) ?>">Штампај пријављене испите</a><br>
                <a class="dugme3 btn btn-primary btn-lg btn-block" href="<?php echo site_url($controller . "/statistika/") ?>">Врати се назад</a><br>
<!--        <a class="nav-link" href="<?php echo site_url("direktor/statistika/") ?>">Статистика</a>-->



    </div>
</div>    
<?php
//var_dump($_SESSION['rok']);
//var_dump($_SESSION['pregled_prijava']);
?>

<?php

echo "<table class='table table-striped table-hover'>";
echo "<tr>";
echo "<th>Ученик</th>";
echo "<th>Презиме </th>";
echo "<th>Име </th>";
echo "<th>Назив предмета</th>";
echo "<th>Година</th>";
echo "</tr>";
$i = 1;

if ($results == NULL) {
    echo '<td>Нема пријављених испита у овом року.</td>';
} else
    foreach ($results as $row) {

        echo "<tr>";
        echo "<td>" . $row->jedinstveni_broj_ucenik . "</td>";
        echo "<td>" . $row->prezime . "</td>";
        echo "<td>" . $row->ime . "</td>";
        echo "<td>" . $row->naziv_predmet . "</td>";
        echo "<td>" . $row->godina_obrazovanja_idgodina_obrazovanja . "</td>";
        echo "</tr>";



    }
    

 echo "<tr>"; 
 echo "<td colspan='5'align='right' class='paginacija'>". $links."</td>";
echo "</tr>";
?>
<!--
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>-->

 

</table>
