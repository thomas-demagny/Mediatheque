<?php


namespace App\EventListener;


use App\Controller\SecurityController;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;

/**
 * Class ControllerListener
 * @package App\EventListener
 */
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
     * @param RequestEvent $event
     */
    public function onKernelRequest(RequestEvent $event)
    {
   /*     $content = $event->getController();
    if ($content[0] instanceof SecurityController && $content[1] === 'login')
    {

        $info = $event->getRequest();

var_dump($info->request);


    }*/

        $info = $event->getRequest()->attributes->get('_route');
        $method = $event->getRequest()->getMethod();
        if ($info === 'app_login' && $method == 'POST')
        {
            $username = $event->getRequest()->request->get('username');
            $password = $event->getRequest()->request->get('password');
            $this->logger->info("L'utilisateur " . $username . " avec le mot de passe : " . $password . " a tenté de se connecter");
        }

    }
}

