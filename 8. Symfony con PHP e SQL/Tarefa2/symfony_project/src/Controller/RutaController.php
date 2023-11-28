<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Ruta;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\RutaRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class RutaController extends AbstractController {

    //AÑADIR MEDIANTE XESTOR DA ENTIDADE
    #[Route('/ruta/new')]
    public function new(EntityManagerInterface $entityManager): Response {

        $ruta1 = new Ruta();
        $ruta1->setNombre('Montaña Palentina');
        $ruta1->setComunidad('Castilla y León');
        $ruta1->setLugar('Palencia');
        $ruta1->setModalidad('Montaña, Gravel');
        $ruta1->setDificultad('Media');
        $ruta1->setImagen('palencia.jpg');
        $ruta1->setMapa('https://www.komoot.com/es-es/collection/1197536/embed');
        $ruta1->setSlug('palencia');
        $entityManager->persist($ruta1);

        $ruta2 = new Ruta();
        $ruta2->setNombre('Pirineos Catalanes');
        $ruta2->setComunidad('Cataluña');
        $ruta2->setLugar('Cataluña');
        $ruta2->setModalidad('Montaña');
        $ruta2->setDificultad('Media-Alta');
        $ruta2->setImagen('cataluna.jpg');
        $ruta2->setMapa('https://www.komoot.com/es-es/collection/1091707/embed');
        $ruta2->setSlug('cataluna');
        $entityManager->persist($ruta2);

        $entityManager->flush();

        return new Response(sprintf(
            'Se han añadido las rutas con ids %s y %s',
            $ruta1->getId(),
            $ruta2->getId()
        ));
    }


    // INICIO
    #[Route('/rutas', name:'rutas')]
    public function inicio(Request $request, EntityManagerInterface $entityManager): Response {

        $dificultad = $request->query->get('dificultad');
        $orderBy = $request->query->get('orderBy');

        // QueryBuilder
        $repository = $entityManager->getRepository(Ruta::class);
        $queryBuilder = $repository->createQueryBuilder('r');

        if ($dificultad == 'media') {
            $queryBuilder->where('r.dificultad = :dificultad')->setParameter('dificultad', 'media');
        } elseif ($dificultad == 'media-alta') {
            $queryBuilder->where('r.dificultad = :dificultad')->setParameter('dificultad', 'media-alta');
        }

        if ($orderBy == 'nombre') {
            $queryBuilder->orderBy('r.nombre', 'DESC');
        }

        $rutas = $queryBuilder->getQuery()->getResult();

        return $this->render('rutas/inicio.html.twig', [
            'title' => 'Rutas Cicloturistas',
            'rutas' => $rutas,
        ]);
    }


    // DETALLE
    #[Route('/rutas/{id}', name:'ruta_detalle')]
    public function detalle($id, RutaRepository $rutaRepository): Response {

        $ruta = $rutaRepository->find($id);
        if (!$ruta) {
            throw $this->createNotFoundException('La ruta no existe');
        }
    
        return $this->render('rutas/detalle.html.twig', [
            'title' => $ruta->getNombre(),
            'ruta' => $ruta,
        ]);
    }


    // INFORMACION
    #[Route('/informacion', name:'ruta_informacion')]
    public function informacion(RutaRepository $rutaRepository): Response {

        return $this->render('rutas/informacion.html.twig', [
            'title' => 'Información',
            'alumno'=> 'Ricardo Gómez Costa',
            'ciclo'=> 'DAW',
        ]);
    }


    // API
    #[Route('/api/rutas', name:'api')]
    public function api(EntityManagerInterface $entityManager): JsonResponse {

        $rutaRepository = $entityManager->getRepository(Ruta::class);
        $rutas = $rutaRepository->findAll();
        $datos = [];

        foreach ($rutas as $ruta) {
            $datos[] = [
                'id' => $ruta->getId(),
                'nombre' => $ruta->getNombre(),
                'comunidad' => $ruta->getComunidad(),
                'lugar' => $ruta->getLugar(),
                'modalidad' => $ruta->getModalidad(),
                'imagen' => $ruta->getImagen(),
                'mapa' => $ruta->getMapa(),
                'slug' => $ruta->getSlug()
            ];
        }

        return new JsonResponse($datos);
    }
}
 
    

    


    