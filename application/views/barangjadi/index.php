<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Barang Jadi</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Data Barang Jadi</li>
            </ol>
            <a href="<?= site_url('Barangjadi/create') ?>" class="btn btn-success mb-3">Tambah Barang Jadi</a>
            <?php echo $this->session->flashdata('hasil'); ?>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Barang Jadi
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Kode Barang</th>
                                <th>Jenis Barang</th>
                                <th>Warna Barang</th>
                                <th>Stock</th>
                                <th>Tanggal Produksi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Kode Barang</th>
                                <th>Jenis Barang</th>
                                <th>Warna Barang</th>
                                <th>Stock</th>
                                <th>Tanggal Produksi</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $i = 1;
                            foreach ($barangjadi->data as $jadi) { ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $jadi->nama_barang ?></td>
                                    <td><?= $jadi->kode_barang ?></td>
                                    <td><?= $jadi->jenis_barang_jadis->nama_jenis ?></td>
                                    <td>
                                        <div class="d-flex flex-row bd-highlight mb-3 align-items-center">
                                            <?= $jadi->warna_barang_jadis->nama_warna ?>
                                            <div class="" style="background-color: <?= $jadi->warna_barang_jadis->kode_warna ?>; width:100px; height: 20px; margin-left:10px;">
                                            </div>
                                        </div>
                                    </td>
                                    <td><?= $jadi->stock ?> Pcs</td>
                                    <td>
                                        <?php $tanggal = date('Y-m-d', strtotime($jadi->tanggal_produksi)); ?>
                                        <?= tanggal_indo($tanggal, TRUE) ?></td>
                                    <td><a href="<?= site_url('barangjadi/edit/' . $jadi->id) ?>" class="btn btn-success btn-sm">Edit Barang</a> <a class="btn btn-danger btn-sm" href="<?= site_url('BarangJadi/delete/' . $jadi->id) ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Jenis <?= $jadi->nama_barang ?>')">Hapus</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>