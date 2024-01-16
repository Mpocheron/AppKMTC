<?php

namespace App\Controller;

use App\Entity\User;  
use App\Form\EditUserType;
use App\Form\UserType;  
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{

    #[Route('/user/edit/{id}', name: 'app_user')] 
    /**
     * @Route("/user/edit", name="user_edit")
     */
    public function editUser(Request $request, User $user, EntityManagerInterface $entityManager, UserPasswordHasherInterface $userPasswordHasher): Response
    {
        //Si l'utilisateur n'est pas connecté, il est redirigé vers la page de connexion

        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        }

        //Ce code sert à vérifier que l'utilisateur connecté est bien le même que celui qui veut modifier son profil

        if ($this->getUser() !== $user){
            return $this->redirectToRoute('app_logout');
        }

        $form = $this->createForm(EditUserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('password')->getData()
                )
                );
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute('app_user');
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'editUserForm' => $form->createView(),
        ]);
    }

}
