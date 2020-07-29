<?php

namespace App\BorrowingService;


use App\Repository\BorrowingRepository;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;


class LagManager 
{
    private BorrowingRepository $borrowing;
    private MailerInterface $mailer;


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

            $this->mailer->send($email);
        }
    }

    public function dateClose()
    {
        if($this->borrowing->warningReturn())
        {
            $email = (new Email())
                    ->from('hello@example.com')
                    ->to('you@example.com')
                    ->subject('Time for Symfony Mailer!')
                    ->text('Sending emails is fun again!')
                    ->html('<p>See Twig integration for better HTML integration!</p>');

            $this->mailer->send($email);

        }
    }

}



