<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Category;

class Categoryaction implements Controllerinterface
{
    private Category $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function handleCategoryRequest(): void
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['category'])) {
                $name = $_POST['category'];
                $this->addAction($name);
            }

            if (isset($_POST["categoryId"]) && isset($_POST["newCategory"])) {
                $categoryId = $_POST["categoryId"];
                $newCategoryName = $_POST["newCategory"];
                $this->updateAction($categoryId, $newCategoryName);
            }

            if (isset($_POST["deleteCategoryId"])) {
                $categoryId = $_POST["deleteCategoryId"];
                $this->deleteAction($categoryId);
            }

            if (isset($_POST['postId']) && isset($_POST['categoryIdForPost'])) {
                $postId = $_POST['postId'];
                $categoryIdForPost = $_POST['categoryIdForPost'];
                $this->addPostToCategoryAction($postId, $categoryIdForPost);
            }

            if (isset($_POST['postIdToRemove']) && isset($_POST['categoryIdForPostToRemove'])) {
                $postIdToRemove = $_POST['postIdToRemove'];
                $categoryIdForPostToRemove = $_POST['categoryIdForPostToRemove'];
                $this->removePostFromCategoryAction($postIdToRemove, $categoryIdForPostToRemove);
            }
        }
    }

    public function addAction($name): void
    {
        $this->category->addCategory($name);
    }

    public function updateAction($categoryId, $newCategoryName): void
    {
        $this->category->updateCategory($categoryId, $newCategoryName);
    }

    public function deleteAction($categoryId): void
    {
        $this->category->deleteCategory($categoryId);
    }

    public function addPostToCategoryAction($postId, $categoryId): void
    {
        $this->category->addPostToCategory($postId, $categoryId);
    }

    public function removePostFromCategoryAction($postId, $categoryId): void
    {
        $this->category->removePostFromCategory($postId, $categoryId);
    }
}