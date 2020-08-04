<?php

namespace App\EventListener;

use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Psr\Log\LoggerInterface;

class ControllerListener
{
    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger){
        
        $this->logger = $logger;

    }
    
    /**
     * @param ControllerEvent $event
     */
    public function onKernelController(ControllerEvent $event){
/*
        $content = $event->getController();
        if($content[0] instanceof SecurityController && $content[1] === login){
            $info = $event->getRequest();
            $username = $info->request->get('username');
            $password = $info->request->get('password');

            $this->logger->info("L'utilisateur " . $username . $password . "a tenté de se connecter");
        }
        
        var_dump($content);
        $event->setArguments($newArguments);
        */
    }
}