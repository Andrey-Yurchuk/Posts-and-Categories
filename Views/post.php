<?php

require_once "../autoload.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Посты</title>
    <link rel="stylesheet" type="text/css" href="/App/Public/Style/post.css">
</head>
<body>

<h1>Посты</h1>

<a class="return-home-link" href="/App/index.php">Вернуться на главную страницу</a>
<br>
<br>
<br>

<!-- Форма добавления поста -->
<form id="addPostForm" action="../autoload.php" method="POST">
    <input type="text" id="postName" name="title" placeholder="Название поста">
    <textarea id="postContent" name="content" placeholder="Содержимое поста"></textarea>
    <button type="submit">Добавить пост</button>
</form>

<!-- Форма редактирования поста -->
<form id="editPostForm" action="../autoload.php" method="POST">
    <textarea id="newPostContent" name="newPostContent" placeholder="Новое содержимое поста"></textarea>
    <input type="text" id="postId" name="postId" placeholder="Идентификатор поста">
    <input type="text" id="newPostName" name="newPostName" placeholder="Новое название поста">
    <button type="submit">Изменить пост</button>
</form>

<!-- Форма удаления поста -->
<form id="deletePostForm" action="../autoload.php" method="POST">
    <input type="text" id="postIdToDelete" name="postIdToDelete" placeholder="Идентификатор поста для удаления">
    <button type="submit">Удалить пост</button>
</form>

<!-- Форма добавления поста в категорию -->
<form id="addPostToCategoryForm" action="../autoload.php" method="POST">
    <input type="text" id="postId" name="postId" placeholder="Идентификатор поста">
    <input type="text" id="categoryIdForPost" name="categoryIdForPost" placeholder="Идентификатор категории">
    <button type="submit">Добавить пост в категорию</button>
</form>

<!-- Форма удаления поста из категории -->
<form id="removePostFromCategoryForm" action="../autoload.php" method="POST">
    <input type="text" id="postIdToRemove" name="postIdToRemove" placeholder="Идентификатор поста">
    <input type="text" id="categoryIdForPostToRemove" name="categoryIdForPostToRemove" placeholder="Идентификатор категории">
    <button type="submit">Удалить пост из категории</button>
</form>

</body>
</html>
