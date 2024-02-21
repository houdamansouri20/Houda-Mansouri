<?php
// Classe abstraite de base représentant une personne
abstract class Personne {
    protected $numero;          // Numéro de la personne
    protected $nom;             // Nom de la personne
    protected $prenom;          // Prénom de la personne
    protected $heuresup;        // Heures supplémentaires effectuées
    protected $salairhoraire;   // Salaire horaire de la personne

    // Constructeur pour initialiser les propriétés de la personne
    public function __construct($num, $nom, $prenom, $hs, $sh) {
        $this->numero = $num;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->heuresup = $hs;
        $this->salairhoraire = $sh;
    }

    // Méthode magique pour afficher la personne sous forme de chaîne
    public function __toString() {
        return $this->numero . ' ' . strtoupper($this->nom);
    }

    // Méthode magique pour accéder aux propriétés protégées
    public function __get($attr) {
        if (property_exists($this, $attr)) {
            return $this->$attr;
        }
    }
    public function __set($attr, $value) {
        if (property_exists($this, $attr)) {
            $this->$attr = $value;
        }
}
//méthode abstraite pour calcul de salaire
abstract public function calculesalaire();
}
?>