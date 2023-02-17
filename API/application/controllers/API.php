<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class API extends CI_Controller {

    public function __construct() {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        parent::__construct();
        $this->load->model('API_models');
    }

    public function index() {
        /* $query = $this->db->query('show DATABASES');
          $query->result_array(); */

        echo 'Hello World';
    }

    public function cadastrar_usuario() {
        //cadastrar_usuario($nome_completo, $email, $senha, $data_nascimento, $altura)

        $nome_completo = $this->input->post('nome_completo');
        $email = $this->input->post('email');
        $senha = $this->input->post('senha');
        $data_nascimento = $this->input->post('data_nascimento');
        $altura = $this->input->post('altura');

        if (empty($nome_completo) || empty($email) || empty($senha) || empty($data_nascimento) || empty($altura)) {
            echo json_encode(array('sucesso' => false, 'error' => true, 'msg' => 'Algum campo esta vazio'));
            return;
        }

        $retorno = $this->API_models->cadastrar_usuario($nome_completo, $email, $senha, $data_nascimento, $altura);
        print_r(json_encode($this->utf8ize($retorno)));
    }

    public function validar_login() {
        $email = $this->input->get('email');
        $senha = $this->input->get('senha');

        if (empty($email) || empty($senha) || empty($senha)) {
            echo json_encode(array('sucesso' => false, 'error' => true, 'msg' => 'Algum campo esta vazio'));
            return;
        }

        $retorno = $this->API_models->validar_login($email, $senha, $senha);

        if (sizeof($retorno) == 0) {
            echo json_encode(array('sucesso' => false, 'error' => true, 'msg' => 'Email e/ou senha incorretos'));
            return;
        }

        print_r(json_encode($this->utf8ize(array('sucesso' => true, 'error' => false, 'retorno' => $retorno, 'msg' => 'Cadastrado com sucesso'))));
    }

    public function cadastrar_aparelho() {

        $nome = $this->input->post('nome');
        $foto = $this->input->post('foto');

        if (empty($nome) || empty($foto)) {
            echo json_encode(array('sucesso' => false, 'error' => true, 'msg' => 'Algum campo esta vazio'));
            return;
        }

        $retorno = $this->API_models->cadastrar_aparelho($nome, $foto);
        print_r(json_encode($this->utf8ize($retorno)));
    }

    ///////////////////////////////////////////////////
    public function utf8ize($d) {
        $self = $this;
        if (is_array($d) || is_object($d)) {
            foreach ($d as &$v) {
                $v = $self->utf8ize($v);
            }
        } else {
            return utf8_encode($d);
        }
        return $d;
    }

}
