<?php
class Siswa_model extends CI_Model
{
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('tb_siswa');
        $this->db->join('tb_orangtua', 'tb_siswa.id_orangtua = tb_orangtua.id_orangtua', 'left');
        $this->db->join('tb_alamat', 'tb_orangtua.id_alamat = tb_alamat.id_alamat', 'left');
        return $this->db->get()->result();
    }

    public function get_detail_data($id)
    {
        $this->db->select('*');
        $this->db->from('tb_siswa');
        $this->db->where('id_siswa', $id);
        $this->db->join('tb_orangtua', 'tb_siswa.id_orangtua = tb_orangtua.id_orangtua', 'left');
        $this->db->join('tb_alamat', 'tb_orangtua.id_alamat = tb_alamat.id_alamat', 'left');
        return $this->db->get()->row_array();
    }

    public function input_data_siswa()
    {
        $id_orangtua = $this->_input_data_orangtua();
        $data = array(
            'nis'           => $this->input->post('nis', TRUE),
            'nisn'          => $this->input->post('nisn', TRUE),
            'nama'          => $this->input->post('nama', TRUE),
            'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
            'agama'         => $this->input->post('agama', TRUE),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
            'id_orangtua'   => $id_orangtua
        );

        $this->db->insert('tb_siswa', $data);
    }

    public function edit_data($id)
    {
        $id_orangtua = $this->db->get_where('tb_siswa', ['id_siswa' => $id])->row()->id_orangtua;
        $id_alamat = $this->db->get_where('tb_orangtua', ['id_orangtua' => $id_orangtua])->row()->id_alamat;

        $data_siswa = array(
            'nis'           => $this->input->post('nis', TRUE),
            'nisn'          => $this->input->post('nisn', TRUE),
            'nama'          => $this->input->post('nama', TRUE),
            'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
            'agama'         => $this->input->post('agama', TRUE),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE)
        );

        $data_orangtua = array(
            'nama_ibu'          => $this->input->post('nama_ibu', TRUE),
            'pendidikan_ibu'    => $this->input->post('pendidikan_ibu', TRUE),
            'pekerjaan_ibu'     => $this->input->post('pekerjaan_ibu', TRUE),
            'nama_ayah'         => $this->input->post('nama_ayah', TRUE),
            'pendidikan_ayah'   => $this->input->post('pendidikan_ayah', TRUE),
            'pekerjaan_ayah'    => $this->input->post('pekerjaan_ayah', TRUE),
            'no_hp'             => $this->input->post('no_hp', TRUE)
        );

        $data_alamat = array(
            'dusun'     => $this->input->post('dusun', TRUE),
            'desa'      => $this->input->post('desa', TRUE),
            'kecamatan' => $this->input->post('kecamatan', TRUE),
            'kabupaten' => $this->input->post('kabupaten', TRUE)
        );

        $this->db->where('id_siswa', $id);
        $this->db->update('tb_siswa', $data_siswa);

        $this->db->where('id_orangtua', $id_orangtua);
        $this->db->update('tb_orangtua', $data_orangtua);

        $this->db->where('id_alamat', $id_alamat);
        $this->db->update('tb_alamat', $data_alamat);
    }

    public function delete_data($id)
    {
        $this->db->delete('tb_siswa', ['id_siswa' => $id]);
    }

    private function _input_data_orangtua()
    {
        $id_alamat = $this->_input_data_alamat();
        $data = array(
            'nama_ibu'          => $this->input->post('nama_ibu', TRUE),
            'pendidikan_ibu'    => $this->input->post('pendidikan_ibu', TRUE),
            'pekerjaan_ibu'     => $this->input->post('pekerjaan_ibu', TRUE),
            'nama_ayah'         => $this->input->post('nama_ayah', TRUE),
            'pendidikan_ayah'   => $this->input->post('pendidikan_ayah', TRUE),
            'pekerjaan_ayah'    => $this->input->post('pekerjaan_ayah', TRUE),
            'no_hp'             => $this->input->post('no_hp', TRUE),
            'id_alamat'         => $id_alamat
        );

        $this->db->insert('tb_orangtua', $data);
        return $this->db->insert_id();
    }

    private function _input_data_alamat()
    {
        $data = array(
            'dusun'     => $this->input->post('dusun', TRUE),
            'desa'      => $this->input->post('desa', TRUE),
            'kecamatan' => $this->input->post('kecamatan', TRUE),
            'kabupaten' => $this->input->post('kabupaten', TRUE)
        );

        $this->db->insert('tb_alamat', $data);
        return $this->db->insert_id();
    }
}
