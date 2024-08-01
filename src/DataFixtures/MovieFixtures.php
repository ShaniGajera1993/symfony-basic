<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Movie;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $movie = new Movie();
        $movie->setTitle('The Matrix');
        $movie->setReleaseYear(1999);
        $movie->setDescription('A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.');
        $movie->setImagePath('https://sm.ign.com/t/ign_nordic/feature/h/how-to-wat/how-to-watch-the-matrix-movies-in-chronological-order_u9yq.2560.jpg');
        $movie->addActor($this->getReference('actor_1'));
        $movie->addActor($this->getReference('actor_2'));

        $manager->persist($movie);

        $movie1 = new Movie();
        $movie1->setTitle('The Matrix Reloaded');
        $movie1->setReleaseYear(2003);
        $movie1->setDescription('Six months after the events depicted in The Matrix, Neo has proved to be a good omen for the free humans, as they confront the agents of the matrix.');
        $movie1->setImagePath('https://i.cdn.newsbytesapp.com/images/l10620210513125442.jpeg'); 
        $movie1->addActor($this->getReference('actor_2'));
        $movie1->addActor($this->getReference('actor_4'));

        $manager->persist($movie1);

        $movie2 = new Movie();
        $movie2->setTitle('The Matrix Revolutions');
        $movie2->setReleaseYear(2003);
        $movie2->setDescription('The human city of Zion defends itself against the massive invasion of the machines as Neo and Trinity fight the cyber leaders and their tribunals.');
        $movie2->setImagePath('https://static1.srcdn.com/wordpress/wp-content/uploads/2020/03/Matrix-Revolutions-Failures-Featured.jpg'); 
        $movie2->addActor($this->getReference('actor_1'));
        $movie2->addActor($this->getReference('actor_3'));

        $manager->persist($movie2);


        $manager->flush();
    }
}
