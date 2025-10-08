<?php
include 'db.php';

$title = $_POST['title'];
$description = $_POST['description'];
$due_date = $_POST['due_date'];

$sql = "INSERT INTO tasks (title, description, due_date) VALUES ('$title', '$description', '$due_date')";
$conn->query($sql);

header("Location: index.php");
exit;
?>
