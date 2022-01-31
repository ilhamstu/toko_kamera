<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Laporan Transaksi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Laporan</a></li>
                        <li class="breadcrumb-item active">Laporan Transaksi</li>
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
                                <th>Tanggal Sewa</th>
                                <th>Tanggal Kembali</th>
                                <th>Total Harga Sewa</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
							foreach ($dt as $item) {?>
                            <tr class="odd">
                                <td class="dtr-control sorting_1" tabindex="0"><?= $item->nama?></td>
                                <td><?= $item->tgl_sewa?></td>
                                <td><?= $item->tgl_kembali?></td>
                                <td>Rp. <?= number_format($item->total_harga_sewa)?></td>
                                <td align="center"><?php
									if ($item->stat_trx == 'belum bayar') {
										echo '<span class="badge badge-pill badge-warning">Belum Bayar</span>';
									}else {
										echo '<span class="badge badge-pill badge-success">Lunas</span>';
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