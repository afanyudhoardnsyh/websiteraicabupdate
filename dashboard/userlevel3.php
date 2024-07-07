        <h1>Dashboard sangker</h1>
            <!-- Dashboard -->
            <div class="dashboard">
                <div class="peserta">
                    <div class="status">
                        <div class="info">
                            <h3>Jumlah Peserta</h3>
                            <h1><?php echo $jumlah_peserta; ?> Orang</h1>
                        </div>
                        <div class="progresss">
                            <i class="fa-solid fa-circle-user"></i>
                        </div>
                    </div>
                </div>
                <div class="kontingen">
                    <div class="status">
                        <div class="info">
                            <h3>Data Kontingen</h3>
                            <h1>11 Kontingen</h1>
                        </div>
                        <div class="progresss">
                            <i class="fa-solid fa-circle-user"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Dashboard -->

            <?php include 'chart.php'; ?>

            <div class="recent-orders">
                <h2>Data Pembayaran Kontingen</h2>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kontingen</th>
                            <th>Jumlah Peserta</th>
                            <th>Pembayaran</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $no = 1;
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row['kwarran']; ?></td>
                                    <td><?php echo $row['jumlah']; ?></td>
                                    <td>Sukses</td>
                                    <td>Aktif</td>
                                    
                                </tr>
                                <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="6"><br>Belum ada file yang diupload</td>
                            </tr>
                            <?php
                        }
                    ?>
                    </tbody>
                </table>
                <a href="#" class="show">Show All</a>
            </div>