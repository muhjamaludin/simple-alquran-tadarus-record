<?php

require_once("config.php");
$head_title = "Read Record";

if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
    $id = trim($_GET['id']);
    echo "</br>";
    foreach ($datas as $data) {
        if ($data['id'] == $id) {
            $juz = $data['juz'];
            $surah = $data['surah'];
            $ayat = $data['ayat'];
            $tanggal = $data['tanggal'];
            $jam = $data['jam'];
        }
    }
}
?>

<?php
require_once("template/header.php");
?>

<div class="wrapper">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="page-header">
                <h2>Read Record</h2>
            </div>
            <div class="form-group">
                <label>Juz</label>
                <input type="number" name="juz" class="form-control" value="<?= $juz ?>">
            </div>
            <div class="form-group">
                <label>Surah</label>
                <input type="text" name="surah" class="form-control" value="<?= $surah ?>">
            </div>
            <div class="form-group">
                <label>Ayat</label>
                <input type="number" name="ayat" class="form-control" value="<?= $ayat ?>">
            </div>
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tanggal" class="form-control" value="<?= $tanggal ?>">
            </div>
            <div class="form-group">
                <label>Jam</label>
                <input type="text" name="jam" class="form-control" value="<?= $jam ?>">
            </div>
            <p><a href="index.php" class="btn btn-primary mt-2">Back</a></p>
        </div>
    </div>
</div>

<?php
require_once("template/footer.php");
?>