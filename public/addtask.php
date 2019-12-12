<?php
session_start();
if (!$_SESSION['id']) {
    header('Location: /');
    return; //We do not add todos for unregistered users
}
require_once '../src/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //we need to add song to database
    $title = $_POST['title'];
    $task = $_POST['task'];
    $user_id = $_SESSION['id'];

    // prepare and bind
    $stmt = $conn->prepare("INSERT INTO todo (title, task, user_id)
                            VALUES (:title, :task, :user_id)");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':task', $task);
    $stmt->bindParam(':user_id', $user_id);

    $stmt->execute();
    //we go to our index.php or rather our root
    header('Location: /');
} else {
    echo "POST?, most likely GET!";
}
