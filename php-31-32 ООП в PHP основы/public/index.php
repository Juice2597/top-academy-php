<?php

use App\Airplane;
use App\Cars;
use App\Ships;

require_once __DIR__ . '/../vendor/autoload.php';


$auto = new Cars('Бензиновый', 'Ford', 100, 4, 2, 4);
print_r($auto);
echo "  Название: " . $auto->getName() . "\n";
echo "  Фары: " . $auto->getHeadlights() . "\n";

$airplane = new Airplane('Турбо', 'Боинг', 1000, 300, 2);
//print_r($airplane);

$ships = new Ships('Дизельный', 'Титаник', 40, 3000, 1, 2);
//print_r($ships);

//3 Задание
class Products
{
    public string $apple;
    public string $banana;
    public string $kiwi;


}

class Cart
{

}


//$transport = new Transport;
//$airplane = new Airplane;
//$ships = new Ships;