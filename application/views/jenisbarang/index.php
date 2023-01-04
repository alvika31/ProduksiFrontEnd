<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Jenis Barang Jadi</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Data Jenis Barang Jadi</li>
            </ol>
            <a href="<?= site_url('JenisBarangJadi/create') ?>" class="btn btn-success mb-3">Tambah Jenis Barang</a>
            <?php echo $this->session->flashdata('hasil'); ?>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Jenis Barang Jadi
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Jenis Barang</th>
                                <th>Deskripsi Jenis Barang</th>
                                <th style="width: 20%;">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Jenis Barang</th>
                                <th>Deskripsi Jenis Barang</th>
                                <th style="width: 20%;">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $i = 1;
                            foreach ($jenis_barang->data as $jenis) { ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $jenis->nama_jenis ?></td>
                                    <td><?= $jenis->deskripsi_jenis ?></td>
                                    <td style="width: 10%;"><a href="<?= site_url('JenisBarangJadi/edit/' . $jenis->id) ?>" class="btn btn-warning btn-sm">Edit Jenis</a> <a class="btn btn-danger btn-sm" href="<?= site_url('JenisBarangJadi/delete/' . $jenis->id) ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Jenis <?= $jenis->nama_jenis ?>')">Hapus</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>