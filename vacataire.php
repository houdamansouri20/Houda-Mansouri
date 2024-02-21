<?php
// Inclusion de la classe "Personne"
include "personne.php";

// Définition de la classe "Vacataire" qui hérite de "Personne"
class Vacataire extends Personne
{
    private $diplome; // Diplôme du vacataire

    // Constructeur de la classe
    public function __construct($numero, $nom, $prenom, $heursup, $salaireHoraire, $diplome)
    {
        // Appel du constructeur de la classe parente avec les paramètres appropriés
        parent::__construct($numero, $nom, $prenom, $heursup, $salaireHoraire);

        $this->diplome = $diplome;
    }

    // Magic method to get the value of a property
    public function __get($attr)
    {
        return property_exists($this, $attr) ? $this->$attr : null;
    }

    // Magic method to set the value of a property
    public function __set($attr, $value)
    {
        if (property_exists($this, $attr)) {
            $this->$attr = $value;
        }
    }
    // Méthode pour calculer le salaire du vacataire
public function calcSalaire()
{
    // Tableau associatif pour stocker les salaires en fonction du niveau d'expérience
    $salaires = [
        "débutant" => 50,
        "intermédiaire" => 70,
        "expérimenté" => 90,
    ];

    // Assigner le salaire horaire en fonction du niveau d'expérience, avec une valeur par défaut de 40
    $this->salaireHoraire = $salaires[$this->niveauExperience] ?? 40;

    // Calculer le salaire total en fonction des heures supplémentaires
    $salaireTotal = $this->salaireHoraire * $this->heursup;

    return $salaireTotal;
}
}