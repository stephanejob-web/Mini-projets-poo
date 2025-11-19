<?php
declare(strict_types=1);

/**
 * 📚 EXEMPLE : Pourquoi parent::__construct() ?
 *
 * Ce fichier explique quand et pourquoi utiliser parent::__construct()
 */

// ─────────────────────────────────────────────────────────────────────────
// CLASSE PARENT
// ─────────────────────────────────────────────────────────────────────────
class Animal {
    protected string $nom;

    public function __construct(string $nom) {
        $this->nom = $nom;
        echo "🐾 Animal créé : {$nom}\n";
    }

    public function manger(): void {
        echo "🍖 {$this->nom} mange...\n";
    }
}

// ─────────────────────────────────────────────────────────────────────────
// EXEMPLE 1 : Enfant SANS son propre constructeur
// ─────────────────────────────────────────────────────────────────────────
class Chien extends Animal {
    // ✅ PAS BESOIN de parent::__construct() ici
    // Le constructeur de Animal est automatiquement utilisé

    public function aboyer(): void {
        echo "🐕 {$this->nom} : WOOF !\n";
    }
}

echo "═══════════════════════════════════════════════════════════════\n";
echo "EXEMPLE 1 : Chien sans constructeur propre\n";
echo "═══════════════════════════════════════════════════════════════\n";
$rex = new Chien("Rex");  // Utilise automatiquement __construct() de Animal
$rex->aboyer();
echo "\n";

// ─────────────────────────────────────────────────────────────────────────
// EXEMPLE 2 : Enfant AVEC son propre constructeur
// ─────────────────────────────────────────────────────────────────────────
class ChienDeGarde extends Animal {
    // Cette classe a une propriété EN PLUS
    private int $niveauVigilance;

    // ⚠️ PROBLÈME : Si on définit notre propre __construct(),
    // le constructeur de Animal n'est PLUS appelé automatiquement !
    public function __construct(string $nom, int $niveauVigilance) {
        // 🔥 SOLUTION : On doit appeler parent::__construct() nous-mêmes
        // pour initialiser $nom (qui vient de Animal)
        parent::__construct($nom);

        // Ensuite on initialise nos propres propriétés
        $this->niveauVigilance = $niveauVigilance;
        echo "🛡️ Niveau de vigilance défini : {$niveauVigilance}/10\n";
    }

    public function monter_la_garde(): void {
        echo "👮 {$this->nom} monte la garde (vigilance: {$this->niveauVigilance}/10)\n";
    }
}

echo "═══════════════════════════════════════════════════════════════\n";
echo "EXEMPLE 2 : ChienDeGarde avec son propre constructeur\n";
echo "═══════════════════════════════════════════════════════════════\n";
$rocky = new ChienDeGarde("Rocky", 9);
$rocky->manger();  // Méthode héritée de Animal
$rocky->monter_la_garde();
echo "\n";

// ─────────────────────────────────────────────────────────────────────────
// EXEMPLE 3 : Que se passe-t-il SANS parent::__construct() ?
// ─────────────────────────────────────────────────────────────────────────
class ChienMal extends Animal {
    private int $niveau;

    public function __construct(string $nom, int $niveau) {
        // ❌ OUPS ! On n'appelle PAS parent::__construct()
        // Donc $this->nom n'est JAMAIS initialisé !
        $this->niveau = $niveau;
    }

    public function test(): void {
        // ⚠️ Ici, $this->nom n'est pas défini, ce qui causera une erreur !
        echo "Nom : {$this->nom}\n";
    }
}

echo "═══════════════════════════════════════════════════════════════\n";
echo "EXEMPLE 3 : ERREUR sans parent::__construct()\n";
echo "═══════════════════════════════════════════════════════════════\n";
try {
    $mauvais = new ChienMal("Médor", 5);
    $mauvais->test();  // ❌ ERREUR : $nom n'est pas initialisé !
} catch (Error $e) {
    echo "❌ ERREUR attrapée : {$e->getMessage()}\n";
}
echo "\n";

// ─────────────────────────────────────────────────────────────────────────
// RÉSUMÉ
// ─────────────────────────────────────────────────────────────────────────
echo "═══════════════════════════════════════════════════════════════\n";
echo "           📚 RÈGLE À RETENIR 📚\n";
echo "═══════════════════════════════════════════════════════════════\n";
echo "✅ SI tu ne définis PAS de __construct() dans l'enfant :\n";
echo "   → Le constructeur du parent est utilisé automatiquement\n";
echo "   → Pas besoin de parent::__construct()\n\n";
echo "✅ SI tu définis ton PROPRE __construct() dans l'enfant :\n";
echo "   → Tu DOIS appeler parent::__construct()\n";
echo "   → Sinon les propriétés du parent ne sont pas initialisées\n\n";
echo "📝 Syntaxe : parent::__construct(paramètres...)\n";
echo "═══════════════════════════════════════════════════════════════\n";
?>
