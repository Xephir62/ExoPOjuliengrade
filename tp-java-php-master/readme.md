<h1>TP BricoFast</h1>
<p>Passage d’un code procédural à une architecture orientée objet
Cas d’étude : mini système de location d’outils
</p>
<h2>Contexte</h2>
<p>
    BricoFast est une petite entreprise de location d’outils de bricolage.
    Pour démarrer rapidement, un développeur a codé un prototype en mode “script”, 
    sans se soucier de l’architecture :</p>
    <ul>
    <li>Tout est dans un seul fichier</li>
    <li>Les données sont stockées dans des tableaux parallèles
    </li>
    <li>Aucune structure métier n’est modélisée (pas de “Outil”, pas de “Location”, etc.) 
    </li>
    <li>
    Le code est difficile à faire évoluer.</li>
    </ul>
<p>
Ce prototype fonctionne, mais : <br/>

L’entreprise veut bientôt ajouter des fonctionnalités<br/>

Plusieurs développeurs vont devoir travailler dessus<br/>

Il devient nécessaire de re-factorer ce code vers une architecture orientée objet plus propre.<br/>

On dispose de deux versions fonctionnellement identiques du prototype :<br/>

Une version en Java <br/>

Une version en PHP.
</p>
<h2>Fonctionnalités du prototype existant</h2>
<h2>Consignes</h2>
<p>Le programme (Java et PHP) est une application console qui permet :</p>
<ol>
<li>Lister les outils disponibles : Affiche un index, le nom de l’outil, son prix par jour, et s’il est disponible ou non.</li>
<li>Louer un outil : <br/>L’utilisateur choisit l’index d’un outil.<br/>

S’il est disponible, il saisit le nombre de jours.<br/>

Le programme calcule le prix total, affiche un récapitulatif, et marque l’outil comme “indisponible”.</li>
<li>Retourner un outil : <br/>
L’utilisateur choisit l’index d’un outil loué.<br/>

Le programme marque l’outil comme “disponible”.</li>
<li>Quitter l’application</li>
</ol>
<p>Les données sont stockées dans des tableaux parallèles :<br/>

Noms des outils<br/>

Prix par jour<br/>

Disponibilité (true/false).
<h2>Consignes</h2>
<ol>
<li>Étape 1 : Lecture et exécution du code existant<br/>

Exécuter la version Java ou la version PHP.<br/>

Tester tous les cas :<br/>

Lister les outils<br/>

Louer un outil<br/>

Tenter de louer un outil déjà loué<br/>

Retourner un outil<br/>

Quitter.<br/>
</li>
<li>Étape 2 : Analyse des problèmes<br/>

Identifier les points suivants (à mettre dans un court rapport ou en commentaire) :<br/>

Où sont stockées les données ?<br/>

Quelles parties du code sont dupliquées ?<br/>

Qu’est-ce qui rend le code difficile à maintenir ?<br/>

Quels sont les concepts métier évidents non modélisés ?</li>
<li>Étape 3 : Modélisation orientée objet<br/>
Proposer au minimum les classes suivantes (noms ajustables) :<br/>

Outil : nom, prixParJour, disponible, éventuellement un identifiant.<br/>

Catalogue : gère la liste des outils, l’affichage, la recherche par index.<br/>

GestionLocation (ou LocationService) : logique de location / retour, calcul du prix total.<br/>

Une classe principale (Application, Main…) qui gère le menu console.<br/>

Pour chaque classe, définir :<br/>

Ses attributs (données) <br/>

Ses méthodes (comportements) <br/>

Ses responsabilités.</li>
<li>Étape 4 : Refactorisation<br/>

Reprendre le code existant.<br/>

Introduire progressivement les classes :<br/>

Commencer par créer la classe Outil et remplacer les tableaux parallèles par une liste d’objets.<br/>

Créer un Catalogue qui encapsule la liste d’outils et les opérations de recherche/affichage.<br/>

Créer un service de location qui utilise le catalogue.<br/>

Le comportement global (du point de vue de l’utilisateur) doit rester identique.</li>
<li>Étape 5 : Améliorations possibles<br/>

Ajouter une notion de “client” (nom, email).<br/>

Ajouter un historique des locations.<br/>

Gérer des contrôles supplémentaires (index invalide, saisie incorrecte, etc.).</li>
</ol>