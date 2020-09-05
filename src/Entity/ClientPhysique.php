<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClientPhysique
 *
 * @ORM\Table(name="client_physique", indexes={@ORM\Index(name="IDX_B11F1822FAD40BBD", columns={"typeclient_id"}), @ORM\Index(name="IDX_B11F18225D7C53EC", columns={"employeur_id"})})
 * @ORM\Entity
 */
class ClientPhysique
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
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=255, nullable=false)
     */
    private $telephone;

    /**
     * @var int
     *
     * @ORM\Column(name="salaire", type="integer", nullable=false)
     */
    private $salaire;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=false)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=255, nullable=false)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="passwd", type="string", length=255, nullable=false)
     */
    private $passwd;

    /**
     * @var string
     *
     * @ORM\Column(name="profession", type="string", length=255, nullable=false)
     */
    private $profession;

    /**
     * @var string
     *
     * @ORM\Column(name="nci", type="string", length=255, nullable=false)
     */
    private $nci;

    /**
     * @var \ClientMoral
     *
     * @ORM\ManyToOne(targetEntity="ClientMoral")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="employeur_id", referencedColumnName="id")
     * })
     */
    private $employeur;

    /**
     * @var \TypeClient
     *
     * @ORM\ManyToOne(targetEntity="TypeClient")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="typeclient_id", referencedColumnName="id")
     * })
     */
    private $typeclient;


}
