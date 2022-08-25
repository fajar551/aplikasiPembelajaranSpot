<?php $this->load->view('header_admin'); ?>
<div class="container" id="container">
  <div class="header clearfix">
    <nav>
      <ul class="nav nav-pills float-right mt-3">
        <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/Index'>BERANDA</a>
        </li>
        <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/Admin/halamanGuru'>DOSEN</a>
        </li>
        <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/Admin/halamanSiswa'>MAHASISWA</a>
        </li>
        <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/Admin/halamanKontrak'>KONTRAK</a>
        </li>
        <li class="nav-item">
          <a class='nav-link active' href='<?php echo base_url(); ?>index.php/Admin/halamanAkun'>AKUN</a>
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
      <h4>Ubah Akun Mahasiswa </h4>
    </div>
    <?php
      foreach ($siswa as $data) {
    ?>

      <div class="col-6 pt-4">
      <?php echo form_open('Admin/prosesUbahPasswordSiswa'); ?>
        <input type="hidden" name="id" value="<?php echo $data['idSiswa']; ?>">
        <div class="form-group row">
          <label for="NIS" class="col-sm-3 col-form-label">NIM</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="NIS" id="NIS" value="<?php echo $data['NIS']; ?>" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="password" class="col-sm-3 col-form-label">Password</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="password" id="password" value="<?php echo $data['password']; ?>" required>
          </div>
        </div>
      </div>
      <div class="col-7 text-right">
        <?php echo form_submit('submit','Ubah',' class="btn btn-info"'); ?>
        <a href="<?php echo base_url(); ?>index.php/Admin/halamanAkun" class="btn btn-secondary">Kembali</a>
      </div>
    <?php echo form_close();
      }
    ?>
  </div>
</div>

<?php $this->load->view('footer'); ?>
