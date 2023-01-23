<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Request Barang Jadi</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Edit Request Barang Jadi</li>
            </ol>
            <?php echo $this->session->flashdata('hasil'); ?>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Barang Jadi
                </div>
                <div class="card-body">
                    <form action="<?= site_url('RequestBarangJadi/doEdit') ?>" method="post">
                        <div class="row">
                            <div class="col-6 form-group">
                                <label for="exampleFormControlInput1">Kode Barang:</label>
                                <input type="hidden" name="id" value="<?= $requestbarangjadi['data']['barangjadi']['id'] ?>" id="">
                                <input type="text" name="kode_barang" value="<?= $requestbarangjadi['data']['barangjadi']['kode_barang'] ?>" class="form-control" id="exampleFormControlInput1">
                            </div>
                            <div class="col-6 form-group">
                                <label for="exampleFormControlInput1">Nama Barang:</label>
                                <input type="text" value="<?= $requestbarangjadi['data']['barangjadi']['nama_barang'] ?>" name="nama_barang" class="form-control" id="exampleFormControlInput1">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-6 form-group">
                                <label for="exampleFormControlInput1">Jenis Barang:</label>
                                <select class="form-select" name="jenis_barang_jadi_id" aria-label="Default select example">
                                    <?php foreach ($requestbarangjadi['data']['data_jenis'] as $data) { ?>
                                        <option value="<?= $data['id'] ?>" <?= ($requestbarangjadi['data']['jenis']['id'] == $data['id'] ? 'selected' : '') ?>><?= $data['nama_jenis'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-6 form-group">
                                <label for="exampleFormControlInput1">Warna Barang:</label>
                                <select class="form-select" name="warna_barang_jadi_id" aria-label="Default select example">
                                    <?php foreach ($requestbarangjadi['data']['data_warna'] as $data) { ?>
                                        <option value="<?= $data['id'] ?>" <?= ($requestbarangjadi['data']['warna']['id'] == $data['id'] ? 'selected' : '') ?>><?= $data['nama_warna'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Quantitas(Pcs):</label>
                                    <input type="number" value="<?= $requestbarangjadi['data']['barangjadi']['quantitas'] ?>" name="quantitas" class="form-control" id="exampleFormControlInput1">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Tanggal Pengiriman:</label>
                                    <input type="date" value="<?= $requestbarangjadi['data']['barangjadi']['tanggal_pengiriman'] ?>" name="tanggal_pengiriman" class="form-control" id="exampleFormControlInput1">
                                    <input type="hidden" value="<?= $requestbarangjadi['data']['barangjadi']['tanggal_permintaan'] ?>" name="tanggal_permintaan" class="form-control" id="exampleFormControlInput1">
                                </div>
                            </div>
                        </div>
                        <input type="submit" value="Edit Request" name="submit" class="btn btn-success mt-4">
                    </form>
                </div>
            </div>
        </div>
    </main>