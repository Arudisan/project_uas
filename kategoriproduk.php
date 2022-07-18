<?php
?>
<!-- <section id="header">
		<div class="container ps-0 pt-2">
			<div class="row">
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="txt_cari" placeholder="Cari Produk Disini" class="form-control border-secondary" aria-label="Recipient's username" aria-describedby="button-addon2" autocomplete="0ff">
                        <button type="submit" name="cari" class="btn btn-outline-warning text-secondary" id="button-addon2">Search</button>
                    </div>
                </form>
			</div>
		</div> -->
	<!-- </section> -->
<div class="">
	<div class="row">

		<div class="col-md-12 pt-2">
			<div class="row">
                <!-- judul kategori -->
                <?php
                include "functionCtrl.php";
                    $idkey = $_GET['id'];
                    $qlist_produk = mysqli_query($koneksidb, "SELECT kp.nm_tipe
                        FROM mst_tipekamar kp WHERE kp.id_tipe = $idkey;");
                    $qj = mysqli_fetch_array($qlist_produk)
                ?>
                <h1 class="text text-center pb-3 pt-3 border border" style="background-color: rgb(179, 232, 229);font-size: 52px; color: #fff;font-weight: bolder;-webkit-text-stroke: 0.05em #000;" > Tipe Kamar <?= $qj['nm_tipe'];?></h1>
                <hr>
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="txt_cari" placeholder="Cari Produk Disini" class="form-control border-secondary" aria-label="Recipient's username" aria-describedby="button-addon2" autocomplete="0ff">
                        <button type="submit" name="cari" class="btn btn-outline-primary text-secondary" id="button-addon2">Search</button>
                    </div>
                </form>
                <!-- tampil produk -->
                <?php
                    $idkey = $_GET['id'];
                    // pencarian
                    if(isset($_POST['cari'])){
                        $cproduk = " AND nm_kamar LIKE '%".$_POST["txt_cari"]."%' ";
                    }
                    else{
                        $cproduk = "";
                    }
                    $qlist_produk = mysqli_query($koneksidb, "SELECT mp.nm_kamar, mp.harga, mp.gambar, kp.nm_tipe, mp.id_kamar
                        FROM mst_kamar mp INNER JOIN mst_tipekamar kp ON mp.id_tipe=kp.id_tipe WHERE kp.id_tipe = $idkey
                        $cproduk 
                        ORDER BY mp.id_kamar DESC LIMIT 6;");
                     foreach($qlist_produk as $lp) : 
                ?>
				<div class="col-md-3 pb-4">
					<div class="card">
						<img src="assets/img/<?= $lp['gambar'];?>" class="card-img-top" alt="..." />
						<div class="card-body text-center bgcardbody">
							<h5 class="card-title"><?= $lp['nm_kamar'];?></h5>
							<h6 class="harga"><?= "Rp ".fnumber($lp['harga']);?></h6>
						</div>
						<ul class="list-group list-group-flush">
							<li class="list-group-item btndetail">
								<a href="?page=detailproduk&id=<?= $lp['id_kamar'];?>" target="_blank" class="text-white">Detail</a>
							</li>
						</ul>
					</div>
				</div>
                <?php 
                    endforeach;
                ?>
			</div>
		</div>
	</div>
</div>