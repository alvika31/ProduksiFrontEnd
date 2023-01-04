<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Warna Barang Jadi</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Tambah Data Warna Barang Jadi</li>
            </ol>
            <?php echo $this->session->flashdata('hasil'); ?>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Edit Warna Barang Jadi
                </div>
                <div class="card-body">
                    <form action="<?= site_url('WarnaBarangJadi/doEdit') ?>" method="post">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Warna:</label>
                            <input type="hidden" name="id" value="<?= $warna->data->id ?>">
                            <input type="text" name="nama_warna" class="form-control" id="exampleFormControlInput1" value="<?= $warna->data->nama_warna ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Kode Warna:</label>
                            <div class="" style="background-color: <?= $warna->data->kode_warna ?>; width:100px; height:50px"></div>
                            <input type="color" value="<?= $warna->data->kode_warna ?>" name="kode_warna" class="form-control" style="height: 40px;" id="exampleFormControlInput1">
                        </div>
                        <input type="submit" value="Edit Warna" name="submit" class="btn btn-success mt-4">
                    </form>
                </div>
            </div>
        </div>
    </main>