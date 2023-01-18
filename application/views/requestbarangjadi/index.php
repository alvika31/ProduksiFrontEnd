<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Request Barang Jadi</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Data Request Barang Jadi</li>
            </ol>
            <a href="<?= site_url('RequestBarangJadi/create') ?>" class="btn btn-success mb-3">Tambah Request Barang Jadi</a>
            <?php echo $this->session->flashdata('hasil'); ?>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Request Barang Jadi
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
                                <th>Quantitas</th>
                                <th>Tanggal Permintaan</th>
                                <th>Tanggal Pengiriman</th>
                                <th>Status</th>
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
                                <th>Tanggal Permintaan</th>
                                <th>Tanggal Pengiriman</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $i = 1;
                            foreach ($request_barang_jadi->data as $jadi) { ?>
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
                                    <td><?= $jadi->quantitas ?> Pcs</td>
                                    <td>
                                        <?php $tanggal = date('Y-m-d', strtotime($jadi->tanggal_permintaan)); ?>
                                        <?= tanggal_indo($tanggal, TRUE) ?></td>
                                    <td>
                                        <?php $tanggal = date('Y-m-d', strtotime($jadi->tanggal_pengiriman)); ?>
                                        <?= tanggal_indo($tanggal, TRUE) ?></td>
                                    <td>
                                        <?php if ($jadi->status == 0) { ?>
                                            <span class="badge bg-danger">Belum Diproses</span>
                                        <?php } elseif ($jadi->status == 1) { ?>
                                            <span class="badge bg-primary">Sedang Diproses</span>
                                        <?php } elseif ($jadi->status == 2) { ?>
                                            <span class="badge bg-success">Sudah Diproses</span>
                                        <?php } ?>
                                    </td>
                                    <td><a href="<?= site_url('RequestBarangJadi/edit/' . $jadi->id) ?>" class="btn btn-success btn-sm">Edit Request</a> <a class="btn btn-danger btn-sm" href="<?= site_url('RequestBarangJadi/delete/' . $jadi->id) ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Jenis <?= $jadi->nama_barang ?>')">Hapus</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>