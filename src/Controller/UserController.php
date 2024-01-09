<?php

namespace App\Controller; 

use App\Entity\User; 
use App\Form\UserType; 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController; 
use Symfony\Component\HttpFoundation\Response; 
use Symfony\Component\Routing\Annotation\Route; 

class UserController extends AbstractController
{

    #[Route('/user', name: 'app_user')] // Définit la route '/user' avec le nom 'app_user'
    /**
     * @Route("/user/edit", name="user_edit") // Définit la route '/user/edit' avec le nom 'user_edit'
     */
    public function editUser(User $user): Response // Définit la méthode editUser qui prend un User en paramètre et retourne une Response
    {

        $request = $this->container->get('request_stack')->getCurrentRequest(); // Récupère la requête courante

        $form = $this->createForm(UserType::class, $user); // Crée le formulaire à partir du UserType et du User
        $form->handleRequest($request); // Gère la requête sur le formulaire
        if ($form->isSubmitted() && $form->isValid()) { // Si le formulaire est soumis et valide
            $this->addFlash('success', 'Votre profil a été modifié'); // Ajoute un message flash de succès
            return $this->redirectToRoute('app_user'); // Redirige vers la route 'app_user'
        }

        return $this->render( // Rend la vue
            'user/edit.html.twig', 
            [
                'form' => $form->createView(), // Passe la vue du formulaire
                'user' => $user, // Passe l'utilisateur
                'controller_name' => 'UserController', // Passe le nom du controller

            ]
        );

    }

}
