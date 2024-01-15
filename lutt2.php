<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Melihat Status Menggunakan Nilai</h1>
    <form method="post" action="">
        <label for="nilai">Masukkan Nilai...:</label>
        <input type="text" name="nilai" required>
        <br>
        <button type="submit">Kirim</button>
    </form>
</body>
<?php
// Fungsi untuk menentukan kategori nilai
function kumpulanNilai($myNilai) {
    if ($myNilai <= 50) return "Tidak Lulus";
    elseif ($myNilai <= 75) return "Remidi";
    else return "Lulus";
}

// Antarmuka Pengguna
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nilai = $_POST['nilai'];

    // Validasi input
    if (empty($nilai)) {
        echo "Masukkan Nilai...";
    } else {
        // Perulangan untuk menampilkan hasil pengelompokan nilai
        foreach (explode(',', $nilai) as $myNilai) {
            $myNilai = intval($myNilai); // Konversi input ke integer
            $kelompokNilai = kumpulanNilai($myNilai);

            echo "<p>Nilai $myNilai termasuk dalam kategori: $kelompokNilai<br></p>";
        }
    }
}
?>

</body>
</html>