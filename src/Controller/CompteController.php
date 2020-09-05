<?php

namespace App\Controller;

use App\Entity\ClientMoral;
use App\Entity\ClientPhysique;
use App\Entity\Compte;
use App\Entity\FraisBancaire;
use App\Entity\Transaction;
use App\Entity\TypeClient;
use App\Entity\TypeCompte;
use App\Entity\TypeFrais;
use App\Entity\TypeTransaction;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\MakerBundle\Maker\MakeSerializerNormalizer;
use Symfony\Polyfill\Intl\Normalizer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
class CompteController extends AbstractController
{
    private $em;
    private $compte_repository;
    private $typefrais_repository;
    private $fransbancaire_repository;
    private $typecompte_repository;
    private $clientPhysique_repository;
    private $clientMoral_repository;
    private $typeClient_repository;
    private $typeTransaction_repository;
    private $Transaction_repository;

    public function __construct(EntityManagerInterface $emi)
    {
        $this->em=$emi;
        $this->compte_repository=$this->em->getRepository(Compte::class);
        $this->typeClient_repository=$this->em->getRepository(TypeClient::class);
        $this->clientMoral_repository=$this->em->getRepository(ClientMoral::class);
        $this->clientPhysique_repository=$this->em->getRepository(ClientPhysique::class);
        $this->Transaction_repository=$this->em->getRepository(Transaction::class);
        $this->fransbancaire_repository=$this->em->getRepository(FraisBancaire::class);
        $this->typefrais_repository=$this->em->getRepository(TypeFrais::class);
        $this->typecompte_repository=$this->em->getRepository(TypeCompte::class);
        $this->typeTransaction_repository=$this->em->getRepository(TypeTransaction::class);

    }

    /**
     * @Route("/compte", name="compte", methods={"GET|POST|PATCH"})
     */
    public function index()
    {
        /*$normalizer=$normalizer->normalize($this->compte_repository->findAll());
        dd(json_encode($normalizer));

        */
        if(isset($_GET['param']))
        {
            $param=$_GET['param'];
            $cmpte =$this->compte_repository->findBy(array('numero' => $param));
            $retour["success"]=true;
            $retour["message"]="Liste des comptes";
            $retour["data"]["id"]=$cmpte[0]->getId();
            $retour["data"]["numero"]=$cmpte[0]->getNumero();
            $retour["data"]["cleRipe"]=$cmpte[0]->getCleRip();
            $retour["data"]["solde"]=$cmpte[0]->getSolde();
            $retour["data"]["etat"]=$cmpte[0]->getEtat();
            $retour["data"]["dateCreation"]=$cmpte[0]->getDateCreation();
            $retour["data"]["dateFermeture"]=$cmpte[0]->getDateFermeture();
            $retour["data"]["dateFermTempo"]=$cmpte[0]->getDateFerTempo();
            $retour["data"]["type"]=$cmpte[0]->getType()->getLibelle();
            $retour["data"]["dateFermTempo"]=$cmpte[0]->getDateFerTempo();
            $retour["data"]["dateReouverture"]=$cmpte[0]->getDateReouverture();

            if($cmpte[0]->getCltphysique()!=null)
            {
                $tabCP["id"]=$cmpte[0]->getCltphysique()->getId();
                $tabCP["nom"]=$cmpte[0]->getCltphysique()->getNom();
                $tabCP["prenom"]=$cmpte[0]->getCltphysique()->getPrenom();
                $tabCP["telephone"]=$cmpte[0]->getCltphysique()->getTelephone();
                $tabCP["salaire"]=$cmpte[0]->getCltphysique()->getSalaire();
                $tabCP["adresse"]=$cmpte[0]->getCltphysique()->getAdresse();
                $tabCP["email"]=$cmpte[0]->getCltphysique()->getEmail();
                $tabCP["profession"]=$cmpte[0]->getCltphysique()->getProfession();
                $retour["data"]["clientPhysique"]=$tabCP;
                $retour["data"]["clientMoral"]=null;
            }
            else
            {
                $tabCM["id"]=$cmpte[0]->getClttmoral()->getId();
                $tabCM["nom"]=$cmpte[0]->getClttmoral()->getNom();
                $tabCM["raisonSocial"]=$cmpte[0]->getClttmoral()->getRaisonsocial();
                $tabCM["adresse"]=$cmpte[0]->getClttmoral()->getAdresse();
                $tabCM["ninea"]=$cmpte[0]->getClttmoral()->getNumIdentifiant();
                $tabCM["telephone"]=$cmpte[0]->getClttmoral()->getTelephone();
                $tabCM["email"]=$cmpte[0]->getClttmoral()->getEmail();
                $retour["data"]["clientMoral"]=$tabCM;
                $retour["data"]["clientPhysique"]=null;
            }
            if($cmpte[0]->getTransaction()!=null)
            {
                $listTransac=$cmpte[0]->getTransaction();
                $i=0;
                foreach ($listTransac as $transac)
                {
                    $tabTransac["id"]=$transac->getId();
                    $tabTransac["montant"]=$transac->getMontant();
                    $tabTransac["date"]=$transac->getDate();
                    $tabTransac["type"]=$transac->getType()->getLibelle();
                    $tabListTransac[$i++]=$tabTransac;
                }
                $retour["data"]["list_transaction"]=$tabListTransac;
            }

            echo(json_encode($retour));
            dd();

        }
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/CompteController.php',
        ]);
    }
}
