<?php $this->load->view('header_admin'); ?>
<div class="container" id="container">
  <div class="header clearfix">
    <nav>
      <ul class="nav nav-pills float-right mt-3">
        <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/Index'>BERANDA</a>
        </li>
        <li class="nav-item">
          <a class='nav-link active' href='<?php echo base_url(); ?>index.php/Admin/halamanGuru'>DOSEN</a>
        </li>
        <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/Admin/halamanSiswa'>MAHASISWA</a>
        </li>
        <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/Admin/halamanKontrak'>KONTRAK</a>
        </li>
        <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/Admin/halamanAkun'>AKUN</a>
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
<div class="container">
  <div class="row">
    <div class="col-12 pb-2">
      <h4>Tambah Data Dosen </h4>
    </div>
    <?php
      foreach ($guru as $data) {
    ?>

      <div class="col-6 pt-4">
      <?php echo form_open('Admin/prosesUbahGuru'); ?>
        <input type="hidden" name="id" value="<?php echo $data['idGuru']; ?>">
        <div class="form-group row">
          <label for="NIP" class="col-sm-3 col-form-label">NIDN</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="NIP" id="NIP" value="<?php echo $data['NIP']; ?>" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="idMapel" class="col-sm-3 col-form-label">Mata Perkuliahan</label>
          <div class="col-sm-9">
            <select class="form-control" name="idMapel" id="idMapel" required>
              <?php
                foreach ($mapel as $dataMapel) {
                  if($dataMapel['idMapel'] == $data['idMapel']){
                    echo "<option value='$dataMapel[idMapel]' selected>$dataMapel[namaMapel]</option>";
                  }else{
                    echo "<option value='$dataMapel[idMapel]'>$dataMapel[namaMapel]</option>";
                  }

                }
              ?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-sm-3 col-form-label">Nama</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $data['namaGuru']; ?>" required>
          </div>
        </div>
      </div>
      <div class="col-6 pt-4">
        <div class="form-group row">
          <label for="hp" class="col-sm-3 col-form-label">No. HP</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="hp" id="hp" value="<?php echo $data['noHP']; ?>" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
          <div class="col-sm-9">
            <textarea name="alamat" class="form-control"rows="3" required><?php echo $data['alamat']; ?></textarea>
          </div>
        </div>

      </div>
      <div class="col-12 text-right">
        <?php echo form_submit('submit','Ubah',' class="btn btn-info"'); ?>
        <a href="<?php echo base_url(); ?>index.php/Admin/halamanGuru" class="btn btn-secondary">Kembali</a>
      </div>
    <?php echo form_close();
      }
    ?>
  </div>
</div>

<?php $this->load->view('footer'); ?>
