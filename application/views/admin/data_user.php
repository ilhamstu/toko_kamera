<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahUser">
					Tambah Data User
				</button>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<div class="content">
		<div class="container-fluid">
			<?= ($this->session->flashdata('alert'))?>
			<div class="row">
			<h4><div class="badge badge-primary badge-pill">Data Admin</div></h4>
				<hr>
				<div class="col-sm-12">
					<table class="table table-bordered table-hover dataTable dtr-inline collapsed"
						role="grid" aria-describedby="example2_info">
						<thead>
							<tr role="row">
								<th>Nama User</th>
								<th>Email</th>
								<th>Alamat</th>
								<th>No. Telp</th>
								<th>Level</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($usr as $item) {
								if ($item->level == 'admin') {?>
							<tr class="odd">
								<td class="dtr-control sorting_1" tabindex="0"><?= $item->nama?></td>
								<td><?= $item->email?></td>
								<td><?= $item->alamat?></td>
								<td><?= $item->no_telp?></td>
								<td><?= $item->level?></td>
								<td align="center">
									<?php
                                        if ($item->user_id == $this->session->userdata('id')) {?>
									<button type="button" class="btn btn-warning" data-toggle="modal"
										data-target="#edit<?= $item->user_id?>">Edit</button>
									<?php } else {?>
									<button type="button" class="btn btn-warning" data-toggle="modal"
										data-target="#edit<?= $item->user_id?>">Edit</button>
									<button type="button" class="btn btn-danger" data-toggle="modal"
										data-target="#hapus<?= $item->user_id?>">Hapus</button>
									<?php }?>
								</td>
							</tr>
							<?php }}?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<hr>
		<div class="container-fluid">
			<div class="row">
			<h4><div class="badge badge-info badge-pill">Data Pelanggan</div></h4>
				<div class="col-sm-12">
					<table class="table table-bordered table-hover dataTable dtr-inline collapsed"
						role="grid" aria-describedby="example2_info">
						<thead>
							<tr role="row">
								<th>Nama User</th>
								<th>Email</th>
								<th>Alamat</th>
								<th>No. Telp</th>
								<th>Level</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($usr as $item) {
								if ($item->level == 'pelanggan') {?>
							<tr class="odd">
								<td class="dtr-control sorting_1" tabindex="0"><?= $item->nama?></td>
								<td><?= $item->email?></td>
								<td><?= $item->alamat?></td>
								<td><?= $item->no_telp?></td>
								<td><?= $item->level?></td>
								<td align="center">
									<?php
                                        if ($item->user_id == $this->session->userdata('id')) {?>
									<button type="button" class="btn btn-warning" data-toggle="modal"
										data-target="#edit<?= $item->user_id?>">Edit</button>
									<?php } else {?>
									<button type="button" class="btn btn-warning" data-toggle="modal"
										data-target="#edit<?= $item->user_id?>">Edit</button>
									<button type="button" class="btn btn-danger" data-toggle="modal"
										data-target="#hapus<?= $item->user_id?>">Hapus</button>
									<?php }?>
								</td>
							</tr>
							<?php }}?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>


	<!-- Modal Tambah Data-->
	<div class="modal fade" id="tambahUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="post" action="<?= base_url('admin/tambah_user')?>" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="card-body">
							<div class="form-group">
								<label>Nama User</label>
								<input type="text" name="nm_us" class="form-control" placeholder="Nama user">
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="email" name="email" class="form-control" placeholder="email">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="pass" class="form-control" placeholder="password">
							</div>
							<div class="form-group">
								<label>Alamat</label>
								<input type="text" name="alamat" class="form-control" placeholder="alamat">
							</div>
							<div class="form-group">
								<label>No. Telp</label>
								<input type="text" name="telp" class="form-control" placeholder="087854XXXXXX">
							</div>
							<div class="form-group">
								<label>Level User</label>
								<select class="form-control" name="lvl">
									<option value="admin">Admin</option>
									<option value="pelanggan">Pelanggan</option>
								</select>
							</div>
						</div>
						<!-- /.card-body -->
					</div>
					<div class="modal-footer">
						<div class="card-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Save changes</button>
						</div>
						<div>
				</form>
			</div>
		</div>
	</div>
</div>