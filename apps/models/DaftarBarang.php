<?php

class DaftarBarang extends Model
{
    private $daftar = [];


    public function __construct()
    {
        // $this->daftar = [
        //     [
        //         'id' => 'B02',
        //         'nama' => 'Kopi Saset',
        //         'qty' => '100',
        //     ],
        //     [
        //         'id' => 'B03',
        //         'nama' => 'Minyak',
        //         'qty' => '100',
        //     ],
        //     [
        //         'id' => 'B04',
        //         'nama' => 'Mie Goreng',
        //         'qty' => '100',
        //     ]
        // ];
        $this->db = new DB();
        $this->db->connect('mysql', 'localhost', 'root', '', 'semuabisangoding');
    }

    public function getDataAll()
    {
        // return $this->daftar;
        $data = [];
        $stmt = "SELECT * FROM  daftarbarang";
        $query = $this->db->query($stmt);
        while ($result = $this->db->fetch_array($query)) {
            $data[] = $result;
        }
        return $data;
    }

    public function getDataById($id)
    {   
        $data = [];
        $stmt = "SELECT * FROM daftarbarang WHERE id = $id";
        $query = $this->db->query($stmt);
        $data = $this->db->fetch_array($query);

        return $data; // Kembalikan data
    }
}
