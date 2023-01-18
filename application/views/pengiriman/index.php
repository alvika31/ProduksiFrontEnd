<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Belum Dikirim</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Data Belum Dikirim</li>
            </ol>
            <?php echo $this->session->flashdata('hasil'); ?>
            <?php if (empty($barangjadi->data)) { ?>
                <div class="alert alert-danger" role="alert">
                    Data Barang Jadi Belum Harus Dikirim
                </div>
            <?php } else { ?>
                <div class="row">
                    <?php foreach ($barangjadi->data as $jadi) { ?>
                        <?php $tanggalMinta = date('Y-m-d', strtotime($jadi->tanggal_permintaan)); ?>
                        <?php $tanggalKirim = date('Y-m-d', strtotime($jadi->tanggal_pengiriman)); ?>
                        <div class="col-3 mt-5">
                            <div class="card shadow p-2 bg-body rounded">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $jadi->nama_barang   ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Kode Barang: <?= $jadi->kode_barang ?></h6>
                                    Kuantitas: <?= $jadi->quantitas ?><br>
                                    Jenis Barang: <?= $jadi->jenis_barang_jadis->nama_jenis ?><br>
                                    <div class="d-flex flex-row bd-highlight">
                                        Warna Barang: <?= $jadi->warna_barang_jadis->nama_warna ?> <div class="ms-2 shadow-sm" style="background-color: <?= $jadi->warna_barang_jadis->kode_warna ?>; width:100px; height:20px"></div><br>
                                    </div>
                                    Tanggal Permintaan: <?= tanggal_indo($tanggalMinta, TRUE) ?><br>
                                    Tanggal Pengiriman: <?= tanggal_indo($tanggalKirim, TRUE) ?><br>
                                    <div class="d-flex flex-row bd-highlight mt-3">
                                        <a href="<?= site_url('Pengiriman/kirimbarang/' . $jadi->id) ?>" class="btn btn-primary">Kirim Barang</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
    </main>