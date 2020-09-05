<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FraisBancaire
 *
 * @ORM\Table(name="frais_bancaire", indexes={@ORM\Index(name="IDX_E0D9213B92787C86", columns={"typefrai_id"}), @ORM\Index(name="IDX_E0D9213BF2C56620", columns={"compte_id"})})
 * @ORM\Entity
 */
class FraisBancaire
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
     * @var int
     *
     * @ORM\Column(name="frai", type="integer", nullable=false)
     */
    private $frai;

    /**
     * @var string
     *
     * @ORM\Column(name="date", type="string", length=255, nullable=false)
     */
    private $date;

    /**
     * @var \TypeFrais
     *
     * @ORM\ManyToOne(targetEntity="TypeFrais")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="typefrai_id", referencedColumnName="id")
     * })
     */
    private $typefrai;

    /**
     * @var \Compte
     *
     * @ORM\ManyToOne(targetEntity="Compte")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="compte_id", referencedColumnName="id")
     * })
     */
    private $compte;


}
