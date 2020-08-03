<?php

namespace App\EventListener;

use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Psr\Log\LoggerInterface;

class ControllerListener
{
    public function __construct(LoggerInterface $logger){
        
        $this->logger = $logger;

    }
    
    public function index(EventRepository $eventRepository): Response
    {
        return $this->render('event/index.html.twig', [
            'event' => $eventRepository->findAll(),
        ]);
    }

    public function onKernelController(ControllerEvent $event){

        $content = $event->getController();

        /*
        var_dump($content);
        $event->setArguments($newArguments);
        */
    }
}