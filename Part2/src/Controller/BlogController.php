<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index(Request $request, PostRepository $postRepository, LoggerInterface $logger)
    {

        // On utilise le controleur et on ne réparti pas les tâches, ici tout est au même endroit -> plus difficile à débugger en cas de lourd programme et de bug
        $value = $request->query->get('param1');
        if(isset($value)){
            $posts = $postRepository->find($value);
            $logger->info(sprintf('L\'article %s - %s - %s vient d\etre affiché' ,$posts->getTitle(), $posts->getText(), $posts->getCreatedAt()->format('D/m/Y H:i:s')));
        }
        //Utilisation du else et multiple indentation
        else{
            $posts = $postRepository->findAll();
            foreach ($posts as $post){
                $logger->info(sprintf('L\'article %s - %s - %s vient d\etre affiché' ,$post->getTitle(), $post->getText(), $post->getCreatedAt()->format('D/m/Y H:i:s')));
            }
        }

        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
            'posts' => $posts,
        ]);
    }
}
