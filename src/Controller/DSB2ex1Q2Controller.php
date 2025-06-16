<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DSB2ex1Q2Controller extends AbstractController
{
    #[Route('/dsb2ex1_q2', name: 'app_dsb2ex1_q2')]
    public function index(): Response
    {   
               $formatter = new \IntlDateFormatter(
            'fr_FR', 
            \IntlDateFormatter::FULL, 
            \IntlDateFormatter::NONE,
            'Europe/Paris',
            \IntlDateFormatter::GREGORIAN,
            'EEEE d MMMM yyyy'
        );
        
        $dateFormatted = $formatter->format(new \DateTime());

        return $this->render('dsb2ex1_q2/index.html.twig', [
                        'date_du_jour' => $dateFormatted,
        ]);
    }
}
