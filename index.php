<?php
require_once("config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Record</title>

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
                <div class="page-header clearfix">
                    <h2 class="pull-left"><?= TITLE_HOME ?></h2>
                    <a href="create.php" class="btn btn-success pull-right">Tambah Baru</a>
                </div>
                <div class="mt-2">
                    <?php
                    if (count($datas) > 0) {
                        echo "<table class='table table-bordered table-striped'>";

                        // thead
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>#</th>";
                        echo "<th>Juz</th>";
                        echo "<th>Surah</th>";
                        echo "<th>Ayat</th>";
                        echo "<th>Tanggal</th>";
                        echo "<th>Jam</th>";
                        echo "<th>Pengaturan</th>";
                        echo "</tr>";
                        echo "</thead>";

                        // tbody
                        echo "<tbody>";
                        foreach ($datas as $data) {
                            echo "<tr>";
                            echo "<td>" . $data['id'] . "</td>";
                            echo "<td>" . $data['juz'] . "</td>";
                            echo "<td>" . $data['surah'] . "</td>";
                            echo "<td>" . $data['ayat'] . "</td>";
                            echo "<td>" . $data['tanggal'] . "</td>";
                            echo "<td>" . $data['jam'] . "</td>";
                            // pengaturan
                            echo "<td class='d-flex justify-content-around'>";
                            echo "<a href='read.php?id=" . $data['id'] . "' title='View Record' data-toggle='tooltip'><i class='bi bi-eye'></i></a>";
                            echo "<a href='update.php?id=" . $data['id'] . "' title='Update Record' data-toggle='tooltip'><i class='bi bi-pencil-square'></i></a>";
                            echo "</td>";
                        }
                        echo "</tbody>";
                        echo "</table>";
                    } else {
                        echo "<p class='lead'><em>No records were found.</em></p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>