<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Produksi Barang Jadi</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Produksi Barang Jadi</li>
            </ol>
            <?php echo $this->session->flashdata('hasil'); ?>
            <div class="row">
                <div class="col-6">
                    <div class="card shadow p-2 bg-body rounded">
                        <div class="card-body">
                            <h5 class="card-title"><?= $barangjadi->data->barang_jadi->nama_barang   ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted">Kode Barang: <?= $barangjadi->data->barang_jadi->kode_barang ?></h6>
                            Kuantitas: <?= $barangjadi->data->barang_jadi->quantitas ?><br>
                            Jenis Barang: <?= $barangjadi->data->barang_jadi->jenis_barang_jadis->nama_jenis ?><br>
                            <div class="d-flex flex-row bd-highlight">
                                Warna Barang: <?= $barangjadi->data->barang_jadi->warna_barang_jadis->nama_warna ?> <div class="ms-2" style="background-color: <?= $barangjadi->data->barang_jadi->warna_barang_jadis->kode_warna ?>; width:100px; height:20px"></div><br>
                            </div>
                            <?php $tanggalMinta = date('Y-m-d', strtotime($barangjadi->data->barang_jadi->tanggal_permintaan)); ?>
                            <?php $tanggalKirim = date('Y-m-d', strtotime($barangjadi->data->barang_jadi->tanggal_pengiriman)); ?>
                            Tanggal Permintaan: <?= tanggal_indo($tanggalMinta, TRUE) ?><br>
                            Tanggal Pengiriman: <?= tanggal_indo($tanggalKirim, TRUE) ?><br>
                        </div>
                    </div>
                    <div class="card shadow p-2 mt-4 bg-body rounded">
                        <div class="card-body">
                            <h5 class="card-title">Data Barang Mentah Diproduksi</h5>
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Barang Mentah</th>
                                        <th>Quantitas</th>
                                        <th>Warna Barang Mentah</th>
                                        <th>Jenis Barang Mentah</th>
                                        <th>Tanggal Masuk Produksi</th>


                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Barang Mentah</th>
                                        <th>Quantitas</th>
                                        <th>Warna Barang Mentah</th>
                                        <th>Jenis Barang Mentah</th>
                                        <th>Tanggal Masuk Produksi</th>

                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($barangjadi->data->barang_jadi->produksi as $mentah) { ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $mentah->barangmentah->nama_barang_mentah ?></td>
                                            <td><?= $mentah->quantitas ?></td>
                                            <td><?= $mentah->barangmentah->warna_barang_mentah ?></td>
                                            <td><?= $mentah->barangmentah->jenis_barang_mentah ?></td>
                                            <td><?= $mentah->tanggal_produksi ?></td>

                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card shadow p-2 bg-body rounded">
                        <div class="card-body">

                            <?php if ($barangjadi->data->barang_jadi->status == 2) { ?>
                                <h5 class="card-title">Barang Jadi Sudah Diproduksi</h5>
                            <?php } else { ?>
                                <h5 class="card-title">Pilih Barang Mentah untuk diproduksi</h5>
                                <form action="<?= site_url('Produksi/do_create') ?>" method="post">
                                    <input type="hidden" name="request_barang_jadi_id" value="<?= $barangjadi->data->barang_jadi->id ?>">
                                    <label for="exampleInputEmail1" class="form-label">Pilih Barang:</label>
                                    <select class="form-select" name="barang_mentah_id" aria-label="Default select example">
                                        <?php foreach ($barangjadi->data->barang_mentah as $barangmentah) { ?>
                                            <option value="<?= $barangmentah->id ?>"><?= $barangmentah->nama_barang_mentah ?> | <?= $barangmentah->warna_barang_mentah ?> | Stock <?= $barangmentah->stock_mentah ?></option>
                                        <?php } ?>
                                    </select>
                                    <label class="mt-3" for="">Quantitas:</label>
                                    <input type="number" name="quantitas" class="form-control" id="">
                                    <label class="mt-3" for="">Tanggal Masuk Produksi:</label>
                                    <input type="date" name="tanggal_produksi" class="form-control" id="">
                                    <input type="submit" value="Add Produksi" class="mt-4 btn btn-primary" name="submit">
                                    <input type="submit" value="Done Produksi" class="mt-4 btn btn-success" name="done">
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

    </main>