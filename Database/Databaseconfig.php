<?php

declare(strict_types=1);

namespace App\Database;

final readonly class Databaseconfig implements Databaseinterface
{
    public const HOST = 'localhost';

    public const DBNAME = 'posts_bd';

    public const USER = 'admin';

    public const PASSWORD = 'StrongPassword123!';
}
