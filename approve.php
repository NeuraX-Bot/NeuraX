<?php
// approve.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database";

// Crée une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifie la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];

$sql = "UPDATE submissions SET is_approved = 1 WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
