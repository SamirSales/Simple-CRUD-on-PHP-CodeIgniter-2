<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud_model extends CI_Model{

  public function do_insert($dados=NULL){
    if($dados!=NULL){
      $this->db->insert('user',$dados);
      $this->session->set_flashdata('cadastrook','Cadastro realizado com sucesso!');
      redirect('crud/create');
    }
  }

  public function do_update($dados=NULL, $condition=NULL){
    if($dados!=NULL && $condition!=NULL){
      $this->db->update('user',$dados, $condition);
      $this->session->set_flashdata('edicaook','Cadastro alterado com sucesso!');
      redirect(current_url());
    }
  }

  public function do_delete($condition){
    if($condition!=NULL){
      $this->db->delete('user',$condition);
      $this->session->set_flashdata('excluirok','Cadastro deletado com sucesso!');
      redirect('crud/retrieve');
    }
  }

  public function get_all(){
    return $this->db->get('user');
  }

  public function get_byid($id=''){
    if ($id!='') {
      $this->db->where('id',$id);
      $this->db->limit(1);
      return $this->db->get('user');
    } else {
      return FALSE;
    }
  }

}
