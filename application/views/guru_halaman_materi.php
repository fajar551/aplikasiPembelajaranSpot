<?php $this->load->view('header_table'); ?>


<div class="container" id="container">
  <div class="header clearfix">
    <nav>
      <ul class="nav nav-pills float-right mt-3">
        <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/Index'>BERANDA</a>
        </li>
        <li class="nav-item">
          <a class='nav-link active' href='<?php echo base_url(); ?>index.php/Guru/halamanMateri'>MATERI</a>
        </li>
        <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/Guru/halamanNilai'>NILAI</a>
        </li>
        <li class="nav-item logout">
          <a class="nav-link btn btn-danger" href="<?php echo base_url(); ?>index.php/Login/prosesLogout">LOGOUT</a>
        </li>
      </ul>
    </nav>
    <div class="logo">
      <img src="<?php echo base_url(); ?>assets/img/title_spot.png">
    </div>
  </div>
<div class="container" id="menu-top">
  <div class="row">
    <h4>Data Materi</h4>
  </div>
</div>
<div class="container header">
  <div class="row">
    <div class="col-6 pt-4">
        <?php
        foreach($guru as $dataGuru){
          ?>
          <div class="form-group row">
            <label for="Mapel" class="col-sm-3 col-form-label">Matkul</label>
            <div class="col-sm-9">
              <?php
                foreach ($mapel as $dataMapel) {
                  if ($dataMapel['idMapel'] == $dataGuru['idMapel']) {
                    $ampuMapel = $dataMapel['idMapel'];
                    echo "<input type='text'  class='form-control' value='$dataMapel[namaMapel]' disabled>";
                    echo "<input type='hidden' name='idMapel' class='form-control' value='$dataMapel[idMapel]'>";
                  }
                }
              ?>
            </div>
          </div>
          <?php
        } ?>
      <?php echo form_open_multipart('Guru/prosesTambahMateri'); ?>
      <input type="hidden" name="id" value="<?php echo $username; ?>">
        <div class="form-group row">
          <label for="materi" class="col-sm-3 col-form-label">Materi</label>
          <div class="col-sm-9">
            <?php echo form_upload('userfile'); ?>
          </div>
        </div>

      </div>
      <div class="col-6 pt-4">
        <div class="form-group row">
          <label for="judul" class="col-sm-3 col-form-label">Judul Materi</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="judul" id="judul" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
          <div class="col-sm-9">
            <textarea name="deskripsi" class="form-control"rows="3"></textarea>
          </div>
        </div>
      </div>
      <div class="col-12 text-right">
        <?php echo form_submit('submit','Tambah','name="tambah" class="btn btn-info"'); ?>
        <a href="<?php echo base_url(); ?>index.php/Guru/halamanMateri" class="btn btn-secondary">Kembali</a>
      </div>
    <?php echo form_close(); ?>
  </div>
</div>
<div class="row">
  <div class="table-responsive pt-3">
    <table id="table"  class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>No</th>
          <th>Judul Materi</th>
          <th>Deskripsi</th>
          <th>Lokasi File</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
          if($materi){
            $i = 1;
            foreach ($materi as $dataMateri) {
        ?>
        <tr>
          <td><?php echo $i++ ?></td>
          <td><?php echo $dataMateri['judulFile'] ?></td>
          <td><?php echo $dataMateri['deskripsi'] ?></td>
          <td><?php echo $dataMateri['lokasiFile'] ?></td>
          <td id="body-table"><a class="btn btn-info btn-sm" href="<?php echo base_url().$dataMateri['lokasiFile'] ?>">Lihat</a> <a class="btn btn-danger btn-sm" href="hapusMateri/<?php echo $dataMateri['idMateri']; ?>">Hapus</a></td>
        </tr>
        <?php
            }
          }
        ?>
      </tbody>
    </table>
  </div>
</div>

<?php $this->load->view('footer_table'); ?>
