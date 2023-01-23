<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Jenis Barang Jadi</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Edit Jenis Barang Jadi</li>
            </ol>
            <?php echo $this->session->flashdata('hasil'); ?>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Jenis Barang Jadi
                </div>
                <div class="card-body">
                    <form action="<?= site_url('JenisBarangJadi/doEdit') ?>" method="post">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Jenis Barang:</label>
                            <input type="hidden" name="id" value="<?= $jenis['data']['id'] ?>">
                            <input type="text" name="nama_jenis" class="form-control" id="exampleFormControlInput1" value="<?= $jenis['data']['nama_jenis'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Deskripsi Jenis Barang:</label>
                            <textarea class="form-control" name="deskripsi_jenis" id="exampleFormControlTextarea1" rows="3"><?= $jenis['data']['deskripsi_jenis'] ?></textarea>
                        </div>
                        <input type="submit" value="Edit Jenis Barang" name="submit" class="btn btn-success mt-4">
                    </form>
                </div>
            </div>
        </div>
    </main>