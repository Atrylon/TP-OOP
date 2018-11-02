<?php
/**
 * Created by PhpStorm.
 * User: beren
 * Date: 30/10/2018
 * Time: 16:01
 */

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Post as PostEntity;
use Ramsey\Uuid\Uuid;

final class LoggedPost implements Post
{
    private $posts = [];

    public function __construct()
    {
        $uid = '7d2e854f-73ac-422d-8b13-b674a9270718';
        $this->posts[$uid] = new PostEntity($uid, 'Test d\'article', 'TEEEEEEEEEEEESSSSSSSSSSSSSST', '10/02/2018 16:58:00');

        $uid = '46a3a96a-de4a-4961-852c-521ab11808ca';
        $this->posts[$uid] = new PostEntity($uid, 'Test d\'article2', 'test2', '09/02/2018 16:58:00');

        $uid = '1aeb6f8b-b9bc-4f44-98e5-f27407681bea';
        $this->posts[$uid] = new PostEntity($uid, 'Test d\'article3', 'test3', '08/02/2018 16:58:00');

        $uid = '724c2185-a4d5-463a-aa2f-987e3aba40bb';
        $this->posts[$uid] = new PostEntity($uid, 'Test d\'article4', 'test4', '11/02/2018 16:58:00');

        $uid = '288879eb-62d5-42d5-b7f2-16a3ff489639';
        $this->posts[$uid] = new PostEntity($uid, 'Test d\'article5', 'test5', '20/04/2018 16:58:00');

    }

    public function find(string $uid): PostEntity
    {
        if (!isset($this->posts[$uid])) {
            throw new \LogicException('Id does not exist');
        }

        return $this->posts[$uid];
    }

    public function findAll(): array
    {
        if (!isset($this->posts)) {
            throw new \LogicException('Id does not exist');
        }

        return $this->posts;
    }

    public function create(string $title, string $message, string $createdAt): PostEntity
    {
        return new PostEntity((Uuid::uuid4())->toString(), $title, $message, $createdAt);
    }
}