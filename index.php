<?php
require 'db.php';
?>
<!DOCTYPE html>
<html lang="en" xmlns="">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Main Page</title>
</head>
<body>
        <div id="row" class="bookSection">
            <div class="sort">
                <form method="post">
                <button type="submit" name="sortName">
                    Сортировать по названию
                </button>
                <button type="submit" name="sortDate">
                    Сортировка по году издания
                </button>
                </form>
        </div>

            <div class="filter">
            <select size="3">
                <option id="filterListAuthor">
                    Фильтр по автору
                </option>
                <option id="filterListName">
                   Фильтр по жанру
                </option>
                <option id="filterListDate">
                    Фильтр по дате
                </option>
            </select>
            <div id="filter-by-author">
                <form method="post">
                    <input type="text" name="filter-auth" placeholder="Введите автора"></input>
                    <button type="submit">Фильтровать</button>
                </form>
            </div>
            <div  id="filter-by-name">
                <form method="post">
                    <input type="text" name="filter-bookName" placeholder="Введите название"></input>
                    <button type="submit">Фильтровать</button>
                </form>
            </div>
            <div id="filter-by-date">
                <form method="post">
                    <input type="text" name="filter-date" placeholder="Введите дату выпуска"></input>
                    <button type="submit">Фильтровать</button>
                </form>
            </div>
            </div>
            <div class="btnSection">
                <p><button id="addButton">Добавить книгу</button></p>
                <p><button id="editAuthors">Изменить автора</button></p>
            </div>
            <select name="page-select" id="page-select" class="navigation">
                <?php
                $query = $db->query("SELECT id FROM library");
                $units = $query->rowCount();
                $pageNumbers = $units / 10;
                $pages = ceil($pageNumbers);
                echo $pages;
                for ($i = 1; $i <=$pages; $i++){
                    echo "<option>" . $i . "</option>";
                }
                ?>
            </select>
            <?php
                if (!empty($_POST['filter-auth'])) {
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $limit = 10;
                    $offset = $limit * ($page - 1);
                    $allTheBooks = getBooksByAuthor($limit, $offset);
                } elseif (!empty($_POST['filter-bookName'])){
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $limit = 10;
                    $offset = $limit * ($page - 1);
                    $allTheBooks = getBooksByName($limit, $offset);
                } elseif (!empty($_POST['filter-date'])){
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $limit = 10;
                    $offset = $limit * ($page - 1);
                    $allTheBooks = getBooksByDate($limit, $offset);
                } elseif (isset($_POST['sortName'])) {
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $limit = 10;
                    $offset = $limit * ($page - 1);
                    $allTheBooks = getAllBooksSortName($limit, $offset);
                } elseif (isset($_POST['sortDate'])) {
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $limit = 10;
                    $offset = $limit * ($page - 1);
                    $allTheBooks = getAllBooksSortDate($limit, $offset);
                } else {
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $limit = 10;
                    $offset = $limit * ($page - 1);
                    $allTheBooks = getAllBooks($limit, $offset);
                }
            ?>
                 <?php foreach ($allTheBooks as $oneBook):?>
            <div class="book" style="border: 1px solid cornflowerblue">
                <p>Название: <?php echo $oneBook['bookName'];?></p>
                <p>Авторство: <?php echo $oneBook['authorName'];?></p>
                <p>Жанр: <?php echo $oneBook['genre'];?></p>
                <p>Кол-во страниц: <?php echo $oneBook['pages'];?></p>
                <p>Дата издания: <?php echo $oneBook['writeDate'];?></p>
                <p style="display: none"><?php echo $oneBook['id'];?></p>
                <button id="editBtn" onclick="document.getElementById('bookName').value = '<?php echo $oneBook['bookName'];?>';
                        document.getElementById('authorName').value = '<?php echo $oneBook['authorName'];?>';
                        document.getElementById('pages').value = '<?php echo $oneBook['pages'];?>';
                        document.getElementById('genre').value = '<?php echo $oneBook['genre'];?>';
                        document.getElementById('date').value = '<?php echo $oneBook['writeDate'];?>';
                        document.getElementById('id').value = '<?php echo $oneBook['id'];?>';">Редактировать</button>
                <button onclick="document.getElementById('delete').style.display='flex'; document.getElementById('confirm').value = '<?php echo $oneBook['id']; ?>';
                document.getElementById('deleteName').innerHTML = '<?php echo 'Вы действительно хотите удалить книгу' . " "  . "<br>" . $oneBook['bookName'] . "?";?>'">Удалить книгу</button>
                <p><button id="addAuthors" onclick="document.getElementById('book-id').value = '<?php echo $oneBook['id']?>'">Добавить автора</button></p>
            </div>
            <?php endforeach; ?>

        </div>
        <div id="editForm" class="redaction">
            <form  action="edit.php" method="POST">
                <span>Название</span>
                <p><input type="text" value="" id="bookName" name="bookName" placeholder="Введите название"></input></p>
                <span>Имя автора</span>
                <p><input type="text" value="" id="authorName" name="authorName" placeholder="Введите имя автора"></input></p>
                <span>Количество страниц</span>
                <p><input type="text" value="" id="pages" name="pages" placeholder="Кол страниц"></input> </p>
                <span>Жанр</span>
                <p><input type="text" value="" id="genre" name="genre" placeholder="Введите жанр"></input></p>
                <span>Год издания</span>
                <p><input type="text" value="" id="date" name="date" placeholder="Введите год издания"></input></p>
                <p style="display: none"><input value="" type="text" id="id" name="id" placeholder="Введите номер книги"></input></p>
                <p style="margin-left: 40px;"><button>Отправить</button></p>
            </form>
        </div>
            <div id="addForm" class="redaction">
                <form  action="add.php" method="POST">
                    <span>Название книги</span>
                    <p><input type="text" name="bookName" placeholder="Введите название"></input></p>
                    <span>Имя автора(ов)</span>
                    <p><input type="text" name="authorName" placeholder="Введите имя автора"></input></p>
                    <span>Количество страниц</span>
                    <p><input type="text" name="pages" placeholder="Кол страниц"></input> </p>
                    <span>Жанр</span>
                    <p><input type="text" name="genre" placeholder="Введите жанр"></input></p>
                    <span>Год издания</span>
                    <p style="margin-bottom: 2px"><input type="text" name="date" placeholder="Введите год издания"></input></p>
                    <p style="margin-left: 40px; margin-top: 0; margin-bottom: 2px"><button>Отправить</button></p>
                    <button style="margin-left: 50px" onclick="document.getElementById('addForm').style.display = 'none';">Отмена</button> 
                </form>
        </div>
        <div id="addAuthor" class="redaction-author">
            <form  action="addauthor.php" method="POST">
                <p><input type="text" name="authorName" placeholder="Введите имя автора"></input></p>
                <p><input style="display: none" input type="text" id="book-id" name="id" value = "" placeholder="Введите номер книги"></input></p>
                <p style="margin-left: 40px;"><button>Отправить</button></p>
                <button style="margin-left: 50px" onclick="document.getElementById('addAuthor').style.display = 'none';">Отмена</button>
            </form>
        </div>
            <div id="editAuthor" class="redaction-author">
                <form  action="editauthor.php" method="POST">
                    <span>Имя автора</span>
                    <p><input type="text" name="authorName" placeholder="Введите имя автора"></input></p>
                    <span>Новый автор</span>
                    <p><input type="text" name="new" placeholder="Введите нового автора"></input></p>

                    <p style="margin-left: 40px; margin-top: 0;"><button>Отправить</button></p>
                </form>
                <p style="margin-left: 10px;" onclick="document.getElementById('editAuthor').style.display= 'none';"><button>Отмена</button></p>
            </div>
        <div id="delete" class="redaction-delete">
            <span id="deleteName"></span>
                <form action="delete.php" method="POST">
                <input style="display: none" type="text" id="confirm" value="" name="ident"></input>
                    <button type="submit">ДА</button>
                </form>
                <p><button onclick="document.getElementById('delete').style.display = 'none';">Нет</button></p>
        </div>
<script src="main.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"
                integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
                crossorigin="anonymous">
        </script>
</body>
</html>
