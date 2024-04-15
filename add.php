<?php
$host = 'localhost';
$db   = ' gestione_libreria';
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
    $titolo = $_POST['titolo'];
    $autore = $_POST['autore'];
    $anno = $_POST['anno_pubblicazione'];
    $genere = $_POST['genere'];

    $error = [];

    if (empty($titolo)) {
        $error['titolo'] = "Il campo titolo è obbligatorio";
    }
    if (empty($autore)) {
        $error['autore'] = "Il campo autore è obbligatorio";
    }
    if (empty($anno)) {
        $error['anno_pubblicazione'] = "Il campo anno è obbligatorio";
    }
    if (empty($genere)) {
        $error['genere'] = "Il campo genere è obbligatorio";
    }
    if (empty($error)) {
        $stmt = $pdo->prepare("INSERT INTO libri (titolo, autore, anno_pubblicazione ,genere) VALUES (:titolo, :autore, :anno_pubblicazione ,:genere)");
        $stmt->execute([
            ':titolo' => $titolo,
            ':autore' => $autore,
            ':anno_pubblicazione' => $anno,
            ':genere' => $genere,

        ]);
        header('Location:index.php');
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Form</title>
</head>

<body>
    <h1 class="mb-3 text-center bg-dark-subtle p-3">
        <i class="bi bi-book"></i> ADD BOOK
    </h1>
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <div class='my-3 g-3 card bg-dark-subtle border-0 shadow-lg  mb-5 bg-body-tertiary'>
                    <form method="post" novalidate class="p-5">
                        <label class="form-label" for="titolo">titolo</label><br>
                        <input type="text" name="titolo" id="titolo" class="border-3 rounded-2 w-100 text-center">
                        <div class="error text-danger"><?= $error["titolo"] ?? " " ?></div>
                        <br>
                        <br>
                        <label class="form-label" for="autore">autore</label><br>
                        <input type="text" name="autore" id="autore" class="border-3 rounded-2 w-100 text-center">
                        <div class="error text-danger"><?= $error["autore"] ?? " " ?></div>
                        <br>
                        <br>
                        <label class="form-label" for="anno">anno</label><br>
                        <input type="number" name="anno_pubblicazione" id="anno" class="border-3 rounded-2 w-100 text-center">
                        <div class="error text-danger"><?= $error["anno_pubblicazione"] ?? " " ?></div>
                        <br>
                        <br>
                        <label class="form-label" for="genere">genere</label><br>
                        <input type="text" name="genere" id="genere" class="border-3 rounded-2 w-100 text-center">
                        <div class="error text-danger"><?= $error["genere"] ?? " " ?></div>
                        <br>
                        <br>
                        <button class='m-3 btn btn-primary rounded-pill'>ADD <i class="bi bi-plus-circle"></i></button>


                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>