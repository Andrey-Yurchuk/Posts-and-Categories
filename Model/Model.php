<?php

declare(strict_types=1);

namespace App\Model;

use PDO;

abstract class Model
{
    public const TABLE_NAME_CATEGORY = 'category';

    public const TABLE_NAME_POST = 'post';

    public const TABLE_NAME_CATEGORY_POST = 'category_post';

    protected PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    abstract protected function checkRecord($id): bool;
}