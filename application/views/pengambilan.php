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
	        	<div id="alert">
			        <?=$this->session->flashdata("pesan") ?>
			    </div>
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
	          			<th>Tanggal Pengambilan</th>
	          			<th>Catatan</th>
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
	          					$review = "";
	          					break;
	          				case '1':
	          					$status = "Disetujui";
	          					$review ="<a href='".base_url('home/antar/').$key->code."' class='btn btn-primary btn-xs'>Ambil</a>";
	          					break;
	          				case '2':
	          					$status = "Telah Diambil";
	          					$review ="<a href='#' data-toggle='modal' data-target='#".$key->code."' class='btn btn-primary btn-xs'>Catatan</a> <a href='".base_url('home/perubahan/').$key->code."' class='btn btn-warning btn-xs'>Perubahan</a>";
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
	          			<td>'.$key->tgl_terima.'</td>
	          			<td>'.$key->note.'</td>
	          			<td>'.$review.'</td>
	          			</tr>';
	          			echo '<div class="modal fade" id="'.$key->code.'">
						          <div class="modal-dialog">
						            <div class="modal-content">
						              <div class="modal-header">
						                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						                  <span aria-hidden="true">&times;</span></button>
						                <h4 class="modal-title">Catatan Pengambilan '.$key->code.'</h4>
						              </div>
						              <div class="modal-body">
						              <form class="form-horizontal" action="'.base_url('home/catatan').'" method="post">
						              	<input type="hidden" name="code" value="'.$key->code.'">
						              	<div class="form-group">
							          		<textarea class="form-control" name="note" placeholder="Isikan Catatan" rows="8"></textarea>
							          	</div>
							          	<div class="form-group">
							          		<button class="btn btn-primary">Simpan</button>
							          	</div>
						              </form>
						              ';
						                
						              echo'</div>
						              
						            </div>
						            <!-- /.modal-content -->
						          </div>
						          <!-- /.modal-dialog -->
						        </div>
						        <!-- /.modal -->';
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