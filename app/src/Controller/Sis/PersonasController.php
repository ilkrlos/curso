<?php

namespace App\Controller\Sis;

use App\Entity\Sis\Persona;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

class PersonasController extends AbstractController
{
    #[Route('/sis/personas/listar', name: 'app_sis_personas_listar')]
    public function listar(EntityManagerInterface $em, SerializerInterface $serializer): JsonResponse
    {
        $repo = $em->getRepository(Persona::class);
        $personas= $repo->findBy(['apellido' => 'salguero', 'nombre' => 'carlos']);
        foreach($personas as $persona)
        {
            /** @var $persona App\Entity\Sis\Persona */
            $value = ['apellido' => $persona->getApellido(),
            'nombre' => $persona->getNombre(),
            'documento' => $persona->getDocumento(),
            'cuit' => $persona->getCuit()
            ];
            $rdo[]=array('value'=>$value);

        }
        array_pop();
        $rdo['total']=sizeof($rdo);
        $json = $serializer->serialize($rdo, 'json');
        $response = new JsonResponse($json, 200, [], true);
        
        return $response; 

    }
    #[Route('/sis/personas', name: 'app_sis_personas')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Bienvenido al controlador Personas!',
            'path' => 'src/Controller/Sis/PersonasController.php',
        ]);
    }
}
