<?php

namespace App\Controller;

use App\Entity\Event;
use App\Form\EventTypeForm;
use App\Repository\EventRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/event')]
final class EventController extends AbstractController
{

    #[Route('', name:'app_event_list')]
    public function listEvents(EventRepository $er): Response
    {


        $listEvents = $er->findAll();
        return $this->render('event/list.html.twig', [
            'events' => $listEvents,
        ]);
    }

    #[Route('/new', name:'app_event_new')]
        public function new(Request $request, EntityManagerInterface $em): Response

    {
        $event = new Event();
        $form = $this->createForm(EventTypeForm::class, $event);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($event);
            $em->flush();
            return $this->redirectToRoute('app_event_list');
        }   
        return $this->render(view: 'event/new.html.twig', parameters: [
            'form' => $form->createView()]);
    }

    //delete
    #[Route('/delete/{id}', name: 'app_event_delete')]
    public function delete(Event $event, EntityManagerInterface $em): Response
    {
        $em->remove($event);
        $em->flush();
        return $this->redirectToRoute('app_event_list');
    }

    //edit
    #[Route('/edit/{id}', name: 'app_event_edit')]
    public function edit(Event $event, Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(EventTypeForm::class, $event);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($event);
            $em->flush();
            return $this->redirectToRoute('app_event_list');
        }
        return $this->render(view: 'event/edit.html.twig', parameters: [
            'form' => $form->createView(),
            'event' => $event
        ]);
    }
}
