<?php

namespace App\BorrowingService;

use App\Entity\Borrowing;
use App\Repository\BorrowingRepository;

class LagManager 
{
    private $borrowing;

    public function __construct(BorrowingRepository $borrowing)
    {
        $this->borrowing = $borrowing;
    }

    public function late()
    {
               
        if($this->borrowing->expectedReturnDate())
        {
            $email = (new Email())
                    ->from('hello@example.com')
                    ->to('you@example.com')
                    ->subject('Time for Symfony Mailer!')
                    ->text('Sending emails is fun again!')
                    ->html('<p>See Twig integration for better HTML integration!</p>');
        
                $mailer->send($email);
        }
    }
   
}
