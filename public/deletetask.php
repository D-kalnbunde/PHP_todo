<?php
require_once '../src/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
    $song_id = $_POST['delete'];

    // prepare and bind
    $stmt = $conn->prepare("DELETE FROM `todo` WHERE `tracks`.`id` = (:songid)");
    $stmt->bindParam(':songid', $song_id);

    $stmt->execute();
    //we go to our index.php or rather our root
    header('Location: /');
} else {
    echo "That was not a POST, most likely GET";
}
