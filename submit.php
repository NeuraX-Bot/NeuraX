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
$server_name = $_POST['server_name'];
$server_logo = $_POST['server_logo'];
$server_link = $_POST['server_link'];
$server_description = $_POST['server_description'];
$content = $_POST['content'];

$sql = "INSERT INTO submissions (user_name, server_name, server_logo, server_link, server_description, content)
        VALUES ('$user_name', '$server_name', '$server_logo', '$server_link', '$server_description', '$content')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";

    // Envoie un email à l'administrateur
    $to = 'matheo.miclo122@gmail.com';  // Remplacez par l'email de l'administrateur
    $subject = 'Nouvelle soumission de contenu';
    $message = "Bonjour Admin,\n\nUne nouvelle soumission de contenu a été reçue.\n\n"
               . "Nom de l'utilisateur: $user_name\n"
               . "Nom du serveur: $server_name\n"
               . "Logo du serveur: $server_logo\n"
               . "Lien du serveur: $server_link\n"
               . "Description du serveur: $server_description\n"
               . "Contenu: $content\n\n"
               . "Veuillez vérifier et approuver la soumission.";
    $headers = 'From: no-reply@example.com' . "\r\n" .
               'Reply-To: no-reply@example.com' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
