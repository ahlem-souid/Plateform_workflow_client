<?php

namespace App\Tests\Controller;
use App\Entity\Client;
use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ObjectManager;
use PHPUnit\Framework\TestCase;
use App\Controller\ClientController;
use Symfony\Component\Validator\Validation;
use Doctrine\ORM\EntityManagerInterface;

class ClientControllerTest extends TestCase
{
    public function testAjoutercontacttEror()
    { 
        $validator= Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator();

        $client=new Client();
        $client->setMail('ahlem.souid@gmail.com');
        $client->setCompany("trustit");
        $client->setContactName("Mohamed ouini");
        $client->setContactPosition("CEO");
        $client->setPhone("2460358");
        $client->setAdresse("manouba");
        $client->setType('stratup');

        $errors =$validator->validate($client);
        $this->assertEquals(0,count($errors));


    }


}
