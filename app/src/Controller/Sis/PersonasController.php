<?php

namespace App\Controller\Sis;

use App\Entity\Sis\Persona;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Encoder\JsonEncode;
use Symfony\Component\Serializer\SerializerInterface;

class PersonasController extends AbstractController
{
    #[Route('/personas/listar', name: 'app_personas_listar')]
    public function listar(EntityManagerInterface $em, SerializerInterface $serializer, string $apellido): JsonResponse
    {
        $repo = $em->getRepository(Persona::class);
        $personas= $repo->findBy(['apellido' => $apellido]);
        $rdo = [];
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
        $rdo['total']=sizeof($rdo);
        $json = $serializer->serialize($rdo, 'json');
        $response = new JsonResponse($json, 200, [], true);
        
        return $response; 

    }
    #[Route('/personas', name: 'app_personas_index')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Bienvenido al controlador Personas!',
            'path' => 'src/Controller/Sis/PersonasController.php',
        ]);
    }

    #[Route('/personas/editar', name: 'app_personas_editar')]
    public function editar(): JsonResponse
    {
        return $this->json([
            'message' => 'Editar los datos de la persona'
        ]);

    }
}
