<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Kalkulator FPB & Relatif Prima</title>
    <style>

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #121212;
            color: #f1f1f1;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #1e1e1e;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.5);
            width: 100%;
            max-width: 400px;
            border: 1px solid #333;
        }
        h2 { margin-top: 0; text-align: center; }
        label { font-size: 0.9rem; margin-bottom: 5px; display: block; color: #ccc;}
        .input-group { margin-bottom: 15px; }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #444;
            border-radius: 6px;
            background-color: #2a2a2a;
            color: #fff;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 6px;
            font-size: 1rem;
            cursor: pointer;
            font-weight: bold;
        }
        button:hover { background-color: #45a049; }
        .hasil-box {
            margin-top: 20px;
            padding: 15px;
            background-color: #2a2a2a;
            border-left: 4px solid #4CAF50;
            border-radius: 4px;
        }
        .text-warning { border-left-color: #ff9800; }
    </style>
</head>
<body>

    <div class="container">
        <h2>Kalkulator FPB</h2>
        
        <form method="POST" action="">
            <div class="input-group">
                <label for="angka1">Angka 1 (Nilai A)</label>
                <input type="number" name="angka1" id="angka1" required>
            </div>
            <div class="input-group">
                <label for="angka2">Angka 2 (Nilai B)</label>
                <input type="number" name="angka2" id="angka2" required>
            </div>
            <button type="submit" name="hitung">Hitung FPB</button>
        </form>

        <?php
        // 2. Proses dengan PHP
        if (isset($_POST['hitung'])) {
            // Menangkap input dari form menggunakan $_POST
            $angka1 = $_POST['angka1'];
            $angka2 = $_POST['angka2'];

            // Fungsi Algoritma Euclidean untuk mencari FPB
            function cariFPB($a, $b) {
                $a = abs($a);
                $b = abs($b);
                while ($b != 0) {
                    $sisa = $a % $b;
                    $a = $b;
                    $b = $sisa;
                }
                return $a;
            }

            $hasil_fpb = cariFPB($angka1, $angka2);

            // 3. Luaran (Output)
            // Menentukan status relatif prima
            if ($hasil_fpb == 1) {
                $keterangan = "Kedua angka RELATIF PRIMA";
                $kelas_css = ""; // warna hijau
            } else {
                $keterangan = "TIDAK RELATIF PRIMA";
                $kelas_css = "text-warning"; // warna orange
            }

            // Menampilkan hasil
            echo "<div class='hasil-box $kelas_css'>";
            echo "<p style='margin:0 0 10px 0;'>Nilai A: <strong>$angka1</strong></p>";
            echo "<p style='margin:0 0 10px 0;'>Nilai B: <strong>$angka2</strong></p>";
            echo "<p style='margin:0 0 10px 0;'>Hasil FPB: <strong>$hasil_fpb</strong></p>";
            echo "<h4 style='margin:10px 0 0 0; color: #fff;'>$keterangan</h4>";
            echo "</div>";
        }
        ?>
    </div>

</body>
</html>
