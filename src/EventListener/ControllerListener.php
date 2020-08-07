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
    public function onKernelRequest(RequestEvent $event)
    {
    /*
        $content = $event->getController();
        if ($content[0] instanceof SecurityController && $content[1] === 'login')
        {
            var_dump($info->request);
        }
    */

        $info = $event->getRequest()->attributes->get('_route');
        $method = $event->getRequest()->getMethod();
        if ($info === 'app_login' && $method == 'POST')
        {
            $username = $event->getRequest()->request->get('username');
            $password = $event->getRequest()->request->get('password');
            $this->logger->info("L'utilisateur " . $username . " avec le mot de passe : " . $password . " a tenté de se connecter");
        }
        
        var_dump($content);
        $event->setArguments($newArguments);
    }
}