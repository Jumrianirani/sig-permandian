<div class="col-sm-12">
    <?php
        //nonotifikasi pesan data berhasil disimpan
        if ($this->session->flashdata('pesan')) {
            echo '<div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
            echo $this->session->flashdata('pesan');
            echo "</div>";
        }
    ?>
    <table class="table table-responsive table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Permandian</th>
                <th>Alamat</th>
                <th>Keterangan</th>
                <th>Gambar</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach ($permandian as $key => $value) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $value->nama_permandian ?></td>
                <td><?= $value->alamat ?></td>
                <td><?= $value->ket ?></td>
                <td><img src="<?= base_url('gambar/'. $value->gambar) ?>" width="150px"></td>
                <td>
                    <a href="<?= base_url('permandian/edit/'.$value->id_permandian) ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="<?= base_url('permandian/hapus/'.$value->id_permandian) ?>" class="btn btn-sm btn-danger" onClick="return confirm('Apakah Data Ingin Dihapus...?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>