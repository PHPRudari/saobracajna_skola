
<?php
$ispiti = $_SESSION['priznati'];
?>

<!--<style>body { font-family: DejaVu Sans }</style>-->
<br>
<h3>Преглед признатих испита:</h3>

<div class="row">
    <div class="col-md-6">
        <br>
     <a class="dugme3 btn btn-primary btn-lg btn-block col-sm-6" href="<?php echo site_url($controller . "/priznati_ispiti") ?>">Врати се на признате испите</a><br>
    </div>
    <div class="col-md-6">
        <br>
        <a class="dugme1 btn btn-primary btn-lg btn-block" href="<?php echo site_url($controller . "/stampa/stampa_priznatih") ?>">Штампај признате испите</a><br>
    </div>

</div>

<div class="row">

<?php
echo "<table class='table table-striped table-hover'>";
echo "<tr>";
echo "<th>Назив предмета</th>";
echo "<th>Година </th>";
//echo "<th>Пријављено за рок</th>";
echo "<th></th>";
echo "</tr>";


foreach ($ispiti as $red) {
    echo "<tr>";
    echo "<td>" . $red['naziv_predmet'] . "</td>";
    echo "<td>" . $red['godina_obrazovanja_idgodina_obrazovanja'] . "</td>";
    ?>
    <td><a href="<?php echo site_url($controller . "/obrisi_priznati_ispit/".$red['idpredmet'] ); ?>"
           onclick="return confirm('Да ли сте сигурни да желите да обришете признати испит?');">Обриши</a></td>
        <?php
        echo '</tr>';

    }


    echo "</table>"
    ?>

</div>

