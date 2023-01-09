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
                    Data Request Barang Jadi
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Kuantitas</th>
                                <th>Tanggal Permintaan</th>
                                <th>Tanggal Pengiriman</th>
                                <th>Warna Barang</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Kuantitas</th>
                                <th>Tanggal Permintaan</th>
                                <th>Tanggal Pengiriman</th>
                                <th>Warna Barang</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $i = 1;
                            foreach ($request_barang_jadi->data as $jadi) { ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $jadi->barang_jadis->nama_barang ?></td>
                                    <td><?= $jadi->quantitas ?></td>
                                    <?php $tanggalpermintaan = date('Y-m-d', strtotime($jadi->tanggal_permintaan)); ?>
                                    <td> <?= tanggal_indo($tanggalpermintaan, TRUE) ?></td>
                                    <?php $tanggalpengiriman = date('Y-m-d', strtotime($jadi->tanggal_pengiriman)); ?>
                                    <td><?= tanggal_indo($tanggalpengiriman, TRUE) ?></td>
                                    <td>
                                        <div class="d-flex flex-row bd-highlight mb-3 align-items-center">
                                            <?= $jadi->barang_jadis->warna_barang_jadis->nama_warna ?>
                                            <div class="" style="background-color: <?= $jadi->barang_jadis->warna_barang_jadis->kode_warna ?>; width:100px; height: 20px; margin-left:10px;">
                                            </div>
                                        </div>
                                    </td>

                                    <td><a href="<?= site_url('RequestBarangJadi/edit/' . $jadi->id) ?>" class="btn btn-success btn-sm">Edit Barang</a> <a class="btn btn-danger btn-sm" href="<?= site_url('BarangJadi/delete/' . $jadi->id) ?>">Hapus</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>