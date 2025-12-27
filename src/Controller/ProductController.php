<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ProductCartType;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'app_product')]
    public function index(): Response
    {
        $form = $this->createForm(ProductCartType::class);

        return $this->render('product/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
