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
                    <form action="<?= site_url('BarangMentah/doEdit') ?>" method="post">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?= $barangmentah->data->id ?>">
                            <label for="exampleFormControlInput1">Nama Barang Mentah:</label>
                            <input type="text" name="nama_barang_mentah" value="<?= $barangmentah->data->nama_barang_mentah ?>" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Jenis Barang Mentah:</label>
                            <input type="text" name="jenis_barang_mentah" value="<?= $barangmentah->data->jenis_barang_mentah ?>" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Warna Barang Mentah:</label>
                            <input type="text" name="warna_barang_mentah" value="<?= $barangmentah->data->warna_barang_mentah ?>" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Stock Barang Mentah:</label>
                            <input type="number" name="stock_mentah" value="<?= $barangmentah->data->stock_mentah ?>" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <input type="submit" value="Edit Barang Mentah" name="submit" class="btn btn-success mt-4">
                    </form>
                </div>
            </div>
        </div>
    </main>