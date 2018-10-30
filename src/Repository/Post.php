<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Post as PostEntity;

interface Post
{
    public function find(string $uid): PostEntity;

    public function create(string $title, string $message, string $createdAt): PostEntity;

}