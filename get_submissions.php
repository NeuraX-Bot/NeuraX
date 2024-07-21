<?php
// get_submissions.php
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

$sql = "SELECT id, user_name, content, is_approved FROM submissions";
$result = $conn->query($sql);

$submissions = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $submissions[] = $row;
    }
} 

echo json_encode($submissions);

$conn->close();
?>
