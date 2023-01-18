<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Barang Mentah</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Data Barang Mentah</li>
            </ol>
            <a href="<?= site_url('BarangMentah/create') ?>" class="btn btn-success mb-3">Tambah Barang Mentah</a>
            <?php echo $this->session->flashdata('hasil'); ?>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Barang Mentah
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Jenis Barang Mentah</th>
                                <th>Warna Barang Mentah</th>
                                <th>Stock Mentah</th>
                                <th style="width: 20%;">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Jenis Barang Mentah</th>
                                <th>Warna Barang Mentah</th>
                                <th>Stock Mentah</th>
                                <th style="width: 20%;">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $i = 1;
                            foreach ($barangmentah->data as $mentah) { ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $mentah->nama_barang_mentah ?></td>
                                    <td><?= $mentah->jenis_barang_mentah ?></td>
                                    <td><?= $mentah->warna_barang_mentah ?></td>
                                    <td><?= $mentah->stock_mentah ?></td>
                                    <td style="width: 10%;"><a href="<?= site_url('BarangMentah/edit/' . $mentah->id) ?>" class="btn btn-warning btn-sm">Edit Jenis</a> <a class="btn btn-danger btn-sm" href="<?= site_url('BarangMentah/delete/' . $mentah->id) ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus <?= $mentah->nama_barang_mentah ?>')">Hapus</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>