<?php 
	include_once "bookingctrl.php";
	if(!isset($_GET['action'])){
?>
	<?php 
		$query_cekkode = mysqli_query($koneksidb,
		"select no_booking from booking ORDER BY no_booking DESC LIMIT 0,1");
			$cekkode = mysqli_fetch_array($query_cekkode);
			if(mysqli_num_rows($query_cekkode) == 0){
				$kodeakhir = "M";
			}else{
				$kodeakhir = $cekkode['no_booking'];
			}
			$no_urutakhir = substr($kodeakhir,6);
			$th_akhir = substr($kodeakhir,2,4);
			$th_sekarang = date("Y");
			
				if($th_akhir == $th_sekarang){
					if ($no_urutakhir ==0||$no_urutakhir < 9) {
						$nourut_baru = "00" . ($no_urutakhir + 1);
					} else if ($no_urutakhir >9) {
						$nourut_baru = "0" . ($no_urutakhir + 1);
					} else if ($no_urutakhir < 100) {
						$nourut_baru = "0" . ($no_urutakhir + 1);
					} else {
						$nourut_baru = ($no_urutakhir + 1);
					}
					// echo "kodenya:" . $nourut_baru . "<br>";
				} else {
					$nourut_baru =  "001";
				}
				$kodeterbaru = "MB".$th_sekarang.$nourut_baru;
				// echo $no_urutakhir;
				// echo "kode: ".$kodeterbaru;
				//untuk contoh combo
				// $data_produk = mysqli_query($koneksidb,"select * from mst_produk ");
			
			?>
		<div class="container pb-5">
			<div class="row">
				<div class="col-md-1 pt-4"></div>
				<div class="col-md-10 pt-4">
					<div class="subkategori p-3" id="formdaftar">
						<h5 class="text-center pb-2"><b> Booking Kamar Hotel</b></h5>
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-10">
								<form action="?page=booking" id="formbo" method="POST" enctype="multipart/form-data">
								<div class="row pb-1">
									<label for="kdmember" class="col-md-3">No Booking</label>
									<div class="col-md-6">
										<input type="hidden" name="proses" value="<?= $proses;?>">
										<input type="text" name="nobooking" id="nobooking" class="form-control" value="<?=$kodeterbaru;?>" readonly/>
									</div>
								</div>
								<div class="row pb-1">
									<label for="txtnama" class="col-md-3">Nama Pembooking</label>
									<div class="col-md-6">
										<input type="text" name="txtnama" id="txtnama" class="form-control" />
									</div>
								</div>
								<div class="row pb-1">
									<label for="tgllhr" class="col-md-3">Tanggal lahir</label>
									<div class="col-md-6">
										<input type="date" name="tgllhr" id="tgllhr" class="form-control" />
										<input type="hidden" name="tglbooking" id="tglbooking" class="form-control" />
									</div>
								</div>
								<div class="row pb-1">
									<label for="notelp" class="col-md-3">no.telepon</label>
									<div class="col-md-6">
										<input type="text" name="notelp" id="notelp" class="form-control" />
									</div>
								</div>
								<div class="row pb-1">
									<label for="tgllhr" class="col-md-3">alamat</label>
									<div class="col-md-6">
										<input type="text" name="alamat" id="alamat" class="form-control" />
									</div>
								</div>
								<div class="row pb-1">
									<label for="tgllhr" class="col-md-3">email</label>
									<div class="col-md-6">
										<input type="email" name="email" id="email" class="form-control" />
									</div>
								</div>
								<div class="row pb-1">
									<label for="tgllhr" class="col-md-3">harga</label>
									<div class="col-md-6">
										<input type="text" name="harga" id="harga" class="form-control" />
									</div>
								</div>
								<div class="row pt-3">
									<label class="col-md-3">Status Bayar</label>
									<div class="col-md-6">
										<input class="form-check-input" type="checkbox" id="statusbayar" name="statusbayar" value="1">
									</div>
								</div>
								<div class="row pb-1">
									<label for="foto" class="col-md-3">foto</label>
									<div class="col-md-6">
										<input type="file" name="foto" id="foto" class="form-control" />
									</div>
								</div>
								<div class="row pb-1">
									<div class="col-md-3"></div>
									<div class="col-md-6">
										<button type="button" class="btn btn-warning btn-sm form-control" name="btnbooking" id="btnbooking" data-bs-toggle="modal" >Booking Sekarang</button>
									</div>
								</div>
									<div class="modal" tabindex="-1"  id="konfirmasi">
										<div class="modal-dialog">
											<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title">konfirmasi</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<p>apakah anda  yakin ingin menyimpan data ?
												</p>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
												<button type="submit" name="submit" class="btn btn-primary" id="btnyes">simpan</button>
											</div>
											</div>
										</div>
									</div>		
								</form>
								<?php } ?>
							</div>
						</div>
					</div>

					<!-- modal simpan -->
					
					<!-- ketika tampil hasil -->
		<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script src="assets/js/adit.js"></script> -->