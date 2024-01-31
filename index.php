<?php

require_once "autoload.php";

global $dataPost;

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$postsPerPage = 2;
$paginatedPosts = array_slice($dataPost, ($page - 1) * $postsPerPage, $postsPerPage);
$totalPages = ceil(count($dataPost) / $postsPerPage);

/**
 * @todo вынести css в отдельный файл и проверить!!!
 */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/App/Public/Style/index.css">
    <title>Список постов</title>
</head>
<body>
<div class="header-links">
    <a href="/App/Views/category.php">Категории</a>
    <a href="/App/Views/post.php">Посты</a>
</div>
<h1>Список постов</h1>

<?php

foreach ($paginatedPosts as $item) {
    ?>
    <div>
        <h2><?php echo $item['title']; ?></h2>
        <p><?php echo $item['content']; ?></p>
        <p>Created at: <?php echo $item['created_at']; ?></p>
        <p>ID: <?php echo $item['id']; ?></p>
    </div>
    <?php
}
?>

<div class="pagination">
    <?php if ($page > 1): ?>
        <a href="?page=<?php echo ($page - 1); ?>">Previous</a>
    <?php endif; ?>
    <?php for($i = 1; $i <= $totalPages; $i++): ?>
        <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
    <?php endfor; ?>
    <?php if ($page < $totalPages): ?>
        <a href="?page=<?php echo ($page + 1); ?>">Next</a>
    <?php endif; ?>
</div>

</body>
</html>