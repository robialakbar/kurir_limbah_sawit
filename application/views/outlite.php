<div class="row">
	<div class="col-md-4">
		<div class="box box-primary">
	        <div class="box-header with-border">
	        	<?php if (isset($_GET['act'])) {
	        		if ($_GET['act'] == "edit") {
	        			$title = ucwords($_GET['act']);
	        			$row = $this->db->get_where("outlite",['id'=>$_GET['id']])->row();
	        		}else{
	        			$this->db->delete("outlite",['id'=>$_GET['id']]);
	        			$this->session->set_flashdata("pesan",$this->master->sukses("Data Outlite Berhasil Dihapus"));
	        			redirect("home/outlite");
	        		}
	        		
	        	} else{
	        		$title = "Tambah";
	        	} ?>
	          <h3 class="box-title"><?=$title ?> Outlite</h3>
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
	          <form class="form-horizontal" action="<?=base_url('home/save_outlite') ?>" method="post">
	          	<input type="hidden" name="id" value="<?=(isset($_GET['act']) ? $row->id : "") ?>">
	          	<div class="form-group">
	          		<div class="col-md-12">
	          			<input type="text" name="name" value="<?=(isset($_GET['act']) ? $row->name : "") ?>" placeholder="Nama Outlite" autocomplete="off" required="" class="form-control">
	          		</div>
	          	</div>
	          	<div class="form-group">
	          		<div class="col-md-12">
	          			<input type="text" name="pic" value="<?=(isset($_GET['act']) ? $row->pic : "") ?>" placeholder="PIC Outlite" autocomplete="off" required="" class="form-control">
	          		</div>
	          	</div>
	          	<div class="form-group">
	          		<div class="col-md-12">
	          			<input type="number" name="phone" placeholder="Tlf. Outlite" value="<?=(isset($_GET['act']) ? $row->phone : "") ?>"  autocomplete="off" required="" class="form-control">
	          		</div>
	          	</div>
	          	<div class="form-group">
	          		<div class="col-md-12">
	          			<button class="btn btn-primary btn-block btn-flat"><i class="fa fa-save"></i> Simpan</button>
	          		</div>
	          	</div>
	          </form>
	        </div>
	    	<!-- /.box-body -->
	    </div>
	    <!-- /.box -->
	</div>
	<div class="col-md-8">
		<div class="box box-primary">
	        <div class="box-header with-border">
	          <h3 class="box-title">List Data Outlite</h3>
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
	          			<th>Nama Outlite</th>
	          			<th>PIC</th>
	          			<th>No. Tlf</th>
	          			<th>Aksi</th>
	          		</tr>
	          	</thead>
	          	<tbody>
	          		<?php 
	          		$no=0;
	          		foreach ($kurir as $key) { $no++;
	          			echo '<tr><td>'.$no.'</td><td>'.$key->name.'</td><td>'.$key->pic.'</td><td>'.$key->phone.'</td><td><a href="'.current_url().'/?act=edit&id='.$key->id.'" class="btn btn-xs btn-warning btn-flat"><i class="fa fa-edit"></i></a> <a href="'.current_url().'/?act=delete&id='.$key->id.'" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></a></td></tr>';
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