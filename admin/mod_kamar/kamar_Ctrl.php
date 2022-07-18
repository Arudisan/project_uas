<?php
if (isset($_GET['act']) && ($_GET['act'] == "add")) {
    $judul = "Form Input Data";
} else if (isset($_GET['act']) && ($_GET['act'] == "edit")) {
    $judul = "Form Edit Data";
    $idkey = $_GET['id'];
    $qdata = mysqli_query($koneksidb, "select * from mst_kamar where id_kamar=$idkey") or die(mysqli_error($koneksidb));
    $data = mysqli_fetch_array($qdata);
} else if (isset($_GET['act']) && ($_GET['act'] == "save")) {
    $nmkamar = $_POST['kamar'];
    $idtipe = $_POST['id_tipe'];
    $harga = $_POST['harga'];
    $jml = $_POST['jumlah'];
    $deskripsi = $_POST['deskripsi'];
    $file = $_FILES['gambar'];
    var_dump($file);
    /*tentukan folder lokasi direktori penyimpanan file */
    $target_dir = "../assets/img/";
    echo $file['name'] . "<br/>"; //output ini yang disimpan ke database
    /*tujuan penyimpanan file, direktori dan nama file*/
    $target_file = $target_dir . $file['name'];
    //echo $target_file."<br/>";
    /*untuk mendapatkan tipe file yang diupload */
    $type_file = pathinfo($file['name'], PATHINFO_EXTENSION);
    /*buat variabel untuk menampung hasil validasi ,
	apakah file boleh diupload atau tidak, jika 1 maka boleh diupload,
	jika 0 maka tidak dapat diupload*/
    $is_upload = 1;
    /* cek batas limit file maks.5MB*/
    if ($file['size'] > 5242880) {
        $is_upload = 0;
        // header("Location: ../home.php?modul=mod_blog&pesan=size");
    }
    /**cek tipe file */
    if ($type_file != "jpg") {
        $is_upload = 0;
        // header("Location: ../home.php?modul=mod_blog&pesan=ekstensi");
    }
    /**buat variabel untuk menampung nama file yang akan disimpan ke database,
     * dengan nilai awal kosong, akan di beri nilai jika upload berhasil
     */
    $namafile = "";
    /**proses upload */
    if ($is_upload == 1) {
        if (move_uploaded_file($file['tmp_name'], $target_file)) {
            $namafile = $file['name']; //variabel ini yang di panggil di query
            mysqli_query($koneksidb, "INSERT INTO mst_kamar (nm_kamar,gambar,id_tipe,harga,jml,deskripsi) VALUES ('$nmkamar','$namafile','$idtipe','$harga','$jml','$deskripsi')");
        } else {
            // pesan("GAGAL upload file gambar!!");	
        }
    }
} else if (isset($_GET['act']) && ($_GET['act'] == "update")) {
    $idkamar = $_POST['id_kamar'];
    $nmkamar = $_POST['kamar'];
    $idtipe = $_POST['id_tipe'];
    $harga = $_POST['harga'];
    $jml = $_POST['jumlah'];
    $deskripsi = $_POST['deskripsi'];
    $qinsert = mysqli_query(
        $koneksidb,
        "UPDATE mst_kamar SET nm_kamar='$nmkamar',gambar='$namafile', id_tipe='$idtipe',harga='$harga',jml='$jml',deskripsi='$deskripsi' WHERE id_kamar='$idkamar'"
    )
        or die(mysqli_error($koneksidb));
} else if (isset($_GET['act']) && ($_GET['act'] == "delete")) {
    //jika ada send variabel act=edit, tampil form edit/ubah data
    $idkey = $_GET['id']; //dapat dari URL
    $qdelete = mysqli_query($koneksidb, "DELETE from mst_kamar where id_kamar=$idkey") or die(mysqli_error($koneksidb));
    if ($qdelete) {
        header("Location: http://localhost/project_uas/admin/home.php?modul=mod_kamar");
    }
}
