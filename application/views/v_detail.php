<div class="row">
	<div class="col-sm-6">
		<div class="panel panel-primary">
			<div class="panel-heading"> Lokasi Permandian</div>
				<div class="panel-body">


                <div id="map" style="width: 100%; height: 700px;"></div>


				</div>
			</div>
		</div>

        <div class="col-sm-6">
		<div class="panel panel-primary">
			<div class="panel-heading"> Gambar Permandian</div>
				<div class="panel-body">

                <img src="<?= base_url('gambar/'. $permandian->gambar) ?>" width="100%" height="700px">

				</div>
			</div>
		</div>

        <div class="col-sm-12">
		<div class="panel panel-primary">
			<div class="panel-heading"> Data Permandian</div>
				<div class="panel-body">

                    <table class="table table-border">
                        <thead>
                            <tr>
                                <th width="200px">Nama Permandian</th>
                                <th width="50px">:</th>
                                <td><?= $permandian->nama_permandian ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <th>:</th>
                                <td><?= $permandian->alamat ?></td>
                            </tr>
                            <tr>
                                <th>Latitude</th>
                                <th>:</th>
                                <td><?= $permandian->latitude ?></td>
                            </tr>
                            <tr>
                                <th>Longitude</th>
                                <th>:</th>
                                <td><?= $permandian->longitude ?></td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <th>:</th>
                                <td><?= $permandian->ket ?></td>
                            </tr>
                        </thead>
                    </table>


				</div>
			</div>
		</div>

	</div>

    <script>
        const map = L.map('map').setView([<?= $permandian->latitude ?>, <?= $permandian->longitude ?>], 15);

const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
maxZoom: 19,
attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);



L.marker([<?= $permandian->latitude ?>, <?= $permandian->longitude ?>]).addTo(map)
	.bindPopup('<img src="<?= base_url('gambar/'.$permandian->gambar) ?>" width="100%">'+
	'<b>Nama Permandian : <?= $permandian->nama_permandian ?></b><br/>'+
	'Alamat 	   :  <?= $permandian->alamat ?></br>'+
	'Keterangan    :  <?= $permandian->ket ?></br>') .openPopup();


    </script>