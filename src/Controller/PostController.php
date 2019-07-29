<?php

namespace App\Controller;

use App\Entity\Posts;
use App\Repository\PostsRepository;
use Doctrine\Common\Persistence\ObjectManager;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(PostsRepository $repository)
    {
        //$repository = $this->getDoctrine()->getRepository(Posts::class);
        $posts = $repository->findAll();

        return $this->render('posts/index.html.twig', [
            'posts' => $posts,
            'current_menu' => 'post',
        ]);
    }

    /**
     * @Route("/posts/create", name="post_create")
     */
    public function create(Request $request, ObjectManager $manager){

        //dump($request);

        /**
         * $post = new Posts();
        $form = $this->createFormBuilder($post)
        ->add("title")
        ->add("content")
        ->add("contents")
        ->getForm();
         */

        if($request->request->count() > 0){

            $post = new Posts();
            $post->setTitle($request->request->get("title"))
            ->setContent($request->request->get("content"))
            ->setContents($request->request->get("contents"))
            ->setCreatedAt(new \DateTime());

            $manager->persist($post);
            $manager->flush();

            return $this->redirectToRoute("home");
        }
        return $this->render("posts/create.html.twig", [
            'current_menu' => 'post',
        ]);
    }

    /**
     * @Route("/posts/{id}", name="show_post", requirements={"id" = "\d+"})
     */
    public function show(Posts $post){

        //$repository = $this->getDoctrine()->getRepository(Posts::class);
        //$post = $repository->find($id);

        return $this->render("posts/show.html.twig",[
            'current_menu' => 'post',
            'post' => $post,
            ]);
    }

    /**
     * @Route("/edit/{id}", name="edit_post")
     */
    public function edit(Posts $edit){
        return $this->render("posts/edit.html.twig",[
            'edit' => $edit,
        ]);
    }

}
