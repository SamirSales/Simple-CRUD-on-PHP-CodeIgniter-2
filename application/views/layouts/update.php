<html>
  <?php
    $id_user = $this->uri->segment(3);
    if($id_user==NULL){
        redirect('crud/retrieve');
    }
    $query = $this->crud_model->get_byid($id_user)->row();
    echo form_open("crud/update/$id_user");
    echo validation_errors('<p>','</p>');
    if($this->session->flashdata('edicaook')){
      echo "<p>".$this->session->flashdata('edicaook')."</p>";
    }
  ?>
  <table>
    <tr>
      <td><?php echo form_label('Nome completo'); ?></td>
      <td><?php echo form_input(array('name'=>'name'),set_value('name',$query->name),'autofocus'); ?></td>
    </tr>
    <tr>
      <td><?php echo form_label('E-mail'); ?></td>
      <td><?php echo form_input(array('name'=>'email'),set_value('email',$query->email),'disabled="disabled"'); ?></td>
    </tr>
    <tr>
      <td><?php echo form_label('Login'); ?></td>
      <td><?php echo form_input(array('name'=>'login'),set_value('login',$query->login),'disabled="disabled"'); ?></td>
    </tr>
    <tr>
      <td><?php echo form_label('Password'); ?></td>
      <td><?php echo form_password(array('name'=>'password'), set_value('password')); ?></td>
    </tr>
    <tr>
      <td><?php echo form_label('Repeat the password'); ?></td>
      <td><?php echo form_password(array('name'=>'password2'), set_value('password2')); ?></td>
    </tr>
    <tr>
      <td><?php echo form_submit(array('name'=>'cadastrar'),'Alterar dados'); ?></td>
    </tr>

  </table>
  <?php
    echo form_hidden('iduser',$query->id);
    echo form_close();
  ?>
</html>
