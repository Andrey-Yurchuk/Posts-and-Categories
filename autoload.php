<?php

declare(strict_types=1);

namespace App;

use Exception;
use App\Database\Databaseconnection;
use App\Model\Category;
use App\Model\Post;

global $dataPost;
global $dataCategory;

/**
 * @todo composer и .gitignore => vendor + Readme.md
 * @todo вынести в отдельные классы
 */

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


/********************************** Category form *****************************************/

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['category'])) {
        $name = $_POST['category'];
        $category->addCategory($name);
    }

    if (isset($_POST["categoryId"]) && isset($_POST["newCategory"])) {
        $categoryId = $_POST["categoryId"];
        $newCategoryName = $_POST["newCategory"];
        $category->updateCategory($categoryId, $newCategoryName);
    }

    if (isset($_POST["deleteCategoryId"])) {
        $categoryId = $_POST["deleteCategoryId"];
        $category->deleteCategory($categoryId);
    }

    if (isset($_POST['postId']) && isset($_POST['categoryIdForPost'])) {
        $postId = $_POST['postId'];
        $categoryIdForPost = $_POST['categoryIdForPost'];
        $category->addPostToCategory($postId, $categoryIdForPost);
    }

    if (isset($_POST['postIdToRemove']) && isset($_POST['categoryIdForPostToRemove'])) {
        $postIdToRemove = $_POST['postIdToRemove'];
        $categoryIdForPostToRemove = $_POST['categoryIdForPostToRemove'];
        $category->removePostFromCategory($postIdToRemove, $categoryIdForPostToRemove);
    }
}

/********************************** Posts form *****************************************/

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['title']) && isset($_POST['content'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $post->addPost($title, $content);
        }

    if (isset($_POST['newPostName']) && isset($_POST['newPostContent'])) {
        $postId = $_POST['postId'];
        $newTitle = $_POST['newPostName'];
        $newContent = $_POST['newPostContent'];
        $post->updatePost($postId, $newTitle, $newContent);
    }

    if (isset($_POST['postIdToDelete'])) {
        $postIdToDelete = $_POST['postIdToDelete'];
        $post->deletePost($postIdToDelete);
    }
}






