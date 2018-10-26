<div id="sidebar-nav" class="sidebar">
	<div class="sidebar-scroll">
		<nav>
			<ul class="nav">
				<li><a href="<?php echo base_url('DashboardAdmin'); ?>" ><i class="lnr lnr-home"></i><span>Dashboard</span></a></li>
				<li><a href="<?php echo base_url('Admin/pegawai'); ?>" class=""><i class="lnr lnr-users "></i> <span>Atur Pegawai</span></a></li>
				<li><a href="<?php echo base_url('Layanan/index'); ?>" class=""><i class="lnr lnr-bookmark "></i> <span>Atur Layanan</span></a></li>
				<li><a class="active" href="<?php echo base_url('Jadwal/index'); ?>" class=""><i class="lnr lnr-user "></i> <span>Atur Jadwal</span></a></li>
				<li><a href="<?php echo base_url('User/index'); ?>" class=""><i class="lnr lnr-user "></i> <span>Atur Akun Pengguna</span></a></li>
				<li><a href="<?php echo base_url('Antrian/index'); ?>" class=""><i class="lnr lnr-book "></i> <span>Lihat Antrian</span></a></li>
			</ul>
		</nav>
	</div>
</div>
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<h3 class="page-title">Daftar Antrian</h3>
			<div class="row">
				<div class="col-md-12">
					<!-- BASIC TABLE -->
					<?php if($this->session->flashdata('success')){  ?>

					<div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
						<i class="fa fa-check-circle"></i> <?php echo $this->session->flashdata('success'); ?>
					</div>

					<?php }elseif($this->session->flashdata('error')) { ?>

					<div class="alert alert-danger alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
						<i class="false fa-times-circle"></i> <?php echo $this->session->flashdata('error'); ?>
					</div>

					<?php } ?>

					<div class="panel">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-10">
								</div>
								<div class="col-md-2">
									<div class="float-right" style="padding:10px;margin:5px;">
										<a href="<?php echo base_url('Antrian/inputAntrian'); ?>" alt="Add" class="btn btn-success btn-lg insert-btn" "><span class="fa fa-plus"></span>
										</a>
									</div>
								</div>
							</div>
							<table class="table" id="doctor-table">
								<thead class="text-center">
									<tr>
										<th>No</th>
										<th>No Antrian</th>
										<th>Tanggal</th>
										<th>Nama</th>
										<th>Dokter</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$i = 1;
									if($antrian){
										foreach ($antrian as $value) {

											/* Encrypt ID */
											$encrypted_string = $this->encrypt->encode($value['id_antrian']);
											$id = str_replace(array('+', '/', '='), array('-', '_', '~'), $encrypted_string);
											?>
											<tr>
												<td><?php echo $i++; ?></td>
												<td><?php echo $value['antrian']; ?></td>
												<td><?php echo $value['tanggal']; ?></td>
												<td><?php echo $value['nama_user']; ?></td>
												<td><?php echo $value['nama_dokter']; ?></td>
												<td>

													<a href="<?php echo base_url('Jadwal/antrianDetail/'.$id); ?>" class="btn btn-sm btn-primary">
														<span class="fa fa-search"></span>
													</a>

													<a href="<?php echo base_url('Jadwal/antrianEdit/'.$id); ?>" class="btn btn-sm btn-warning">
														<span class="lnr lnr-pencil"></span>
													</a>

													<button class="btn btn-sm btn-danger" onclick="deleteThis('<?php echo base_url('Antrian/deleteAntrian/'.$id); ?>');" ><span class="fa fa-trash"></span></button> 

													<button class="btn btn-sm btn-success" onclick="skipThis('<?php echo base_url('Antrian/skipAntrian/'.$id); ?>');" ><span class="fa fa-play"></span></button> 


												</td>
											</tr>
											<?php
										}
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
					<!-- END BASIC TABLE -->
				</div>
				<!-- END CONDENSED TABLE -->
			</div>
		</div>
	</div>
</div>
<!-- END MAIN CONTENT -->