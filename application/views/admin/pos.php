<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Menu Transaksi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
                        <li class="breadcrumb-item active">POS</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container-fluid">
            <?= ($this->session->flashdata('alert'))?>
            <div class="row">
                <div class="col-sm-12">
                    <form action="<?= base_url('admin/pos')?>" method="post">
                        <div class="input-group">
                            <input type="search" class="form-control form-control-md"
                                placeholder="Type your keywords here" name="cari">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($ds) {
							foreach ($ds as $item) {
                                ?>
                            <tr class="odd">
                                <form action="" method="post">
                                    <td class="dtr-control sorting_1" tabindex="0"><?= $item->nama?></td>
                                    <td><?= $item->nama_kamera?></td>
                                    <td><?= $item->tgl_sewa?></td>
                                    <td><?= $item->tgl_kembali?></td>
                                    <td>Rp. <?= number_format($item->total_harga_sewa)?></td>
                                    <td align="center">
                                        <a href="<?= base_url('admin/del_book/').$item->disewa_id?>"
                                            class="btn btn-danger"><i class="fa fa-times"></i></a>
                                        <a href="<?= base_url('admin/xlunas/').$item->disewa_id?>"
                                            class="btn btn-warning"><i class="fa fa-chevron-circle-right"></i></a>
                                        <a href="<?= base_url('admin/ylunas/').$item->disewa_id?>"
                                            class="btn btn-success"><i class="fa fa-check"></i></a>
                                    </td>
                                </form>
                            </tr>
                            <?php 
                            }
                        }else {?>
                            <tr class="odd">
                                <td colspan="6" align="center">
                                    <h3>Data tidak ditemukan</h3>
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