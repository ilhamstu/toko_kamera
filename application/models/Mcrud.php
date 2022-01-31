<?php

class Mcrud extends CI_Model {

    public function get($t){
        return $this->db->get($t);
    }

    public function get_limit($t){
        $this->db->limit(6);
        return $this->db->get($t);
    }

    public function insert($t,$d){
        $this->db->insert($t,$d);
    }

    public function update($t,$d,$w,$id){
        $this->db->where($w,$id);
        $this->db->update($t,$d);
    }

    public function delete($t,$w,$id){
        $this->db->where($w,$id);
        $this->db->delete($t);
    }

    public function get_where($t,$w){
        return $this->db->get_where($t,$w);
    }

    public function join3($t,$t1,$t2,$d1,$d2){
        $this->db->join($t1,$d1);
        $this->db->join($t2,$d2);
        return $this->db->get($t);
    }

    public function join3_w($t,$t1,$t2,$d1,$d2){
        $this->db->join($t1,$d1);
        $this->db->join($t2,$d2);
        $this->db->where('status','booked');
        return $this->db->get($t);
    }

    public function join_like($t,$t1,$t2,$d1,$d2,$l){
        $this->db->join($t1,$d1);
        $this->db->join($t2,$d2);
        $this->db->like('nama',$l);
        $this->db->where('status','booked');
        return $this->db->get($t);
    }
}