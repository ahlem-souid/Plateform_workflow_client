<?php

namespace App\Tests\Controller;

use App\Controller\OffreController;
use App\Entity\Offre;
use App\Entity\User;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Validator\Validation;

class OffreControllerTest extends WebTestCase
{
    /** @var \Doctrine\ORM\EntityManager */
    private $entityManager;

    public function setUp(){

    $kernel = self::bootKernel();
    $this->entityManager = $kernel
        ->getContainer()
        ->get('doctrine')
        ->getManager();}

     public function testoffreechec()
     {
         $validator = Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator();
         $utilisteur = $this->entityManager
             ->getRepository(User::class)
             ->find(13);
         $this->assertEquals(13, $utilisteur->getId());
         $offre = new Offre();
         $offre->setType('Essentiel');
         $offre->setEmail('ahlem.souid@gmail.com');
         $offre->setNOM('ahlem souid');
         $offre->setSociete('Trustit');
         $offre->setNumerot('54603077');
         $offre->setUtilisateur($utilisteur);
         $offre->setDateD(\DateTime::createFromFormat('Y-m-d', "2020-06-05"));
         $offre->setDatef(\DateTime::createFromFormat('Y-m-d', "2020-07-05"));
         $errors = $validator->validate($offre);
         $this->assertEquals(0, count($errors));
         $this->entityManager->persist($offre);
         $this->entityManager->flush();
     }


}
