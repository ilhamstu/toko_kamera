<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahKamera">
                    Tambah Data Kamera
                </button>
                <hr>
                <div class="col-sm-12">
                    <table id="dtkamera" class="table table-bordered table-hover dataTable dtr-inline collapsed"
                        role="grid" aria-describedby="example2_info">
                        <thead>
                            <tr role="row">
                                <th>Nama Kamera</th>
                                <th>Tipe</th>
                                <th>stok</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
							foreach ($kmr as $item) {?>
                            <tr class="odd">
                                <td class="dtr-control sorting_1" tabindex="0"><?= $item->nama_kamera?></td>
                                <td><?= $item->tipe?></td>
                                <td><?= $item->stok?></td>
                                <td><?= $item->harga?></td>
                                <td align="center">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#foto<?= $item->kamera_id?>">Foto</button>
                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                        data-target="#edit<?= $item->kamera_id?>">Edit</button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#hapus<?= $item->kamera_id?>">Hapus</button>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Modal Tambah Data-->
            <div class="modal fade" id="tambahKamera" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Kamera</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post" action="<?= base_url('admin/tambah_kamera')?>"
                            enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nama Kamera</label>
                                        <input type="text" name="nm_km" class="form-control" placeholder="Nama kamera">
                                    </div>
                                    <div class="form-group">
                                        <label>Tipe</label>
                                        <input type="text" name="tipe" class="form-control" placeholder="Tipe">
                                    </div>
                                    <div class="form-group">
                                        <label>Stok</label>
                                        <input type="text" name="stok" class="form-control" placeholder="Stok">
                                    </div>
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input type="text" name="harga" class="form-control" placeholder="Harga">
                                    </div>
                                    <div class="form-group">
                                        <label>Foto input</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="foto">
                                                <label class="custom-file-label" for="exampleInputFile">Pilih
                                                    foto</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
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
    </div>
</div>
<?php
	foreach ($kmr as $item) {?>
<!-- Modal View Foto-->
<div class="modal fade" id="foto<?= $item->kamera_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- <div class="modal-header"> -->
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <!-- </div> -->
            <!-- <div class="modal-body"> -->
            <img src="<?= base_url('img/').$item->gambar?>" alt="">
            <!-- </div> -->
        </div>
    </div>
</div>

<!-- Modal Edit Kamera -->
<div class="modal fade" id="edit<?= $item->kamera_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('admin/edit_kamera')?>" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Kamera</label>
                            <input type="text" name="id" value="<?= $item->kamera_id?>" hidden>
                            <input type="text" name="nm_km" class="form-control" value="<?= $item->nama_kamera?>">
                        </div>
                        <div class="form-group">
                            <label>Tipe</label>
                            <input type="text" name="tipe" class="form-control" value="<?= $item->tipe?>">
                        </div>
                        <div class="form-group">
                            <label>Stok</label>
                            <input type="text" name="stok" class="form-control" value="<?= $item->stok?>">
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" name="harga" class="form-control" value="<?= $item->harga?>">
                        </div>
                        <div class="form-group">
                            <label>Foto input</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="foto"
                                        value="<?= $item->gambar?>">
                                    <label class="custom-file-label">klik jika ingin mengubah foto</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Modal Hapus Kamera -->
<div class="modal fade" id="hapus<?= $item->kamera_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('admin/hapus')?>">
                    <div class="card-body">
                        <div class="form-group">
                            Yakin ingin menghapus data <?= $item->nama_kamera?>?
                            <input type="text" name="id" class="form-control" value="<?= $item->kamera_id?>" hidden>
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php }?>