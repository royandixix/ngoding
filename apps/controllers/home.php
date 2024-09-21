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

    public function lihatdata()
    {
        $data = $this->dt->getDataOne();
        $this->loadview('template/header', ['title' => 'Detail Barang']);
        $this->loadview('template/detailbarang', $data);
        $this->loadview('template/footer');
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
