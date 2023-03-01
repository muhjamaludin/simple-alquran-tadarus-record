<?php
require("config.php");


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
        // echo $real_dates[$i]["date"] . " " . $date . "<br>";
        if ($rdate['date'] == $date) {
            $temp_date_from_real_date = $rdate["juz"];
        }
    }
    array_push($juzes, $temp_date_from_real_date);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!-- chartjs -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.min.js" integrity="sha512-v3ygConQmvH0QehvQa6gSvTE2VdBZ6wkLOlmK7Mcy2mZ0ZF9saNbbk19QeaoTHdWIEiTlWmrwAL4hS8ElnGFbA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->


    <style type="text/css">
        .wrapper {
            width: 650px;
            margin: 0 auto;
        }

        .page-header h2 {
            margin-top: 0;
        }

        table tr td:last-child a {
            margin-right: 15px;
        }
    </style>
</head>

<body>
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

    <script>
        const days = document.getElementById("days").value;
        let juz_ideals = document.getElementById("juz_ideals").value;
        let real_juzes = document.getElementById("real_juz").value;
        juz_ideals = JSON.parse(juz_ideals).map(j => Math.ceil(j * 31));
        real_juzes = JSON.parse(real_juzes).filter(j => j != "");

        const ctx = document.getElementById("myChart").getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: JSON.parse(days),
                datasets: [{
                        data: juz_ideals,
                        label: "Ideal",
                        borderColor: "#3e95cd",
                        backgroundColor: "#7bb6dd",
                        fill: false,
                    },
                    {
                        data: real_juzes,
                        label: "Real",
                        borderColor: "#3cba9f",
                        backgroundColor: "#71d1bd",
                        fill: false,
                    },
                    // {
                    //     data: [10, 21, 60, 44, 17, 21, 17],
                    //     label: "Pending",
                    //     borderColor: "#ffa500",
                    //     backgroundColor: "#ffc04d",
                    //     fill: false,
                    // }, {
                    //     data: [6, 3, 2, 2, 7, 0, 16],
                    //     label: "Rejected",
                    //     borderColor: "#c45850",
                    //     backgroundColor: "#d78f89",
                    //     fill: false,
                    // }
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        display: true,
                        ticks: {
                            beginAtZero: true,
                            steps: 30,
                            stepValue: 1,
                            max: 30
                        }
                    }]
                }
            }
        })
    </script>
</body>

</html>