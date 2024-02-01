<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Post;

class Postaction implements Controllerinterface
{
    private Post $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function handlePostRequest(): void
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['title']) && isset($_POST['content'])) {
                $title = $_POST['title'];
                $content = $_POST['content'];
                $this->addAction($title, $content);
            }

            if (isset($_POST['newPostName']) && isset($_POST['newPostContent'])) {
                $postId = $_POST['postId'];
                $newTitle = $_POST['newPostName'];
                $newContent = $_POST['newPostContent'];
                $this->updateAction($postId, $newTitle, $newContent);
            }

            if (isset($_POST['postIdToDelete'])) {
                $postIdToDelete = $_POST['postIdToDelete'];
                $this->deleteAction($postIdToDelete);
            }
        }
    }

    public function addAction($title, $content): void
    {
        $this->post->addPost($title, $content);
    }

    public function updateAction($postId, $newTitle, $newContent): void
    {
        $this->post->updatePost($postId, $newTitle, $newContent);
    }

    public function deleteAction($postIdToDelete): void
    {
        $this->post->deletePost($postIdToDelete);
    }
}
