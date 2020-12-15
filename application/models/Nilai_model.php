<?php
class Nilai_model extends CI_Model
{
    public function get_nilai_perkd($id_kelas, $id_mapel, $id_kd)
    {
        $kelas = $id_kelas != null ? $id_kelas : 'null';
        $mapel = $id_mapel != null ? $id_mapel : 'null';
        $kd = $id_kd != null ? $id_kd : 'null';
        $jenis_nilai = $this->get_jenis_nilai_in_perkd($id_kelas, $id_mapel, $id_kd);
        $query_select = "";
        $inner_join = "";

        foreach ($jenis_nilai as $jn => $value) {
            $query_select = $query_select . "nilai$jn.nilai as '$value->jenis', ";
            $inner_join = $inner_join . "
            inner join (
                    select tn.id_siswa, tn.nilai from tb_nilai tn  
                        left join tb_kd tk 
                            on tn.id_kd = tk.id_kd 
                        left join tb_matapelajaran tm 
                            on tk.id_mapel = tm.id_mapel
                        left join tb_pengajar tp 
                            on tm.id_mapel = tp.id_mapel
                        left join tb_kelas tk2 
                            on tp.id_kelas =tk2.id_kelas
                        left join tb_tahunajaran tt 
                            on tp.id_tahun = tt.id_tahun 
                    where tt.status = 1
                        and tm.id_mapel = $mapel
                        and tk.id_kd = $kd
                        and tk2.id_kelas = $kelas
                        and tn.jenis = '$value->jenis') nilai$jn on nilai$jn.id_siswa = ts.id_siswa ";
        }


        $query_select = substr($query_select, 0, -2);

        if ($query_select != null || $inner_join != null) {
            $query = $this->db->query("select ts.nis, ts.nisn ,ts.nama, $query_select from tb_siswa ts $inner_join");
            return $query->result_array();
        } else {
            return null;
        }
    }

    public function get_jenis_nilai_in_perkd($id_kelas = null, $id_mapel = null, $id_kd = null)
    {
        $query = $this->_get_jenis_nilai_inperkd($id_kelas, $id_mapel, $id_kd);
        return $query->result();
    }

    public function get_jenis_nilai_in_perkd_array($id_kelas = null, $id_mapel = null, $id_kd = null)
    {
        $query = $this->_get_jenis_nilai_inperkd($id_kelas, $id_mapel, $id_kd);
        return $query->result_array();
    }

    public function _get_jenis_nilai_inperkd($id_kelas = null, $id_mapel = null, $id_kd = null)
    {
        $kelas = $id_kelas != null ? $id_kelas : 'null';
        $mapel = $id_mapel != null ? $id_mapel : 'null';
        $kd = $id_kd != null ? $id_kd : 'null';
        $query = $this->db->query("select tn.jenis from tb_nilai tn  
            left join tb_kd tk 
                on tn.id_kd = tk.id_kd 
            left join tb_matapelajaran tm 
                on tk.id_mapel = tm.id_mapel
            left join tb_siswa ts 
                on tn.id_siswa = ts.id_siswa
            left join tb_kelas tk2 
                on ts.id_kelas = tk2.id_kelas 
            where 
                tm.id_mapel = $mapel
                and tk.id_kd = $kd
                and tk2.id_kelas = $kelas
            group by tn.jenis");
        return $query;
    }

    public function input_nilai($data_murid, $id_kd)
    {
        foreach ($data_murid as $key => $value) {
            $data = array(
                'id_siswa'      => $value->id_siswa,
                'id_kd'         => $id_kd,
                'jenis'         => $this->input->post('jenis', TRUE),
                'nilai'         => $this->input->post('nilai' . $key, TRUE),
            );
            $this->db->insert('tb_nilai', $data);
        }
    }

    public function update_nilai($data_murid, $id_kd, $jenis)
    {
        foreach ($data_murid as $key => $value) {
            $data = array(
                'nilai'         => $this->input->post('nilai' . $key, TRUE),
            );
            $this->db->where('id_siswa', $value->id_siswa);
            $this->db->where('id_kd', $id_kd);
            $this->db->where('jenis', $jenis);
            $this->db->update('tb_nilai', $data);
        }
    }

    public function delete_nilai($id_kelas, $id_kd, $jenis)
    {
        $this->db->query("delete tn from tb_nilai tn 
            inner join tb_siswa ts on tn.id_siswa = ts.id_siswa
            where tn.id_kd = $id_kd
            and ts.id_kelas = $id_kelas
            and tn.jenis = '$jenis'");
    }

    public function detail_nilai_perkd($id_kelas, $id_mapel, $id_kd, $jenis)
    {
        $query = $this->db->query("select ts.id_siswa, ts.nis, ts.nama, tn.nilai, tn.jenis 
            from tb_nilai tn  
                left join tb_kd tk 
                    on tn.id_kd = tk.id_kd 
                left join tb_matapelajaran tm 
                    on tk.id_mapel = tm.id_mapel
                left join tb_siswa ts 
                    on tn.id_siswa = ts.id_siswa
                left join tb_kelas tk2 
                    on ts.id_kelas = tk2.id_kelas 
            where 
                tm.id_mapel = $id_mapel
                and tk.id_kd = $id_kd
                and tk2.id_kelas = $id_kelas
                and tn.jenis = '$jenis'");

        return $query->result();
    }
}
