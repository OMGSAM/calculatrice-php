<!DOCTYPE html>
<html>
<head>
    <title>Calculatrice PHP</title>
</head>
<body>
    <h1>Calculatrice PHP</h1>
    <form method="post">
        <input type="text" name="num1" placeholder="Premier nombre" required>
        <select name="operation">
            <option value="add">Addition</option>
            <option value="subtract">Soustraction</option>
            <option value="multiply">Multiplication</option>
            <option value="divide">Division</option>
        </select>
        <input type="text" name="num2" placeholder="Deuxième nombre" required>
        <button type="submit" name="submit" value="submit">Calculer</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operation = $_POST['operation'];
        $result = "";

        if (is_numeric($num1) && is_numeric($num2)) {
            switch ($operation) {
                case "add":
                    $result = $num1 + $num2;
                    break;
                case "subtract":
                    $result = $num1 - $num2;
                    break;
                case "multiply":
                    $result = $num1 * $num2;
                    break;
                case "divide":
                    if ($num2 != 0) {
                        $result = $num1 / $num2;
                    } else {
                        $result = "Erreur: Division par zéro!";
                    }
                    break;
                default:
                    $result = "Opération invalide!";
                    break;
            }
        } else {
            $result = "Erreur: Entrées non numériques!";
        }

        echo "<h2>Résultat: $result</h2>";
    }
    ?>
</body>
</html>
