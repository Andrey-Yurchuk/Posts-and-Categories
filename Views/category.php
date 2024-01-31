<?php

require_once "../autoload.php";

global $dataCategory;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Категории</title>
    <link rel="stylesheet" type="text/css" href="/App/Public/Style/category.css">
</head>
<body>

<h1>Категории</h1>

<!-- Форма добавления категории -->
<form id="addCategoryForm" action="../autoload.php" method="POST">
    <input type="text" id="categoryName" name="category" placeholder="Название категории">
    <button type="submit">Добавить категорию</button>
</form>

<!-- Форма редактирования категории -->
<form id="editCategoryForm" action="../autoload.php" method="POST">
    <input type="text" id="categoryId" name="categoryId" placeholder="Идентификатор категории">
    <input type="text" id="newCategoryName" name="newCategory" placeholder="Новое название категории">
    <button type="submit">Изменить категорию</button>
</form>

<!-- Форма удаления категории -->
<form id="deleteCategoryForm" action="../autoload.php" method="POST">
    <input type="text" id="deleteCategoryId" name="deleteCategoryId" placeholder="Идентификатор категории">
    <button type="submit">Удалить категорию</button>
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

<h1>Список категорий</h1>

<?php

foreach ($dataCategory as $item) {
    ?>
    <div>
        <h2><?php echo $item['name']; ?></h2>
        <p>ID: <?php echo $item['id']; ?></p>
    </div>
    <?php
}
?>

</body>
</html>
