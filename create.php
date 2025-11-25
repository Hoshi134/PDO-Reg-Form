<?php
require 'db.php';

if (isset($_POST['submit'])) {
    $sql = "INSERT INTO game_developers 
    (firstName, lastName, age, specialization, experienceYears, favoriteEngine, email) 
    VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $_POST['firstName'],
        $_POST['lastName'],
        $_POST['age'],
        $_POST['specialization'],
        $_POST['experienceYears'],
        $_POST['favoriteEngine'],
        $_POST['email']
    ]);

    header("Location: index.php");
    exit();
}
?>

<form method="POST">
    <input type="text" name="firstName" placeholder="First Name" required><br>
    <input type="text" name="lastName" placeholder="Last Name" required><br>
    <input type="number" name="age" placeholder="Age" required><br>
    <input type="text" name="specialization" placeholder="Specialization" required><br>
    <input type="number" name="experienceYears" placeholder="Years of Experience" required><br>
    <input type="text" name="favoriteEngine" placeholder="Favorite Engine" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <button type="submit" name="submit">Create</button>
</form>
