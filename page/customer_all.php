<?php
/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 05/04/2016
 * Time: 16:50
 */

$model = new Customer();
$modelPeg = new Pegawai();
?>

<h3 class="head-top">Data Customer</h3>
<table class="table table-bordered table-responsive">
    <thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>No Telp</th>
        <th>Email</th>
        <th>Bulan</th>
        <th>Tahun</th>
        <th>Pegawai</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $no=1;
    foreach($model->getAll() as $data){
        $dataPeg = $modelPeg->getById($data['id_pegawai']);
        ?>
        <tr>
            <td><?=$no++?></td>
            <td><?=$data['nama']?></td>
            <td><?=$data['alamat']?></td>
            <td><?=$data['no_telp']?></td>
            <td><?=$data['email']?></td>
            <td><?=$data['bulan']?></td>
            <td><?=$data['tahun']?></td>
            <td><?=$dataPeg['nama']?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
