<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk_model extends CI_Model
{
    public function gettb_produk()
    {
        $query = "SELECT `tb_produk`.*, `user_menu`.`produk`
        FROM `tb_produk` JOIN `user_menu`
        ON `tb_produk`.`id_kategori` = `user_menu`.`id`
        ";
        return $this->db->query($query)->result_array();
    }

    public function data_cake()
    {
    }

    public function ambil_id_kategori($id)
    {
        $hasil = $this->db->where('id', $id)->get('user_menu');
        if ($hasil->num_rows() > 0) {
            return $hasil->result();
        } else {

            return false;
        }
    }

    public function deleteProduk($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_menu');
    }

    public function get_data($table)
    {
        return $this->db->get($table);
    }

    public function update_data($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }
}
