<?php
require 'db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM game_developers WHERE id = ?");
$stmt->execute([$id]);
$dev = $stmt->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['submit'])) {
    $sql = "UPDATE game_developers SET 
        firstName=?, lastName=?, age=?, specialization=?, experienceYears=?, 
        favoriteEngine=?, email=? WHERE id=?";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $_POST['firstName'], $_POST['lastName'], $_POST['age'],
        $_POST['specialization'], $_POST['experienceYears'],
        $_POST['favoriteEngine'], $_POST['email'], $id
    ]);

    header("Location: index.php");
    exit();
}
?>

<form method="POST">
    <input type="text" name="firstName" value="<?= $dev['firstName']; ?>" required><br>
    <input type="text" name="lastName" value="<?= $dev['lastName']; ?>" required><br>
    <input type="number" name="age" value="<?= $dev['age']; ?>" required><br>
    <input type="text" name="specialization" value="<?= $dev['specialization']; ?>" required><br>
    <input type="number" name="experienceYears" value="<?= $dev['experienceYears']; ?>" required><br>
    <input type="text" name="favoriteEngine" value="<?= $dev['favoriteEngine']; ?>" required><br>
    <input type="email" name="email" value="<?= $dev['email']; ?>" required><br>

    <button type="submit" name="submit">Update</button>
</form>
