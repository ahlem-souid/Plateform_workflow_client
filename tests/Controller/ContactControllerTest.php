<?php

namespace App\Tests\Controller;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class ContactControllerTest extends WebTestCase
{ /** @var \Doctrine\ORM\EntityManager */
    private $entityManager;

    public function setUp()
    {
        $kernel = self::bootKernel();
        $this->entityManager = $kernel
            ->getContainer()
            ->get('doctrine')
            ->getManager();
    }
   
    public function testContact()
    {  
        $mailer= new \Swift_Mailer($this->getTransport());
        $message=new \Swift_Message("test Contact","test mail");
        $message ->setFrom('ahlem.1998souid@gmail.com');
        $message->setTo('Nadia.belhaj@gmail.com');
       $verif=$mailer->send($message);
       
        $this->assertEquals(0 ,$verif);
    }
}
