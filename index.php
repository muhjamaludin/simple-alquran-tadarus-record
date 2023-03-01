<?php
require_once("config.php");
$head_title = "Dashboard Record";
?>

<?php
require_once("template/header.php");
?>

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


<?php
require_once("template/footer.php");
?>