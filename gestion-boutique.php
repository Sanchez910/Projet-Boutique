<?php

// Initialisation du stock
$stock = ["chausette", "t-shirt", "chaussures", "pantalon", "pull"];
$qte_stock = [10, 5, 8, 3, 12];
$ventes = [[], [], [], [], []];

for ($index = 0; $index < count($stock); $index++) {
    echo $stock[$index] . ' ';
}
echo PHP_EOL;

foreach ($stock as $stocks) {
    echo $stocks . ' ';
}
echo PHP_EOL;

// Gestion des Stocks 
for ($index = 0; $index < count($stock); $index++) {
    echo "$index {$stock[$index]}: {$qte_stock[$index]} " . PHP_EOL;
}
echo PHP_EOL;

// Réalisation d'une Vente
$prod_index = readline("Saisir l'index du produit vendue: ");
$qte_vendue = readline("Entrez la quantité vendue: ");

if ($prod_index < 0 || $prod_index >= count($stock)) {
    echo "Index invalide";
    echo PHP_EOL;
} else {
    if ($qte_vendue <= $qte_stock[$prod_index]) {
        $qte_stock[$prod_index] -= $qte_vendue;
        array_push($ventes[$prod_index], $qte_vendue); // array push pour mettre a jour le tableau ventes a chaque ventes 
        echo "Vente confirmée de $qte_vendue {$stock[$prod_index]}. Nouveau stock: {$qte_stock[$prod_index]} ";
        echo PHP_EOL;
    } else {
        echo "Stock insuffisant pour {$stock[$prod_index]}. ";
        echo PHP_EOL;
    }
}
echo PHP_EOL;

// Réapprovisionnement du Stock
$prod_index = readline("Entrez l'index du produit à réapprovisionner: ");
$qte_ajoutee = readline("Entrez la quantité à ajouter: ");

if ($prod_index < 0 || $prod_index >= count($stock)) {
    echo "Index invalide ";
    echo PHP_EOL;
} else {
    $qte_stock[$prod_index] += $qte_ajoutee;
    echo "Réapprovisionnement effectué. Nouveau stock de {$stock[$prod_index]}: {$qte_stock[$prod_index]} ";
    echo PHP_EOL;
}
echo PHP_EOL;

// Synthèse et Affichage du Stock 
for ($index = 0; $index < count($stock); $index++) {
    $produit = $stock[$index];
    $qte = $qte_stock[$index];
    if ($qte > 0) {
        echo "{$produit}: {$qte} en stock " . PHP_EOL;
    } else {
        echo "{$produit}: En rupture de stock " . PHP_EOL;
    }
}
echo PHP_EOL;

//Suivi des Ventes Totales par Article 
echo "Nombre total de ventes pour chaque produit:\n";
for ($index = 0; $index < count($stock); $index++) {
    $tot_ventes = array_sum($ventes[$index]); // Calcul du total des ventes pour chaque produit
    echo "{$stock[$index]}: {$tot_ventes} ventes\n";
}
echo PHP_EOL;

//Suppression d'un Article
$prod_sup = readline("Entrez l'index du produit à supprimer: ");

array_splice($stock, $prod_sup, 1);
array_splice($qte_stock, $prod_sup, 1);
array_splice($ventes, $prod_sup, 1);

echo "produit suprimer";
echo PHP_EOL;

for ($index = 0; $index < count($stock); $index++) {
    echo "$index {$stock[$index]} en stock {$qte_stock[$index]} et nombre de vente = " . array_sum($ventes[$index]) . PHP_EOL;
}
echo PHP_EOL;
