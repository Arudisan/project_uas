<?php 
 include_once ("tipekamar_Ctrl.php");
 if(!isset($_GET['action'])){
?>
<!--show the tables  -->
<div class="container-lg mt-1 ">
<a href="?modul=mod_tipekamar&action=add" class="btn btn-primary mb-2 sticky-top">Tambah Data</a>
    <table class="table table-striped table-primary table-bordered border-info">
        <tr>
            <th>ID Tipe</th>
            <th>Nama Tipe</th>
            <th>Action</th>
        </tr>
            <?php
            $data = mysqli_query($koneksidb, "SELECT * FROM mst_tipekamar order by id_tipe ASC");
            foreach ($data as $d) :
            ?>
                <tr>
                    <td><?= $d['id_tipe'] ?></td>
                    <td><?= $d['nm_tipe'] ?></td>
                    <td>
                        <a href="?modul=mod_tipekamar&action=edit&id=<?= $d["id_tipe"]; ?>" class="btn btn-xs btn-primary"><i class="bi bi-pencil-square"></i> Edit</a>
                        <a href="?modul=mod_tipekamar&action=delete&id=<?= $d["id_tipe"]; ?>" class="btn btn-xs btn-danger"><i class="bi bi-trash"></i> Delete</a>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
        </table>
</div>
<!--  -->
<?php
 } else if (isset($_GET['action']) && ($_GET['action'] == "add")) {
?>
<div class="container-lg mt-1">
    <h3 class="mt-1"><?php echo $judul; ?></h3>
    <div class="row mt-4">
        <div class="col">
         <form action="?modul=mod_tipekamar&action=save" method="post">
            <div class="mb-3 row">
                <label for="nmtipe_ins" class="col-sm-2 col-form-label">Nama Kategori</label>
             <div class="col-sm-6">
                <input type="text" class="form-control" name="nmtipe_ins">
             </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <a href="?modul=mod_tipekamar" type="cancel" class="btn btn-secondary"><i class="bi bi-box-arrow-left"></i> Kembali</a>
                    <button type="cancel" class="btn btn-danger"><i class="bi bi-x-square"></i> Reset</button>
                    <button type="submit"  class="btn btn-primary"><i class="bi bi-save"></i> Submit</button>
                </div>
            </div>
         </form>
        </div>
    </div>
    <!-- modal -->
        <!-- <div class="modal fade" tabindex="-1" id="ModalKonfirmasi">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Konfirmasi</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<p>Are you sure do you want to save your data ?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">no</button>
						<button type="submit" id="btnyes" class="btn btn-primary">Yes</button>
					</div>
				</div>
			</div>
		</div> -->
</div>
<!--  -->
<?php 
 } else if (isset($_GET['action']) && ($_GET['action'] == "edit")){
    $id = $_GET['id'];
    $qry_edit = mysqli_query($koneksidb, "SELECT * FROM mst_tipekamar WHERE id_tipe='$id'");
    foreach ($qry_edit as $q) :
?>
 <div class="container-lg mt-1">
    <h3 class="mt-1"><?= $judul1; ?></h3>
    <div class="row mt-4">
        <div class="col">
            <form action="?modul=mod_tipekamar&action=update" id="tipekamar_edit" method="POST">
                <div class="mb-3 row">
                 <label for="namakategori" class="col-sm-2 col-form-label">Nama Kategori</label>
                 <div class="col-lg-6">
                   <input type="hidden" class="form-control" id="idkategori_edt" name="idkategori_edt" value="<?= $q['id_tipe']; ?>">
                   <input type="text" class="form-control" id="nmkategori_edt" name="nmkategori_edt" value="<?= $q['nm_tipe']; ?>">
                 </div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-10">
                        <a href="?modul=mod_tipekamar" type="cancel" class="btn btn-secondary"><i class="bi bi-box-arrow-left"></i> Kembali</a>
                        <button type="cancel" class="btn btn-danger"><i class="bi bi-x-square"></i> Reset</button>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- <div class="modal fade" tabindex="-1" id="ModalKonfirmasi2">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Konfirmasi</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<p>Apakah anda yakin simpan data ini?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
						<button type="submit" id="btnyes_edit" class="btn btn-primary">Ya</button>
					</div>
				</div>
			</div>
		</div>
 </div> -->
<?php
 endforeach;
 }
?>