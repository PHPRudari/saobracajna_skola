<html>

<head>

<title>Додавање докумената </title>

</head>

<body>

<h3>Документ је успешно додат! </h3>

<ul>

<?php foreach ($upload_data as $item => $value):?>

<!--<li><?php// echo $item;?>: <?php// echo $value;?></li>-->
    
<?php endforeach; ?>

</ul>

<p>

<?php echo anchor("admin/dokumentacija", '<b>Додај нови документ!</b>'); ?>

</p>

</body>

</html>
 