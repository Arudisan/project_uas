<?php 
	require_once("config/koneksidb.php");
	require_once("config/config.php");
 ?>

<body>
	<!-- konten -->
	<?php
	function rupiah($angka){
	$hasil_rupiah = "Rp." . number_format($angka,2,',', '.');
	return $hasil_rupiah;
     }
	?>
	<section id="konten">
		<div class="row pt-2">
			<div class="col-md-2"></div>
			<div class="col-md-6">
				<b>
					<marquee width="100%" behavior="" scrollamount="10" direction=""
						style="background-color:white;color:orange;">
						<h1>Produk-Produk Terbaik bikinan Kelas ASE Diskon 100% </h1>
					</marquee>
				</b>
			</div>
			<div class="col-md-3">
				<form method="get" class="d-flex" role="search">
					<input class="form-control me-2" type="search" placeholder="Cari disini" aria-label="Search"
						name="cari">
					<button class="btn btn-outline-success" type="submit">Search</button>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
			</div>
			<div class="col-md-3"></div>
		</div>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-2 pt-2">
				<div class="kategori-title">Kategori Produk</div>
				<?php
            $qry_listkat= mysqli_query($koneksidb,"select * from mst_tipekamar order by id_tipe DESC")or die("gagal akses tabel mst_tipekamar".mysqli_error($koneksidb));
			$qry=mysqli_query($koneksidb,"SELECT * from mst_tipekamar");

            while($row = mysqli_fetch_array($qry_listkat)){
            ?>
				<div class="subkategori" id="">
					<ul>
						<li>
							<a
								href="?page=kategoriproduk&id=<?=$row['id_tipe'];?>"><?php echo $row['nm_tipe'];?></a>
						</li>
					</ul>
				</div>
				<?php
            }
            ?>
			</div>
			<div class="col-md-8 pt-2">
				<div class="row">
					<?php
				
                    $qlist_produk = mysqli_query($koneksidb, "select * from mst_kamar order by id_kamar desc");
					if(isset($_GET['cari'])){
						$qlist_produk= mysqli_query($koneksidb, "select * from mst_kamar order by id_kamar desc WHERE nm_kamar like '%".$_GET['cari']."%'");
					}
                    foreach($qlist_produk as $lp) :
                ?>
					<div class="col-md-4 pb-4">
						<div class="card">
							<img src="assets/img/<?= $lp['gambar'];?>" class="card-img-top" alt="..." />
							<div class="card-body text-center bgcardbody">
								<h5 class="card-title"><?= $lp['nm_kamar'];?></h5>
								<h6 class="harga"><?= rupiah($lp['harga']); ?></h6>

							</div>
							<ul class="list-group list-group-flush">
								<li class="list-group-item btndetail">
									<a href="?page=detailproduk&id=<?= $lp['id_kamar'];?>" target="_blank"
										class="btn text-white">Detail</a>
								</li>
							</ul>
						</div>
					</div>
					<?php endforeach;?>
				</div>
			</div>
		</div>
	</section>
	<!-- modal -->
	<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<form class="bg-light p-5" action="ceklogin.php" method="POST">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Form Login</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="mb-4">
							<label for="username" class="form-label">Username</label>
							<input type="text" name="username" class="form-control" id="logusername" />
						</div>
						<div class="mb-4">
							<label for="password" class="form-label">Password</label>
							<input type="password" name="password" class="form-control" id="logpassword" />
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" id="btnbatal" class="btn btn-secondary"
							data-bs-dismiss="modal">Batal</button>
						<button type="submit" name="btnlogin" id="btnkeluar" class="btn btn-primary">Login</button>
					</div>
					<div class="row mb-3">
						<div class="col-md-5 text-end">
							<a href="?page=lupapassword" class="btn btn-primary">Lupa Password?</a>
						</div>
					</div>
			</form>
		</div>
	</div>

	<!-- js -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="assets/proses.js"></script>
	<script src="assets/js/adit.js"></script>
	<script src="assets/js/sulthan.js"></script>
	<script src="assets/js/galang.js"></script>
	<script src="assets/js/ardi.js"></script>
	<script src="assets/js/agung.js"></script>
	<script src="assets/js/putra.js"></script>
</body>

</html>