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
<div class="container" id="menu-top">
  <div class="row">
    <div class="col-md-6">
      <h4>Data Akun Dosen</h4>
      <div class="table-responsive pt-3">
        <table id="table" class="table table-striped">
          <thead>
            <tr>
              <th>NIDN</th>
              <th>Password</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php

            if($guru){
              foreach ($guru as $dataGuru) {
            ?>
            <tr>
              <td><?php echo $dataGuru['NIP'] ?></td>
              <td><?php echo $dataGuru['password'] ?></td>
              <td id="body-table"><a class="btn btn-info btn-sm" href="halamanUbahPasswordGuru/<?php echo $dataGuru['idGuru']; ?>">Ubah</a>
            </tr>
            <?php
              }
            } ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-md-6">
      <h4>Data Akun Mahasiswa</h4>
      <div class="table-responsive pt-3">
        <table id="table" class="table table-striped">
          <thead>
            <tr>
              <th>NIM</th>
              <th>Password</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php

            if($siswa){
              foreach ($siswa as $dataSiswa) {
            ?>
            <tr>
              <td><?php echo $dataSiswa['NIS'] ?></td>
              <td><?php echo $dataSiswa['password'] ?></td>
              <td id="body-table"><a class="btn btn-info btn-sm" href="halamanUbahPasswordSiswa/<?php echo $dataSiswa['idSiswa']; ?>">Ubah</a>
            </tr>
            <?php
              }
            } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>



<?php $this->load->view('footer'); ?>
