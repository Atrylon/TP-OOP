<?php
/**
 * Created by PhpStorm.
 * User: beren
 * Date: 02/11/2018
 * Time: 11:12
 */

namespace App\Event;


use App\Entity\Post;
use Symfony\Component\EventDispatcher\Event;

final class PostCalledEvent extends Event
{
    const NAME = 'post.called';
    protected $post;
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function find(): Post
    {
        return $this->post;
    }
}