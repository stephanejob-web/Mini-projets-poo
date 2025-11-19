<?php
declare(strict_types=1);
/**
 * 🔒 PROJET 03 : PUBLIC VS PRIVATE
 * Concept : Encapsulation (protéger les données sensibles)
 *
 * 📖 Lis le README.md avant de commencer !
 */

// ─────────────────────────────────────────────────────────────────────────
// TODO 1 : Créer la classe Portefeuille
// ─────────────────────────────────────────────────────────────────────────
//
// Crée une classe 'Portefeuille' avec :
// - Propriété PRIVATE $proprietaire
// - Propriété PRIVATE $argentDisponible
//
// Attention : PRIVATE, pas public !


class Portefeuille{
     private string $proprietaire;
     private int $argentDisponible;

    public function __construct(string $proprietaire, int $argentInitial){
        $this->proprietaire = $proprietaire;
        $this->argentDisponible = $argentInitial;
        echo "Portefeuille créé pour {$this->proprietaire} avec {$this->argentDisponible}€\n";
    }

    public function getArgent():int {
        return $this->argentDisponible;
    }

    public function ajouterArgent(int $montant):void {
        if ($montant > 0) {
            $this->argentDisponible += $montant;
            echo "Ajout de {$montant}€\n";
        } else {
            echo "Montant invalide !\n";
        }
    }

    public function retirerArgent(int $montant):void {
        if ($montant <= 0) {
            echo "Montant invalide !\n";
        } elseif ($montant > $this->argentDisponible) {
            echo "Fonds insuffisants !\n";
        } else {
            $this->argentDisponible -= $montant;
            echo "Retrait de {$montant}€\n";
        }
    }
}



// ─────────────────────────────────────────────────────────────────────────
// TODO 2 : Ajouter le constructeur
// ─────────────────────────────────────────────────────────────────────────
//
// Le constructeur doit :
// 1. Prendre 2 paramètres : $proprietaire, $argentInitial
// 2. Initialiser les propriétés privées
// 3. Afficher "👛 Portefeuille créé pour [nom] avec [argent]€"




// ─────────────────────────────────────────────────────────────────────────
// TODO 3 : Ajouter un GETTER
// ─────────────────────────────────────────────────────────────────────────
//
// Crée une méthode getArgent() qui :
// - RETOURNE (return) la valeur de $argentDisponible
// - Permet de LIRE l'argent sans pouvoir le modifier




// ─────────────────────────────────────────────────────────────────────────
// TODO 4 : Ajouter la méthode ajouterArgent()
// ─────────────────────────────────────────────────────────────────────────
//
// Cette méthode doit :
// 1. Prendre un paramètre $montant
// 2. Vérifier que $montant > 0
// 3. Si OUI : ajouter le montant et afficher "✅ Ajout de [montant]€"
// 4. Si NON : afficher "❌ Montant invalide !"




// ─────────────────────────────────────────────────────────────────────────
// TODO 5 : Ajouter la méthode retirerArgent()
// ─────────────────────────────────────────────────────────────────────────
//
// Cette méthode doit :
// 1. Vérifier que $montant > 0
// 2. Vérifier que $montant <= $argentDisponible
// 3. Si OK : retirer et afficher "✅ Retrait de [montant]€"
// 4. Sinon : afficher "❌ Fonds insuffisants !" ou "❌ Montant invalide !"




// ─────────────────────────────────────────────────────────────────────────
// TODO 6 : Créer et tester un portefeuille
// ─────────────────────────────────────────────────────────────────────────
//
// Crée $monPortefeuille avec :
// - Propriétaire : ton prénom
// - Argent initial : 100€
//
// Teste :
// 1. Afficher l'argent (avec getArgent())
// 2. Ajouter 50€
// 3. Retirer 30€
// 4. Tenter de retirer 500€ (devrait échouer)
// 5. Tenter d'ajouter -20€ (devrait échouer)
// 6. Afficher l'argent final

echo "=== Test du Portefeuille ===\n\n";

$monPortefeuille = new Portefeuille("Stéphane", 100);

echo "\n1. Afficher l'argent disponible :\n";
echo "Argent disponible : " . $monPortefeuille->getArgent() . "€\n\n";

echo "2. Ajouter 50€ :\n";
$monPortefeuille->ajouterArgent(50);

echo "\n3. Retirer 30€ :\n";
$monPortefeuille->retirerArgent(30);

echo "\n4. Tenter de retirer 500€ (devrait échouer) :\n";
$monPortefeuille->retirerArgent(500);

echo "\n5. Tenter d'ajouter -20€ (devrait échouer) :\n";
$monPortefeuille->ajouterArgent(-20);

echo "\n6. Afficher l'argent final :\n";
echo "Argent final : " . $monPortefeuille->getArgent() . "€\n";



// ─────────────────────────────────────────────────────────────────────────
// ✅ BRAVO ! Tu as terminé le Projet 03
// ─────────────────────────────────────────────────────────────────────────
//
// Tu as appris :
// ✅ L'encapsulation : protéger les données avec private
// ✅ Les getters pour lire sans modifier
// ✅ Les méthodes avec validation pour sécuriser les modifications
//
// 🎯 Prochaine étape : Projet 04 - L'Héritage (réutiliser du code)
//
?>
