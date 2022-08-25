<?php $this->load->view('header_halaman_nilai'); ?>


<div class="container" id="container">
  <div class="header clearfix">
    <nav>
      <ul class="nav nav-pills float-right mt-3">
        <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/Index'>BERANDA</a>
        </li>
        <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/Guru/halamanMateri'>MATERI</a>
        </li>
        <li class="nav-item">
          <a class='nav-link active' href='<?php echo base_url(); ?>index.php/Guru/halamanNilai'>NILAI</a>
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
    <div class="col-md-12">
      <h4>Data Nilai</h4>
    </div>
  </div>
</div>
<br><br>
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">HARIAN</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">ULANGAN</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">UAS</a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    <div class="container">
      <div class="row">
          <div class="col-6 pt-4">
            <?php
              foreach ($guru as $dataGuru) {
            ?>
          <?php echo form_open('Guru/prosesTambahNilai'); ?>
          <input type="hidden" name="id" value="<?php echo $username; ?>">
          <input type="hidden" name="jenis" value="Harian">
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
            <div class="form-group row">
              <label for="idKelas" class="col-sm-3 col-form-label">Kelas</label>
              <div class="col-sm-9">
                <select class="form-control" name="idKelas" id="idKelas" required>
                  <option value="0" rel='0'> -- Pilih Kelas -- </option>
                  <?php
                    foreach ($kontrak as $dataKontrak) {
                      if($dataKontrak['idMapel'] == $ampuMapel){
                        foreach ($kelas as $dataKelas) {
                          if($dataKelas['idKelas'] == $dataKontrak['idKelas']){
                            echo "<option value='$dataKelas[idKelas]' rel='$dataKelas[idKelas]'>$dataKelas[namaKelas]</option>";
                          }
                        }
                      }
                    }
                  ?>
                </select>
              </div>
            </div>
          </div>
          <div class="col-6 pt-4">
            <div class="form-group row">
              <label for="idSiswa" class="col-sm-3 col-form-label">Nama Mahasiswa</label>
              <div class="col-sm-9">
                <select class="form-control cascade" name="idSiswa" id="idSiswa" required>
                  <option value="0" class='0'> -- Pilih Siswa -- </option>
                  <?php
                    foreach ($siswa as $dataSiswa) {
                      echo "<option value='$dataSiswa[idSiswa]' class='$dataSiswa[idKelas]'>$dataSiswa[namaSiswa]</option>";
                    }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="Nilai" class="col-sm-3 col-form-label">Nilai</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nilai" id="Nilai" required>
              </div>
            </div>

          </div>
          <div class="col-12 header">
            <div class="row">
              <div class="col-6 offset-6 text-right">
                <?php echo form_submit('submit','Tambah','name="tambah" class="btn btn-info"'); ?>
                <a href="<?php echo base_url(); ?>index.php/Admin/halamanSiswa" class="btn btn-secondary">Kembali</a>
              </div>
            </div>
          </div>
        <?php echo form_close();
        }?>
      </div>
    </div>
    <div class="table-responsive pt-3">
      <table id="example"  class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Nilai</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php

          if($harian){
            $i = 1;
            foreach ($harian as $dataHarian) {
          ?>
          <tr class='<?php echo $dataHarian['idKelas']?>'>
            <td><?php echo $i++ ?></td>
            <td><?php echo $dataHarian['NIS'] ?></td>
            <td><?php echo $dataHarian['namaSiswa'] ?></td>
            <td><?php echo $dataHarian['nilai'] ?></td>
            <td id="body-table"><a class="btn btn-info btn-sm" href="halamanUbahNilai/<?php echo $dataHarian['idNilai']; ?>">Ubah</a> <a class="btn btn-danger btn-sm" href="hapusNilai/<?php echo $dataHarian['idNilai']; ?>">Hapus</a>
          </tr>
          <?php
            }
          } ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
    <div class="container">
      <div class="row">
          <div class="col-6 pt-4">
            <?php
              foreach ($guru as $dataGuru) {
            ?>
          <?php echo form_open('Guru/prosesTambahNilai'); ?>
          <input type="hidden" name="id" value="<?php echo $username; ?>">
          <input type="hidden" name="jenis" value="Ulangan">
            <div class="form-group row">
              <label for="Mapel" class="col-sm-3 col-form-label">Mata Pelajaran</label>
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
            <div class="form-group row">
              <label for="idKelas" class="col-sm-3 col-form-label">Kelas</label>
              <div class="col-sm-9">
                <select class="form-control" name="idKelas" id="idKelas" required>
                  <option value="0" rel='0'> -- Pilih Kelas -- </option>
                  <?php
                    foreach ($kontrak as $dataKontrak) {
                      if($dataKontrak['idMapel'] == $ampuMapel){
                        foreach ($kelas as $dataKelas) {
                          if($dataKelas['idKelas'] == $dataKontrak['idKelas']){
                            echo "<option value='$dataKelas[idKelas]' rel='$dataKelas[idKelas]'>$dataKelas[namaKelas]</option>";
                          }
                        }
                      }
                    }
                  ?>
                </select>
              </div>
            </div>
          </div>
          <div class="col-6 pt-4">
            <div class="form-group row">
              <label for="idSiswa" class="col-sm-3 col-form-label">Nama Mahasiswa</label>
              <div class="col-sm-9">
                <select class="form-control cascade" name="idSiswa" id="idSiswa" required>
                  <option value="0" class='0'> -- Pilih Siswa -- </option>
                  <?php
                    foreach ($siswa as $dataSiswa) {
                      echo "<option value='$dataSiswa[idSiswa]' class='$dataSiswa[idKelas]'>$dataSiswa[namaSiswa]</option>";
                    }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="Nilai" class="col-sm-3 col-form-label">Nilai</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nilai" id="Nilai" required>
              </div>
            </div>

          </div>
          <div class="col-12 header">
            <div class="row">
              <div class="col-6 offset-6 text-right">
                <?php echo form_submit('submit','Tambah','name="tambah" class="btn btn-info"'); ?>
                <a href="<?php echo base_url(); ?>index.php/Admin/halamanSiswa" class="btn btn-secondary">Kembali</a>
              </div>
            </div>
          </div>
        <?php echo form_close();
        }?>
      </div>
    </div>
    <div class="table-responsive pt-3">
      <table id="example"  class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Nilai</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php

          if($ulangan){
            $i = 1;
            foreach ($ulangan as $dataUlangan) {
          ?>
          <tr class='<?php echo $dataUlangan['idKelas']?>'>
            <td><?php echo $i++ ?></td>
            <td><?php echo $dataUlangan['NIS'] ?></td>
            <td><?php echo $dataUlangan['namaSiswa'] ?></td>
            <td><?php echo $dataUlangan['nilai'] ?></td>
            <td id="body-table"><a class="btn btn-info btn-sm" href="halamanUbahNilai/<?php echo $dataUlangan['idNilai']; ?>">Ubah</a> <a class="btn btn-danger btn-sm" href="hapusNilai/<?php echo $dataUlangan['idNilai']; ?>">Hapus</a>
          </tr>
          <?php
            }
          } ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
    <div class="container">
      <div class="row">
          <div class="col-6 pt-4">
            <?php
              foreach ($guru as $dataGuru) {
            ?>
          <?php echo form_open('Guru/prosesTambahNilai'); ?>
          <input type="hidden" name="id" value="<?php echo $username; ?>">
          <input type="hidden" name="jenis" value="UAS">
            <div class="form-group row">
              <label for="Mapel" class="col-sm-3 col-form-label">Mata Pelajaran</label>
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
            <div class="form-group row">
              <label for="idKelas" class="col-sm-3 col-form-label">Kelas</label>
              <div class="col-sm-9">
                <select class="form-control" name="idKelas" id="idKelas" required>
                  <option value="0" rel='0'> -- Pilih Kelas -- </option>
                  <?php
                    foreach ($kontrak as $dataKontrak) {
                      if($dataKontrak['idMapel'] == $ampuMapel){
                        foreach ($kelas as $dataKelas) {
                          if($dataKelas['idKelas'] == $dataKontrak['idKelas']){
                            echo "<option value='$dataKelas[idKelas]' rel='$dataKelas[idKelas]'>$dataKelas[namaKelas]</option>";
                          }
                        }
                      }
                    }
                  ?>
                </select>
              </div>
            </div>
          </div>
          <div class="col-6 pt-4">
            <div class="form-group row">
              <label for="idSiswa" class="col-sm-3 col-form-label">Nama Siswa</label>
              <div class="col-sm-9">
                <select class="form-control cascade" name="idSiswa" id="idSiswa" required>
                  <option value="0" class='0'> -- Pilih Siswa -- </option>
                  <?php
                    foreach ($siswa as $dataSiswa) {
                      echo "<option value='$dataSiswa[idSiswa]' class='$dataSiswa[idKelas]'>$dataSiswa[namaSiswa]</option>";
                    }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="Nilai" class="col-sm-3 col-form-label">Nilai</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nilai" id="Nilai" required>
              </div>
            </div>

          </div>
          <div class="col-12 header">
            <div class="row">
              <div class="col-6 offset-6 text-right">
                <?php echo form_submit('submit','Tambah','name="tambah" class="btn btn-info"'); ?>
                <a href="<?php echo base_url(); ?>index.php/Admin/halamanSiswa" class="btn btn-secondary">Kembali</a>
              </div>
            </div>
          </div>
        <?php echo form_close();
        }?>
      </div>
    </div>
    <div class="table-responsive pt-3">
      <table id="example"  class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Nilai</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php

          if($uas){
            $i = 1;
            foreach ($uas as $dataUas) {
          ?>
          <tr class='<?php echo $dataUas['idKelas']?>'>
            <td><?php echo $i++ ?></td>
            <td><?php echo $dataUas['NIS'] ?></td>
            <td><?php echo $dataUas['namaSiswa'] ?></td>
            <td><?php echo $dataUas['nilai'] ?></td>
            <td id="body-table"><a class="btn btn-info btn-sm" href="halamanUbahNilai/<?php echo $dataUas['idNilai']; ?>">Ubah</a> <a class="btn btn-danger btn-sm" href="hapusNilai/<?php echo $dataUas['idNilai']; ?>">Hapus</a>
          </tr>
          <?php
            }
          } ?>
        </tbody>
      </table>
    </div></div>
</div>


<?php $this->load->view('footer_halaman_nilai'); ?>
