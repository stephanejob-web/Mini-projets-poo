<?php
/**
 * 📐 PROJET 06 : CLASSES ABSTRAITES
 * Concept : Classes abstraites (forcer l'implémentation)
 *
 * 📖 Lis le README.md avant de commencer !
 */

// ─────────────────────────────────────────────────────────────────────────
// TODO 1 : Créer la classe ABSTRAITE Forme
// ─────────────────────────────────────────────────────────────────────────
//
// Crée une classe ABSTRAITE 'Forme' avec :
// - Mot-clé 'abstract' devant 'class'
// - Propriété protected $nom
// - Constructeur
// - Méthode ABSTRAITE calculerAire() (pas de code, juste la signature)
// - Méthode NORMALE afficher() qui affiche nom et aire
//
// Indice :
// abstract class Forme { ... }
// abstract public function calculerAire();

abstract class Animal {
    abstract public function cri(): string;
    // Je n'écris RIEN ici ! Pas de code !
}

class Chat extends Animal {
    public function cri(): string
    {
        return 'miaou';
    }
}

class Chien extends Animal {
    public function test(): string{
        return "hello";
    }
}


$chien = new Chien();

// ─────────────────────────────────────────────────────────────────────────
// TODO 2 : Créer la classe Cercle
// ─────────────────────────────────────────────────────────────────────────
//
// Crée une classe 'Cercle' qui hérite de Forme :
// - Propriété private $rayon
// - Constructeur qui appelle parent::__construct("Cercle") et stocke $rayon
// - IMPLÉMENTER calculerAire() : return pi() * $rayon * $rayon;
//
// Indice : Tu DOIS implémenter calculerAire(), sinon erreur !




// ─────────────────────────────────────────────────────────────────────────
// TODO 3 : Créer la classe Rectangle
// ─────────────────────────────────────────────────────────────────────────
//
// Crée une classe 'Rectangle' qui hérite de Forme :
// - Propriétés private $largeur, $hauteur
// - Constructeur
// - Implémenter calculerAire() : return $largeur * $hauteur;




// ─────────────────────────────────────────────────────────────────────────
// TODO 4 : Créer et tester des formes
// ─────────────────────────────────────────────────────────────────────────
//
// Crée :
// - Un cercle de rayon 5
// - Un rectangle de 10 × 20
//
// Affiche l'aire de chacun avec afficher()
//
// Essaie de créer une Forme directement :
// $forme = new Forme("Test");  ← Ça va planter ! C'est normal.




// ───────────                                                                     ──────────────────────────────────────────────────────────────
// ✅ BRAVO ! Tu as terminé le Projet 06
// ─────────────────────────────────────────────────────────────────────────
//
// Tu as appris :
// ✅ Les classes abstraites qui ne peuvent pas être instanciées
// ✅ Forcer les enfants à implémenter certaines méthodes
// ✅ Garantir une structure commune à toutes les classes enfants
//
// 🎯 Prochaine étape : Projet 07 - Interfaces (contrat 100% strict)
//
?>
