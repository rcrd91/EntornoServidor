<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

    $phones = "123456;7890";
    $exploded = explode(';', $phones);
    $result = array();
    foreach ($exploded as $elem) {
        $result[] = array('numbers' => $elem);
    }
?>
    
</body>
</html>