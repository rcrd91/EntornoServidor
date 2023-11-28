<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RutaController extends AbstractController {

   private $rutas = [
        [
            'nombre' => 'Montaña Palentina',
            'comunidad' => ' Castilla y León',
            'lugar'=>'Palencia',
            'modalidad' => 'Montaña, Gravel',
            'dificultad' => 'Media',
            'imagen' => 'palencia.jpg',
            'mapa' => 'https://www.komoot.com/es-es/collection/1197536/embed',
            'slug' => 'palencia'
        ],
        [
            'nombre' => 'Pirineos Catalanes',
            'comunidad' => 'Cataluña',
            'lugar'=>'Cataluña',
            'modalidad' => 'Montaña',
            'dificultad' => 'Media-Alta',
            'imagen' => 'cataluna.jpg',
            'mapa' => 'https://www.komoot.com/es-es/collection/1091707/embed',
            'slug' => 'cataluna'
        ],
        [
            'nombre' => 'Faros Vascos',
            'comunidad' => 'País Vasco',
            'lugar'=>'País Vasco',
            'modalidad' => 'Carretera, Montaña, Gravel',
            'dificultad' => 'Media',
            'imagen' => 'euskadi.jpg',
            'mapa' => 'https://www.komoot.com/es-es/collection/1085242/embed',
            'slug' => 'euskadi'
        ],
        [
            'nombre' => 'Sierra de Tramuntana',
            'comunidad' => 'Mallorca',
            'lugar'=>'Mallorca',
            'modalidad' => 'Carretera, Montaña, Gravel',
            'dificultad' => 'Media-Alta',
            'imagen' => 'mallorca.jpg',
            'mapa' => 'https://www.komoot.com/es-es/collection/1296569/embed',
            'slug' => 'mallorca'
        ],
        [
            'nombre' => 'Bosques del Sur',
            'comunidad' => 'Andalucía',
            'lugar'=>'Andalucía',
            'modalidad' => 'Montaña, Gravel',
            'dificultad' => 'Media-Alta',
            'imagen' => 'andalucia.jpg',
            'mapa' => 'https://www.komoot.com/es-es/collection/1356406/embed',
            'slug' => 'andalucia'
        ],
        [
            'nombre' => 'Montsec Bikepacking Loop',
            'comunidad' => 'Aragon',
            'lugar'=>'Aragón y Cataluña',
            'modalidad' => 'Montaña, Gravel',
            'dificultad' => 'Media-Alta',
            'imagen' => 'aragon.jpg',
            'mapa' => 'https://www.komoot.com/es-es/collection/1370137/embed',
            'slug' => 'aragon'
        ],
        [
            'nombre' => 'Lanzarote',
            'comunidad' => 'Canarias',
            'lugar'=>'Lanzarote',
            'modalidad' => 'Montaña, Gravel',
            'dificultad' => 'Media',
            'imagen' => 'lanzarote.jpg',
            'mapa' => 'https://www.komoot.com/es-es/collection/1095778/embed',
            'slug' => 'lanzarote'
        ],
        [
            'nombre' => 'Summits9',
            'comunidad' => 'Cataluña',
            'lugar'=>'Girona',
            'modalidad' => 'Montaña, Gravel',
            'dificultad' => 'Media-Alta',
            'imagen' => 'girona.jpg',
            'mapa' => 'https://www.komoot.com/es-es/collection/1152408/embed',
            'slug' => 'girona'
        ],
        [
            'nombre' => 'Transfronteriza por Cataluña',
            'comunidad' => 'Cataluña',
            'lugar'=>'Cataluña',
            'modalidad' => 'Montaña, Gravel',
            'dificultad' => 'Media',
            'imagen' => 'cataluna2.jpg',
            'mapa' => 'https://www.komoot.com/es-es/collection/1369158/embed',
            'slug' => 'palencia'
        ],
        [
            'nombre' => 'La Rioja',
            'comunidad' => 'La Rioja',
            'lugar'=>'La Rioja',
            'modalidad' => 'Montaña, Gravel',
            'dificultad' => 'Media',
            'imagen' => 'rioja.jpg',
            'mapa' => 'https://www.komoot.com/es-es/collection/1176612/embed',
            'slug' => 'rioja'
        ]
        
    ];

    // INICIO
    #[Route('/rutas')]
    public function inicio(): Response {
        return $this->render('rutas/inicio.html.twig', [
            'title' => 'Rutas Cicloturistas',
            'rutas' => $this->rutas,
        ]);
    }

    // DETALLE
    #[Route('/rutas/{slug}', methods: ['GET'])]
    public function detalle(string $slug): Response {

        $rutas = null;
        foreach ($this->rutas as $ruta) {
            if ($ruta['slug'] == $slug) {
                $rutas = $ruta;
                break;
            }
        }

        if (!$rutas) {
            throw $this->createNotFoundException('La ruta no existe');
        }

        return $this->render('rutas/detalle.html.twig', [
            'title' => $rutas['nombre'],
            'rutas' => $rutas
        ]);
    }

    // INFORMACIÓN
    #[Route('/informacion')]
    public function informacion(): Response {
        return $this->render('rutas/informacion.html.twig', [
            'title' => 'Información',
            'alumno'=> 'Ricardo Gómez Costa',
            'ciclo'=> 'DAW'
        ]);
    }

    // API (devolve JsonResponse)
    #[Route('/api/rutas')]
    public function api(): JsonResponse {
        $data = json_encode($this->rutas);
        return new JsonResponse($data, 200, [], true);
    }
}
 
    

    


    