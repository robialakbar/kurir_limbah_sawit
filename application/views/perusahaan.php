<div class="row">
	<div class="col-md-12">
		<div class="col-md-12">
		<div class="box box-primary">
	        <div class="box-header with-border">
	          <h3 class="box-title">Data Perusahaan</h3>
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
	          <form class="form-horizontal" action="<?=base_url('home/update_perusahaan') ?>" method="post">
	          	<div class="form-group">
	          		<label class="col-md-2">Nama Perusahaan</label>
	          		<div class="col-md-10">
	          			<input type="text" name="name" class="form-control" placeholder="Nama Perusahaan" value="<?=$data->name ?>" >
	          		</div>
	          	</div>
	          	<div class="form-group">
	          		<label class="col-md-2">No. Tlf</label>
	          		<div class="col-md-10">
	          			<input type="text" name="phone" class="form-control" placeholder="Tlp. Perusahaan" value="<?=$data->phone ?>">
	          		</div>
	          	</div>
	          	<div class="form-group">
	          		<label class="col-md-2">Fax</label>
	          		<div class="col-md-10">
	          			<input type="text" name="fax" class="form-control" placeholder="Fax Perusahaan" value="<?=$data->fax ?>">
	          		</div>
	          	</div>
	          	<div class="form-group">
	          		<label class="col-md-2">Email</label>
	          		<div class="col-md-10">
	          			<input type="text" name="email" class="form-control" placeholder="Email Perusahaan" value="<?=$data->email ?>">
	          		</div>
	          	</div>
	          	<div class="form-group">
	          		<label class="col-md-2">Website</label>
	          		<div class="col-md-10">
	          			<input type="text" name="website" class="form-control" placeholder="Website Perusahaan" value="<?=$data->website ?>">
	          		</div>
	          	</div>
	          	<div class="form-group">
	          		<label class="col-md-2">Alamat</label>
	          		<div class="col-md-10">
	          			<input type="text" name="alamat" class="form-control" placeholder="Alamat Perusahaan" value="<?=$data->alamat ?>">
	          		</div>
	          	</div>
	          	<div class="form-group">
	          		<label class="col-md-2">Logo</label>
	          		<div class="col-md-10">
	          			<input type="file" name="logo" class="form-control" placeholder="Alamat Perusahaan" >
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