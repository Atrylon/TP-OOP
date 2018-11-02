<?php
/**
 * Created by PhpStorm.
 * User: beren
 * Date: 30/10/2018
 * Time: 15:49
 */

declare(strict_types=1);

namespace App\Action;

use App\Event\PostCalledEvent;
use App\Service\PostService;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Zend\Expressive\Template\TemplateRendererInterface;

final class Blog
{
    private $renderer;
    private $postService;

    public function __construct(TemplateRendererInterface $renderer, PostService $postService)
    {
        $this->renderer = $renderer;
        $this->postService = $postService;
    }

    public function handle(Request $request, EventDispatcherInterface $eventDispatcher): Response
    {
        $value = $request->query->get('param1');
        if(isset($value)){
            $posts = $this->postService->find($value);
//            var_dump($posts);
            $event = new PostCalledEvent($posts);
            $eventDispatcher->dispatch(PostCalledEvent::NAME,$event);
        }

        if(!isset($value)){
            $posts = $this->postService->findAll();
            foreach ($posts as $post){
//                var_dump($post);
                $event = new PostCalledEvent($post);
                $eventDispatcher->dispatch(PostCalledEvent::NAME,$event);
            }
        }


        return new Response($this->renderer->render('blog.html.twig', ['posts'=>$posts]));
    }

}