<?php


class Personne
{
    private  $id_personne;
    private  $prenom;
    private  $nom;
    private  $numero;
    private  $adresse;
    private  $mail;
    private  $birthdate;
    private  $password;
    private  $statut;
    private  $locked;
    private  $dateFinAbo;

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
