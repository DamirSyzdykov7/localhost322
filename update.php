<?php
require "connection.php";

if(isset($_GET['id']) && isset($_POST['name']) && isset($_POST['author']) && isset($_POST['year']) && isset($_POST['name_of_reader']) && isset($_POST['reader']) && isset($_POST['language']) && isset($_POST['before_readers'])){
    $id = $_GET['id'];
    $name = $_POST['name'];
    $author = $_POST['author'];
    $year = $_POST['year'];
    $name_of_reader = $_POST['name_of_reader'];
    $reader = $_POST['reader'];
    $language = $_POST['language'];
    $before_readers = $_POST['before_readers'];


    $query = $database->prepare("UPDATE library SET name = :name, author = :author, year = :year, name_of_reader = :name_of_reader, reader = :reader, language = :language, before_readers = :before_readers  WHERE id = :id");
    $query->bindParam(':id', $id);
    $query->bindParam(':name', $name);
    $query->bindParam(':author', $author);
    $query->bindParam(':year', $year);
    $query->bindParam(':name_of_reader', $name_of_reader);
    $query->bindParam(':reader', $reader);
    $query->bindParam(':language', $language);
    $query->bindParam(':before_readers', $before_readers);

    if ($query->execute()) {
        echo "Данные пользователя успешно обновлены!";
    } else {
        echo "Произошла ошибка при обновлении данных пользователя.";
    }
}

$query = $database->prepare("SELECT * FROM library WHERE id = :id");
$params = [
    ':id' => $_GET['id']
];
$query->execute($params);
$user = $query->fetch();
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
<form action="" method="POST">
<div class="mb-3">
        <label for="id" class="id">id</label>
        <input type="text" name="id" class="form-control" value="<?php echo $user['id'] ?? ''?>">
    </div>
    <div class="mb-3">
        <label for="name" class="name">name</label>
        <textarea name="name"  class="form-control"><?php echo $user['name'] ?? ''?></textarea>
    </div>
    <div class="mb-3">
        <label for="author" class="author">author</label>
        <textarea name="author"  class="form-control"><?php echo $user['author'] ?? '' ?></textarea>
    </div>
    <div class="mb-3">
        <label for="year" class="year">year</label>
        <textarea name="year"  class="form-control"><?php echo $user['year'] ?? '' ?></textarea>
    </div>
    <div class="mb-3">
        <label for="name_of_reader" class="name_of_reader">name_of_reader</label>
        <textarea name="name_of_reader"  class="form-control"><?php echo $user['name_of_reader'] ?? ''?></textarea>
    </div>
    <div class="mb-3">
        <label for="reader" class="reader">reader</label>
        <textarea name="reader"  class="form-control"><?php echo $user['reader'] ?? '' ?></textarea>
    </div>
    <div class="mb-3">
        <label for="language" class="language">language</label>
        <textarea name="language"  class="form-control"><?php echo $user['language'] ?? '' ?></textarea>
    </div>
    <div class="mb-3">
        <label for="before_readers" class="before_readers">before_readers</label>
        <textarea name="before_readers"  class="form-control"><?php echo $user['before_readers'] ?? '' ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Сохранить</button>
    <div class="button mt-3">
                <a href="watch.php?id=<?=$_GET['id']?>" class="btn btn-warning">вернутся</a>
            </div>
</form>
</body>
</html>
