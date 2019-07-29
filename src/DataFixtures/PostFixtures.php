<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Posts;

class PostFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);


        for($i = 0;$i < 10; $i++){

            $posts = new Posts();
            $posts->setTitle("Enquête après le meurtre d'une militante LGBT à Saint-Pétersbourg")
                ->setContent("Elena Grigorieva, 41 ans, a été retrouvée morte à Saint-Pétersbourg. Cette militante russe des droits LGBT aurait reçu plusieurs coups de couteau. Selon son entourage, elle recevait régulièrement des menaces et aurait porté plainte en vain.

")
                ->setContents("Une militante des droits des personnes LGBT a été retrouvée morte le 21 juillet dernier dans la ville de Saint-Petersbourg, en Russie. Elena Grigorieva était une activiste particulièrement engagée, non seulement sur la question des droits LGBT, mais également sur celle de la Crimée, dont elle contestait le rattachement à la Russie depuis 2014.
            Selon le militant d'opposition Dinar Idrissov, Elena Grigorieva, âgée de 41 ans, «a été sauvagement tuée près de chez elle» le 19 au soir. Les enquêteurs, de leur côté, on annoncé que son corps, sans vie, avait été retrouvé avec «de multiples blessures au couteau».

«Elle avait été récemment victime de violences et de menaces», témoigne Dinar Idrissov. Selon lui, elle avait à plusieurs reprises déposé plainte, sans que la police ne réagisse, selon un message qu'il a publié dans la foulée de l'annonce de sa mort sur Facebook. Il affirme en outre que le nom de Elena Grigorieva figurait sur une liste de personnalités identifiées de manière hostile par «un site homophobe qui menace les militants LGBT dans tout le pays depuis longtemps», et récemment bloqué.

Elena Grigorieva aurait reçu plusieurs coups dans le dos, mais également au visage. Elle aurait en outre été étranglée. Selon Fontanka, un média russe en ligne, un suspect aurait déjà été arrêté.")
                ->setCreatedAt(new \DateTime());
            $manager->persist($posts);
        }

        $manager->flush();
    }
}
