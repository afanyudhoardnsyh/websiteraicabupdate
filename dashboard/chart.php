<?php 
include 'koneksi/config.php';

$data_chart_query = mysqli_query($conn, "SELECT kwarran, COUNT(*) AS jumlah_peserta FROM peserta GROUP BY kwarran");

// Fetching data properly
$data_chart = [];
while ($row = mysqli_fetch_assoc($data_chart_query)) {
    $data_chart[] = $row;
}
?>

<div class="card">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center text-uppercase">
                <h2>Data Kontingen</h2>
            </div>
            <div class="column-chart">            
                <div class="chart clearfix">
                    <?php foreach ($data_chart as $data) { ?>
                        <div class="item">
                            <div class="bar">
                                <span class="percent"><?php echo $data['jumlah_peserta']; ?></span>
                
                                <div class="item-progress" data-percent="<?php echo $data['jumlah_peserta']; ?>">
                                    <span class="title" style="color: black;"><?php echo $data['kwarran']; ?></span>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
