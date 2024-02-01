<?php

declare(strict_types=1);

namespace App;

use Exception;
use App\Database\Databaseconnection;
use App\Controller\Categoryaction;
use App\Controller\Postaction;
use App\Model\Category;
use App\Model\Post;

global $dataPost;
global $dataCategory;

spl_autoload_register(function ($class) {
    $a = array_slice(explode('\\', $class), 1);
    if (!$a) {
        throw new Exception();
    }
    $filename = implode('/', [__DIR__, ...$a]) . '.php';
    require_once $filename;
});


$pdo = Databaseconnection::getInstance();

$post = new Post($pdo);
$dataPost = $post->getAllPosts();

$category = new Category($pdo);
$dataCategory = $category->getAllCategories();

$postAction = new Postaction($post);
$postAction->handlePostRequest();

$categoryAction = new Categoryaction($category);
$categoryAction->handleCategoryRequest();
