<?php 
    include __DIR__.'/vars.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>
</head>
<body>
    <?php foreach ($hotels as $hotel){ ?>
        <div>
        <?php   echo $hotel ['name'].'<br>'; 
                echo $hotel ['description'].'<br>';
                echo $hotel ['vote'].'<br>';
                echo $hotel ['distance_to_center'].'<br>';
        ?>
        </div>
            
    <?php } ?>
</body>
</html>