<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Barang Jadi</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Edit Barang Jadi</li>
            </ol>
            <?php echo $this->session->flashdata('hasil'); ?>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Barang Jadi
                </div>
                <div class="card-body">
                    <form action="<?= site_url('BarangJadi/doEdit') ?>" method="post">
                        <div class="row">
                            <div class="col-6 form-group">
                                <label for="exampleFormControlInput1">Kode Barang:</label>
                                <input type="hidden" name="id" value="<?= $databarangjadi->data->barangjadi->id ?>" id="">
                                <input type="text" name="kode_barang" value="<?= $databarangjadi->data->barangjadi->kode_barang ?>" class="form-control" id="exampleFormControlInput1">
                            </div>
                            <div class="col-6 form-group">
                                <label for="exampleFormControlInput1">Nama Barang:</label>
                                <input type="text" value="<?= $databarangjadi->data->barangjadi->nama_barang ?>" name="nama_barang" class="form-control" id="exampleFormControlInput1">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-6 form-group">
                                <label for="exampleFormControlInput1">Jenis Barang:</label>
                                <select class="form-select" name="jenis_barang_jadi_id" aria-label="Default select example">
                                    <?php foreach ($databarangjadi->data->data_jenis as $data) { ?>
                                        <option value="<?= $data->id ?>" <?= ($databarangjadi->data->jenis->id == $data->id ? 'selected' : '') ?>><?= $data->nama_jenis ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-6 form-group">
                                <label for="exampleFormControlInput1">Warna Barang:</label>
                                <select class="form-select" name="warna_barang_jadi_id" aria-label="Default select example">
                                    <?php foreach ($databarangjadi->data->data_warna as $data) { ?>
                                        <option value="<?= $data->id ?>" <?= ($databarangjadi->data->warna->id == $data->id ? 'selected' : '') ?>><?= $data->nama_warna ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Stok(Pcs):</label>
                                    <input type="number" value="<?= $databarangjadi->data->barangjadi->stock ?>" name="stock" class="form-control" id="exampleFormControlInput1">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Tanggal Produksi:</label>
                                    <input type="date" value="<?= $databarangjadi->data->barangjadi->tanggal_produksi ?>" name="tanggal_produksi" class="form-control" id="exampleFormControlInput1">
                                </div>
                            </div>
                        </div>
                        <input type="submit" value="Save Barang Jadi" name="submit" class="btn btn-success mt-4">
                    </form>
                </div>
            </div>
        </div>
    </main>