<?php

declare(strict_types=1);

namespace App\Model;

use Exception;
use PDO;

class Post extends Model
{

    protected function checkRecord($id): bool
    {
        $query = "SELECT id FROM " . self::TABLE_NAME_POST . " WHERE id = :id";
        $statement = $this->db->prepare($query);
        $statement->execute(['id' => $id]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result ? true : false;

    }

    public function addPost($title, $content): void
    {
        $query = "INSERT INTO " . self::TABLE_NAME_POST . " (title, content, created_at, updated_at) 
                    VALUES (:title, :content, :created_at, :updated_at)";
        $statement = $this->db->prepare($query);
        $statement->execute(['title' => $title, 'content' => $content,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')]);

        header('Location: index.php');
        exit;
    }

    public function updatePost($postId, $newTitle, $newContent): void
    {
        if (empty($this->checkRecord($postId))) {
            throw new Exception('The id of such a post does not exist');
        }

        $query = "UPDATE " . self::TABLE_NAME_POST . "SET title = :title, content = :content, 
                 updated_at = :updated_at WHERE id = :id";
        $statement = $this->db->prepare($query);
        $statement->execute(['id' => $postId, 'title' => $newTitle, 'content' => $newContent,
            'updated_at' => date('Y-m-d H:i:s')]);

        header('Location: index.php');
        exit;
    }

    public function deletePost($postId): void
    {
        if (empty($this->checkRecord($postId))) {
            throw new Exception('The id of such a post does not exist');
        }

        $query = "DELETE FROM " . self::TABLE_NAME_POST . "  WHERE id = :id";
        $statement = $this->db->prepare($query);
        $statement->execute(['id' => $postId]);

        header('Location: index.php');
        exit;
    }

    public function getAllPosts(): array
    {
        $query = "SELECT id, title, content, created_at, updated_at FROM " . self::TABLE_NAME_POST;
        $statement = $this->db->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
