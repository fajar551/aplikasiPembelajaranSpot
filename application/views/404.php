<?php $this->load->view('header_admin'); ?>


<div class="container" id="container">
  <div class="header clearfix">
    <div class="logo">
      <!-- <img src="<?php echo base_url(); ?>assets/img/logo-diskes.png"> -->
      <h1>SPOT STMIK MARDIRA INDONESIA</h1>
    </div>
  </div>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card text-center">
        <div class="card-header">
          &nbsp;
        </div>
        <div class="card-body">
          <h5 class="card-title">Selamat datang, <?php echo $username; ?></h5>

        </div>
        <div class="card-footer text-muted">
          2022 &copy; SPOT STMIK MARDIRA INDONESIA. All rights reserved
        </div>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('footer'); ?>
