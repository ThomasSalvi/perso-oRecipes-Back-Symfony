<?php

namespace App\DataFixtures;

use App\Entity\Ingredients;
use App\Entity\Recipe;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;
    
    public function __construct(UserPasswordEncoderInterface $encoder){
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        $user = new User();
        $user->setEmail('admin@admin.fr')
             ->setFirstname($faker->firstName())
             ->setLastname($faker->lastName());
        $password = $this->encoder->encodePassword($user, 'password');
        $user->setPassword($password);
        $manager->persist($user);

        for($i=0; $i<5; $i++) {
            $ingredient = new Ingredients();
            $ingredient->setQuantity($faker->randomDigit())
                       ->setUnit('g')
                       ->setName($faker->words(2,true));
            $manager->persist($ingredient);
        }
        for($i=0; $i<5; $i++) {
            $recipe = new Recipe();
            $recipe->setTitle($faker->word(2,true))
                       ->setAuthor(1)
                       ->setThumbnail('/img/test.jpg')
                       ->setSlug($faker->word(1,true))
                       ->setDifficulty(1)
                       ->setDescription($faker->word(15,true))
                       ->setInstructions($faker->word(50,true))
                       ->setName($faker->words(2,true));
            $manager->persist($recipe);
        }

        $manager->flush();
    }
}
