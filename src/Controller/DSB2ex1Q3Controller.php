<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
//use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

final class DSB2ex1Q3Controller extends AbstractController
{
    #[Route('/dsb2ex1_q3', name: 'app_dsb2ex1_q3')]
    public function index(Request $request): Response
    {
        // Création du formulaire
        $form = $this->createFormBuilder()
             ->add('civilite', ChoiceType::class, [
                 'label' => 'Civilité',
                 'choices' => [
                     'Monsieur' => 'M',
                     'Madame' => 'F',
                     'Autre' => 'A'
        ],
        'expanded' => true
    ])
            ->add('nom', TextType::class, ['label' => 'Nom'])
            ->add('prenom', TextType::class, ['label' => 'Prénom'])
            ->add('date_naissance', DateType::class, [
                'label' => 'Date de naissance',
                'widget' => 'single_text',
            ])
            ->add('submit', SubmitType::class, ['label' => 'Envoyer'])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            // Calcul de l'âge
            $today = new \DateTime();
            $age = $today->diff($data['date_naissance'])->y;
            
            // Redirection vers la page de résultat
            return $this->redirectToRoute('app_dsb2ex1_q3_result', [
                'civilite' => $data['civilite'],
                'nom' => $data['nom'],
                'prenom' => $data['prenom'],
                'age' => $age
            ]);
        }        
        return $this->render('dsb2ex1_q3/index.html.twig', [
            'form' => $form->createView(),
            'controller_name' => 'DSB2ex1Q3Controller',
        ]);
    }
     #[Route('/dsb2ex1_q3/result', name: 'app_dsb2ex1_q3_result')]
    public function result(Request $request): Response
    {    $civilite = $request->query->get('civilite');
        $nom = $request->query->get('nom');
        $prenom = $request->query->get('prenom');
        $age = $request->query->get('age');

        return $this->render('dsb2ex1_q3/result.html.twig', [
           
            'civilite' => $civilite,
            'nom' => $nom,
            'prenom' => $prenom,
            'age' => $age,
        ]);
    }
}
