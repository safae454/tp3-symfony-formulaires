<?php

namespace App\Form\Type;

use App\DTO\RegistrationRequest;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add(child: 'email', type: EmailType::class)
            ->add(child: 'fullName', type: TextType::class)
            ->add(child: 'password', type: RepeatedType::class, options: [
                'type' => PasswordType::class,
                'first_options' => [
                    'help_html' => true,
                    'help' => '<ul>
    <li>Doit contenir au minimum 8 caractère</li>
    <li>Doit inclure au moins une majuscule</li>
    <li>Doit inclure au moins une minuscule</li>
    <li>Doit inclure au moins un chiffre</li>
    <li>Doit inclure au moins un caractère spécial parmi : `@`, `-`, `_`</li>
</ul>'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RegistrationRequest::class,
            'attr' => [
                'novalidate' => true,
            ],
        ]);
    }
}
