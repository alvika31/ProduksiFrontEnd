<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Request Barang Jadi</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Tambah Request Barang Jadi</li>
            </ol>
            <?php echo $this->session->flashdata('hasil'); ?>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Request Barang Jadi
                </div>
                <div class="card-body">
                    <form action="<?= site_url('RequestBarangJadi/detailBarangJadi') ?>" method="post">
                        <div class="row">
                            <div class="col-12 form-group">
                                <label for="exampleFormControlInput1">Pilih Barang Jadi:</label>
                                <select class="form-select" name="barangJadiId" aria-label="Default select example">
                                    <?php foreach ($dataapi->data as $data) { ?>
                                        <option value="<?= $data->id ?>"><?= $data->nama_barang ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                        </div>
                        <input type="submit" value="Selanjutnya" name="submit" class="btn btn-success mt-4">
                    </form>
                </div>
            </div>
        </div>
    </main>