<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="">Tambah Request Barang Jadi</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Tambah Request Barang Jadi</li>
            </ol>
            <?php echo $this->session->flashdata('hasil'); ?>
            <div class="row">
                <div class="col-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Detail Barang Jadi
                        </div>
                        <div class="card-body">
                            <b>Nama Barang</b>: <?= $detailbarangjadi->data->nama_barang ?><br>
                            <b>Kode Barang</b>: <?= $detailbarangjadi->data->kode_barang ?><br>
                            <b>Jenis Barang</b>: <?= $detailbarangjadi->data->jenis_barang_jadis->nama_jenis ?><br>
                            <b>Warna Barang</b>: <?= $detailbarangjadi->data->warna_barang_jadis->nama_warna ?><br>
                            <b>Warna</b>:
                            <div class="" style="background-color: <?= $detailbarangjadi->data->warna_barang_jadis->kode_warna ?>; width: 150px; height: 20px"></div>
                            <b>Stock</b>: <?= $detailbarangjadi->data->stock ?><br>
                            <?php $tanggal = date('Y-m-d', strtotime($detailbarangjadi->data->tanggal_produksi)); ?>

                            <b>Tanggal Produksi</b>: <?= tanggal_indo($tanggal, TRUE) ?><br>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Request Barang Jadi
                        </div>
                        <div class="card-body">
                            <form action="<?= site_url('RequestBarangJadi/do_create') ?>" method="post">
                                <input type="hidden" name="barang_jadi_id" value="<?= $detailbarangjadi->data->id ?>">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Quantitas:</label>
                                    <input type="text" name="quantitas" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Tanggal Permintaan:</label>
                                    <input type="date" name="tanggal_permintaan" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Tanggal Pengiriman:</label>
                                    <input type="date" name="tanggal_pengiriman" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <input type="submit" value="Tambah Request" name="submit" class="btn btn-success mt-4">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>