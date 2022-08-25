<?php $this->load->view('header_table'); ?>


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
          <a class='nav-link active' href='<?php echo base_url(); ?>index.php/Admin/halamanKontrak'>KONTRAK</a>
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
<div class="container" id="menu-top">
  <div class="row">
    <h4>Data Dosen</h4>
  </div>
</div>
<div class="container header">
  <div class="row">
      <div class="col-6 pt-4">
        <?php
          if(isset($message))
          {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    $message
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                  </div>";
          }
        ?>
      <?php echo form_open('Admin/prosesTambahKontrak'); ?>
      <div class="form-group row">
        <label for="idKelas" class="col-sm-3 col-form-label">Kelas</label>
        <div class="col-sm-9">
          <select class="form-control" name="idKelas" id="idKelas" required>
            <?php
              foreach ($kelas as $dataKelas) {
                echo "<option value='$dataKelas[idKelas]'>$dataKelas[namaKelas]</option>";
              }
            ?>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="idMapel" class="col-sm-3 col-form-label">Mata Perkuliahan</label>
        <div class="col-sm-9">
          <select class="form-control" name="idMapel" id="idMapel" required>
            <?php
              foreach ($mapel as $dataMapel) {
                echo "<option value='$dataMapel[idMapel]'>$dataMapel[namaMapel]</option>";
              }
            ?>
          </select>
        </div>
      </div>
      <div class="col-12 text-right">
        <?php echo form_submit('submit','Tambah','name="tambah" class="btn btn-info"'); ?>
        <a href="<?php echo base_url(); ?>index.php/Admin/halamanSiswa" class="btn btn-secondary">Kembali</a>
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
          <th>Kelas</th>
          <th>Mata Perkuliahan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
          if($kontrak){
            $i = 1;
            foreach ($kontrak as $dataKontrak) {
        ?>
        <tr>
          <td><?php echo $i++ ?></td>
          <td><?php echo $dataKontrak['namaKelas'] ?></td>
          <td><?php echo $dataKontrak['namaMapel'] ?></td>
          <td id="body-table"><a class="btn btn-danger btn-sm" href="hapusKontrak/<?php echo $dataKontrak['idKontrak']; ?>">Hapus</a>
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
