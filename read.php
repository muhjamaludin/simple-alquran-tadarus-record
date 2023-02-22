<?php

require_once("config.php");

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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Record</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>

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

    <script type="text/javascript">
        $(document).ready(() => {
            $('[data-toggle="tooltip"]').tooltip();
        })
    </script>
</head>

<body>
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
</body>

</html>