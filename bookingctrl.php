<?php 
    require_once "config/config.php";
    require_once "config/koneksidb.php"; 
        // security_login();
    
    if(isset($_POST['submit'])){
        $cekemail=mysqli_query($koneksidb,"select email from booking where email='".$_POST['email']."'");
        if(mysqli_num_rows($cekemail) > 0){
            pesan("email sudah terdaftar");
        }else{
        $nobooking = $_POST['nobooking'];
        $nmbooking = $_POST['txtnama'];
        $email=$_POST['email'];
        // $jmlhr=$_POST['jmlhari'];
        $tgllhr=$_POST['tgllhr'];
        $harga=$_POST['harga'];
        // $tgldaftar=$_POST['tgldaftar'];
        $notelp=$_POST['notelp'];
        $alamat=$_POST['alamat'];
        $stbayar=$_POST['statusbayar'];
        $tglbooking=date("Y/m/d H:i:s");
       
        // upload 
        $file = $_FILES['foto']; 
		$target_dir = "assets/img/";
		$target_file =  $target_dir.basename($file['name']);
		$type_file =strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
		// echo $type_file."<br/>";
		$is_upload = 1;
        if($email==$cekemail){
            pesan("email sudah terdaftar");
            // header("Location: index.php?page=daftarmember&text==email");
        }
		/* cek batas limit file maks.3MB*/
		if($file['size'] > 2000000){
			$is_upload = 0;
			pesan("File lebih dari 2MB!!");		
		}
		/**cek tipe file */
		if($type_file != "jpg" ){
			$is_upload = 0;
			pesan("hanya tipe file jpg yang diperbolehkan!!");	
		}

		$namafile = "";
		/**proses upload */
		if($is_upload == 1){
			if(move_uploaded_file($file['tmp_name'], $target_file)){
				$namafile = $file['name'];
                mysqli_query($koneksidb,"INSERT into booking (no_booking,nm_booking,email,tgl_booking,tgl_lhr,no_tlp,alamat,gambar,is_bayar) VALUES ('$nobooking','$nmbooking','$email','$tglbooking','$tgllhr','$notelp','$alamat','$namafile','$stbayar')") or die (mysqli_error($koneksidb));
                header("Location: index.php?page=booking");
            }
			else if($is_upload == 0){
				pesan("GAGAL upload file gambar!!");
			}
        }

        else if($proses == "update"){
            mysqli_query($koneksidb,"update mst_menu set nmmenu='$nmmenu' where idmenu = $idmenu ")or die(mysqli_error($koneksidb));
            echo '<meta http-equiv="refresh" content="0; url='.ADMIN_URL.'?modul=mod_menu">';
        }
        } 
    }
    function pesan($alert){	
        echo '<script language="javascript">';
        echo 'alert("'.$alert.'")';  //not showing an alert box.
        echo '</script>';
        echo '<meta http-equiv="refresh" content="0; url=http:index.php?page=booking">';	
    }
    ?>