<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="banner header-text">
    <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
            <div class="text-content">
                <h4>Best Offers</h4>
                <h2>New Arrivals On Sale</h2>
            </div>
        </div>
        <div class="banner-item-02">
            <div class="text-content">
                <h4>Best Grade</h4>
                <h2>Get your best products on us</h2>
            </div>
        </div>
        <div class="banner-item-03">
            <div class="text-content">
                <h4>A lot of options</h4>
                <h2>Choose your best equipment</h2>
            </div>
        </div>
    </div>
</div>
<!-- Banner Ends Here -->

<div class="latest-products">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Our Products</h2>
                    <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
            <?php
            foreach ($kmr as $item) {?>
            <div class="col-sm-4">
                <div class="product-item">
                    <a href="#"><img src="<?= base_url('img/').$item->gambar?>" alt=""></a>
                    <div class="down-content">
                        <a href="#">
                            <h4><b><?= $item->nama_kamera?></b></h4>
                        </a>
                        <p>Rp. <?= number_format($item->harga)?></p>
                    </div>
                    <div>
                        <button class="btn btn-primary" data-toggle="modal"
                            data-target="#sewa<?= $item->kamera_id?>">Sewa</button>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</div>

<!-- Modal Sewa -->
<?php
foreach ($kmr as $item) {?>
<div class="modal fade" id="sewa<?= $item->kamera_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Booking <?= $item->nama_kamera?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('pelanggan/tambah_sewa')?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tanggal Pengambilan</label>
                        <input type="date" name="tgl_pjm" class="form-control">
                        <input type="text" name="hrg" value="<?= $item->harga?>" hidden>
                        <input type="text" name="id_kam" value="<?= $item->kamera_id?>" hidden>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pengembalian</label>
                        <input type="date" name="tgl_kmbl" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Jumlah Booking</label>
                        <input type="number" name="jumlah" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Booking</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php }?>

<div class="best-features">
    <div class="container">

    </div>
</div>


<div class="call-to-action">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="inner-content">
                    <div class="row">
                        <div class="col-md-8">
                            <h4>XaWang &amp; <em>XiNawang</em> Products</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque corporis amet elite
                                author nulla.</p>
                        </div>
                        <div class="col-md-4">
                            <a href="#" class="filled-button">Purchase Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>