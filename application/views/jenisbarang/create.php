<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Jenis Barang Jadi</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Tambah Jenis Barang Jadi</li>
            </ol>
            <?php echo $this->session->flashdata('hasil'); ?>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Jenis Barang Jadi
                </div>
                <div class="card-body">
                    <form action="<?= site_url('JenisBarangJadi/doCreate') ?>" method="post">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Jenis Barang:</label>
                            <input type="text" name="nama_jenis" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Deskripsi Jenis Barang:</label>
                            <textarea class="form-control" name="deskripsi_jenis" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <input type="submit" value="Save Jenis Barang" name="submit" class="btn btn-success mt-4">
                    </form>
                </div>
            </div>
        </div>
    </main>