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

    var $column_order = array(null, 'nama', 'nip', 'jenis_kelamin', 'tanggal_lahir', 'jabatan', 'kelas', 'alamat'); //Sesuaikan dengan field
    var $column_search = array('nama', 'nip', 'jenis_kelamin', 'jabatan', 'kelas'); //field yang diizin untuk pencarian 
    var $order = array('kelas' => 'asc'); // default order 

    private function _get_datatables_query($id_tahun)
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

        foreach ($this->column_search as $item) // looping awal
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

                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables($id_tahun)
    {
        $this->_get_datatables_query($id_tahun);
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered($id_tahun)
    {
        $this->_get_datatables_query($id_tahun);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all($id_tahun)
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
