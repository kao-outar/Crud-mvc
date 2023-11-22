<?php include(VIEWS.'inc/header.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        <?php
        foreach($products as $prod):?>
        <li><?php echo $prod['name'];?></li>
        <?php endforeach?>
    </ul> 
</body>
</html>