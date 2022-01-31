<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Laporan Penyewaan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Laporan</a></li>
                        <li class="breadcrumb-item active">Laporan Penyewaan</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container-fluid">
            <?= ($this->session->flashdata('alert'))?>
            <div class="row">
                <hr>
                <div class="col-sm-12">
                    <table id="dtkamera" class="table table-bordered table-hover dataTable dtr-inline collapsed"
                        role="grid" aria-describedby="example2_info">
                        <thead>
                            <tr role="row">
                                <th>Nama Penyewa</th>
                                <th>Nama Kamera</th>
                                <th>Tanggal Sewa</th>
                                <th>Tanggal Kembali</th>
                                <th>Total Harga Sewa</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
							foreach ($ds as $item) {?>
                            <tr class="odd">
                                <td class="dtr-control sorting_1" tabindex="0"><?= $item->nama?></td>
                                <td><?= $item->nama_kamera?></td>
                                <td><?= $item->tgl_sewa?></td>
                                <td><?= $item->tgl_kembali?></td>
                                <td>Rp. <?= number_format($item->total_harga_sewa)?></td>
                                <td align="center"><?php
									if ($item->status == 'booked') {
										echo '<span class="badge badge-pill badge-warning">Booked</span>';
									}elseif($item->status == 'sewa'){
										echo '<span class="badge badge-pill badge-info">Disewa</span>
                                        <a href="'.base_url('admin/dikembalikan/').$item->disewa_id.'"
                                            class="badge badge-pill badge-warning"><i class="fa fa-edit"></i></a>';
									}else {
										echo '<span class="badge badge-pill badge-success">Selesai</span>';
									}
								?>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>