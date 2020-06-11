<?php

namespace App\Tests\Controller;


use App\Entity\Commande;
use App\Entity\Notification;
use App\Entity\Prospect;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Validator\Validation;

class Testnotifcation extends WebTestCase
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
    public function testNotification ()
    {
        $validator = Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator();
          $commande=new Commande();
          $this->entityManager->getRepository(Commande::class)->find(1);
        $this->assertEquals(1,$commande->getId());
          $notif= new Notification();
          $notif->setVu('1');
          $notif->setDateCreation(new\DateTime());
          $notif->setCommande($commande);

        $errors =$validator->validate($notif);
        $this->assertEquals(0,count($errors));

        $this->entityManager->persist($notif);
         $this->entityManager->flush();
    }}
