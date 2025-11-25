<?php
require 'db.php';

$stmt = $pdo->query("SELECT * FROM game_developers ORDER BY id DESC");
$developers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<link rel="stylesheet" href="style.css">
<h1>Game Developer Registry</h1>

<a href="create.php" class="add-btn">➕ Add New Developer</a>

<a href="create.php">Add New Developer</a>
<table border="1" cellpadding="10">
    <tr>
        <th>ID</th><th>Name</th><th>Age</th><th>Specialization</th>
        <th>Experience</th><th>Engine</th><th>Email</th><th>Actions</th>
    </tr>

    <?php foreach ($developers as $dev): ?>
    <tr>
        <td><?= $dev['id']; ?></td>
        <td><?= $dev['firstName'] . " " . $dev['lastName']; ?></td>
        <td><?= $dev['age']; ?></td>
        <td><?= $dev['specialization']; ?></td>
        <td><?= $dev['experienceYears']; ?> years</td>
        <td><?= $dev['favoriteEngine']; ?></td>
        <td><?= $dev['email']; ?></td>

        <td>
            <a href="update.php?id=<?= $dev['id']; ?>">Edit</a>
            <a href="delete.php?id=<?= $dev['id']; ?>" 
               onclick="return confirm('Are you sure?');">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
