<?php
/**
 * Created by PhpStorm.
 * User: beren
 * Date: 30/10/2018
 * Time: 15:49
 */

declare(strict_types=1);

namespace App\Action;

use App\Service\PostService;
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

    public function handle(Request $request): Response
    {
        $value = $request->query->get('param1');
        $posts = $this->postService->find($value);
        var_dump($posts);

        $posts = $this->postService->findAll();

        return new Response($this->renderer->render('blog.html.twig', ['posts'=>$posts]));
    }

}