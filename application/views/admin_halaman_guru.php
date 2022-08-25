<?php $this->load->view('header_table'); ?>


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
<div class="container" id="menu-top">
  <div class="row">
    <h4>Data Dosen</h4>
  </div>
</div>
<div class="container header">
  <div class="row">
      <div class="col-6 pt-4">
      <?php echo form_open('Admin/prosesTambahGuru'); ?>
        <div class="form-group row">
          <label for="NIP" class="col-sm-3 col-form-label">NIDN</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="NIP" id="NIP" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="idMapel" class="col-sm-3 col-form-label">Mata Perkuliahan</label>
          <div class="col-sm-9">
            <select class="form-control" name="idMapel" id="idMapel" required>
              <?php
                foreach ($mapel as $data) {
                  extract($data);
                  echo "<option value='$idMapel'>$namaMapel</option>";
                }
              ?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-sm-3 col-form-label">Nama</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="nama" id="nama" required>
          </div>
        </div>
      </div>
      <div class="col-6 pt-4">
        <div class="form-group row">
          <label for="hp" class="col-sm-3 col-form-label">No. HP</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="hp" id="hp" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
          <div class="col-sm-9">
            <textarea name="alamat" class="form-control"rows="3" required></textarea>
          </div>
        </div>

      </div>
      <div class="col-12 text-right">
        <?php echo form_submit('submit','Tambah','name="tambah" class="btn btn-info"'); ?>
        <a href="<?php echo base_url(); ?>index.php/Admin/halamanGuru" class="btn btn-secondary">Kembali</a>
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
          <th>Matkul</th>
          <th>NIDN</th>
          <th>Nama</th>
          <th>No Hp</th>
          <th>Alamat</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
          if($guru){
            $i = 1;
            foreach ($guru as $dataGuru) {
        ?>
        <tr>
          <td><?php echo $i++ ?></td>
          <td><?php echo $dataGuru['namaMapel'] ?></td>
          <td><?php echo $dataGuru['NIP'] ?></td>
          <td><?php echo $dataGuru['namaGuru'] ?></td>
          <td><?php echo $dataGuru['noHP'] ?></td>
          <td><?php echo $dataGuru['alamat'] ?></td>
          <td id="body-table"><a class="btn btn-info btn-sm" href="halamanUbahGuru/<?php echo $dataGuru['idGuru']; ?>">Ubah</a> <a class="btn btn-danger btn-sm" href="hapusGuru/<?php echo $dataGuru['idGuru']; ?>">Hapus</a>
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
