<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Compte
 *
 * @ORM\Table(name="compte", indexes={@ORM\Index(name="IDX_CFF65260E91486CD", columns={"clttMoral_id"}), @ORM\Index(name="IDX_CFF65260C54C8C93", columns={"type_id"}), @ORM\Index(name="IDX_CFF652602CC9D3B8", columns={"cltPhysique_id"})})
 * @ORM\Entity
 */
class Compte
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
     * @ORM\Column(name="numero", type="string", length=255, nullable=false)
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="cleRip", type="string", length=255, nullable=false)
     */
    private $clerip;

    /**
     * @var int
     *
     * @ORM\Column(name="solde", type="integer", nullable=false)
     */
    private $solde;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255, nullable=false)
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="dateCreation", type="string", length=255, nullable=false)
     */
    private $datecreation;

    /**
     * @var string
     *
     * @ORM\Column(name="dateFermeture", type="string", length=255, nullable=false)
     */
    private $datefermeture;

    /**
     * @var string
     *
     * @ORM\Column(name="dateFerTempo", type="string", length=255, nullable=false)
     */
    private $datefertempo;

    /**
     * @var string
     *
     * @ORM\Column(name="dateReouverture", type="string", length=255, nullable=false)
     */
    private $datereouverture;

    /**
     * @var \ClientPhysique
     *
     * @ORM\ManyToOne(targetEntity="ClientPhysique")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cltPhysique_id", referencedColumnName="id")
     * })
     */
    private $cltphysique;

    /**
     * @var \TypeCompte
     *
     * @ORM\ManyToOne(targetEntity="TypeCompte")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_id", referencedColumnName="id")
     * })
     */
    private $type;

    /**
     * @var \ClientMoral
     *
     * @ORM\ManyToOne(targetEntity="ClientMoral")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="clttMoral_id", referencedColumnName="id")
     * })
     */
    private $clttmoral;


}
