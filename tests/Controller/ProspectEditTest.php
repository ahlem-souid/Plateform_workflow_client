<?php

namespace App\Tests\Controller;
use App\Entity\Prospect;
use PHPUnit\Framework\TestCase;
use App\Controller\ProspectController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class ProspectEditTest extends WebTestCase
{  /** @var \Doctrine\ORM\EntityManager */
    private $entityManager;

    public function setUp()
    {
        $kernel = self::bootKernel();
        $this->entityManager = $kernel
            ->getContainer()
            ->get('doctrine')
            ->getManager();
    }
   
    
    public function testEdit()
    {
           $propsect= $this->entityManager
          ->getRepository(Prospect::class)
          ->findOneBy(['mail'=>'ahlem.souid@gmail.com']);
           $this->assertEquals("ahlem.souid@gmail.com",$propsect->getMail());
          $this->assertEquals("ahlem",$propsect->getContactName());

        $propsect->setContactName('souid ahlem');
         $this->entityManager->persist($propsect);
         $this->entityManager->flush();

          $propsect=$this->entityManager
          ->getRepository(Prospect::class)
          ->findOneBy(['mail'=>'ahlem.souid@gmail.com']);
           $this->assertEquals("ahlem.souid@gmail.com",$propsect->getMail());
          $this->assertEquals(" souid ahlem",$propsect->getContactName());


    }


}
