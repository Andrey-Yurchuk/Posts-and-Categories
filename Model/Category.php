<?php

declare(strict_types=1);

namespace App\Model;

use Exception;
use PDO;

class Category extends Model
{
    protected function checkRecord($id): bool
    {
        $query = "SELECT id FROM " . self::TABLE_NAME_CATEGORY . " WHERE id = :id";
        $statement = $this->db->prepare($query);
        $statement->execute(['id' => $id]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result ? true : false;
    }

    public function addCategory($name): void
    {
        $query = "INSERT INTO " . self::TABLE_NAME_CATEGORY . " (name) VALUES (:name)";
        $statement = $this->db->prepare($query);
        $statement->execute(['name' => $name]);
    }

    public function updateCategory($id, $name): void
    {
        if (empty($this->checkRecord($id))) {
            throw new Exception('The id of such a category does not exist');
        }

        $query = "UPDATE " . self::TABLE_NAME_CATEGORY . "SET name = :name WHERE id = :id";
        $statement = $this->db->prepare($query);
        $statement->execute(['id' => $id, 'name' => $name]);
    }

    public function deleteCategory($id): void
    {
        if (empty($this->checkRecord($id))) {
            throw new Exception('The id of such a category does not exist');
        }

        $query = "DELETE FROM " . self::TABLE_NAME_CATEGORY . " WHERE id = :id";
        $statement = $this->db->prepare($query);
        $statement->execute(['id' => $id]);
    }

    public function getAllCategories(): array
    {
        $query = "SELECT id, name FROM " . self::TABLE_NAME_CATEGORY;
        $statement = $this->db->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function postExists($postId): bool
    {
        $query = "SELECT id FROM " . self::TABLE_NAME_CATEGORY_POST . " WHERE id = :id";
        $statement = $this->db->prepare($query);
        $statement->execute(['id' => $postId]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result ? true : false;
    }

    public function addPostToCategory($postId, $categoryId): void
    {
        if (empty($this->postExists($postId))) {
            throw new Exception('The id of such a post does not exist');
        }

        $query = "INSERT INTO " . self::TABLE_NAME_CATEGORY_POST . " (category_id, post_id) 
            VALUES (:category_id, :post_id)";
        $statement = $this->db->prepare($query);
        $statement->execute(['category_id' => $categoryId, 'post_id' => $postId]);
    }

    public function removePostFromCategory($postId, $categoryId): void
    {
        if (empty($this->postExists($postId))) {
            throw new Exception('The id of such a post does not exist');
    }
        $query = "DELETE FROM " . self::TABLE_NAME_CATEGORY_POST . " WHERE category_id = :category_id 
            AND post_id = :post_id";
        $statement = $this->db->prepare($query);
        $statement->execute(['category_id' => $categoryId, 'post_id' => $postId]);
    }
}


