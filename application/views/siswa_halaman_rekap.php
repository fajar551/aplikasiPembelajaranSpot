<?php $this->load->view('header_table'); ?>


<div class="container" id="container">
  <div class="header clearfix">
    <nav>
      <ul class="nav nav-pills float-right mt-3">
        <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/Index'>BERANDA</a>
        </li>
        <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/Siswa/halamanNilai'>NILAI</a>
        </li>
        <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/Siswa/halamanMateri'>MATERI</a>
        </li>
        <li class="nav-item">
          <a class='nav-link active' href='<?php echo base_url(); ?>index.php/Siswa/halamanRekap'>REKAP</a>
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
    <h4>Data Nilai</h4>
  </div>
</div>
<div class="container header">
  <div class="row">
      <div class="col-6 pt-4">
        <?php
          foreach ($siswa as $dataSiswa) {
        ?>
        <div class="form-group row">
          <label for="NIS" class="col-sm-3 col-form-label">NIM</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="NIS" id="NIS" value="<?php echo $dataSiswa['NIS']?>" disabled required>
          </div>
        </div>
        <div class="form-group row">
          <label for="Nama" class="col-sm-3 col-form-label">Nama Mahasiswa</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="nama" id="Nama" value="<?php echo $dataSiswa['namaSiswa']?>" disabled required>
          </div>
        </div>
      </div>
      <div class="col-6 pt-4">
        <div class="form-group row">
          <label for="kelas" class="col-sm-3 col-form-label">Kelas</label>
          <div class="col-sm-9">
            <?php
              foreach ($kelas as $dataKelas) {
                if($dataKelas['idKelas'] == $dataSiswa['idKelas']){
                  $ampuKelas = $dataKelas['idKelas'];
                  echo "<input type='text' class='form-control' name='kelas' id='kelas' value='$dataKelas[namaKelas]' disabled required>";
                }
              }
            ?>
          </div>
        </div>

      </div>
    <?php } ?>
  </div>
</div>
<div class="container header">
  <div class="row">
    <div class="col-12">
      <div class="header">
        <div class="col-4">
          <div class="form-group row">
            <label for="idKelas" class="col-sm-5 col-form-label">Matkul</label>
            <div class="col-sm-7">
              <select class="form-control" name="idKelas" id="idKelas" required>
                <option value="0" rel='0'> -- Pilih Kelas -- </option>
                <?php
                  foreach ($kontrak as $dataKontrak) {
                    if($dataKontrak['idKelas'] == $ampuKelas){
                      foreach ($mapel as $dataMapel) {
                        if($dataMapel['idMapel'] == $dataKontrak['idMapel']){
                          echo "<option value='$dataMapel[idMapel]' rel='$dataMapel[idMapel]'>$dataMapel[namaMapel]</option>";
                        }
                      }
                    }
                  }
                ?>
              </select>
            </div>
          </div>
        </div>
        
      </div>
    </div>
    <div class="col-12">
      <div class="row">
        <div class="table-responsive pt-3">
          <table  class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Kategori Penilaian</th>
                <th>Bobot</th>
                <th>Nilai</th>
                <th>Nilai x Bobot</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1.</td>
                <td>Tugas Harian</td>
                <td>20%</td>
                <td>89.1</td>
                <td>17.82</td>
              </tr>
              <tr>
                <td>2.</td>
                <td>Ulangan</td>
                <td>30%</td>
                <td>80.0</td>
                <td>24</td>
              </tr>
              <tr>
                <td>3.</td>
                <td>UAS</td>
                <td>50%</td>
                <td>70.2</td>
                <td>40.05</td>
              </tr>
              <tr>
                <td colspan="4" class="text-right">Nilai Akhir</td>
                <td>81.87</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('footer_table'); ?>
