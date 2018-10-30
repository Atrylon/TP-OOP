<?php
/**
 * Created by PhpStorm.
 * User: beren
 * Date: 30/10/2018
 * Time: 15:21
 */

declare(strict_types=1);

namespace App\Entity;

final class Post
{

    private $uid;
    private $title;
    private $message;
    private $createdAt;

    public function __construct(string $uid, string $title, string $message, string $createdAt)
    {
        $this->uid = $uid;
        $this->title = $title;
        $this->message = $message;
        $this->createdAt = $createdAt;
    }

    public function title(): ?string
    {
        return $this->title;
    }

}