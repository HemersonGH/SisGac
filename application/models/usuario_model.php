<?php

class Usuario_model extends CI_Model
{
  function __contruct()
  {
    parent::__construct();
  }

  public function cadastrar($data)
  {
    return $this->db->insert('usuario', $data);
  }

  public function valida_usuario($email, $senha)
  {
    $this->db->where('email', $email);
    $this->db->where('senha', $senha);

    return $this->db->get('usuario')->result();
  }

  public function get_Usuario($id=null)
  {
    $this->db->where('idUsuario', $id);

    return $this->db->get('usuario')->result();
  }

  public function excluir($id=null)
  {
    $this->db->where('idUsuario', $id);

    return $this->db->delete('usuario');
  }

  public function salvar_atualizacao($id, $data)
  {
    $this->db->where('idUsuario', $id);

    return $this->db->update('usuario', $data);
  }

  public function salvar_senha($id, $senha_antiga, $senha_nova)
  {
    $this->db->select('senha');
    $this->db->where('idUsuario', $id);
    $data['senha'] = $this->db->get('usuario')->result();
    $dados['senha'] = $senha_nova;

    if ($data['senha'][0]->senha == $senha_antiga) {
      $this->db->where('idUsuario', $id);
      $this->db->update('usuario', $dados);

      return true;
    } else {
      return false;
    }
  }

  public function get_Solicitacoes($idProfessor=null)
  {
    $this->db->select('count(*) as total');
    $this->db->where('idProfessor', $idProfessor);
    $this->db->where('status_solicitacao', 1);

    $qtd = $this->db->get('solicitacoes_disciplinas')->result();

    return $qtd[0]->total;
  }

  public function get_Atividades_Nao_Avaliada($idProfessor=null)
  {
    $this->db->select('count(*) as total');
    $this->db->where('idProfessor', $idProfessor);
    $this->db->where('status_avaliacao', 2);

    $qtd = $this->db->get('realiza_atividade')->result();

    return $qtd[0]->total;
  }

}

?>
