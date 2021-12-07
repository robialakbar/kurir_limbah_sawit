<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
	        <div class="box-header with-border">
	          <h3 class="box-title">Inpur Permintaan</h3>
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
	          <form class="form-horizontal" action="<?=base_url('home/save_permintaan') ?>" method="post">
	          	<div class="form-group">
	          		<label class="col-md-2">Kode Permintaan</label>
	          		<div class="col-md-10">
	          			<input type="text" name="code" class="form-control" readonly="" value="<?=$invoice ?>">
	          		</div>
	          	</div>
	          	<div class="form-group">
	          		<label class="col-md-2">Outlite</label>
	          		<div class="col-md-10">
	          			<select class="form-control" name="outlite">
	          				<?php foreach ($outlite as $key) {
	          					echo '<option value="'.$key->id.'">'.$key->name.'</option>';
	          				} ?>
	          			</select>
	          		</div>
	          	</div>
	          	<div class="form-group">
	          		<label class="col-md-2">Ekstimasi Jumlah</label>
	          		<div class="col-md-10">
	          			<select class="form-control" name="jml" id="jml">
	          				<option value="5">Ukuran 5 Liter</option>
	          				<option value="18">Ukuran 18 Liter</option>
	          				<option value="20">Ukuran 20 Liter</option>
	          			</select>
	          		</div>
	          	</div>
	          	<div class="form-group">
	          		<label class="col-md-2">Jenis Kemasan</label>
	          		<div class="col-md-10">
	          			<input type="text" name="jenis_kemasan" class="form-control">
	          		</div>
	          	</div>
	          	<div class="form-group">
	          		<label class="col-md-2">Jumlah Kemasan</label>
	          		<div class="col-md-10">
	          			<input type="text" name="jml_kemasan" id="kemasan" class="form-control" onkeyup="liters()">
	          		</div>
	          	</div>
	          	<div class="form-group">
	          		<label class="col-md-2">Jumlah Liter</label>
	          		<div class="col-md-10">
	          			<input type="text" name="jml_liter" class="form-control" id="liter" readonly="">
	          		</div>
	          	</div>
	          	<div class="form-group">
	          		<label class="col-md-2">Jenis</label>
	          		<div class="col-md-10">
	          			<select class="form-control" name="jenis">
	          				<option value="0">Tukar Jerigen</option>
	          				<option value="1">Tuang Jerigen</option>
	          			</select>
	          		</div>
	          	</div>
	          	<div class="form-group">
	          		<label class="col-md-2">Keterangan</label>
	          		<div class="col-md-10">
	          			<textarea class="form-control" name="ket"></textarea>
	          		</div>
	          	</div>
	          	<div class="form-group">
	          		<label class="col-md-2">Kurir</label>
	          		<div class="col-md-10">
	          			<select class="form-control" name="kurir">
	          				<?php 
	          				$kurir = $this->db->get_where("users",['level'=>3])->result();
	          				foreach ($kurir as $k) {
	          					echo '<option value="'.$k->id.'">'.$k->name.'</option>';
	          				} ?>
	          			</select>
	          		</div>
	          	</div>
	          	<div class="form-group">
	          		<label class="col-md-2">Harga</label>
	          		<div class="col-md-10">
	          			<input type="text" name="harga" class="form-control" id="harga" onkeyup="hitung()">
	          		</div>
	          	</div>
	          	<div class="form-group">
	          		<label class="col-md-2">Total</label>
	          		<div class="col-md-10">
	          			<input type="text" name="bayar" class="form-control" id="total" readonly="">
	          		</div>
	          	</div>
	          	<div class="form-group">
	          		<label class="col-md-2"></label>
	          		<div class="col-md-10">
	          			<button class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Simpan</button>
	          		</div>
	          	</div>
	          </form>
	        </div>
	    	<!-- /.box-body -->
	    </div>
	    <!-- /.box -->
	</div>
</div>