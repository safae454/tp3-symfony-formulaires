<?php

namespace App\DTO;

use App\Validator\Constraints\RequiredField;
use App\Validator\Constraints\PasswordField;
use Symfony\Component\Validator\Constraints as Assert;

class RegistrationRequest
{
    #[Assert\Email(message: 'Cette adresse email est invalide.')]
    #[RequiredField]
    private ?string $email;

    #[RequiredField]
    #[PasswordField]
    // #[PasswordField(message: "Le mot de passe doit contenir au minimum 8 caractères, avec au moins une majuscule, une minuscule, un chiffre et un caractère spécial parmi @, - ou _")]
    private ?string $password;

    #[RequiredField]
    private ?string $fullName;

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(?string $fullName): void
    {
        $this->fullName = $fullName;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }
}
