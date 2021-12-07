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
	        	<table class="table table-bordered table-striped data">
	          	<thead>
	          		<tr>
	          			<th>No</th>
	          			<th>Nama Outlet</th>
	          			<th>Pengambilan</th>
	          			<th>Jumlah Liter</th>
	          			<th>Harga</th>
	          			<th>Total</th>
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
	          					$review = "<a href='".base_url('home/review/').$key->code."' class='btn btn-primary btn-xs'>Review</a>";
	          					break;
	          				case '1':
	          					$status = "Disetujui";
	          					$review ="<a href='".base_url('home/antar/').$key->code."' class='btn btn-primary btn-xs'>Ambil</a>";
	          					break;
	          				case '2':
	          					$status = "Telah Diambil";
	          					$review ="";
	          					break;
	          				case '3':
	          					$status = "Dibatalkan";
	          					$review ="";
	          					break;
	          			}
	          			echo '<tr>
	          			<td>'.$no.'</td>
	          			<td>'.$o->name.'</td>
	          			<td>'.$jenis.' '.$key->jml_kemasan.' '.$key->jenis_kemasan.'</td>
	          			<td>'.$key->jml_liter.'</td>
	          			<td>'.Rupiah($key->harga).'</td>
	          			<td>'.Rupiah($key->bayar).'</td>
	          			<td>'.$status.'</td>
	          			<td>'.$review.'</td>
	          			</tr>';
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