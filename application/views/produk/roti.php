<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



</div>
<!-- /.container-fluid -->
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Deskripsi</th>
            <th>Gambar</th>
            <th>Action</th>
        </tr>
        <?php $no = 1;
        foreach ($roti as $pd) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $pd['nama']; ?></td>
                <td><?= $pd['harga']; ?></td>
                <td><?= $pd['keterangan']; ?></td>
                <td><img src="<?= base_url('assets/img/usfile/') . $pd['gambar']; ?>" width="100px" heigh="50px"></td>
                <td> <a href="" class="badge badge-success">Simpan</a>
                    <a href="" class="badge badge-success">Beli</a></td>

            </tr>
        <?php endforeach; ?>
    </table>
</div>
</div>
<!-- End of Main Content -->