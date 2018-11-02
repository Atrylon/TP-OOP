<?php
/**
 * Created by PhpStorm.
 * User: beren
 * Date: 30/10/2018
 * Time: 16:35
 */

declare(strict_types=1);

namespace App\Service;

use App\Entity\Post as PostEntity;
use App\Repository\Post;
use App\Validator\Validator;

final class PostService
{

    private $validator;
    private $repository;

    public function __construct(Validator $validator, Post $postRepository)
    {
        $this->validator = $validator;
        $this->repository = $postRepository;
    }

    public function find(string $value): PostEntity
    {
        $this->validator->validate($value);
        $post = $this->repository->find($value);

        return $post;
    }

    public function findAll(): array
    {
        $posts = $this->repository->findAll();

        return $posts;
    }
}