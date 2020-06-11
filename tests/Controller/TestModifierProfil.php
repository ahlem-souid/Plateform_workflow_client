<?php

namespace App\Tests\Controller;


use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Validator\Validation;

class TestModifierProfil extends WebTestCase
{
    /** @var \Doctrine\ORM\EntityManager */
    private $entityManager;

    public function setUp(){

        $kernel = self::bootKernel();
        $this->entityManager = $kernel
            ->getContainer()
            ->get('doctrine')
            ->getManager();}
    public function testModfierprofil()
    {  $validator= Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator();
        $utilisteur=$this-> entityManager
            ->getRepository(User::class)
            ->findOneBy(['email'=>'Ahlem.souid@gmail.com']);
        $this->assertEquals("Ahlem.souid@gmail.com" ,$utilisteur->getEmail());
        $this->assertEquals("souid ahlem",$utilisteur->getResponsableName());
        $utilisteur->setResponsableName('ahlem ');
        $this->entityManager->persist($utilisteur);
        $this->entityManager->flush();

        $utilisteur=$this-> entityManager
            ->getRepository(User::class)
            ->findOneBy(['email'=>'Ahlem.souid@gmail.com']);
        $this->assertEquals("Ahlem.souid@gmail.com" ,$utilisteur->getEmail());
        $this->assertEquals("ahlem ",$utilisteur->getResponsableName());
    }
    public function testModfierprofilfailure()
    {
        $validator = Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator();
        $utilisteur = $this->entityManager
            ->getRepository(User::class)
            ->findOneBy(['email' => 'Ahlem.souid@gmail.com']);
        $this->assertEquals("Ahlem.souid@gmail.com", $utilisteur->getEmail());
        $this->assertEquals("Souid ahlem", $utilisteur->getResponsableName());
        $utilisteur->setResponsableName(null);
        $this->entityManager->persist($utilisteur);
        $this->entityManager->flush();


    }
    }
