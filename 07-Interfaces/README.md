œ# 💳 Projet 07 : Interfaces

## 🎯 Objectif
Maîtriser les interfaces et les contrats stricts en POO.

## 📚 Concepts Abordés
- **Interface** (contrat 100% strict)
- `implements` (implémentation d'interface)
- Différence entre interface et classe abstraite
- Implémentation multiple

## 💡 Analogie

Un **contrat de service** :
> "Je me fiche de COMMENT tu paies (carte, PayPal, crypto),
> mais tu DOIS avoir les méthodes payer() et rembourser() !"

**Interface = Contrat sans code, juste des promesses.**

## 🔑 Notions Techniques

### Déclaration d'Interface

```php
interface MoyenPaiement {
    // Que des SIGNATURES, 0% de code
    public function payer($montant);
    public function rembourser($montant);
}
```

### Implémentation

```php
class CarteBancaire implements MoyenPaiement {
    // OBLIGATION d'implémenter toutes les méthodes
    public function payer($montant) {
        echo "Paiement de {$montant}€ par carte\n";
    }

    public function rembourser($montant) {
        echo "Remboursement de {$montant}€ sur carte\n";
    }
}

class PayPal implements MoyenPaiement {
    public function payer($montant) {
        echo "Paiement de {$montant}€ via PayPal\n";
    }

    public function rembourser($montant) {
        echo "Remboursement de {$montant}€ sur PayPal\n";
    }
}
```

### Le Pouvoir de l'Interchangeabilité

```php
function traiterPaiement(MoyenPaiement $methode, $montant) {
    $methode->payer($montant);
    // Fonctionne avec N'IMPORTE quelle classe qui implémente MoyenPaiement !
}

traiterPaiement(new CarteBancaire(), 50);
traiterPaiement(new PayPal(), 75);
traiterPaiement(new Bitcoin(), 100);  // Nouvelle méthode ? Aucun problème !
```

## 📝 Ce que tu dois faire

1. **Créer une interface MoyenPaiement** avec :
   - payer($montant)
   - rembourser($montant)

2. **Créer 3 classes** qui implémentent l'interface :
   - CarteBancaire
   - PayPal
   - Crypto

3. **Créer une fonction** `effectuerTransaction(MoyenPaiement $moyen, $montant)`

4. **Tester** avec les 3 méthodes de paiement

## 💭 Questions à se poser

- Quelle est la différence entre `implements` et `extends` ?
- Pourquoi une interface n'a pas de code ?
- Peut-on implémenter plusieurs interfaces ?

## ⚠️ Erreurs Fréquentes

❌ Mettre du code dans l'interface (interduit !)
❌ Oublier d'implémenter une méthode de l'interface
❌ Utiliser `extends` au lieu de `implements`

```php
// ❌ FAUX
interface MoyenPaiement {
    public function payer($montant) {
        echo "Paiement";  // PAS DE CODE !
    }
}

// ✅ CORRECT
interface MoyenPaiement {
    public function payer($montant);  // Juste la signature
}
```

## 🎓 Pour Aller Plus Loin

Essayez d'ajouter :
- Une méthode `verifierSolde()` dans l'interface
- Une classe ApplePay qui implémente MoyenPaiement
- Un système qui refuse les paiements > 1000€

## 🔍 Implémentation Multiple

Contrairement à l'héritage (1 seul parent), on peut implémenter PLUSIEURS interfaces :

```php
interface Volant {
    public function voler();
}

interface Nageur {
    public function nager();
}

class Canard implements Volant, Nageur {
    public function voler() {
        echo "Le canard vole 🦆\n";
    }

    public function nager() {
        echo "Le canard nage 🏊\n";
    }
}
```

## 🆚 Interface vs Classe Abstraite

| Critère | Interface | Classe Abstraite |
|---------|-----------|------------------|
| Code | ❌ 0% code | ✅ Peut avoir du code |
| Méthodes | Que des signatures | Normales + abstraites |
| Héritage | Multiple (implements X, Y) | Simple (extends X) |
| Utilisation | **Contrat strict** | Partage de code + contrat |

**Règle :**
- Interface → "Qu'est-ce que tu peux FAIRE ?" (capacités)
- Classe abstraite → "Qu'est-ce que tu ES ?" (identité)

## 🎯 Cas d'Usage Réel

**Symfony/Laravel utilisent MASSIVEMENT les interfaces :**

```php
// Exemple Laravel
interface Authenticatable {
    public function getAuthIdentifierName();
    public function getAuthIdentifier();
    public function getAuthPassword();
}

// N'importe quelle classe peut s'authentifier
class User implements Authenticatable { ... }
class Admin implements Authenticatable { ... }
```

---

**Durée estimée :** 20 minutes
**Difficulté :** ⭐⭐⭐ Avancé
