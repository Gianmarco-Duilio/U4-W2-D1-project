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

$stmt = $pdo->query('SELECT * FROM libri');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>libri</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar bg-dark-subtle mb-5">
        <div class="container-fluid">
            <a href="http://localhost/Corso%20Epicode-Ifoa%20Back%20End/U4-W2-D1-project/" class="navbar-brand fs-2  ms-5"> <i class="bi bi-book"></i> Libreria</a>
            <a href="http://localhost/Corso%20Epicode-Ifoa%20Back%20End/U4-W2-D1-project/add.php" class="btn btn-success me-5  rounded-pill"> <i class="bi bi-plus-circle"></i> Add Book</a>
        </div>
    </nav>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">TITOLO</th>
                    <th scope="col">AUTORE</th>
                    <th scope="col">ANNO</th>
                    <th scope="col">GENERE</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($stmt as $book) {
                    echo
                    "<tr>
                      <th class='text-primary'>$book[titolo]</th>
                      <td>$book[autore]</td>  
                      <td>$book[anno_pubblicazione]</td>
                      <td>$book[genere]</td> 
                      <td>  
                        <a href='delete.php?id=$book[id]' class='btn btn-danger rounded-start-pill'><i class='bi bi-trash'></i></a></div>
                        <a href='http://localhost/Corso%20Epicode-Ifoa%20Back%20End/U4-W2-D1-project/modify.php?id=$book[id]' class='btn btn-primary rounded-end-pill'><i class='bi bi-pencil'></i></a></div>
                      </td>
                     </tr>";
                } ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>