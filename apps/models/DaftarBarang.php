<?php

class DaftarBarang
{
    private $daftar = [];
    private $db = null;

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
        $stmt = "SELECT * FROM  daftarbarang";
        $query = $this->db->query($stmt);
        $data = [];
        while ($result = $this->db->fetch_array($query)) {
            $data [] = $result;
        }
        return $data; 
    }
}
