<?php
include 'db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM tasks WHERE id=$id");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Task</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <h2>Edit Task</h2>
  <form method="POST">
    <input type="hidden" name="id" value="<?= $row['id']; ?>">
    <div class="mb-3">
      <label>Title</label>
      <input type="text" name="title" class="form-control" value="<?= $row['title']; ?>">
    </div>
    <div class="mb-3">
      <label>Description</label>
      <input type="text" name="description" class="form-control" value="<?= $row['description']; ?>">
    </div>
    <div class="mb-3">
      <label>Due Date</label>
      <input type="date" name="due_date" class="form-control" value="<?= $row['due_date']; ?>">
    </div>
    <button name="update" class="btn btn-primary">Update</button>
  </form>
</div>

<?php
if(isset($_POST['update'])){
  $id = $_POST['id'];
  $title = $_POST['title'];
  $description = $_POST['description'];
  $due_date = $_POST['due_date'];

  $sql = "UPDATE tasks SET title='$title', description='$description', due_date='$due_date' WHERE id=$id";
  $conn->query($sql);

  header("Location: index.php");
}
?>
</body>
</html>
