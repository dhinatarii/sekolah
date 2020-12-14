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

        return $query->result();
    }
}
