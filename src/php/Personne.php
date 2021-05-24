<?php


class Personne
{
    private int $id_personne;
    private string $prenom;
    private string $nom;
    private string $numero;
    private string $adresse;
    private string $mail;
    private string $birthdate;
    private string $password;
    private string $statut;
    private int $locked;
    private string $dateFinAbo;

    public function __construct($id_personne,$prenom,$nom,$numero,$adress,$mail,$birthdate,$password,$statut,$locked,$dateFinAbo)
    {

        $this->id_personne=$id_personne;
        $this->prenom=$prenom;
        $this->nom=$nom;
        $this->numero=$numero;
        $this->adresse=$adress;
        $this->mail=$mail;
        $this->birthdate=$birthdate;
        $this->password=$password;
        $this->$statut=$statut;
        $this->locked=$locked;
        $this->dateFinAbo=$dateFinAbo;

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

    /**
     * @return string
     */
    public function getAdresse(): string
    {
        return $this->adresse;
    }

    /**
     * @return string
     */
    public function getBirthdate(): string
    {
        return $this->birthdate;
    }

    /**
     * @return string
     */
    public function getDateFinAbo(): string
    {
        return $this->dateFinAbo;
    }

    /**
     * @return int
     */
    public function getLocked(): int
    {
        return $this->locked;
    }

    /**
     * @return string
     */
    public function getMail(): string
    {
        return $this->mail;
    }

    /**
     * @return string
     */
    public function getNumero(): string
    {
        return $this->numero;
    }

    /**
     * @return string
     */
    public function getStatut(): string
    {
        return $this->statut;
    }
}