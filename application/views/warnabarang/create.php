<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Data Warna Barang Jadi</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Tambah Data Warna Barang Jadi</li>
            </ol>
            <?php echo $this->session->flashdata('hasil'); ?>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Warna Barang Jadi
                </div>
                <div class="card-body">
                    <form action="<?= site_url('WarnaBarangJadi/doCreate') ?>" method="post">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Warna:</label>
                            <input type="text" name="nama_warna" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Kode Warna:</label>
                            <input type="color" name="kode_warna" class="form-control" style="height: 40px;" id="exampleFormControlInput1">
                        </div>
                        <input type="submit" value="Save Warna" name="submit" class="btn btn-success mt-4">
                    </form>
                </div>
            </div>
        </div>
    </main>