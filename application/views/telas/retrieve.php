<?php
  echo "<h2>Lista de usuários</h2>";
  if($this->session->flashdata('excluirok')){
    echo "<p>".$this->session->flashdata('excluirok')."</p>";
  }
  $this->table->set_heading('ID','Name','Email', 'Login','Operations');
  foreach ($users as $line) {
    $this->table->add_row(array($line->id, $line->name, $line->email, $line->login,
      anchor("crud/update/$line->id",'Edit')." - ".anchor("crud/delete/$line->id",'Delete')));
  }
  echo $this->table->generate();
?>
