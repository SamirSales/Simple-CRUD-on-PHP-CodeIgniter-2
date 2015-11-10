<!-- <?php
  echo form_open('crud/create');

  echo form_label('Nome completo');
  echo form_input(array('name'=>'nome'),'','autofocus');
  echo "</br>";
  echo form_label('E-mail');
  echo form_input(array('name'=>'email'));
  echo "</br>";
  echo form_label('Login');
  echo form_input(array('name'=>'login'));
  echo "</br>";
  echo form_label('Password');
  echo form_password(array('name'=>'password'));
  echo "</br>";
  echo form_label('Repeat the password');
  echo form_password(array('name'=>'password2'));
  echo "</br>";
  echo form_submit(array('name'=>'cadastrar'),'Cadastrar');

  echo form_close();
?> -->

<html>
  <?php
    echo form_open('crud/create');
    echo validation_errors('<p>','</p>');
    if($this->session->flashdata('cadastrook')){
      echo "<p>".$this->session->flashdata('cadastrook')."</p>";
    }
  ?>
  <table>
    <tr>
      <td><?php echo form_label('Nome completo'); ?></td>
      <td><?php echo form_input(array('name'=>'name'),set_value('name'),'autofocus'); ?></td>
    </tr>
    <tr>
      <td><?php echo form_label('E-mail'); ?></td>
      <td><?php echo form_input(array('name'=>'email'),set_value('email')); ?></td>
    </tr>
    <tr>
      <td><?php echo form_label('Login'); ?></td>
      <td><?php echo form_input(array('name'=>'login'),set_value('login')); ?></td>
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
      <td><?php echo form_submit(array('name'=>'cadastrar'),'Cadastrar'); ?></td>
    </tr>

  </table>
  <?php echo form_close(); ?>
</html>
