<?php
$majoredat = $_COOKIE['majoredat'] ?? 'no';
$idioma = $_COOKIE['idioma'] ?? 'cat';
$moneda = $_COOKIE['moneda'] ?? 'eur';

$productes = [
    ["nom" => "Les Terrasses", "preu_base" => 39],
    ["nom" => "Cava L'Hereu", "preu_base" => 20]
];

$taxes_canvi = [
    'eur' => 1,
    'usd' => 1.10,
    'gbp' => 0.85
];

$simbols = [
    'eur' => '€',
    'usd' => '$',
    'gbp' => '£'
];

$textos = [
    'cat' => [
        'menor' => "No et podem vendre alcohol si ets menor d’edat.",
        'oferta' => "T’oferim el vi \"%s\" a un preu de %s %s"
    ],
    'esp' => [
        'menor' => "No te podemos vender alcohol si eres menor de edad.",
        'oferta' => "Te ofrecemos el vino \"%s\" a un precio de %s %s"
    ],
    'eng' => [
        'menor' => "We cannot sell you alcohol if you are underage.",
        'oferta' => "We offer you the wine \"%s\" at a price of %s %s"
    ]
];
?>
<!DOCTYPE html>
<html lang="<?php echo $idioma; ?>">
<head>
    <meta charset="UTF-8">
    <title>Informació de productes</title>
</head>
<body>
    <?php
    if ($majoredat === 'no') {
        echo "<h2>" . $textos[$idioma]['menor'] . "</h2>";
    } else {
        echo "<h2>Catàleg de productes</h2><ul>";
        
        foreach ($productes as $prod) {
            $preu_final = round($prod['preu_base'] * $taxes_canvi[$moneda], 2);
            $simbol = $simbols[$moneda];
            
            $missatge_oferta = sprintf($textos[$idioma]['oferta'], $prod['nom'], $preu_final, $simbol);
            
            echo "<li>" . $missatge_oferta . "</li>";
        }
        echo "</ul>";
    }
    ?>
    <br>
    <a href="bodega.php">Tornar a la configuració</a>
</body>
</html>