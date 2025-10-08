<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>To-Do App</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <h2 class="mb-4 text-center">📝 To-Do List</h2>

  <!-- Add Task Form -->
  <form action="add.php" method="POST" class="mb-4">
    <div class="row">
      <div class="col-md-4">
        <input type="text" name="title" class="form-control" placeholder="Task Title" required>
      </div>
      <div class="col-md-4">
        <input type="date" name="due_date" class="form-control">
      </div>
      <div class="col-md-3">
        <input type="text" name="description" class="form-control" placeholder="Description">
      </div>
      <div class="col-md-1">
        <button type="submit" class="btn btn-primary w-100">Add</button>
      </div>
    </div>
  </form>

  <!-- Task List -->
  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Due Date</th>
        <th>Created</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $sql = "SELECT * FROM tasks ORDER BY id DESC";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()):
      ?>
      <tr>
        <td><?= $row['id']; ?></td>
        <td><?= htmlspecialchars($row['title']); ?></td>
        <td><?= htmlspecialchars($row['description']); ?></td>
        <td><?= $row['due_date']; ?></td>
        <td><?= $row['created_at']; ?></td>
        <td>
          <a href="update.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
          <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this task?');">Delete</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

</body>
</html>
