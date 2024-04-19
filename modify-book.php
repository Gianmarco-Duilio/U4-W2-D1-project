<?php
$host = 'localhost';
$db   = 'gestione_libreria';
$user = 'root';
$pass = '';

$dsn = "mysql:host=$host;dbname=$db";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];


$pdo = new PDO($dsn, $user, $pass, $options);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_GET['id'];
    $titolo = $_POST['titolo'];
    $autore = $_POST['autore'];
    $anno = $_POST['anno_pubblicazione'];
    $genere = $_POST['genere'];
    $error = [];

    if (empty($titolo)) {
        $error['titolo'] = "il campo è obbligatorio";
    }
    if (empty($autore)) {
        $error['autore'] = "il campo è obbligatorio";
    }
    if (empty($anno)) {
        $error['anno_pubblicazione'] = "il campo è obbligatorio";
    }
    if (empty($genere)) {
        $error['genere'] = "il campo è obbligatorio";
    }
    if (empty($error)) {


        $stmt = $pdo->prepare("UPDATE libri SET titolo=:titolo,autore=:autore,anno_pubblicazione=:anno_pubblicazione,genere=:genere WHERE id=:id");

        $stmt->execute([
            ':id' => $id,
            ':titolo' => $titolo,
            ':autore' => $autore,
            ':anno_pubblicazione' => $anno,
            ':genere' => $genere,


        ]);
        header('Location:index.php');
    }
}
