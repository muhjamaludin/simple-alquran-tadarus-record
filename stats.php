<?php
require("config.php");
$head_title = "Statistik Target";

$real_dates = array();
foreach ($datas as $data) {
    array_push($real_dates, array("juz" => $data['juz'], "date" => $data["tanggal"]));
}
sort($real_dates);

$target = strtotime("2023-03-22");
$start = strtotime("2023-02-22");

$left_day = ($target - $start) / 60 / 60 / 24;
$days = array();
$juz_ideals = array();
$juzes = array();

// countung days left
for ($i = 0; $i <= $left_day; $i++) {
    $unix_day = $start + (60 * 60 * 24 * $i);
    $date = gmdate("Y-m-d", $unix_day);
    $today = strtotime(date("Y-m-d"));

    if ($unix_day <= $today) {
        array_push($juz_ideals, ($i + 1) / 30);
    }
    array_push($days, $date);

    $temp_date_from_real_date = "";
    foreach ($real_dates as $rdate) {
        if ($rdate['date'] == $date) {
            $temp_date_from_real_date = $rdate;
        }
    }
    array_push($juzes, $temp_date_from_real_date);
}

?>

<?php
require_once("template/header.php")
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>

<div>
    <input type="hidden" name="days" id="days" value='<?= json_encode($days) ?>'>
    <input type="hidden" name="juz_ideals" id="juz_ideals" value='<?= json_encode($juz_ideals) ?>'>
    <input type="hidden" name="real_juz" id="real_juz" value='<?= json_encode($juzes) ?>'>
    <div class="container">
        <div class="text-center mb-2">
            <h1>Statistik Pencapaian</h1>
        </div>
        <canvas id="myChart"></canvas>
    </div>
</div>

<script src="stats.js"></script>

<?php
require_once("template/footer.php");
?>