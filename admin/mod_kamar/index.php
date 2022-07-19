<?php
include_once "kamar_Ctrl.php";
if (!isset($_GET['act'])) {
?>
 <div class="container-lg mt-1">
<a href="?modul=mod_kamar&act=add" class="btn btn-primary mb-2 sticky-top">Tambah Data</a>
    <table class="table table-striped table-primary table-bordered border-info">
        <tr>
            <th>ID  kamar</th>
            <th>Nama kamar</th>
            <th>gambar</th>
            <th>tipe </th>
            <th>harga</th>
            <th>jumlah</th>
            <th>deskripsi</th>
            <th>action </th>
        </tr>
        <?php
        $qry_listmenu= mysqli_query($koneksidb,"SELECT  p.id_kamar,p.nm_kamar,p.gambar, kp.id_tipe,p.harga, p.jml, p.deskripsi  FROM mst_kamar p INNER JOIN mst_tipekamar kp ON 
        p.id_tipe=kp.id_tipe order by id_kamar DESC")or die("gagal akses tabel mst_kamar".mysqli_error($koneksidb));
        while($row = mysqli_fetch_array($qry_listmenu)){
            ?>
                <tr>
                <td><?php echo $row['id_kamar'] ?></td>
                    <td><?php echo $row['nm_kamar'] ?></td>
                    <td><?php echo $row['gambar'] ?></td>
                    <td><?php echo $row['id_tipe'] ?></td>
                    <td><?php echo $row['harga'] ?></td>
                    <td><?php echo $row['jml'] ?></td>
                    <td><?php echo $row['deskripsi'] ?></td>
                    <td>
                        <a href="?modul=mod_kamar&act=edit&id=<?= $row["id_kamar"]; ?>" class="btn btn-xs btn-primary"><i class="bi bi-pencil-square"></i> Edit</a>
                        <a href="?modul=mod_kamar&act=delete&id=<?= $row["id_kamar"]; ?>" class="btn btn-xs btn-danger"><i class="bi bi-trash"></i> Delete</a>
                    </td>
                </tr>
                <?php 
        }
        ?>
        </table>
</div>
<?php
}else if (isset($_GET['act']) && ($_GET['act']== "add")){
    ?>
    <div class="row">
        <h3><?php echo $judul; ?></h3>
        <form action="#" method="post" id="formkamar" enctype="multipart/form-data">
        <div class="row pt-2">
            <div class="col-md-2"> 
            <label for="username" class="form-label" name="judul"  >id_kamar </label>
        </div>  
        <div class="col-md-5"> 
            <input type="hidden" name="id_kamar" class="form-control"  >  
            </div>
            <div class="col-md-1"></div>
            </div>
        <div class="row pt-2">
        <div class="col-md-2"> 
        <label for="username" class="form-label" name="judul" >Nama Kamar</label>
    </div>  
    <div class="col-md-5"> 
        <input type="text "name="kamar" class="form-control">  
        </div>
        <div class="col-md-1"></div>
        </div>
        <div class="row pt-2">
        <div class="col-md-2"> 
        <label for="username" class="form-label" name="gambar" >gambar</label>
    </div>  
    <div class="col-md-5"> 
        <input type="file" name="gambar" class="form-control">  
        </div>
        <div class="col-md-1"></div>
        </div>
        <div class="row pt-2">
        <div class="col-md-2"> 
        <label for="username" class="form-label"> ID tipe</label>
    </div>  
    <div class="col-md-5"> 
    <select id="id kategori" name="id_tipe">
    <?php
        $qry_listidkat= mysqli_query($koneksidb,"select * from mst_tipekamar")or die("gagal akses tabel mst_tipekamar".mysqli_error($koneksidb));
        while($row = mysqli_fetch_array($qry_listidkat)){
        ?>
        <option value="<?php echo $row['id_tipe'];?>"><?php echo $row['nm_tipe'];?></option>
        <?php
        }
        ?>
    </select>
        </div>
        <div class="col-md-1"></div>
        </div>
        <div class="row pt-2">
        <div class="col-md-2"> 
        <label for="username" class="form-label" name="harga" >harga </label>
    </div>  
    <div class="col-md-5"> 
        <input type="text "name="harga" class="form-control">  
        </div>
    </div>
    <div class="row pt-2">
        <div class="col-md-2"> 
        <label for="username" class="form-label" name="jumlah" >jumlah</label>
    </div>  
    <div class="col-md-5"> 
        <input type="text "name="jumlah" class="form-control">  
        </div>
        <div class="row pt-2">
        <div class="col-md-2"> 
        <label for="username" class="form-label"  >Deskripsi</label>
    </div>  
    <div class="col-md-5"> 
    <textarea class="form-control" id="mytextarea" cols="30" rows="10" name="deskripsi"></textarea>
        <!-- </div>
        <div class="col-md-1"></div>
        </div>
        <div class="row pt-2">
        <div class="col-md-2">  -->
    </div>  
        <div class="row pt-2">
        <div class="col-md-2">
            </div>  
        <div class="col-md-5"> 
        <div class="d-grid gap-2 d-md-block">
        <button class="btn btn-secondary" type="reset" ><i class="bi bi-x" name="reset" > </i> Batal </button>
        <button class="btn btn-primary" type="submit" name="btnkonfirm" data-bs-toggle="modal"><i class="bi bi-download" name="simpan" > </i> Simpan </button>
        </div>
        <div class="col-md-1"></div>
        </div>
        <div class="modal fade" id="konfirmasi" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                apakah anda yakin ingin menyimpan?
            </div>
            <div class="modal-footer">
                <button type="button" name="btnbatal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" name="btnsimpan" id="btnsimpan" class="btn btn-primary">Simpan</button>
            </div>
            </div>
        </div>
        </div>
        </form> 
    </div> 
    </div> 
    </div>
    <?php
    }
    else if (isset($_GET['act']) && ($_GET['act']== "edit")){
    ?>
        <div class="row">
        <h3><?php echo $judul; ?></h3>
        <form action="?modul=mod_kamar&act=update" method="post" id="formkamar" enctype="multipart/form-data">
        <div class="row pt-2">
            <div class="col-md-2"> 
            <label for="username" class="form-label" name="judul"  >id_kamar </label>
        </div>  
        <div class="col-md-5"> 
            <input type="text" name="id_kamar" class="form-control"  value="<?php echo $data['id_kamar'];?>">  
            </div>
            <div class="col-md-1"></div>
            </div>
        <div class="row pt-2">
        <div class="col-md-2"> 
        <label for="username" class="form-label" name="judul" >Nama Kamar</label>
    </div>  
    <div class="col-md-5"> 
        <input type="text "name="kamar" class="form-control"  value="<?php echo $data['nm_kamar'];?>">  
        </div>
        <div class="col-md-1"></div>
        </div>
        <div class="row pt-2">
        <div class="col-md-2"> 
        <label for="username" class="form-label" name="gambar" >gambar</label>
    </div>  
    <div class="col-md-5"> 
        <input type="file" name="img" class="form-control" > 
        <img src="  ../assets/img/<?=$data['gambar']; ?>" class="img img-thumbnail mt-1" width="200px"> 
        </div>
        <div class="col-md-1"></div>
        </div>
        <div class="row pt-2">
        <div class="col-md-2"> 
        <label for="username" class="form-label"> ID tipe</label>
    </div>  
    <div class="col-md-5"> 
    <select id="id kategori" name="id_tipe"  value="<?php echo $data['id_tipe'];?>">
    <?php
        $qry_listidkat= mysqli_query($koneksidb,"select * from mst_tipekamar")or die("gagal akses tabel mst_tipekamar".mysqli_error($koneksidb));
        while($row = mysqli_fetch_array($qry_listidkat)){
        ?>
        <option value="<?php echo $row['id_tipe'];?>"><?php echo $row['nm_tipe'];?></option>
        <?php
        }
        ?>
    </select>
        </div>
        <div class="col-md-1"></div>
        </div>
        <div class="row pt-2">
        <div class="col-md-2"> 
        <label for="username" class="form-label" name="harga" >harga </label>
    </div>  
    <div class="col-md-5"> 
        <input type="text "name="harga" class="form-control"  value="<?php echo $data['harga'];?>">  
        </div>
    </div>
    <div class="row pt-2">
        <div class="col-md-2"> 
        <label for="username" class="form-label" name="jumlah" >jumlah</label>
    </div>  
    <div class="col-md-5">  
        <input type="text "name="jumlah" class="form-control"  value="<?php echo $data['jml'];?>">  
        </div>
        <div class="row pt-2">
        <div class="col-md-2"> 
        <label for="username" class="form-label"  >Deskripsi</label>
    </div>  
    <div class="col-md-5"> 
    <textarea class="form-control" id="mytextarea" cols="30" rows="10" name="deskripsi"  value="<?php echo $data['deskripsi'];?>"> <?php echo $data['deskripsi'];?></textarea>
        <!-- </div>
        <div class="col-md-1"></div>
        </div>
        <div class="row pt-2">
        <div class="col-md-2">  -->
    </div>  
        <div class="row pt-2">
        <div class="col-md-2">
            </div>  
        <div class="col-md-5"> 
        <div class="d-grid gap-2 d-md-block">
        <button class="btn btn-secondary" type="reset" ><i class="bi bi-x" name="reset" > </i> Batal </button>
        <button class="btn btn-primary" type="button" name="btnkonfirm" data-bs-toggle="modal"><i class="bi bi-download" > </i> Simpan </button>
        </div>
        <div class="col-md-1"></div>
        </div>
            <!-- modal -->
    <div class="modal fade" id="konfirmasi" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                apakah anda yakin ingin menyimpan?
            </div>
            <div class="modal-footer">
                <button type="button" name="btnbatal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" name="btnsimpan" id="btnsimpan" class="btn btn-primary">Simpan</button>
            </div>
            </div>
        </div>
        </div>
        </form> 
    </div> 
    </div> 
    </div>


        <?php
        }
        ?>