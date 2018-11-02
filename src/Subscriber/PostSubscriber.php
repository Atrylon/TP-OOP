<?php
/**
 * Created by PhpStorm.
 * User: beren
 * Date: 02/11/2018
 * Time: 11:17
 */

namespace App\Subscriber;


use App\Event\PostCalledEvent;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

final class PostSubscriber implements EventSubscriberInterface
{
    private $logger;
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
    public static function getSubscribedEvents()
    {
        return [
            PostCalledEvent::NAME => 'onPostCalledEvent',
        ];
    }
    public function onPostCalledEvent(PostCalledEvent $postCalledEvent)
    {
        $post = $postCalledEvent->find();
        $this->logger->info(sprintf('L\'article %s - %s vient d\etre affiché' ,$post->title(), $post->message()));
    }
}