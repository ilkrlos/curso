<?php

namespace App\Entity\Sis;

use App\Repository\Sis\PersonaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonaRepository::class)]
#[ORM\Table(name: "personas", schema: "m_sis")]
class Persona
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "pers_id")]
    private ?int $id = null;

    #[ORM\Column(name: "pers_apellido", length: 100, nullable: true)]
    private ?string $apellido = null;

    #[ORM\Column(name: "pers_nombre", length: 60, nullable: true)]
    private ?string $nombre = null;

    #[ORM\Column(name: "pers_documento", nullable: true)]
    private ?int $documento = null;

    #[ORM\Column(name: "pers_cuit", nullable: false )]
    private ?int $cuit = null;

    #[ORM\Column(name: "pers_nro_ib", nullable: true)]
    private ?int $nroIb = null;

    #[ORM\Column(name: "pers_f_nacimiento", type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $fechaNacimiento = null;

    #[ORM\Column(name: "pers_f_fallecimiento", type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $fechaFallecimiento = null;

    #[ORM\Column(name: "pers_es_verificado", nullable: true )]
    private ?bool $esVerificado = null;

    #[ORM\Column(name: "pers_nro_proveedor", nullable: true)]
    private ?int $numeroProveedor = null;

    #[ORM\Column(name: "pers_f_verificado", type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $fechaVerificacion = null;

    #[ORM\Column(name: "pers_f_alta", type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $fechaAlta = null;

    #[ORM\Column(name: "pers_operador", )]
    private ?int $operador = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(?string $apellido): static
    {
        $this->apellido = $apellido;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getDocumento(): ?int
    {
        return $this->documento;
    }

    public function setDocumento(?int $documento): static
    {
        $this->documento = $documento;

        return $this;
    }

    public function getCuit(): ?int
    {
        return $this->cuit;
    }

    public function setCuit(int $cuit): static
    {
        $this->cuit = $cuit;

        return $this;
    }

    public function getNroIb(): ?int
    {
        return $this->nroIb;
    }

    public function setNroIb(?int $nroIb): static
    {
        $this->nroIb = $nroIb;

        return $this;
    }

    public function getFechaNacimiento(): ?\DateTimeInterface
    {
        return $this->fechaNacimiento;
    }

    public function setFechaNacimiento(?\DateTimeInterface $fechaNacimiento): static
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    public function getFechaFallecimiento(): ?\DateTimeInterface
    {
        return $this->fechaFallecimiento;
    }

    public function setFechaFallecimiento(?\DateTimeInterface $fechaFallecimiento): static
    {
        $this->fechaFallecimiento = $fechaFallecimiento;

        return $this;
    }

    public function isEsVerificado(): ?bool
    {
        return $this->esVerificado;
    }

    public function setEsVerificado(bool $esVerificado): static
    {
        $this->esVerificado = $esVerificado;

        return $this;
    }

    public function getNumeroProveedor(): ?int
    {
        return $this->numeroProveedor;
    }

    public function setNumeroProveedor(?int $numeroProveedor): static
    {
        $this->numeroProveedor = $numeroProveedor;

        return $this;
    }

    public function getFechaVerificacion(): ?\DateTimeInterface
    {
        return $this->fechaVerificacion;
    }

    public function setFechaVerificacion(\DateTimeInterface $fechaVerificacion): static
    {
        $this->fechaVerificacion = $fechaVerificacion;

        return $this;
    }

    public function getFechaAlta(): ?\DateTimeInterface
    {
        return $this->fechaAlta;
    }

    public function setFechaAlta(\DateTimeInterface $fechaAlta): static
    {
        $this->fechaAlta = $fechaAlta;

        return $this;
    }

    public function getOperador(): ?int
    {
        return $this->operador;
    }

    public function setOperador(int $operador): static
    {
        $this->operador = $operador;

        return $this;
    }
}
