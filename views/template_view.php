<!DOCTYPE html> 
<html lang="ru"> 
<head> 
<meta charset="utf-8"> 
<title>Главная</title> 
</head> 

<body>
    <div>
        <a href="index.php">Галерея</a>
        <?php if (empty($_SESSION['userId'])): ?>
            <a href="index.php?url=login">Вход</a>
        <?php endif; ?>
        <?php if (!empty($_SESSION['userId'])): ?>
            <a href="index.php?url=upload">Загрузка файлов</a>
        <?php endif; ?>
        <?php if (!empty($_SESSION['userId'])): ?>
            <a href="index.php?url=unlogin">Выход</a>
        <?php endif; ?>
    </div>
    <?php include $content_view; ?></body> 
</html>