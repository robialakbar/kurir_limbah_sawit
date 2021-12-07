<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
	        <div class="box-header with-border">
	          <h3 class="box-title">Review Permintaan</h3>
	          <div class="box-tools pull-right">
	          	<?php if ($this->session->userdata("level") == 2) { ?>
	            <a href="<?=base_url('home/aksi_permintaan/').$data->code ?>" class="btn btn-warning btn-sm btn-flat">Setujui</a>
	            <a href="<?=base_url('home/hapus_permintaan/').$data->code ?>" class="btn btn-danger btn-sm btn-flat">Batalkan</a>
	        	<?php } ?>
	          </div>
	          <!-- /.box-tools -->
	        </div>
	        <!-- /.box-header -->
	        <div class="box-body">
	        	<div id="alert">
			        <?=$this->session->flashdata("pesan") ?>
			    </div>
	          <form class="form-horizontal" action="<?=base_url('home/update_permintaan') ?>" method="post">
	          	<div class="form-group">
	          		<label class="col-md-2">Kode Permintaan</label>
	          		<div class="col-md-10">
	          			<input type="text" name="code" class="form-control" readonly="" value="<?=$data->code ?>">
	          		</div>
	          	</div>
	          	<div class="form-group">
	          		<label class="col-md-2">Outlite</label>
	          		<div class="col-md-10">
	          			<select class="form-control" name="outlite">
	          				<?php foreach ($outlite as $key) {
	          					echo '<option '.($data->outlite == $key->id ? "selected" : "").' value="'.$key->id.'">'.$key->name.'</option>';
	          				} ?>
	          			</select>
	          		</div>
	          	</div>
	          	<div class="form-group">
	          		<label class="col-md-2">Ekstimasi Jumlah</label>
	          		<div class="col-md-10">
	          			<select class="form-control" name="jml">
	          				<option <?=($data->jml == 5 ? "selected" : "") ?> value="5">Ukuran 5 Liter</option>
	          				<option <?=($data->jml == 8 ? "selected" : "") ?> value="8">Ukuran 18 Liter</option>
	          				<option <?=($data->jml == 20 ? "selected" : "") ?> value="20">Ukuran 20 Liter</option>
	          			</select>
	          		</div>
	          	</div>
	          	<div class="form-group">
	          		<label class="col-md-2">Jenis Kemasan</label>
	          		<div class="col-md-10">
	          			<input type="text" name="jenis_kemasan" class="form-control" value="<?=$data->jenis_kemasan ?>">
	          		</div>
	          	</div>
	          	<div class="form-group">
	          		<label class="col-md-2">Jumlah Kemasan</label>
	          		<div class="col-md-10">
	          			<input type="text" name="jml_kemasan" class="form-control" value="<?=$data->jml_kemasan ?>">
	          		</div>
	          	</div>
	          	<div class="form-group">
	          		<label class="col-md-2">Jumlah Liter</label>
	          		<div class="col-md-10">
	          			<input type="text" name="jml_liter" class="form-control" id="liter" value="<?=$data->jml_liter ?>">
	          		</div>
	          	</div>
	          	<div class="form-group">
	          		<label class="col-md-2">Jenis</label>
	          		<div class="col-md-10">
	          			<select class="form-control" name="jenis">
	          				<option <?=($data->jenis == 0 ? "selected" : "") ?> value="0">Tukar Jerigen</option>
	          				<option <?=($data->jenis == 1 ? "selected" : "") ?> value="1">Tuang Jerigen</option>
	          			</select>
	          		</div>
	          	</div>
	          	<div class="form-group">
	          		<label class="col-md-2">Keterangan</label>
	          		<div class="col-md-10">
	          			<textarea class="form-control" name="ket"><?=$data->ket ?></textarea>
	          		</div>
	          	</div>
	          	<div class="form-group">
	          		<label class="col-md-2">Kurir</label>
	          		<div class="col-md-10">
	          			<select class="form-control" name="kurir">
	          				<?php 
	          				$kurir = $this->db->get_where("users",['level'=>3])->result();
	          				foreach ($kurir as $k) {
	          					echo '<option '.($data->kurir == $k->id ? "selected" : "").' value="'.$k->id.'">'.$k->name.'</option>';
	          				} ?>
	          			</select>
	          		</div>
	          	</div>
	          	<div class="form-group">
	          		<label class="col-md-2">Harga</label>
	          		<div class="col-md-10">
	          			<input type="text" name="harga" class="form-control" id="harga" onkeyup="hitung()" value="<?=$data->harga ?>">
	          		</div>
	          	</div>
	          	<div class="form-group">
	          		<label class="col-md-2">Total</label>
	          		<div class="col-md-10">
	          			<input type="text" name="bayar" class="form-control" id="total" readonly="" value="<?=$data->bayar ?>">
	          		</div>
	          	</div>
	          	<div class="form-group">
	          		<label class="col-md-2"></label>
	          		<div class="col-md-10">
	          			<button class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Update</button>
	          		</div>
	          	</div>
	          </form>
	        </div>
	    	<!-- /.box-body -->
	    </div>
	    <!-- /.box -->
	</div>
</div>