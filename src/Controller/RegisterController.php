<?php

declare(strict_types=1);

namespace App\Controller;

use App\DTO\RegistrationRequest;
use App\Form\Type\RegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RegisterController extends AbstractController
{
    #[Route('/register')]
    public function index(Request $req): Response
    {
        $registrationDTO = new RegistrationRequest();

        $register = $this->createForm(type: RegisterType::class, data: $registrationDTO);

        $register->handleRequest($req);

        if ($register->isSubmitted() && $register->isValid()) {
            // send registration email for confirmation
            dd(
                $register->getData(),
                $registrationDTO,
                $register->getData() === $registrationDTO
            );
        }

        return $this->render('register/index.html.twig', [
            'registerForm' => $register,
        ]);
    }
}
