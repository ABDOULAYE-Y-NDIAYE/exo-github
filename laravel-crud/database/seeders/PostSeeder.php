<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'title' => 'Introduction à Laravel',
                'content' => "Laravel est un framework PHP moderne qui facilite le développement d'applications web robustes et élégantes.\n\nCe framework offre de nombreux avantages :\n- Architecture MVC claire\n- ORM Eloquent puissant\n- Système de routing intuitif\n- Gestion des migrations\n- Authentification intégrée\n\nLaravel permet aux développeurs de se concentrer sur la logique métier plutôt que sur les aspects techniques répétitifs.",
                'author' => 'Marie Dubois',
                'published' => true,
            ],
            [
                'title' => 'Les fondamentaux du CRUD',
                'content' => "CRUD est un acronyme qui représente les quatre opérations de base sur les données :\n\n• Create (Créer) : Ajouter de nouvelles données\n• Read (Lire) : Récupérer et afficher les données\n• Update (Mettre à jour) : Modifier les données existantes\n• Delete (Supprimer) : Effacer les données\n\nCes opérations constituent la base de la plupart des applications web modernes. Dans Laravel, nous utilisons les contrôleurs de ressources pour implémenter facilement ces fonctionnalités.",
                'author' => 'Pierre Martin',
                'published' => true,
            ],
            [
                'title' => 'Optimisation des performances web',
                'content' => "L'optimisation des performances est cruciale pour offrir une excellente expérience utilisateur.\n\nQuelques techniques essentielles :\n\n1. Optimisation des images\n2. Mise en cache intelligente\n3. Minification des fichiers CSS/JS\n4. Utilisation d'un CDN\n5. Optimisation des requêtes de base de données\n\nUne application rapide retient mieux les utilisateurs et améliore le référencement naturel.",
                'author' => 'Sophie Leroy',
                'published' => false,
            ],
            [
                'title' => 'Guide des bonnes pratiques en développement',
                'content' => "Le développement de qualité repose sur des pratiques éprouvées :\n\n• Code propre et lisible\n• Tests automatisés\n• Documentation complète\n• Contrôle de version avec Git\n• Révision de code en équipe\n• Déploiement automatisé\n\nCes pratiques permettent de maintenir un code de qualité, réduisent les bugs et facilitent la collaboration en équipe. Un investissement initial qui se révèle rapidement rentable.",
                'author' => 'Thomas Bernard',
                'published' => true,
            ],
            [
                'title' => 'L\'avenir du développement web',
                'content' => "Le paysage du développement web évolue rapidement avec l'émergence de nouvelles technologies :\n\n- Progressive Web Apps (PWA)\n- Framework JavaScript modernes\n- Architecture microservices\n- Intelligence artificielle\n- Développement serverless\n\nIl est essentiel de rester informé des tendances pour adapter nos compétences et offrir des solutions innovantes.",
                'author' => 'Amélie Rousseau',
                'published' => false,
            ]
        ];

        foreach ($posts as $postData) {
            Post::create($postData);
        }
    }
}
