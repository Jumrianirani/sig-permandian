<div class="col-sm-7">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Lokasi Permandian
            </div>
            <div class="panel-body">

            <div id="map" style="height: 500px;"></div>



        </div>
    </div>
</div>



<div class="col-sm-5">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Input Data
            </div>
            <div class="panel-body">
                <?php 
                 if(isset($error_upload)) {
                    echo '<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'. $error_upload .'</div>';
                }
                
                //validasi data tidak boleh kososng
                echo validation_errors('<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');

                //nontifikasi pesan data berhasil disimpan

                if ($this->session->flashdata('pesan')) {
                    echo '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                    echo $this->session->flashdata('pesan');
                    echo "</div>";
                }
                echo form_open_multipart('permandian/edit/'.$permandian->id_permandian); 
                ?>

        <div class="form-group">
            <label>Nama Permandian</label>
            <input name="nama_permandian" placeholder="Nama Permandian" value="<?= $permandian->nama_permandian ?>" class="form-control" />
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <input name="alamat" placeholder="Alamat" value="<?= $permandian->alamat ?>" class="form-control" />
        </div>

        <div class="form-group">
            <label>Latitude</label>
            <input id="Latitude" name="latitude" placeholder="Latitude" value="<?= $permandian->latitude ?>" class="form-control"/>
        </div>

        <div class="form-group">
            <label>Longitude</label>
            <input id="Longitude" name="longitude" placeholder="Longitude" value="<?= $permandian->longitude ?>" class="form-control"/>
        </div>

        <div class="form-group">
            <label>Keterangan</label>
            <input name="ket" placeholder="Keterangan" value="<?= $permandian->ket ?>" class="form-control" />
        </div>

        <img src="<?= base_url('gambar/' . $permandian->gambar) ?>" width="120px">
        <div class="form-group">
            <label>Ganti Gambar</label>
            <input type="file" name="gambar" class="form-control">
        </div>

        <div class="form-group">
            <label></label>
            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
            <button type="reset" class="btn btn-sm btn-success">Reset</button>
            </div>




                <?php echo form_close(); ?>
        </div>
    </div>
</div>








<script>
const map = L.map('map').setView([<?= $permandian->latitude ?>,<?= $permandian->longitude ?>], 13);

	const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19,
		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	}).addTo(map);

	const marker = L.marker([-4.338201798942075, 119.87477310937835]).addTo(map)
		

	const popup = L.popup()
		.setLatLng([<?= $permandian->latitude ?>,<?= $permandian->longitude ?>])
		.openOn(map);

	function onMapClick(e) {
		popup
			.setLatLng(e.latlng)
			.setContent(`${e.latlng.toString()}`)
			.openOn(map);
	}

	map.on('click', onMapClick);

</script>