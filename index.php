<?php
require "connection.php";
$query2 = $database->prepare("SELECT id, name,author FROM library ");
$params = [
    //$_GET['id']
];
$query2->execute($params);


?>

<!DOCTYPE html>
<html lang='ru'>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <link href="data:image/x-icon;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQEAYAAABPYyMiAAAABmJLR0T///////8JWPfcAAAACXBIWXMAAABIAAAASABGyWs+AAAAF0lEQVRIx2NgGAWjYBSMglEwCkbBSAcACBAAAeaR9cIAAAAASUVORK5CYII=" rel="icon" type="image/x-icon">
    <title>Добро пожаловать!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <form action="">
        <div class="card pb-4" style="width: 700px">
        <p class="text-center">LIBRARY</p>
            <div class="card mt-4">
            </div>
 <?php   $query = $database->query("SELECT * FROM library");
                $books = $query->fetchAll();
                foreach($books as $book1){
                ?>
            <div class="card mt-4">
               
                <h2><?php echo $book1['name']?></h2>
                <h4><?php echo $book1['author']?></h4>
                
            </div>
            <div class="button mt-3">
                <a href="watch.php?id=<?= $book1["id"] ?>" class="btn btn-warning">посмотреть</a>
            </div>
            <?php }?>
        </div>
    </form>
</body>
</html>