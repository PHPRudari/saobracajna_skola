<html>

<head>

<title>File Upload Success </title>

</head>

<body>

<h3>Your file was uploaded successfully </h3>

<ul>

<?php foreach ($upload_data as $item => $value):?>

<li><?php echo $item;?>: <?php echo $value;?></li>

<?php endforeach; ?>

</ul>

<p>

<?php echo anchor("admin/dokumentacija", 'Other files uploaded!'); ?>

</p>

</body>

</html>
 