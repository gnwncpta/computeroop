<?php

class Computer {
    private $cpu;
    private $vga;
    private $ram;
    private $model;
    private $storage;
    private $harga;

    public function __construct( $cpu = "CPU", $vga = "VGA", $ram = "RAM", $model = "Model", $storage = "Storage", $harga = 0 ){
        $this->cpu = $cpu;
        $this->vga = $vga;
        $this->ram = $ram;
        $this->model = $model;
        $this->storage = $storage;
        $this->harga = $harga;
    }

    // methods
    public function getCPU(){
        return "CPU : {$this->cpu}";
    }

    public function getSpec($param = __CLASS__){
        $spec = "<h2> Full Specification " . $param .  "</h2>
                Model : {$this->model} <br>
                CPU : {$this->cpu} <br>
                VGA : {$this->vga} <br>
                RAM : {$this->ram} <br>
                Storage : {$this->storage} <br>
                Price : {$this->harga}
                ";
        return $spec;
    }

    public function setHarga( $harga ){
        $this->harga = $harga;
    }

    public function getHarga(){
        return $this->harga;
    }
}

class Laptop extends Computer {
    public $ssd;

    public function __construct( $cpu = "CPU", $vga = "VGA", $ram = "RAM", $model = "Model", $storage = "Storage", $ssd = "SSD" ){
        parent::__construct($cpu, $vga, $ram, $model, $storage);

        $this->ssd = $ssd;
    }

    public function getSpec($param = __CLASS__)
    {
        $spec = "<h2>" . parent::getSpec($param) . "</h2>
                <br> SSD : {$this->ssd}";
        return $spec;
    }
}

class Handphone extends Computer {
    public $battery;

    public function __construct( $cpu = "CPU", $vga = "VGA", $ram = "RAM", $model = "Model", $storage = "Storage", $battery = "Battery" ){
        parent::__construct($cpu, $vga, $ram, $model, $storage);

        $this->battery = $battery;
    }

    public function getSpec($param = __CLASS__)
    {
        $spec = parent::getSpec($param) . "<br> Battery : {$this->battery}";
        return $spec;
    }
}

$computer1 = new Computer("Intel Core i9", "NVIDIA RTX 2080 Ti", "32GB", "ALIENWARE", "2TB", "Rp. 20.000.000");
echo $computer1->getSpec();
$computer1->getHarga();

$laptop1 = new Laptop("Intel Core i7", "NVIDIA GTX 1080 Ti", "12GB", "ASUS ROG", "1TB", "500GB");
echo $laptop1->getSpec();

$handphone1 = new Handphone("Snapdragon 855", "NVIDIA Tegra", "8GB", "BlackShark", "128GB", "5000 mAh");
echo $handphone1->getSpec();