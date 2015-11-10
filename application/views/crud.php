<?php
  $this->load->view('includes/header_crud.php');
  $this->load->view('includes/menu.php');
  if($tela!='') $this->load->view('telas/'.$tela);
  $this->load->view('includes/footer.php');
