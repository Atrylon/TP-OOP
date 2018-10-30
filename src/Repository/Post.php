<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Post as PostEntity;

interface Post
{
    public function find(string $id): PostEntity;

    public function create(string $title, string $message): PostEntity;

}