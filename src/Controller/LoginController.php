<?php


namespace App\Controller;



use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{
    public function loginForm(Request $request):Response{
        $message = null;

        $form = $this->createForm(LoginFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $data = $form->getData();

            $login = $data['login'];
            $password = $data['password'];

            return $this->redirectToRoute('hello', ['prenom'=>$data['login']]);
        } else if($form->isSubmitted()){
            $message='Login ou mot de passe mal formé';
        }

        $formview = $form->createView();

        return $this->render('login.html.twig', ['form'=>$form->createView(), 'message'=>$message]);
    }

}