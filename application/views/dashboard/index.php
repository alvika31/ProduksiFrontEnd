<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white">
                        <div class="card-header m-0">Belum Diproduksi</div>
                        <div class="card-body"><?= $count->data->belum_diproduksi ?></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="<?= site_url('Produksi') ?>">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-header">Sudah Diproduksi</div>
                        <div class="card-body"><?= $count->data->sudah_diproduksi ?></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="<?= site_url('Produksi/sudahproduksi') ?>">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-header">Belum Dikirim Barang Jadi</div>
                        <div class="card-body"><?= $count->data->belum_kirim ?></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="<?= site_url('Pengiriman') ?>">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-header">Sudah Dikirim Barang Jadi</div>
                        <div class="card-body"><?= $count->data->sudah_kirim ?></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="<?= site_url('Pengiriman/sudahkirim') ?>">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>