<?php
/**
 * 🚗 PROJET 01 : MA PREMIÈRE CLASSE
 * Concept : Classes & Objets
 *
 * 📖 Lis le README.md avant de commencer !
 */

// ─────────────────────────────────────────────────────────────────────────
// TODO 1 : Créer la classe Voiture
// ─────────────────────────────────────────────────────────────────────────
//
// Crée une classe 'Voiture' avec :
// - Propriété public $marque
// - Propriété public $couleur
// - Propriété public $vitesseMax
//
// Indice : class NomDeClasse { ... }

class Voiture {
    public $marque;
    public $couleur;
    public $vitesseMax;

    public function demarrer() {
        echo "🚗 Vrooooom ! La {$this->marque} démarre !\n";
    }

    public function klaxonner() {
        echo "🎺 POUET POUET ! ({$this->couleur})\n";
    }
}



// ─────────────────────────────────────────────────────────────────────────
// TODO 2 : Ajouter les méthodes
// ─────────────────────────────────────────────────────────────────────────
//
// Dans la classe Voiture, ajoute :
//
// 1. Une méthode demarrer() qui affiche :
//    "🚗 Vrooooom ! La [marque] démarre !"
//
// 2. Une méthode klaxonner() qui affiche :
//    "🎺 POUET POUET ! ([couleur])"
//
// Indice : Utilise $this-> pour accéder aux propriétés




// ─────────────────────────────────────────────────────────────────────────
// TODO 3 : Créer des objets
// ─────────────────────────────────────────────────────────────────────────
//
// Crée 2 voitures :
//
// Voiture 1 : $ferrari
// - marque: "Ferrari"
// - couleur: "Rouge"
// - vitesseMax: 320
//
// Voiture 2 : $twingo
// - marque: "Renault Twingo"
// - couleur: "Jaune"
// - vitesseMax: 150
//
// Indice : $objet = new NomClasse();

$ferrari = new Voiture();
$ferrari->marque = "Ferrari";
$ferrari->couleur = "Rouge";
$ferrari->vitesseMax = 320;

$twingo = new Voiture();
$twingo->marque = "Renault Twingo";
$twingo->couleur = "Jaune";
$twingo->vitesseMax = 150;



// ─────────────────────────────────────────────────────────────────────────
// TODO 4 : Tester les voitures
// ─────────────────────────────────────────────────────────────────────────
//
// Pour chaque voiture :
// 1. Fais-la démarrer
// 2. Fais-la klaxonner
// 3. Affiche sa vitesse max
//
// Exemple : $ferrari->demarrer();

echo "=== Test de la Ferrari ===\n";
$ferrari->demarrer();
$ferrari->klaxonner();
echo "Vitesse max : {$ferrari->vitesseMax} km/h\n\n";

echo "=== Test de la Twingo ===\n";
$twingo->demarrer();
$twingo->klaxonner();
echo "Vitesse max : {$twingo->vitesseMax} km/h\n";



// ─────────────────────────────────────────────────────────────────────────
// ✅ BRAVO ! Tu as terminé le Projet 01
// ─────────────────────────────────────────────────────────────────────────
//
// Tu as appris :
// ✅ Créer une classe
// ✅ Créer des objets (instances)
// ✅ Utiliser $this->
//
// 🎯 Prochaine étape : Projet 02 - Le Constructeur
//
?>
