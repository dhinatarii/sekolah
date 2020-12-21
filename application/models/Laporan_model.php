<?php
class Laporan_model extends CI_Model
{
    public function cek_datatahun($id_tahun)
    {
        return $this->db->get_where('tb_pengajar', ['id_tahun' => $id_tahun]);
    }

    public function get_all_lap_guru($id_tahun)
    {
        $this->db->select('tg.*, tp.jabatan, group_concat(tk.kelas) as kelas');
        $this->db->from('tb_guru tg');
        $this->db->join('tb_pengajar tp', 'tg.id_guru = tp.id_guru', 'left');
        $this->db->join('tb_tahunajaran tt', 'tp.id_tahun = tt.id_tahun', 'left');
        $this->db->join('tb_matapelajaran tm', 'tp.id_mapel = tm.id_mapel', 'left');
        $this->db->join('tb_kelas tk', 'tp.id_kelas = tk.id_kelas', 'left');
        $this->db->where('tt.id_tahun', $id_tahun);
        $this->db->group_by('tg.nama');
        $this->db->order_by('kelas', 'asc');
        return $this->db->get()->result();
    }

    public function get_detail_lap_guru($id_guru)
    {
        $this->db->select('tp.id_pengajar, tm.nama_mapel, tk.kelas, count(tk2.id_kd) as kd ,tt.nama as tahun');
        $this->db->from('tb_pengajar tp');
        $this->db->join('tb_guru tg', 'tp.id_guru = tg.id_guru', 'left');
        $this->db->join('tb_matapelajaran tm', 'tp.id_mapel = tm.id_mapel', 'left');
        $this->db->join('tb_kelas tk', 'tp.id_kelas = tk.id_kelas', 'left');
        $this->db->join('tb_kd tk2', 'tm.id_mapel = tk2.id_mapel', 'left');
        $this->db->join('tb_tahunajaran tt', 'tp.id_tahun = tt.id_tahun', 'left');
        $this->db->where('tg.id_guru', $id_guru);
        $this->db->group_by('tp.id_pengajar');
        return $this->db->get()->result();
    }

    public function _get_data_siswa($id_tahun, $id_kelas)
    {
        $id_tahun = $id_tahun != null ? $id_tahun : 'null';
        $id_kelas = $id_kelas != null ? $id_kelas : 'null';

        $this->db->select('ts.id_siswa, ts.nis, ts.nisn, ts.nama, ts.jenis_kelamin, ts.tanggal_lahir, ts.agama, ta.dusun, ta.desa, ta.kecamatan, ta.kabupaten');
        $this->db->from('tb_siswa ts');
        $this->db->join('tb_orangtua to2', 'ts.id_orangtua = to2.id_orangtua', 'left');
        $this->db->join('tb_alamat ta', 'to2.id_alamat = ta.id_alamat', 'left');
        $this->db->join('tb_kelas tk', 'ts.id_kelas = tk.id_kelas', 'inner');
        $this->db->join('tb_pengajar tp', 'tk.id_kelas = tp.id_kelas', 'inner');
        $this->db->where('tp.id_tahun', $id_tahun);
        $this->db->where('tk.id_kelas', $id_kelas);
        $this->db->group_by('ts.nis');
    }

    public function get_numrow_siswa($id_tahun, $id_kelas)
    {
        $this->_get_data_siswa($id_tahun, $id_kelas);
        return $this->db->get()->num_rows();
    }

    public function get_all_lap_siswa($id_tahun, $id_kelas)
    {
        $this->_get_data_siswa($id_tahun, $id_kelas);
        return $this->db->get()->result();
    }

    var $column_order_siswa = array(null, 'nis', 'nisn', 'nama', 'jenis_kelamin', 'tanggal_lahir', 'agama', 'dusun', 'desa', 'kecamatan', 'kabupaten'); //Sesuaikan dengan field
    var $column_search_siswa = array('nis', 'nisn', 'nama', 'dusun', 'kecamatan', 'kabupaten'); //field yang diizin untuk pencarian 
    var $order_siswa = array('nis' => 'asc'); // default order 

    private function _get_datatables_query_siswa($id_tahun, $id_kelas)
    {
        $this->_get_data_siswa($id_tahun, $id_kelas);

        $i = 0;

        foreach ($this->column_search_siswa as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search_siswa) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order_siswa[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order_siswa = $this->order;
            $this->db->order_by(key($order_siswa), $order_siswa[key($order_siswa)]);
        }
    }

    function get_datatables_siswa($id_tahun, $id_kelas)
    {
        $this->_get_datatables_query_siswa($id_tahun, $id_kelas);
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_siswa($id_tahun, $id_kelas)
    {
        $this->_get_datatables_query_siswa($id_tahun, $id_kelas);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_siswa($id_tahun, $id_kelas)
    {
        $this->_get_data_siswa($id_tahun, $id_kelas);
        return $this->db->count_all_results();
    }

    var $column_order_guru = array(null, 'nama', 'nip', 'jenis_kelamin', 'tanggal_lahir', 'jabatan', 'kelas', 'alamat'); //Sesuaikan dengan field
    var $column_search_guru = array('nama', 'nip', 'jenis_kelamin', 'jabatan', 'kelas'); //field yang diizin untuk pencarian 
    var $order_guru = array('kelas' => 'asc'); // default order 

    private function _get_datatables_query_guru($id_tahun)
    {

        $this->db->select('tg.id_guru, tg.nama, tg.nip, tg.jenis_kelamin, tg.tanggal_lahir, tp.jabatan, group_concat(tk.kelas) as kelas, tg.alamat');
        $this->db->from('tb_guru tg');
        $this->db->join('tb_pengajar tp', 'tg.id_guru = tp.id_guru', 'left');
        $this->db->join('tb_tahunajaran tt', 'tp.id_tahun = tt.id_tahun', 'left');
        $this->db->join('tb_matapelajaran tm', 'tp.id_mapel = tm.id_mapel', 'left');
        $this->db->join('tb_kelas tk', 'tp.id_kelas = tk.id_kelas', 'left');
        $this->db->where('tp.id_tahun', $id_tahun);
        $this->db->group_by('tg.nama');
        $this->db->order_by('kelas', 'asc');

        $i = 0;

        foreach ($this->column_search_guru as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search_guru) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order_guru[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order_guru = $this->order;
            $this->db->order_by(key($order_guru), $order_guru[key($order_guru)]);
        }
    }

    function get_datatables_guru($id_tahun)
    {
        $this->_get_datatables_query_guru($id_tahun);
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_guru($id_tahun)
    {
        $this->_get_datatables_query_guru($id_tahun);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_guru($id_tahun)
    {
        $this->db->select('tg.id_guru, tg.nama, tg.nip, tg.jenis_kelamin, tg.tanggal_lahir, tp.jabatan, group_concat(tk.kelas) as kelas, tg.alamat');
        $this->db->from('tb_guru tg');
        $this->db->join('tb_pengajar tp', 'tg.id_guru = tp.id_guru', 'left');
        $this->db->join('tb_tahunajaran tt', 'tp.id_tahun = tt.id_tahun', 'left');
        $this->db->join('tb_matapelajaran tm', 'tp.id_mapel = tm.id_mapel', 'left');
        $this->db->join('tb_kelas tk', 'tp.id_kelas = tk.id_kelas', 'left');
        $this->db->where('tp.id_tahun', $id_tahun);
        $this->db->group_by('tg.nama');
        return $this->db->count_all_results();
    }
}
