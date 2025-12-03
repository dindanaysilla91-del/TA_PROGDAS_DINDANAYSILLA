<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-
scale=1.0">
<title>Queue PHP</title>
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
    .queue-view {
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
    <h2>Queue Program</h2>
    <form method="POST">
        <input type="text" name="data" placeholder="Masukkan data baru">
        <input type="number" name="deq" min="1"
        placeholder="Jumlah data yang ingin dihapus">
        <input type="submit" name="submit" value="Proses Queue">
    </form>

    <?php
    session_start();
    if (!isset($_SESSION['queue'])) {
        $_SESSION['queue'] = new SplQueue();
    } else {
        $temp = $_SESSION['queue'];
        $_SESSION['queue'] = new SplQueue();
        foreach ($temp as $item) {
            $_SESSION['queue']->enqueue($item);
        }
    }
    $queue = $_SESSION['queue'];

    if (isset($_POST['submit'])) {
        if (!empty($_POST['data'])) {
            $queue->enqueue($_POST['data']);
        echo "<div class='info' style='color:green;'>Data
'{$_POST['data']}' ditambahkan ke Queue.</div>";
        }

        if (!empty($_POST['deq'])) {
            for ($i = 0; $i < $_POST['deq']; $i++) {
                if (!$queue->isEmpty()) $queue->dequeue();
            }
            echo "<div class='info' style='color:red;'>Menghapus
{$_POST['deq']} data dari Queue.</div>";
        }
    }
    $_SESSION['queue'] = iterator_to_array($queue);

    echo "<div class='queue-view'>";
    if (count($queue) > 0) {
    echo implode(" → ", iterator_to_array($queue));
    } else {
    echo "Queue kosong.";
    }
    echo "</div>";
    $front = $queue->isEmpty() ? "Kosong" : $queue->bottom();
    echo "<div class='info'>Terdepan: <strong>{$front}</strong> |
Jumlah: <strong>" . count($queue) . "</strong></div>";
    ?>
</div>
</body>
</html>