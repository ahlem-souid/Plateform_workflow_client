<?php

namespace App\Tests\Controller;

use App\Controller\ProspectController;
use App\Entity\Prospect;
use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Validator\Validation;

class ProspectControllerTest extends WebTestCase
{
    /** @var \Doctrine\ORM\EntityManager */
    private $entityManager;

    public function setUp()
    {
        $kernel = self::bootKernel();
        $this->entityManager = $kernel
            ->getContainer()
            ->get('doctrine')
            ->getManager();
    }
  
     public function testprospectechec()
    {
        $validator= Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator();
        $utilisteur=$this-> entityManager
            ->getRepository(User::class)
            ->find(13);
        $this->assertEquals(13 ,$utilisteur->getId());

        $prospect=new Prospect();
         $prospect->setContactName('ahlem souid');
          $prospect->setContactPosition('directeur');
           $prospect->setCompany('Trustit');
           $prospect->setMail('ahlem.souid@gmail.com');
           $prospect->setAdresse('manouba');
           $prospect->setPhone('54603077');
           $prospect->setEtat('1');
            $prospect->setType('startup');
            $prospect->setUtilisateur($utilisteur);
            $prospect->setPourcentageAvan('10%');

        $errors =$validator->validate($prospect);
        $this->assertEquals(0,count($errors));

        $this->entityManager->persist($prospect);
        $this->entityManager->flush();






    }


}
