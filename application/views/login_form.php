<?php $this->load->view('header'); ?>

<div class="container">
  <div class="logo mt-5 mb-4 text-center">
    <img src="<?php echo base_url(); ?>assets/img/header_spot.png">
  </div>
  <?php echo form_open('Login/prosesLogin', 'class="form-signin"');?>


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
    <label for="inputUsername" class="sr-only">Username</label>
    <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Username" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
    <?php echo form_submit('submit', 'Login','class="btn btn-lg btn-dark btn-block"'); ?>
  <?php echo form_close(); ?>
</div>

<?php $this->load->view('footer'); ?>
