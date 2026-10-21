<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $majoredat = $_POST['majoredat'] ?? 'no';
    $idioma = $_POST['idioma'] ?? 'cat';
    $moneda = $_POST['moneda'] ?? 'eur';

    setcookie("majoredat", $majoredat, time() + (86400 * 30), "/");
    setcookie("idioma", $idioma, time() + (86400 * 30), "/");
    setcookie("moneda", $moneda, time() + (86400 * 30), "/");

    header("Location: info.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Configuració de la Bodega</title>
</head>
<body>
    <h1>Benvingut a la Bodega</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <p>Ets major d'edat?</p>
        <input type="radio" id="major_si" name="majoredat" value="si" required>
        <label for="major_si">Sí</label>
        <input type="radio" id="major_no" name="majoredat" value="no" required>
        <label for="major_no">No</label>

        <p>Idioma preferit:</p>
        <select name="idioma" required>
            <option value="cat">Català</option>
            <option value="esp">Español</option>
            <option value="eng">English</option>
        </select>

        <p>Moneda per transaccions:</p>
        <select name="moneda" required>
            <option value="eur">Euros (€)</option>
            <option value="usd">Dòlars ($)</option>
            <option value="gbp">Lliures (£)</option>
        </select>
        <br><br>
        <button type="submit">Entrar a la botiga</button>
    </form>
</body>
</html>