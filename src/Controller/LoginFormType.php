<?php


namespace App\Controller;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class LoginFormType extends \Symfony\Component\Form\AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add( 'login', TextType::class, [
            'constraints' => new NotBlank(),
        ]);
        $builder->add('password', PasswordType::class, [
            'constraints' => new Length(null, 3, 15),
        ]);
        $builder->add('submit', SubmitType::class);
    }

}