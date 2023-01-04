<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php echo $this->session->flashdata('hasil'); ?>
</head>

<body>
    <a href="<?=site_url('alat/create')?>">Tambah Alat</a>
    <table>
        <tr>
            <th>No</th>
            <th>No Seri</th>
            <th>Nama Alat</th>
            <th>Jenis Alat</th>
            <th>Jumlah Alat</th>
            <th>Action</th>
        </tr>
        <?php $i = 1;
        foreach ($alat->data as $alats) { ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $alats->no_seri_alat ?></td>
                <td><?= $alats->nama_alat ?></td>
                <td><?= $alats->jenis_alat ?></td>
                <td><?= $alats->jumlah_alat ?></td>
                <td><a href="<?=site_url('alat/edit/'.$alats->id)?>">Edit Alat</a> | <a href="<?=site_url('alat/delete/'.$alats->id)?>">Hapus</a></td>

            </tr>
        <?php } ?>
    </table>

</body>

</html>