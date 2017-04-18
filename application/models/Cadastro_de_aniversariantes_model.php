<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cadastro_de_aniversariantes_model extends CI_Model {

    var $tabela_pacientes = "pacientes";

    public function listaTodos($sort = 'id', $order = 'asc', $limit = null, $offset = null ) {

        $query = $this->db->order_by($sort, $order);
        
        if ($limit){
            $this->db->limit($limit, $offset);
        }
        
        $query = $this->db->get($this->tabela_pacientes);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }

    public function listaMes($mes) {

        $this->db->select('*');
        $this->db->select("DATE_FORMAT(dt_nasc,'%d/%m/%Y') AS data_nasc", FALSE);
        $this->db->where("month(dt_nasc)", $mes);
        $this->db->order_by("day(dt_nasc)","asc");
        $query = $this->db->get($this->tabela_pacientes);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }

    public function salva($paciente) {

        return $this->db->insert($this->tabela_pacientes, $paciente);
    }

    public function edita($paciente) {
        $this->db->where('id', $paciente["id"]);
        return $this->db->update($this->tabela_pacientes, $paciente);
    }

    public function deletar($paciente) {
        $this->db->where('id', $paciente["id"]);
        return $this->db->delete($this->tabela_pacientes, $paciente);
    }

    public function buscaPorId($id_paciente) {
        $this->db->where("id", $id_paciente);
        return $this->db->get($this->tabela_pacientes);
    }

    function countAll() {
        return $this->db->count_all($this->tabela_pacientes);
    }

}
