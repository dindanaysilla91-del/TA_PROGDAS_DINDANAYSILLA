<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-
scale=1.0">
<title>Stack PHP</title>
<style>
    body {
        font-family: "Segoe UI", sans-serif;
        background: linear-gradient(135deg, #eaf2ff, #fdfdff);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }
    .container {
        background: white;
        border-radius: 16px;
        box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        padding: 25px 30px;
        width: 480px;
        text-align: center;
    }
    h2 {
        margin-top: 0;
        color: #333;
        font-size: 22px;
    }
    form {
        display: flex;
        flex-direction: column;
        gap: 8px;
        margin-bottom: 15px;
    }
    input[type="text"], input[type="number"] {
        padding: 8px;
        border-radius: 8px;
        border: 1px solid #ccc;
        outline: none;
        transition: 0.3s;
    }
    input[type="text"]:focus, input[type="number"]:focus {
        border-color: #007bff;
    }
    input[type="submit"] {
        background: #007bff;
        color: white;
        border: none;
        border-radius: 8px;
        padding: 8px;
        cursor: pointer;
        transition: 0.3s;
    }
    input[type="submit"]:hover {
        background: #005fc7;
    }
    .stack-view {
        background: #f4f7ff;
        border-radius: 10px;
        padding: 10px;
        margin-top: 10px;
        text-align: center;
        min-height: 60px;
    }
    .info {
        font-size: 14px;
        color: #333;
        margin-top: 8px;
    }
</style>
</head>
<body>
<div class="container">
    <h2>Stack Program</h2>
    <form method="POST">
        <input type="text" name="data" placeholder="Masukkan data baru">
        <input type="number" name="pop" min="1"
    placeholder="Jumlah data yang ingin dihapus">
        <input type="submit" name="submit" value="Proses Stack">
    </form>
    <?php

    session_start();

    if (!isset($_SESSION['stack'])) {
        $_SESSION['stack'] = new SplStack();
    } else {
        $temp = $_SESSION['stack'];
        $_SESSION['stack'] = new SplStack();
        foreach ($temp as $item) {
            $_SESSION['stack']->push($item);
        }   
    }
    $stack = $_SESSION['stack'];

    if (isset($_POST['submit'])) {
        if (!empty($_POST['data'])) {
            $stack->push($_POST['data']);
            echo "<div class='info' style='color:green;'>Data
    '{$_POST['data']}' ditambahkan ke Stack.</div>";
        }
        
        if (!empty($_POST['pop'])) {
            for ($i = 0; $i < $_POST['pop']; $i++) {
                if (!$stack->isEmpty()) $stack->pop();
            }
            echo "<div class='info' style='color:red;'>Menghapus
{$_POST['pop']} data dari Stack.</div>";
         }
    }
    $_SESSION['stack'] = iterator_to_array($stack);

    echo "<div class='stack-view'>";
    if (count($stack) > 0) {
        echo implode(" ← ",
array_reverse(iterator_to_array($stack)));
    } else {
        echo "Stack kosong.";
    }   
    echo "</div>";

    $top = $stack->isEmpty() ? "Kosong" : $stack->top();
    echo "<div class='info'>Teratas: <strong>{$top}</strong> |
Jumlah: <strong>" . count($stack) . "</strong></div>";
    ?>
</div>
</body>
</html>