<?php
require_once("config.php");
$head_title = "Add Record";

// define variables and initialize with empty values
$juz = $surah = $ayat = $tanggal = $jam = "";
$juz_err = $surah_err = $ayat_err = $tanggal_err = "";
$id = 1;

// processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // validate juz
    $input_juz = trim($_POST['juz']);
    if (empty($input_juz)) {
        $juz_err = "Please enter a juz name";
    } elseif (!filter_var($input_juz, FILTER_VALIDATE_INT)) {
        $juz_err = "Please enter a valid juz number";
    } else {
        $juz = $input_juz;
    }

    // validate surah
    $input_surah = trim($_POST['surah']);
    if (empty($input_surah)) {
        $surah_err = "Please enter a surah name";
    } elseif (strlen($input_surah) > 15) {
        $surah_err = "Please enter a valid surah";
    } else {
        $surah = $input_surah;
    }

    // validate ayat
    $input_ayat = trim($_POST['ayat']);
    if (empty($input_ayat)) {
        $ayat_err = "Please enter an ayat name";
    } elseif (!filter_var($input_ayat, FILTER_VALIDATE_INT)) {
        $ayat_err = "Please enter a valid juz number";
    } else {
        $ayat = $input_ayat;
    }

    // validate tanggal
    $input_tanggal = trim($_POST['tanggal']);
    if (empty($input_tanggal)) {
        $tanggal_err = "Please enter a date";
    } else {
        $tanggal_dan_jam = explode("T", $input_tanggal);
        $tanggal = $tanggal_dan_jam[0];
        $jam = $tanggal_dan_jam[1];
    }

    if (count($datas) > 0) {
        $id = $datas[0]['id'] + 1;
    }

    $inputs = array(
        "id" => $id,
        "juz" => $juz,
        "surah" => $surah,
        "ayat" => $ayat,
        "tanggal" => $tanggal,
        "jam" => $jam
    );

    $new_datas = $datas;
    array_unshift($new_datas, $inputs);

    $success_write = file_put_contents(FILE_NAME, json_encode($new_datas, JSON_PRETTY_PRINT));
    if ($success_write === FALSE) {
        echo "Oops something wrong here.";
    } else {
        header("location: index.php");
        exit();
    }
}

?>

<?php
require_once("template/header.php");
?>

<div class="col-md-12">
    <div class="page-header">
        <h2>Tambah Record</h2>
    </div>
    <p>Silakan isi form di bawah ini kemudian submit untuk menambahkan</p>
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <div class="form-group <?= (!empty($juz_err)) ? 'has-error' : '' ?>">
            <label>Juz</label>
            <input type="number" name="juz" class="form-control" value="<?= $juz ?>">
            <span class="help-block"><?= $juz_err ?></span>
        </div>
        <div class="form-group <?= (!empty($surah_err)) ? 'has-error' : '' ?>">
            <label>Surah</label>
            <input type="text" name="surah" class="form-control" value="<?= $surah ?>">
            <span class="help-block"><?= $surah_err ?></span>
        </div>
        <div class="form-group <?= (!empty($ayat_err)) ? 'has-error' : '' ?>">
            <label>Ayat</label>
            <input type="number" name="ayat" class="form-control" value="<?= $ayat ?>">
            <span class="help-block"><?= $ayat_err ?></span>
        </div>
        <div class="form-group <?= (!empty($ayat_err)) ? 'has-error' : '' ?>">
            <label>Tanggal</label>
            <input type="datetime-local" name="tanggal" class="form-control" value="<?= $tanggal ?>">
            <span class="help-block"><?= $tanggal_err ?></span>
        </div>
        <input type="submit" value="Add" class="btn btn-primary">
        <a href="index.php" class="btn btn-default">Go Back</a>
    </form>
</div>

<?php
require_once("template/footer.php");
?>