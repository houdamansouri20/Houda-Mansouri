<?php
// Inclusion de la classe "Personne"
include "personne.php";
//classe formateur qui herite de la classe personne
class Formateur extends Personne {
    private $salairefixe;
    private $niveau;
// constructeur de la classe formateur
    public function __construct($num, $nom, $prenom, $hs, $sh, $salairefixe, $niveau) {
        //Appel du constructeur de la classe parente(personne)
        parent::__construct($num, $nom, $prenom, $hs, $sh);
        //initialisation des propriétés spécifiques a la classe formateur
        $this->salairefixe = $salairefixe;
        $this->niveau = $niveau;
    }
   // Méthode magique pour obtenir la valeur d'une propriété
 public function __get($attr)
 {
     // Vérifie l'existence de la propriété et renvoie sa valeur
     return property_exists($this, $attr) ? $this->$attr : null;
 }


// Méthode magique pour définir la valeur d'une propriété
 public function __set($attr, $value)
 {
     
// Vérifier l'existence de la propriété et définir sa valeur
     if (property_exists($this, $attr)) {
         $this->$attr = $value;
     }
 }
// Méthode pour calculer le salaire du formateur
public function calcSalaire() {
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
 