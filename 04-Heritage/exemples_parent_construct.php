<?php
declare(strict_types=1);

/**
 * 🎓 EXEMPLES PRATIQUES : parent::__construct()
 *
 * Des exemples concrets pour comprendre quand et comment utiliser parent::__construct()
 */

echo "═══════════════════════════════════════════════════════════════\n";
echo "    🎓 EXEMPLES PRATIQUES DE parent::__construct() 🎓\n";
echo "═══════════════════════════════════════════════════════════════\n\n";

// ═════════════════════════════════════════════════════════════════════════
// EXEMPLE 1 : VÉHICULES (Voiture spécialisée)
// ═════════════════════════════════════════════════════════════════════════
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
echo "🚗 EXEMPLE 1 : VÉHICULES\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n\n";

// Classe parent Vehicule
class Vehicule {
    protected string $marque;
    protected int $annee;

    public function __construct(string $marque, int $annee) {
        $this->marque = $marque;
        $this->annee = $annee;
        echo "✅ Véhicule créé : {$marque} ({$annee})\n";
    }

    public function demarrer(): void {
        echo "🔑 {$this->marque} démarre...\n";
    }
}

// Classe enfant VoitureElectrique avec propriété supplémentaire
class VoitureElectrique extends Vehicule {
    private int $autonomieBatterie; // Propriété EN PLUS

    // On a besoin de notre propre constructeur car on a un paramètre supplémentaire
    public function __construct(string $marque, int $annee, int $autonomieBatterie) {
        // 1️⃣ D'ABORD : on appelle le constructeur du parent pour initialiser $marque et $annee
        parent::__construct($marque, $annee);

        // 2️⃣ ENSUITE : on initialise notre propre propriété
        $this->autonomieBatterie = $autonomieBatterie;
        echo "🔋 Batterie configurée : {$autonomieBatterie} km d'autonomie\n";
    }

    public function afficherAutonomie(): void {
        echo "🔋 {$this->marque} : {$this->autonomieBatterie} km restants\n";
    }
}

// Test
echo "Création d'une voiture électrique :\n";
$tesla = new VoitureElectrique("Tesla Model 3", 2024, 500);
$tesla->demarrer(); // Méthode héritée
$tesla->afficherAutonomie();
echo "\n";

// ═════════════════════════════════════════════════════════════════════════
// EXEMPLE 2 : EMPLOYÉS (avec calcul de salaire)
// ═════════════════════════════════════════════════════════════════════════
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
echo "👔 EXEMPLE 2 : EMPLOYÉS D'ENTREPRISE\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n\n";

// Classe parent Employe
class Employe {
    protected string $nom;
    protected float $salaireBase;

    public function __construct(string $nom, float $salaireBase) {
        $this->nom = $nom;
        $this->salaireBase = $salaireBase;
        echo "✅ Employé embauché : {$nom} (Salaire de base : {$salaireBase}€)\n";
    }

    public function afficherSalaire(): void {
        echo "💰 {$this->nom} : {$this->salaireBase}€/mois\n";
    }
}

// Manager avec bonus
class Manager extends Employe {
    private float $bonus;

    public function __construct(string $nom, float $salaireBase, float $bonus) {
        // 1️⃣ Initialiser les propriétés du parent (nom, salaireBase)
        parent::__construct($nom, $salaireBase);

        // 2️⃣ Initialiser notre bonus
        $this->bonus = $bonus;
        echo "🎯 Bonus de manager ajouté : {$bonus}€\n";
    }

    // On redéfinit (override) la méthode pour inclure le bonus
    public function afficherSalaire(): void {
        $total = $this->salaireBase + $this->bonus;
        echo "💰 {$this->nom} (Manager) : {$this->salaireBase}€ + {$this->bonus}€ bonus = {$total}€/mois\n";
    }
}

// Test
echo "Embauche d'un employé normal :\n";
$jean = new Employe("Jean", 2000);
$jean->afficherSalaire();
echo "\n";

echo "Embauche d'un manager :\n";
$marie = new Manager("Marie", 3000, 800);
$marie->afficherSalaire();
echo "\n";

// ═════════════════════════════════════════════════════════════════════════
// EXEMPLE 3 : PRODUITS (e-commerce)
// ═════════════════════════════════════════════════════════════════════════
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
echo "🛒 EXEMPLE 3 : PRODUITS E-COMMERCE\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n\n";

// Classe parent Produit
class Produit {
    protected string $nom;
    protected float $prix;

    public function __construct(string $nom, float $prix) {
        $this->nom = $nom;
        $this->prix = $prix;
        echo "✅ Produit créé : {$nom} - {$prix}€\n";
    }

    public function afficher(): void {
        echo "📦 {$this->nom} : {$this->prix}€\n";
    }
}

// Livre avec propriétés supplémentaires
class Livre extends Produit {
    private string $auteur;
    private int $nbPages;

    public function __construct(string $nom, float $prix, string $auteur, int $nbPages) {
        // 1️⃣ Initialiser nom et prix via le parent
        parent::__construct($nom, $prix);

        // 2️⃣ Initialiser les propriétés spécifiques au livre
        $this->auteur = $auteur;
        $this->nbPages = $nbPages;
        echo "📚 Livre configuré : {$auteur}, {$nbPages} pages\n";
    }

    public function afficher(): void {
        echo "📚 Livre : {$this->nom}\n";
        echo "   Auteur : {$this->auteur}\n";
        echo "   Pages : {$this->nbPages}\n";
        echo "   Prix : {$this->prix}€\n";
    }
}

// Ordinateur avec propriétés techniques
class Ordinateur extends Produit {
    private string $processeur;
    private int $ram; // en GB

    public function __construct(string $nom, float $prix, string $processeur, int $ram) {
        // 1️⃣ Initialiser nom et prix
        parent::__construct($nom, $prix);

        // 2️⃣ Initialiser les specs techniques
        $this->processeur = $processeur;
        $this->ram = $ram;
        echo "💻 Ordinateur configuré : {$processeur}, {$ram}GB RAM\n";
    }

    public function afficher(): void {
        echo "💻 Ordinateur : {$this->nom}\n";
        echo "   Processeur : {$this->processeur}\n";
        echo "   RAM : {$this->ram}GB\n";
        echo "   Prix : {$this->prix}€\n";
    }
}

// Test
echo "Création d'un livre :\n";
$livre = new Livre("Clean Code", 35.99, "Robert C. Martin", 464);
echo "\n";

echo "Création d'un ordinateur :\n";
$pc = new Ordinateur("ThinkPad X1", 1299.99, "Intel i7", 16);
echo "\n";

echo "Affichage des produits :\n";
$livre->afficher();
echo "\n";
$pc->afficher();
echo "\n";

// ═════════════════════════════════════════════════════════════════════════
// EXEMPLE 4 : UTILISATEURS (système d'authentification)
// ═════════════════════════════════════════════════════════════════════════
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
echo "👤 EXEMPLE 4 : SYSTÈME D'UTILISATEURS\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n\n";

// Classe parent Utilisateur
class Utilisateur {
    protected string $email;
    protected string $motDePasse;

    public function __construct(string $email, string $motDePasse) {
        $this->email = $email;
        $this->motDePasse = password_hash($motDePasse, PASSWORD_DEFAULT);
        echo "✅ Utilisateur créé : {$email}\n";
    }

    public function seConnecter(): void {
        echo "🔓 {$this->email} s'est connecté\n";
    }
}

// Administrateur avec permissions
class Administrateur extends Utilisateur {
    private array $permissions;

    public function __construct(string $email, string $motDePasse, array $permissions) {
        // 1️⃣ Créer l'utilisateur de base
        parent::__construct($email, $motDePasse);

        // 2️⃣ Ajouter les permissions admin
        $this->permissions = $permissions;
        echo "🛡️ Permissions admin ajoutées : " . implode(", ", $permissions) . "\n";
    }

    public function supprimerUtilisateur(string $email): void {
        if (in_array("supprimer_utilisateurs", $this->permissions)) {
            echo "🗑️ Admin {$this->email} a supprimé l'utilisateur {$email}\n";
        } else {
            echo "❌ Permission refusée pour {$this->email}\n";
        }
    }
}

// Test
echo "Création d'un utilisateur normal :\n";
$user = new Utilisateur("user@example.com", "password123");
$user->seConnecter();
echo "\n";

echo "Création d'un administrateur :\n";
$admin = new Administrateur("admin@example.com", "admin123", ["supprimer_utilisateurs", "modifier_contenus", "voir_stats"]);
$admin->seConnecter();
$admin->supprimerUtilisateur("spammer@example.com");
echo "\n";

// ═════════════════════════════════════════════════════════════════════════
// RÉSUMÉ FINAL
// ═════════════════════════════════════════════════════════════════════════
echo "═══════════════════════════════════════════════════════════════\n";
echo "           📝 RÉSUMÉ : QUAND UTILISER parent::__construct() ?\n";
echo "═══════════════════════════════════════════════════════════════\n\n";

echo "✅ UTILISE parent::__construct() QUAND :\n";
echo "   1. Tu crées ton propre __construct() dans la classe enfant\n";
echo "   2. Tu as besoin de paramètres SUPPLÉMENTAIRES\n";
echo "   3. Tu veux initialiser les propriétés du parent\n\n";

echo "📝 STRUCTURE TYPIQUE :\n";
echo "   public function __construct(\$param1, \$param2, \$paramSupp) {\n";
echo "       // 1️⃣ Appeler le parent en premier\n";
echo "       parent::__construct(\$param1, \$param2);\n";
echo "       \n";
echo "       // 2️⃣ Initialiser tes propres propriétés\n";
echo "       \$this->maProprieteSupplémentaire = \$paramSupp;\n";
echo "   }\n\n";

echo "💡 RAPPEL :\n";
echo "   Si tu ne définis PAS de __construct() dans l'enfant,\n";
echo "   celui du parent est utilisé automatiquement !\n";
echo "═══════════════════════════════════════════════════════════════\n";
?>
