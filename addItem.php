<html lang="en-GB">
    <head>
        <link rel="stylesheet" type="text/css" href="normalize.css">
        <link rel="stylesheet" type="text/css" href="styles.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Add an item to your shopping list</title>
    </head>
    <body>
        <h1>Add an item to your list:</h1>
        <form method="post" action="addToDb.php?allowed=true">
            <label for="item">Item: </label>
            <input id=“item“ type="text" name="item" required/>
            <input type="submit" value="Submit"/>
        </form>
    </body>
</html>