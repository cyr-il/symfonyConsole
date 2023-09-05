<?php

namespace App\Controller;

use App\Entity\CommandConsole;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\CommandConsoleType;
use App\Form\CommandConsoleCreate;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(EntityManagerInterface $em, Request $request): Response
    {
        $form = $this->createForm(CommandConsoleType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();

            
            $repository = $em->getRepository(CommandConsole::class);
            $command = $repository->findOneBySomeField($data->getCommand());

            // Faites quelque chose avec les résultats

            // Par exemple, transmettez les résultats à votre template Twig
            return $this->render('home/index.html.twig', [
                'command' => $command,
                'form' => $form->createView(),
            ]);
        }

        return $this->render('home/index.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/create', name: 'app_create_command')]
    public function createCommand(EntityManagerInterface $em, Request $request)

    {
        $command = new CommandConsole();
        $form = $this->createForm(CommandConsoleType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $data = $form->getData();
            $commandName = $data->getCommand();
            $commandName = trim($commandName);
            $commandName = strtolower($commandName);
            $command->setCommand($commandName);
            $command->setDescription($data->getDescription());
            $command->setImage($data->getImage());

            $em->persist($command);
            $em->flush();

            return $this->render('home/create.html.twig', [
                'form' => $form->createView(),
            ]);
        }

        return $this->render('home/create.html.twig',[
            'form' => $form->createView(),
        ]);
    
    }
}

