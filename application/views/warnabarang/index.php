<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Warna Barang Jadi</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Data Warna Barang Jadi</li>
            </ol>
            <a href="<?= site_url('WarnaBarangJadi/create') ?>" class="btn btn-success mb-3">Tambah Warna Barang</a>
            <?php echo $this->session->flashdata('hasil'); ?>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Warna Barang Jadi
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Warna</th>
                                <th>Kode Warna</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Warna</th>
                                <th>Kode Warna</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $i = 1;
                            foreach ($warna->data as $warnas) { ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $warnas->nama_warna ?></td>
                                    <td>
                                        <div class="d-flex flex-row bd-highlight mb-3 align-items-center">
                                            <?= $warnas->kode_warna ?>
                                            <div class="" style="background-color: <?= $warnas->kode_warna ?>; width:100px; height: 20px; margin-left:10px;">
                                            </div>
                                        </div>
                                    </td>
                                    <td><a href="<?= site_url('WarnaBarangJadi/edit/' . $warnas->id) ?>" class="btn btn-warning btn-sm">Edit Warna</a> <a class="btn btn-danger btn-sm" href="<?= site_url('WarnaBarangJadi/delete/' . $warnas->id) ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Warna <?= $warnas->nama_warna ?>')">Hapus</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>