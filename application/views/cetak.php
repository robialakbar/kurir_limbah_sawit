<style type="text/css">
	.cetak{
		width: 100%;
		border: 1px solid #2c3e50;
	}
	.cetak , th, td {
	    border: 1px solid #999;
	    padding: 4px 10px;
	}
</style>
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
	        <div class="box-header with-border">
	          <h3 class="box-title">Cetak Data</h3>
	          <div class="box-tools pull-right">
	            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
	            </button>
	          </div>
	          <!-- /.box-tools -->
	        </div>
	        <!-- /.box-header -->
	        <div class="box-body">
	        	<table class="cetak">
	        		<thead>
	        			<tr>
	        				<th colspan="15" class="text-center">LIST PENGAMBILAN</th>
	        			</tr>
	        			<tr>
	        				<th colspan="7">Rute Pengambilan :</th>
	        				<th  colspan="8">Jam Berangkat : <?=date("H:i") ?></th>
	        			</tr>
	        			<tr>
	        				<th colspan="7">Hari : <?=hari() ?></th>
	        				<th colspan="8">Jam Pulang : </th>
	        			</tr>
	        			<tr>
	        				<th colspan="7">Tanggal Pengambilan : <?=tgl_indo(date("Y-m-d")) ?></th>
	        				<th colspan="8">Qty Jerigen : </th>
	        			</tr>
	        			<tr>
	        				<th rowspan="2" valign="middle">No</th>
	        				<th rowspan="2" valign="middle">Nama</th>
	        				<th rowspan="2" valign="middle">Alamat</th>
	        				<th rowspan="2" valign="middle">No. Tlp</th>
	        				<th rowspan="2" valign="middle">Est. Pengambilan</th>
	        				<th colspan="8" class="text-center">Jumlah</th>
	        				<th rowspan="2" valign="middle">Verify</th>
	        			</tr>
	        			<tr>
	        				<th >5</th>
	        				<th >18</th>
	        				<th >20</th>
	        				<th >KLG</th>
	        				<th >L</th>
	        				<th >JML</th>
	        				<th >HARGA</th>
	        				<th >TOTAL</th>
	        			</tr>
	        		</thead>
	        		<tbody>
	        			<?php 
	        			
	        			if ($this->session->userdata("level") == 3) {
	        				$report = $this->db->like('created_at',date("Y-m-d"))->get_where("permintaan",['kurir'=>$this->session->userdata("id")])->result();
	        			}else{
	        				$report = $this->db->like('created_at',date("Y-m-d"))->get("permintaan")->result();
	        			}
	        			$no=0;
	        			foreach ($report as $key) {
	        				$o = $this->db->get_where("outlite",['id'=>$key->outlite])->row();
	        				$no++;
	        				echo "<tr><td>".$no."</td><td>".$o->name."</td><td>".$o->address."</td><td>".$o->phone."</td><td>".$key->jml_kemasan." UK ".$key->jml."</td><td>".($key->jml == 5 ? $key->jml_kemasan : "")."</td><td>".($key->jml == 18 ? $key->jml_kemasan : "")."</td><td>".($key->jml == 20 ? $key->jml_kemasan : "")."</td><td></td><td>".$key->jml_liter."</td><td>".$key->jml_kemasan."</td><td>".Rupiah($key->harga)."</td><td>".Rupiah($key->bayar)."</td></tr>";
	        				echo "<tr><td></td><td></td><td></td><td></td><td>".($key->jenis == 0 ? "TUKAR" : "TUANG")."</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
	        			}
	        			?>
	        		</tbody>
	        	</table>
	        </div>
	    </div>
	</div>
</div>