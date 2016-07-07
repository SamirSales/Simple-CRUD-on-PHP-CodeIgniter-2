<?php
  $this->load->view('includes/header_crud.php');
  $this->load->view('includes/menu.php');
  if($screen!='') $this->load->view('layouts/'.$screen);
  $this->load->view('includes/footer.php');
