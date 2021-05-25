<?php


class Personne
{
    private $id_personne;
    private $prenom;
    private $nom;
    private $mail;
    private $statut;
    private $locked;

    public function __construct($id_personne,$nom,$prenom,$mail,$locked,$statut)
    {

        $this->id_personne=$id_personne;
        $this->prenom=$prenom;
        $this->nom=$nom;
        $this->mail=$mail;
        $this->statut=$statut;
        $this->locked=$locked;

    }

    public function getIdPersonne(): int
    {
        return $this->id_personne;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }


    public function getLocked(): int
    {
        return $this->locked;
    }

    public function getMail(): string
    {
        return $this->mail;
    }

    public function getStatut(): string
    {
        return $this->statut;
    }
}