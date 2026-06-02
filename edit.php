<?php
include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM kandungan_gizi WHERE id_gizi='$id'");
$d = mysqli_fetch_array($data);

if (isset($_POST['update'])) {

    $id_menu = $_POST['id_menu'];
    $kalori = $_POST['kalori'];
    $protein = $_POST['protein'];
    $lemak = $_POST['lemak'];
    $karbohidrat = $_POST['karbohidrat'];

    mysqli_query($conn, "UPDATE kandungan_gizi SET
    id_menu='$id_menu',
    kalori='$kalori',
    protein='$protein',
    lemak='$lemak',
    karbohidrat='$karbohidrat'
    WHERE id_gizi='$id'");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Kandungan Gizi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>Edit Kandungan Gizi</h1>

    <form method="POST">

        <label>Pilih Menu</label>
        <select name="id_menu" required>

            <?php
            $menu = mysqli_query($conn, "SELECT * FROM menu_makanan");

            while($m = mysqli_fetch_array($menu)) {
            ?>

            <option value="<?= $m['id_menu']; ?>"
                <?php if($m['id_menu'] == $d['id_menu']) echo 'selected'; ?>>
                <?= $m['nama_menu']; ?>
            </option>

            <?php } ?>

        </select>

        <label>Kalori</label>
        <input type="number" name="kalori" value="<?= $d['kalori']; ?>" required>

        <label>Protein</label>
        <input type="number" step="0.01" name="protein" value="<?= $d['protein']; ?>" required>

        <label>Lemak</label>
        <input type="number" step="0.01" name="lemak" value="<?= $d['lemak']; ?>" required>

        <label>Karbohidrat</label>
        <input type="number" step="0.01" name="karbohidrat" value="<?= $d['karbohidrat']; ?>" required>

        <button type="submit" name="update">Update</button>

    </form>

</div>

</body>
</html>
