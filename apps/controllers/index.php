<?php
class index
{
    public function __construct()
    {
        echo "anda berda pada hamalan controllers index.php ";
    }
    
    public function index()
    {
        echo "dan anda memangil function index ";
    }

    public function home() 
    {
        echo "anda memanggil action home";
    }
}
