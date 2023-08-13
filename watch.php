<?php
require "connection.php";

if(isset($_GET['id'])){
    $query = $database->prepare("SELECT * FROM library WHERE id = :id");
    $params = [
        ':id' => $_GET['id']
    ];
    $query->execute($params);
    $book = $query->fetch();
}
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
        <p class="text-center">BOOK</p>
        <?php if(isset($book)): ?>
            <div class="card mt-4">
                <h3>id: <?php echo $book['id']?></h3>
                <h2>название: <?php echo $book['name']?></h2>
                <h3>автор: <?php echo $book['author']?></h3>
                <h3>год: <?php echo $book['year']?></h3>
                <h3>имя читателя: <?php echo $book['name_of_reader']?></h3>
                <h3>читатель: <?php echo $book['reader']?></h3>
                <h3>язык: <?php echo $book['language']?></h3>
                <h3>прочитавшие: <?php echo $book['before_readers']?></h3>
            </div>
        <?php else: ?>
            <div class="alert alert-danger" role="alert">Книга не найдена</div>
        <?php endif; ?>
        <div class="button mt-3">
                <a href="update.php?id=<?= $book["id"] ?>" class="btn btn-warning">редактировать</a>
            </div>
            <div class="button mt-3">
                <a href="index.php" class="btn btn-warning">вернутся</a>
            </div>
            <div class="button mt-3">
                <a href="delete.php?id=<?= $book["id"] ?>" class="btn btn-warning">удалить</a>
            </div>
    </div>
</form>
</body>
</html>
