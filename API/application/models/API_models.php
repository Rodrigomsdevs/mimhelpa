<?php

error_reporting(1);

class API_models extends CI_Model {

    public function cadastrar_usuario($nome_completo, $email, $senha, $data_nascimento, $altura) {

        if ($this->existe_usuario($email)) {
            return array('success' => false, 'error' => true, 'msg' => 'Email já esta em uso');
        }

        $dados = array(
            'nome_completo' => $nome_completo,
            'email' => $email,
            'senha' => md5($senha),
            'data_nascimento' => $data_nascimento,
            'altura' => $altura
        );

        $this->db->insert('usuarios', $dados);

        return array('sucesso' => true, 'error' => false, 'retorno' => false, 'msg' => 'Cadastrado com sucesso');
    }
    
    public function cadastrar_aparelho($nome, $foto) {

        if ($this->existe_aparelho($nome)) {
            return array('success' => false, 'error' => true, 'msg' => 'Aparelho já cadastrado');
        }

        $dados = array(
            'nome' => $nome,
            'foto' => $foto
        );

        $this->db->insert('aparelhos', $dados);

        return array('sucesso' => true, 'error' => false, 'retorno' => false, 'msg' => 'Cadastrado com sucesso');
    }

    public function existe_aparelho($nome) {
        $query = $this->db->query("SELECT * FROM aparelhos WHERE nome = ?", [$nome]);
        return ($query->num_rows() > 0);
    }
    
    public function existe_usuario($email) {
        $query = $this->db->query("SELECT * FROM usuarios WHERE email = ?", [$email]);
        return ($query->num_rows() > 0);
    }

    public function validar_login($email, $senha) {
        $query = $this->db->query("SELECT * FROM usuarios WHERE email = ? AND senha = ?", [$email, md5($senha)]);
        return $query->result_array();
    }
    

}
