<?php
include 'koneksi.php';

// Tambah data
if (isset($_POST['simpan'])) {
    $id_menu = $_POST['id_menu'];
    $kalori = $_POST['kalori'];
    $protein = $_POST['protein'];
    $lemak = $_POST['lemak'];
    $karbohidrat = $_POST['karbohidrat'];

    mysqli_query($conn, "INSERT INTO kandungan_gizi
    (id_menu, kalori, protein, lemak, karbohidrat)
    VALUES
    ('$id_menu','$kalori','$protein','$lemak','$karbohidrat')");

    header("Location: index.php");
}

// Hapus data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    mysqli_query($conn, "DELETE FROM kandungan_gizi WHERE id_gizi='$id'");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD Kandungan Gizi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>CRUD Kandungan Gizi</h1>

    <form method="POST">

        <label>Pilih Menu</label>
        <select name="id_menu" required>
            <option value="">-- Pilih Menu --</option>

            <?php
            $menu = mysqli_query($conn, "SELECT * FROM menu_makanan");

            while($m = mysqli_fetch_array($menu)) {
            ?>
                <option value="<?= $m['id_menu']; ?>">
                    <?= $m['nama_menu']; ?>
                </option>
            <?php } ?>

        </select>

        <label>Kalori</label>
        <input type="number" name="kalori" required>

        <label>Protein</label>
        <input type="number" step="0.01" name="protein" required>

        <label>Lemak</label>
        <input type="number" step="0.01" name="lemak" required>

        <label>Karbohidrat</label>
        <input type="number" step="0.01" name="karbohidrat" required>

        <button type="submit" name="simpan">Simpan</button>

    </form>

    <table>
        <tr>
            <th>No</th>
            <th>Menu</th>
            <th>Kalori</th>
            <th>Protein</th>
            <th>Lemak</th>
            <th>Karbohidrat</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;

        $data = mysqli_query($conn, "SELECT * FROM kandungan_gizi
        JOIN menu_makanan
        ON kandungan_gizi.id_menu = menu_makanan.id_menu");

        while($d = mysqli_fetch_array($data)) {
        ?>

        <tr>
            <td><?= $no++; ?></td>
            <td><?= $d['nama_menu']; ?></td>
            <td><?= $d['kalori']; ?></td>
            <td><?= $d['protein']; ?> gr</td>
            <td><?= $d['lemak']; ?> gr</td>
            <td><?= $d['karbohidrat']; ?> gr</td>
            <td>
                <a class="edit" href="edit.php?id=<?= $d['id_gizi']; ?>">Edit</a>
                <a class="hapus" href="index.php?hapus=<?= $d['id_gizi']; ?>"
                onclick="return confirm('Yakin ingin hapus data?')">
                Hapus
                </a>
            </td>
        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>