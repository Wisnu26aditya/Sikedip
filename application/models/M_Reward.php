<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Reward extends CI_Model
{
    public function getReward()
    {
        $query = "SELECT 	a.reward_id,
                            a.reward_nik,
                            a.reward_foto,
                            a.reward_type,
                            a.show_item,
                            b.ms_nama
                            FROM list_reward a
                    JOIN ms_kar b ON a.reward_nik = b.ms_nip";
        return $this->db->query($query)->result_array();
    }
    public function getPegawai()
    {
        $query = "SELECT 	a.ms_id,
                            a.ms_nama,
                            a.ms_nip,
                            a.ms_deptid,
                            a.show_item,
                            a.ms_jabatanid,
                            a.ms_kelasjabatan
                            FROM ms_kar a
                    WHERE a.show_item = '1'";
        return $this->db->query($query)->result_array();
    }
}
