<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeFrais
 *
 * @ORM\Table(name="type_frais")
 * @ORM\Entity
 */
class TypeFrais
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255, nullable=false)
     */
    private $libelle;

    /**
     * @var int
     *
     * @ORM\Column(name="frai", type="integer", nullable=false)
     */
    private $frai;


}
