<?php

/**
 * function creates PDO to connect to groceries database
 *
 * returns associative array
 */
function connectDb(): PDO
{
    $db = new PDO('mysql:host=db; dbname=groceries', 'root', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $db;
}

/**
 * @param $db extracts item data from groceries
 *
 * @return associative array for each item is returned
 */
function getDatafromDB($db)
{
    $query = $db->prepare("SELECT `id`, `item` FROM `list`;");
    $query->execute();
    $result = $query->fetchAll();
    return $result;
}

/**
 * @param array $modelOrganisms for each model organism
 *
 * @return div with data points as a list
 */
function displayItems(array $items): string
{
    $output = '';

    foreach ($items as $item) {
        if (array_key_exists('item', $item)) {
            $output .= '<div class= "item">';
            $output .= '<ul>';
            $output .= '<li> Item: ' . $org['item'] . '</li>';
            $output .= '</div>';
        } else {
            $output .= "There was an error displaying the items on the page";
        }
    }
    return $output;
}

/**
 * function to add new item to the collection with binding params
 *
 * @param array $newValues adds the new values input by user
 *
 * @param PDO $db database object
 */
function addItems(array $newValues, PDO $db)
{
    $statement = "INSERT INTO `list` (`item`) VALUES (:item);";

    $query = $db->prepare($statement);


    $query->bindParam(':item', $newValues['item']);
    $query->execute();
}

/**
 * This function sanitises inputted array
 *
 * @param array $data array to be sanitised
 *
 * @return array sanitised array
 */
function sanitise(array $data): array
{

    foreach ($data as $key => $item) {
        $sanitisedData[$key] = filter_var($data[$key], FILTER_SANITIZE_STRING);
    }
    return $sanitisedData;
}