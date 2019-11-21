<?php

require_once 'functions.php';

$db = connectDb();
$items= getDatafromDB($db);
$html = displayItems($items);

?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="normalize.css">
        <link rel="stylesheet" type="text/css" href="styles.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Shopping list</title>
    </head>

    <body>
        <header>
            <h1 class="list">Shopping list</h1>
            <a href="addItem.php">Add Item</a>
        </header>
        <section class="container">

    <?php echo $html; ?>

        </section>
    </body>
</html>