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
            $query = $this->db->query("select ts.nis, ts.nisn ,ts.nama, $query_select, jm.jumlah, jm.rerata from tb_siswa ts $inner_join
                inner join (
                    select ts.id_siswa, ts.nis, ts.nama, sum(tn.nilai) as jumlah, ceil(avg(tn.nilai)) as rerata 
                    from tb_nilai tn 
                        inner join tb_siswa ts 
                            on tn.id_siswa = ts.id_siswa 
                        inner join tb_kd tk 
                            on tn.id_kd = tk.id_kd
                        inner join tb_matapelajaran tm 
                            on tk.id_mapel = tm.id_mapel
                    where 
                        tm.id_mapel = $mapel
                        and tk.id_kd = $kd
                        and ts.id_kelas = $kelas
                    group by ts.id_siswa) jm on jm.id_siswa = ts.id_siswa");

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

    private function _get_jenis_nilai_inperkd($id_kelas = null, $id_mapel = null, $id_kd = null)
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

    public function get_nilai_permapel($id_mapel, $id_kelas, $view)
    {
        $kelas          = $id_kelas != null ? $id_kelas : 'null';
        $mapel          = $id_mapel != null ? $id_mapel : 'null';
        $kd             = $this->get_kd_permapel_result($mapel, $kelas);
        $kd_row         = $this->get_kd_permapel_numrow($mapel, $kelas);
        $query_select   = "";
        $inner_join     = "";

        foreach ($kd as $key => $value) {
            switch ($view) {
                case 'min':
                    $query_select = $query_select . "min(kd$key.rerata) as '$value->nama_kd', ";
                    break;
                case 'max':
                    $query_select = $query_select . "max(kd$key.rerata) as '$value->nama_kd', ";
                    break;
                case 'jumlah':
                    $query_select = $query_select . "sum(kd$key.rerata) as '$value->nama_kd', ";
                    break;
                case 'rerata':
                    $query_select = $query_select . "avg(kd$key.rerata) as '$value->nama_kd', ";
                    break;

                default:
                    $query_select = $query_select . "kd$key.rerata as '$value->nama_kd', ";
                    break;
            }

            $inner_join = $inner_join . "
                inner join (
                    select ts.id_siswa, ts.nis, ts.nama, sum(tn.nilai) as jumlah, avg(tn.nilai) as rerata 
                    from tb_nilai tn 
                    inner join tb_siswa ts 
                        on tn.id_siswa = ts.id_siswa 
                    inner join tb_kd tk 
                        on tn.id_kd = tk.id_kd
                    inner join tb_matapelajaran tm 
                        on tk.id_mapel = tm.id_mapel
                    where 
                        tm.id_mapel = $mapel
                        and tk.id_kd = {$value->id_kd}
                        and ts.id_kelas = $kelas
                    group by ts.id_siswa ) kd$key on ts.id_siswa = kd$key.id_siswa";
        }

        switch ($view) {
            case 'min':
                $query_select = $query_select . "min(nm.jumlah) as jumlah, min(nm.rerata) as rerata";
                break;
            case 'max':
                $query_select = $query_select . "max(nm.jumlah) as jumlah, max(nm.rerata) as rerata";
                break;
            case 'jumlah':
                $query_select = $query_select . "sum(nm.jumlah) as jumlah, sum(nm.rerata) as rerata";
                break;
            case 'rerata':
                $query_select = $query_select . "avg(nm.jumlah) as jumlah, avg(nm.rerata) as rerata";
                break;

            default:
                $query_select = $query_select . "nm.jumlah as jumlah, nm.rerata as rerata";
                break;
        }

        if ($query_select != null || $inner_join != null) {
            $inner_join = $inner_join . "
                inner join(
                        select ts.id_siswa, ts.nis, ts.nama, sum(tn.nilai)/$kd_row as jumlah, avg(tn.nilai) as rerata 
                        from tb_nilai tn 
                        inner join tb_siswa ts 
                            on tn.id_siswa = ts.id_siswa 
                        inner join tb_kd tk 
                            on tn.id_kd = tk.id_kd
                        inner join tb_matapelajaran tm 
                            on tk.id_mapel = tm.id_mapel
                        where 
                            tm.id_mapel = $mapel
                            and ts.id_kelas = $kelas
                        group by ts.id_siswa) nm on ts.id_siswa = nm.id_siswa";

            $query = $this->db->query("select ts.id_siswa, ts.nis, ts.nama, $query_select from tb_siswa ts $inner_join");
            return $query->result_array();
        } else {
            return null;
        }
    }

    public function get_kd_permapel_numrow($id_mapel = null, $id_kelas = null)
    {
        return $this->_get_kd_permapel($id_mapel, $id_kelas)->num_rows();
    }

    public function get_kd_permapel_result($id_mapel = null, $id_kelas = null)
    {
        return $this->_get_kd_permapel($id_mapel, $id_kelas)->result();
    }

    public function get_kd_permapel_array($id_mapel = null, $id_kelas = null)
    {
        return $this->_get_kd_permapel($id_mapel, $id_kelas)->result_array();;
    }

    private function _get_kd_permapel($id_mapel = null, $id_kelas = null)
    {
        $this->db->select('tk.*');
        $this->db->from('tb_kd tk');
        $this->db->join('tb_nilai tn', 'tk.id_kd = tn.id_kd', 'inner');
        $this->db->join('tb_siswa ts', 'tn.id_siswa = ts.id_siswa', 'inner');
        $this->db->where('tk.id_mapel', $id_mapel);
        $this->db->where('ts.id_kelas', $id_kelas);
        $this->db->group_by('tk.id_kd');
        return $this->db->get();
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
