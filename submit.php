<?php
// submit.php
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

$user_name = $_POST['user_name'];
$content = $_POST['content'];

$sql = "INSERT INTO submissions (user_name, content) VALUES ('$user_name', '$content')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
