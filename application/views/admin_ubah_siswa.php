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
          <a class='nav-link active' href='<?php echo base_url(); ?>index.php/Admin/halamanSiswa'>MAHASISWA</a>
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
      <h4>Tambah Data Mahasiswa </h4>
    </div>
    <?php
      foreach ($siswa as $data) {
    ?>

      <div class="col-6 pt-4">
      <?php echo form_open('Admin/prosesUbahSiswa'); ?>
        <input type="hidden" name="id" value="<?php echo $data['idSiswa']; ?>">
        <div class="form-group row">
          <label for="NIS" class="col-sm-3 col-form-label">NIM</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="NIS" id="NIS" value="<?php echo $data['NIS']; ?>" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="idKelas" class="col-sm-3 col-form-label">Kelas</label>
          <div class="col-sm-9">
            <select class="form-control" name="idKelas" id="idKelas" required>
              <?php
                foreach ($kelas as $dataKelas) {
                  if($dataKelas['idKelas'] == $data['idKelas']){
                    echo "<option value='$dataKelas[idKelas]' selected>$dataKelas[namaKelas]</option>";
                  }else{
                    echo "<option value='$dataKelas[idKelas]'>$dataKelas[namaKelas]</option>";
                  }

                }
              ?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-sm-3 col-form-label">Nama</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $data['namaSiswa']; ?>" required>
          </div>
        </div>
      </div>
      <div class="col-6 pt-4">
        <div class="form-group row">
          <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
          <div class="col-sm-9">
            <textarea name="alamat" class="form-control"rows="3" required><?php echo $data['alamatSiswa']; ?></textarea>
          </div>
        </div>

      </div>
      <div class="col-12 text-right">
        <?php echo form_submit('submit','Ubah',' class="btn btn-info"'); ?>
        <a href="<?php echo base_url(); ?>index.php/Admin/halamanSiswa" class="btn btn-secondary">Kembali</a>
      </div>
    <?php echo form_close();
      }
    ?>
  </div>
</div>

<?php $this->load->view('footer'); ?>
