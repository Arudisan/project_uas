<?php
session_start();
session_destroy();
function rupiah($angka){
	$hasil_rupiah = "Rp." . number_format($angka,2,',', '.');
	return $hasil_rupiah;
}
?>
<div class="container-fluid ps-0">
	<div class="row">
		<div class="col-md-12">
			<div class="kategori-title" style="background-color: rgb(130, 219, 216); color:black; ">Kategori Produk</div>
			</div>
			<div class="row subkategori">
			<?php
            $qry_listkat= mysqli_query($koneksidb,"select * from mst_tipekamar order by id_tipe DESC")or die("gagal akses tabel mst_tipekamar".mysqli_error($koneksidb));
            while($row = mysqli_fetch_array($qry_listkat)){
            ?>
            <div class="col-md-4 subkategori"style="background-color: rgb(179, 232, 229);"> 
            <ul>
                <li> 
                <a href="?page=kategoriproduk&id=<?php echo $row['id_tipe'];?>" class="nav-link" style="color:black;"> <b><?php echo $row['nm_tipe'];?> </b> </a>
                </li>
            </ul>
			</div>
            <?php
            }
            ?>
			</div>
   </div>
</div>
<div class="row">
<div class="col-md-12">
			<div class="row">
				<?php
                    $qlist_produk = mysqli_query($koneksidb, "SELECT mp.nm_kamar, mp.harga, mp.gambar, mp.id_kamar
						FROM mst_kamar mp  ORDER BY mp.id_kamar DESC LIMIT 3;");
                    foreach($qlist_produk as $lp) :
                ?>
				<div class="col-md-4">
					<div class="card">
						<img src="assets/img/<?= $lp['gambar'];?>" class="card-img-top" alt="..." />
						<div class="card-body text-center" style="background-color: rgb(232, 249, 253);" >
							<h5 class="card-title"><?= $lp['nm_kamar'];?></h5>
							<h6 class="harga"><?= "Rp ".rupiah($lp['harga']);?></h6>
						</div>
						<ul class="list-group list-group-flush">
							<li class="list-group-item btndetail" style="background-color: rgb(33, 85, 205);">
								<a href="?page=detailproduk&id=<?= $lp['id_kamar'];?>" target="_blank" class="text-white">Detail</a>
							</li>
						</ul>
					</div>
				</div>
				<?php endforeach;?>
			</div>
		</div>
</div>

	