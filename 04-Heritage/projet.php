<?php
declare(strict_types=1);
/**
 * 🐕 PROJET 04 : L'HÉRITAGE
 * Concept : Héritage (extends) - réutiliser du code
 *
 * 📖 Lis le README.md avant de commencer !
 */

// ─────────────────────────────────────────────────────────────────────────
// TODO 1 : Créer la classe PARENT Animal
// ─────────────────────────────────────────────────────────────────────────
//
// Crée une classe 'Animal' avec :
// - Propriété PROTECTED $nom  (protected = accessible dans les enfants)
// - Constructeur qui initialise $nom
// - Méthode manger() : "🍖 [nom] mange..."
// - Méthode dormir() : "😴 [nom] dort... Zzz"
//
// Indice : protected permet aux classes enfants d'accéder à la propriété

// La classe PARENT Animal - c'est la classe de base dont vont hériter les autres
class Animal {
    // Protected : accessible dans cette classe ET dans les classes enfants
    // (contrairement à private qui est accessible uniquement dans cette classe)
    protected string $nom;

    // Constructeur : initialise le nom de l'animal
    public function __construct(string $nom) {
        $this->nom = $nom;
    }

    // Méthode manger() : disponible pour tous les animaux
    public function manger(): void {
        echo "🍖 {$this->nom} mange...\n";
    }

    // Méthode dormir() : disponible pour tous les animaux
    public function dormir(): void {
        echo "😴 {$this->nom} dort... Zzz\n";
    }
}

// ─────────────────────────────────────────────────────────────────────────
// Classe ENFANT Chien - hérite de Animal
// ─────────────────────────────────────────────────────────────────────────
class Chien extends Animal {
    // Le mot-clé 'extends' signifie que Chien hérite de Animal
    // Donc un Chien a automatiquement :
    // - la propriété $nom
    // - le constructeur __construct()
    // - les méthodes manger() et dormir()

    // On ajoute une méthode spécifique aux chiens
    public function aboyer(): void {
        // On peut utiliser $this->nom car c'est une propriété PROTECTED
        echo "🐕 {$this->nom} : WOOF WOOF !\n";
    }
}


// ─────────────────────────────────────────────────────────────────────────
// TODO 2 : Créer la classe ENFANT Chien
// ─────────────────────────────────────────────────────────────────────────
//
// Crée une classe 'Chien' qui HÉRITE de Animal :
// - Utilise le mot-clé 'extends'
// - Ajoute une méthode aboyer() : "🐕 [nom] : WOOF WOOF !"
//
// Le Chien hérite automatiquement de manger() et dormir() !
//
// Indice : class Chien extends Animal { ... }




// ─────────────────────────────────────────────────────────────────────────
// TODO 3 : Créer la classe ENFANT Chat
// ─────────────────────────────────────────────────────────────────────────
//
// Crée une classe 'Chat' qui hérite de Animal :
// - Ajoute une méthode miauler() : "🐈 [nom] : MIAOU !"

// Classe ENFANT Chat - hérite également de Animal
class Chat extends Animal {
    // Chat hérite aussi de toutes les propriétés et méthodes de Animal
    // On ajoute juste la méthode spécifique aux chats

    public function miauler(): void {
        echo "🐈 {$this->nom} : MIAOU !\n";
    }
}




// ─────────────────────────────────────────────────────────────────────────
// TODO 4 : Créer la classe ENFANT Oiseau
// ─────────────────────────────────────────────────────────────────────────
//
// Crée une classe 'Oiseau' qui hérite de Animal :
// - Ajoute une méthode voler() : "🦅 [nom] vole dans le ciel !"

// Classe ENFANT Oiseau - troisième enfant de Animal
class Oiseau extends Animal {
    // Même principe : Oiseau hérite de Animal
    // On ajoute la méthode spécifique aux oiseaux

    public function voler(): void {
        echo "🦅 {$this->nom} vole dans le ciel !\n";
    }
}




// ─────────────────────────────────────────────────────────────────────────
// TODO 5 : Créer et tester des animaux
// ─────────────────────────────────────────────────────────────────────────
//
// Crée :
// - Un chien nommé "Rex"
// - Un chat nommé "Minou"
// - Un oiseau nommé "Tweety"
//
// Pour chacun, teste :
// - Les méthodes héritées (manger, dormir)
// - Les méthodes spécifiques (aboyer, miauler, voler)

echo "═══════════════════════════════════════════════════════════════\n";
echo "           🐾 DÉMONSTRATION DE L'HÉRITAGE 🐾\n";
echo "═══════════════════════════════════════════════════════════════\n\n";

// ─────────────────────────────────────────────────────────────────────────
// CRÉATION D'UN CHIEN
// ─────────────────────────────────────────────────────────────────────────
echo "🐕 Création d'un Chien nommé 'Rex'\n";
echo "───────────────────────────────────────────────────────────────\n";
$rex = new Chien("Rex");

// Le chien peut utiliser les méthodes héritées de Animal
echo "Méthodes héritées de Animal :\n";
$rex->manger();   // ← Cette méthode vient de la classe Animal
$rex->dormir();   // ← Cette méthode vient aussi de Animal

// Le chien peut aussi utiliser sa propre méthode
echo "Méthode spécifique à Chien :\n";
$rex->aboyer();   // ← Cette méthode est définie dans Chien
echo "\n";

// ─────────────────────────────────────────────────────────────────────────
// CRÉATION D'UN CHAT
// ─────────────────────────────────────────────────────────────────────────
echo "🐈 Création d'un Chat nommé 'Minou'\n";
echo "───────────────────────────────────────────────────────────────\n";
$minou = new Chat("Minou");

// Le chat hérite aussi des méthodes de Animal
echo "Méthodes héritées de Animal :\n";
$minou->manger();
$minou->dormir();

// Et possède sa propre méthode
echo "Méthode spécifique à Chat :\n";
$minou->miauler();
echo "\n";

// ─────────────────────────────────────────────────────────────────────────
// CRÉATION D'UN OISEAU
// ─────────────────────────────────────────────────────────────────────────
echo "🦅 Création d'un Oiseau nommé 'Tweety'\n";
echo "───────────────────────────────────────────────────────────────\n";
$tweety = new Oiseau("Tweety");

// L'oiseau hérite également des méthodes de Animal
echo "Méthodes héritées de Animal :\n";
$tweety->manger();
$tweety->dormir();

// Et possède sa propre méthode
echo "Méthode spécifique à Oiseau :\n";
$tweety->voler();
echo "\n";

// ─────────────────────────────────────────────────────────────────────────
// EXPLICATION DE L'HÉRITAGE
// ─────────────────────────────────────────────────────────────────────────
echo "═══════════════════════════════════════════════════════════════\n";
echo "           📚 COMPRENDRE L'HÉRITAGE 📚\n";
echo "═══════════════════════════════════════════════════════════════\n";
echo "L'héritage permet de RÉUTILISER du code :\n\n";
echo "1. Animal (PARENT) définit :\n";
echo "   - La propriété \$nom\n";
echo "   - Les méthodes manger() et dormir()\n\n";
echo "2. Chien, Chat, Oiseau (ENFANTS) héritent de tout ça !\n";
echo "   - Pas besoin de réécrire \$nom, manger(), dormir()\n";
echo "   - On ajoute juste les méthodes spécifiques\n\n";
echo "3. Avantages :\n";
echo "   ✅ Code réutilisable (DRY : Don't Repeat Yourself)\n";
echo "   ✅ Maintenance facilitée (modifier Animal = modifier tous)\n";
echo "   ✅ Structure logique (hiérarchie naturelle)\n";
echo "═══════════════════════════════════════════════════════════════\n";




// ─────────────────────────────────────────────────────────────────────────
// ✅ BRAVO ! Tu as terminé le Projet 04
// ─────────────────────────────────────────────────────────────────────────
//
// Tu as appris :
// ✅ L'héritage avec extends pour réutiliser du code
// ✅ Les classes enfants héritent de toutes les méthodes du parent
// ✅ Le mot-clé protected pour partager avec les enfants
//
// 🎯 Prochaine étape : Projet 05 - Le Polymorphisme (même méthode, comportements différents)
//
?>
