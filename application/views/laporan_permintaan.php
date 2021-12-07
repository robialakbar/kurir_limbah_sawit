<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
	        <div class="box-header with-border">
	          <h3 class="box-title">Laporan Permintaan</h3>
	          <div class="box-tools pull-right">
	            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
	            </button>
	          </div>
	          <!-- /.box-tools -->
	        </div>
	        <!-- /.box-header -->
	        <div class="box-body">
	        	<table class="table table-bordered data">
	          	<thead>
	          		<tr>
	          			<th>No</th>
	          			<th>Nama Outlet</th>
	          			<th>Pengambilan</th>
	          			<th>Jumlah Liter</th>
	          			<th>Harga</th>
	          			<th>Total</th>
	          			
	          			<th>Tgl. Pengambilan</th>
	          			<th>Catatan</th>
	          			<th>Status</th>
	          			<th>Aksi</th>
	          		</tr>
	          	</thead>
	          	<tbody>
	          		<?php 
	          		$no=0;
	          		foreach ($kurir as $key) { $no++;
	          			$o = $this->db->get_where("outlite",['id'=>$key->outlite])->row();
	          			switch ($key->jenis) {
	          				case '0':
	          					$jenis = "Tukar Jerigen";
	          					break;
	          				case '1':
	          					$jenis = "Tuang Jerigen";
	          					break;
	          			}
	          			switch ($key->status) {
	          				case '0':
	          					$status = "Pending";
	          					$color = "#f39c12";
	          					$review = "<a href='".base_url('home/review/').$key->code."' class='btn btn-primary btn-xs'>Review</a>";
	          					break;
	          				case '1':
	          					$status = "Disetujui";
	          					$review ="";
	          					$color = "#16a085";
	          					break;
	          				case '2':
	          					$status = "Telah Diambil";
	          					$review ="";
	          					$color = "#2980b9";
	          					break;
	          				case '3':
	          					$status = "Ditolak";
	          					$review ="<a href='".base_url('home/delete/').$key->code."' class='btn btn-default btn-xs'>hapus</a>";
	          					$color = "#c0392b";
	          					break;
	          			}
	          			echo '<tr style="background-color:'.$color.';color:white">
	          			<td>'.$no.'</td>
	          			<td>'.$o->name.'</td>
	          			<td>'.$jenis.' '.$key->jml_kemasan.' '.$key->jenis_kemasan.'</td>
	          			<td>'.$key->jml_liter.'</td>
	          			<td>'.Rupiah($key->harga).'</td>
	          			<td>'.Rupiah($key->bayar).'</td>
	          			<td>'.$key->tgl_terima.'</td>
	          			<td>'.$key->note.'</td>
	          			<td>'.$status.'</td>';
	          			
	          				echo'<td>'.$review.'</td>';
	          			
	          			echo '</tr>';
	          		}
	          		?>
	          	</tbody>
	          </table>
	        </div>
	    	<!-- /.box-body -->
	    </div>
	    <!-- /.box -->
	</div>
</div>