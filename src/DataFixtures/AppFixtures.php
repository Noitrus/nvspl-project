<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
           
    public function load (ObjectManager $manager) 
    {
        for ($i = 0; $i < 5; $i++)
        {
            $pass='trolololo'.$i;
            $codePass=encodePassword($pass);
                    
            $user = new User();
            $user ->setUsername('Vardenis '.$i);
            $user ->setEmail($i.'_vardenis.pavardenis@mail.com');
            $user ->setPlainPassword($pass);
            $user ->setPassword($codePass);
            $manager->persist($user);
        }
       $manager->flush();
    }
}