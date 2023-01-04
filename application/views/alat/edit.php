<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="<?= site_url('alat/do_edit') ?>" method="post">
        <input type="hidden" name="id" value="<?= $alat->data->id ?>">
        <p>No Seri Alat</p>
        <input type="text" name="no_seri_alat" id="" value="<?= $alat->data->no_seri_alat ?>">
        <p>Nama Alat</p>
        <input type="text" name="nama_alat" id="" value="<?= $alat->data->nama_alat ?>">
        <p>Jenis Alat</p>
        <input type="text" name="jenis_alat" id="" value="<?= $alat->data->jenis_alat ?>">
        <p>Jumlah Alat</p>
        <input type="number" name="jumlah_alat" id="" value="<?= $alat->data->jumlah_alat ?>">
        <input type="submit" name="submit" value="Simpan">
    </form>
</body>

</html>