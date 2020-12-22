 <!-- TRENDING PRODUCTS-->
 <section class="py-5" id="products" data-aos="fade-up">
     <header>
         <p class="small text-muted small text-uppercase mb-1">Made the hard way</p>
         <h2 class="h5 text-uppercase mb-4">Producs in Eclair Mart</h2>
     </header>
     <div class="row">
         <!-- PRODUCT-->
         <?php
            $no = 1;
            foreach ($barang as $u) {
            ?>
             <div class="col-xl-3 col-lg-4 col-sm-6">
                 <div class="product text-center">
                     <div class="position-relative mb-3">
                         <div class="badge text-white badge-"></div><a class="d-block" href="detail.html"><img class="img-fluid w-100" src="<?php echo base_url(); ?>assets/assets_barang/image/<?php echo $u->photo_barang ?>" alt="..."></a>
                         <div class="product-overlay">
                             <ul class="mb-0 list-inline">
                                 <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="#"><i class="far fa-heart"></i></a></li>
                                 <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="cart.html">Add to cart</a></li>
                                 <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark" href="#productView" data-toggle="modal"><i class="fas fa-expand"></i></a></li>
                             </ul>
                         </div>
                     </div>
                     <h6> <a class="reset-anchor" href="detail.html"><?php echo $u->nama_barang ?></a></h6>
                     <p class="small text-muted"><?php echo $u->harga ?></p>
                 </div>
             </div>
         <?php } ?>
     </div>
 </section>