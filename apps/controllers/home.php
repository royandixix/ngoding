<?php
class home extends controller
{
    private $dt;
    private $df;

    public function __construct()
    {
        $this->dt = $this->loadmodel("barang"); // Objet
        $this->df = $this->loadmodel("daftarBarang");
    }

    public function index()
    {
        echo "dan anda memanggil function index ";
    }

    public function home($data1 = null, $data2 = null)
    {
        echo "Anda memanggil action home dengan data 1 = $data1 dan data 2 = $data2 \n";
    }

    public function lihatdata($id)
    {
        $data = $this->df->getDataById($id); // Tambahkan ini untuk memeriksa data
        $this->loadview('templates/header', ['title' => 'Detail Barang']);
        $this->loadview('home/detailbarang', $data);
        $this->loadview('templates/footer');
    }
    
 

    public function listbarang()
    {
        $data = $this->df->getDataAll();
        $this->loadview('templates/header', ['title' => 'list Barang']);
        $this->loadview('home/listbarang', $data);
        $this->loadview('templates/footer');

        // foreach ($this->df->getDataAll() as $item) {
        //     echo $item['id'] . " " . $item['nama'] . " " . $item['qty'];
        //     echo "<br/>";
        // }
    }
    
}
