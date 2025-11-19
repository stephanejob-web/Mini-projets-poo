<?php
/**
 * 🎸 PROJET 05 : LE POLYMORPHISME
 * Concept : Polymorphisme (même méthode, comportements différents)
 *
 * 📖 Lis le README.md avant de commencer !
 */

// ─────────────────────────────────────────────────────────────────────────
// TODO 1 : Créer la classe parent Instrument
// ─────────────────────────────────────────────────────────────────────────

/**
 * Classe PARENT : Instrument
 *
 * C'est la classe de BASE pour tous les instruments de musique.
 * Tous les instruments auront un nom et pourront jouer de la musique.
 */
class Instrument {

    // Propriété PROTECTED : accessible dans cette classe ET dans les classes enfants
    // Si on mettait PRIVATE, les enfants (Guitare, Piano) ne pourraient pas y accéder !
    protected $nom;

    /**
     * CONSTRUCTEUR
     * Appelé quand on fait : new Instrument("Ma guitare")
     *
     * @param string $nom Le nom de l'instrument
     */
    public function __construct($nom) {
        $this->nom = $nom;
    }

    /**
     * Méthode GÉNÉRIQUE jouer()
     *
     * C'est la version "par défaut" de la méthode.
     * Les classes enfants vont la REDÉFINIR (override) pour avoir leur propre comportement.
     */
    public function jouer() {
        echo "🎵 {$this->nom} joue de la musique...\n";
    }
}


// ─────────────────────────────────────────────────────────────────────────
// TODO 2 : Créer la classe Guitare (redéfinir jouer)
// ─────────────────────────────────────────────────────────────────────────

/**
 * Classe ENFANT : Guitare
 *
 * Hérite de Instrument avec "extends"
 * Va REDÉFINIR (override) la méthode jouer() pour avoir un son spécifique
 */
class Guitare extends Instrument {

    /**
     * OVERRIDE (redéfinition) de la méthode jouer()
     *
     * On réécrit complètement la méthode du parent.
     * Maintenant, quand on appelle jouer() sur une Guitare,
     * c'est CETTE version qui sera exécutée, pas celle du parent !
     *
     * ⚡ C'EST LE POLYMORPHISME EN ACTION !
     */
    public function jouer() {
        // Son spécifique de la guitare
        echo "🎸 {$this->nom} : GLING GLING GLING ♪\n";

        // NOTE : On accède à $this->nom car il est "protected" dans le parent
        // Si c'était "private", on ne pourrait pas y accéder ici !
    }
}


// ─────────────────────────────────────────────────────────────────────────
// TODO 3 : Créer les classes Piano et Batterie
// ─────────────────────────────────────────────────────────────────────────

/**
 * Classe ENFANT : Piano
 *
 * Même principe que Guitare : hérite de Instrument et redéfinit jouer()
 */
class Piano extends Instrument {

    /**
     * OVERRIDE de jouer() - version Piano
     *
     * Chaque classe enfant peut avoir sa PROPRE implémentation de jouer()
     * Même nom de méthode, comportement différent = POLYMORPHISME
     */
    public function jouer() {
        // Son spécifique du piano
        echo "🎹 {$this->nom} : PLONK PLONK PLONK ♫\n";
    }
}

/**
 * Classe ENFANT : Batterie
 *
 * Troisième instrument avec son propre son
 */
class Batterie extends Instrument {

    /**
     * OVERRIDE de jouer() - version Batterie
     */
    public function jouer() {
        // Son spécifique de la batterie
        echo "🥁 {$this->nom} : BOOM BOOM CRASH ♪♫\n";
    }
}


// ─────────────────────────────────────────────────────────────────────────
// TODO 4 : Créer un orchestre et tester
// ─────────────────────────────────────────────────────────────────────────

echo "\n";
echo "╔════════════════════════════════════════════╗\n";
echo "║     🎭 DÉMONSTRATION DU POLYMORPHISME      ║\n";
echo "╚════════════════════════════════════════════╝\n\n";

// ─────────────────────────────────────────────────────
// ÉTAPE 1 : Créer des objets de types différents
// ─────────────────────────────────────────────────────

echo "📦 Création de l'orchestre...\n\n";

// On crée 3 instruments DIFFÉRENTS
$guitare = new Guitare("Fender Stratocaster");
$piano = new Piano("Yamaha Grand");
$batterie = new Batterie("Pearl Export");

// ─────────────────────────────────────────────────────
// ÉTAPE 2 : Mettre tous les instruments dans un tableau
// ─────────────────────────────────────────────────────

// IMPORTANT : Ce tableau contient des objets de TYPES DIFFÉRENTS
// - $guitare est de type Guitare
// - $piano est de type Piano
// - $batterie est de type Batterie
// MAIS ils héritent tous de Instrument !
$orchestre = [
    $guitare,
    $piano,
    $batterie
];

echo "✅ Orchestre créé avec " . count($orchestre) . " instruments\n\n";

// ─────────────────────────────────────────────────────
// ÉTAPE 3 : Faire jouer tous les instruments
// ─────────────────────────────────────────────────────

echo "🎼 Début du concert !\n";
echo "────────────────────────────────────────────\n";

/**
 * ⭐ LE POLYMORPHISME EN ACTION ⭐
 *
 * Dans cette boucle, on appelle la MÊME méthode jouer()
 * sur tous les instruments.
 *
 * MAIS chaque instrument va exécuter SA PROPRE VERSION de jouer() !
 *
 * - Quand $instrument est une Guitare → appelle Guitare::jouer()
 * - Quand $instrument est un Piano → appelle Piano::jouer()
 * - Quand $instrument est une Batterie → appelle Batterie::jouer()
 *
 * PHP détermine AUTOMATIQUEMENT quelle version appeler
 * en fonction du TYPE RÉEL de l'objet.
 *
 * C'est ça le POLYMORPHISME :
 * - Même interface (méthode jouer())
 * - Comportements différents selon le type d'objet
 */
foreach ($orchestre as $instrument) {
    // On appelle jouer() sans savoir exactement quel type d'instrument c'est
    // PHP s'occupe d'appeler la bonne version !
    $instrument->jouer();
}

echo "────────────────────────────────────────────\n";
echo "🎉 Concert terminé !\n\n";


// ─────────────────────────────────────────────────────
// BONUS : Démonstration supplémentaire
// ─────────────────────────────────────────────────────

echo "╔════════════════════════════════════════════╗\n";
echo "║       🔍 COMPRENDRE LE POLYMORPHISME       ║\n";
echo "╚════════════════════════════════════════════╝\n\n";

/**
 * Test 1 : Sans polymorphisme (mauvaise approche)
 */
echo "❌ SANS polymorphisme (code rigide) :\n";
echo "────────────────────────────────────────────\n";
echo "// Il faudrait faire ça (code répétitif et rigide) :\n";
echo "// \$guitare->jouer();\n";
echo "// \$piano->jouer();\n";
echo "// \$batterie->jouer();\n";
echo "// Imagine avec 100 instruments... C'est impossible !\n\n";

/**
 * Test 2 : Avec polymorphisme (bonne approche)
 */
echo "✅ AVEC polymorphisme (code flexible) :\n";
echo "────────────────────────────────────────────\n";
echo "// Une seule boucle qui s'adapte à tous les types :\n";
echo "// foreach (\$orchestre as \$instrument) {\n";
echo "//     \$instrument->jouer();\n";
echo "// }\n";
echo "// Fonctionne avec 3, 10, 100 instruments !\n\n";

/**
 * Test 3 : Ajouter un nouvel instrument SANS modifier le code existant
 */
echo "🎻 Ajout d'un nouvel instrument (Violon) :\n";
echo "────────────────────────────────────────────\n";

// On crée une nouvelle classe Violon
class Violon extends Instrument {
    public function jouer() {
        echo "🎻 {$this->nom} : VIIIIN VIIIIN VIIIIN ♬\n";
    }
}

// On ajoute un violon à l'orchestre
$orchestre[] = new Violon("Stradivarius");

// La MÊME boucle fonctionne avec le nouveau type !
foreach ($orchestre as $instrument) {
    $instrument->jouer();
}

echo "\n💡 Remarquez qu'on n'a PAS modifié la boucle foreach !\n";
echo "   C'est ça la puissance du polymorphisme : extensibilité !\n\n";


// ─────────────────────────────────────────────────────────────────────────
// ✅ BRAVO ! Tu as terminé le Projet 05
// ─────────────────────────────────────────────────────────────────────────
//
// Tu as appris :
// ✅ Le polymorphisme : redéfinir une méthode dans chaque enfant
// ✅ Traiter différents objets de la même manière dans une boucle
// ✅ Override (redéfinition) des méthodes parentes
// ✅ Pourquoi "protected" et pas "private" pour les propriétés
// ✅ Comment PHP choisit automatiquement la bonne méthode à appeler
//
// 🎯 Prochaine étape : Projet 06 - Classes Abstraites (forcer l'implémentation)
//
?>
