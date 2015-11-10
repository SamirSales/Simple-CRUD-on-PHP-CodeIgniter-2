<html>
  <?php
    $id_user = $this->uri->segment(3);
    if($id_user==NULL){
        redirect('crud/retrieve');
    }
    $query = $this->crud_model->get_byid($id_user)->row();
    echo form_open("crud/delete/$id_user");

  ?>
  <table>
    <tr>
      <td><?php echo form_label('Nome completo'); ?></td>
      <td><?php echo form_input(array('name'=>'name'),set_value('name',$query->name),'disabled="disabled"'); ?></td>
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
      <td><?php echo form_submit(array('name'=>'cadastrar'),'Excluir'); ?></td>
    </tr>

  </table>
  <?php
    echo form_hidden('iduser',$query->id);
    echo form_close();
  ?>
</html>
