<?php
/**
 * Created by PhpStorm.
 * User: beren
 * Date: 30/10/2018
 * Time: 15:21
 */

namespace App\Entity;

final class Post
{

    private $id;
    private $title;
    private $message;
    private $createdAt;

    public function __construct(string $id, string $title, string $message, string $createdAt)
    {
        $this->id = $id;
        $this->title = $title;
        $this->message = $message;
        $this->createdAt = $createdAt;
    }

}