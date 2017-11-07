<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    public function createAction()
    {
        $em = $this->getDoctrine()->getManager();

        $product = new Product();
        $product->setName('Ipod Touch 1');
        $product->setPrice(250);
        $product->setDescription('An Apple device. The first of this line.');

        $em->persist($product);
        $em->flush();

//        // $em instanceof EntityManager
//        $em->getConnection()->beginTransaction(); // suspend auto-commit
//        try {
//            //... do some work
//            $user = new User;
//            $user->setName('George');
//            $em->persist($user);
//            $em->flush();
//            $em->getConnection()->commit();
//        } catch (Exception $e) {
//            $em->getConnection()->rollBack();
//            throw $e;
//        }


        return new Response('Saved new product with id '.$product->getId());
    }
}
