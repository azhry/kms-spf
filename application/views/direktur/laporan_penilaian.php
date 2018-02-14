<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		#bigWrapper{
			width: 100%;
		}
		.header{
			text-align: center;
			font-size: 26px;
			margin-bottom: 50px;
			border-bottom: 5px double black;
			padding-bottom: 15px;
		}

		#logoo{
			margin-top: -200px;
			width: 130px;
			height: 200px;
			margin-left: 10px;
			margin-right: 60px;	
		}
		#logoo img{
			width: 130px;
			height: 80px;
		}
		.title{
			margin-left: 50px;
			margin-top: -190px;
		}
		.kontak{
			margin-top: 5px;
			font-size: 12px;
			text-align: center;
		}
		table,th,td{
			border: 1px solid black;
		}
		table {
		    border-collapse: collapse;
		}
		tr:nth-child(even) {
			background-color: #f2f2f2
		}
		tr:first-child{
			width: 40px;
		}
		th{
		    background-color: #4CAF50;
		    color: white;
			/*min-width: 100px;*/
		}
		td{
			padding: 2px;
			padding-left: 10px; 
			text-align: center;
		}
	</style>
</head>
<body>
	<div id="bigWrapper">
		<div class="header">
			<!-- <div id="logoo">
				<img src="<?= base_url('') ?>assets/img/logo.jpg">
			</div> -->

			<div class="title">
				<strong>
					Laporan Penilaian Karyawan <br>
					PT. Sumatera Prima Fibreboard
				</strong>
				<!-- <div class="kontak">
					Jalan Kapten Syech No.83, 24 Ilir. Bukit Kecil<br> 
					Kota Palembang, Sumatera Selatan<br>
				</div> -->
			</div>
		</div>
		<div class="content" style="margin: 0 auto; width:100%;">
			<p style="margin-top: -30px; width: 100%; font-weight: bold; font-size: 22px; text-align: center; margin-bottom: 30px;">Laporan Penilaian Karyawan</p>
			<table style="width: 100%;">
				<thead>
					<tr>
						<th>No.</th>
	                    <th>NIK</th>
                        <th>Nama</th>
                        <th>Departemen</th>
                        <th>Jabatan</th>
                        <th>KI</th>
                        <th>KP</th>
                        <th>KF</th>
                        <th>KPd</th>
                        <th>KPK</th>
                        <th>Kinerja</th>
	                </tr>
				</thead>
				<tbody>
					<?php $i = 0; foreach ($hasil_penilaian as $row): ?>
						<tr>
							<td><?= ++$i ?></td>
							<td><?= $row->NIK ?></td>
                            <td><?= $row->nama_karyawan ?></td>
                            <td>
                            	<?php  
                            		$departemen = $this->departemen_m->get_row([ 'id_departemen' => $row->id_departemen ]);
                            		echo isset( $departemen ) ? $departemen->nama_departemen : '-';
                            	?>
                            </td>
                            <td>
                            	<?php  
                            		$jabatan = $this->jabatan_m->get_row([ 'id_jabatan' => $row->id_jabatan ]);
                            		echo isset( $jabatan ) ? $jabatan->nama_jabatan : '-';
                            	?>
                            </td>
                            <?php  
                            	$nilai = $this->penilaian_karyawan_m->get([ 'id_karyawan' => $row->id_karyawan ]);
                            	foreach ( $nilai as $n ):
                            ?>
                            <td><?= $n->bobot ?></td>
                        	<?php endforeach; ?>
                            <td><?= $row->kinerja ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>