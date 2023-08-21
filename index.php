<?php

$menus = [
    '1. Ganjil atau Genap',
    '2. Mengelompokkan Bilangan Ganjil dan Genap',
    '3. Menjumlahkan Angka Diantara 2 Bilangan',
    '4. Selisih 2 Himpunan Bilangan',
    '5. Bilangan Prima atau Bukan',
    '6. Menampilkan Deret Bilangan Prima'
];

echo "============= Daftar Function =============\n\n";
foreach ($menus as $menu) {
    echo $menu . "\n";
}

$selectedMenu = (int) readline("\nPilih Function (1 - 6): ");

switch ($selectedMenu) {
    case 1:
        ganjilGenap();
        break;
    case 2:
        kelompokGanjilGenap();
        break;
    case 3:
        jumlahAngka();
        break;
    case 4:
        selisihHimpunan();
        break;
    case 5:
        prima();
        break;
    case 6:
        deretPrima();
        break;
    default:
        echo "Function tidak ditemukan\n";
        break;
}

function ganjilGenap()
{
    echo "\n============= Ganjil atau Genap =============\n\n";
    $number = (int) readline("Masukkan Angka: ");

    newLine(1);

    if ($number % 2 == 0) {
        echo "Genap\n";
    } else {
        echo "Ganjil\n";
    }
}

function kelompokGanjilGenap()
{
    echo "\n============= Mengelompokkan Bilangan Ganjil dan Genap =============\n\n";
    $numbers = stringToArray(readline("Masukkan Array (contoh [1, 2, 3, 4, 5, 6]): "));

    newLine(1);

    $genap = [];
    $ganjil = [];

    foreach ($numbers as $number) {
        if ($number % 2 == 0) {
            array_push($genap, $number);
        } else {
            array_push($ganjil, $number);
        }
    }

    echo "Genap: [" . implode(", ", $genap) . "]\n";
    echo "Ganjil: [" . implode(", ", $ganjil) . "]\n";
}

function jumlahAngka()
{
    echo "\n============= Menjumlahkan Angka Diantara 2 Bilangan =============\n\n";
    $numbers = stringToArray(readline("Masukkan 2 Angka (contoh 1, 5): "));
    $start = $numbers[0];
    $end = $numbers[1];

    newLine(1);

    $sum = 0;

    for ($i = $start + 1; $i < $end; $i++) {
        $sum += $i;
    }

    echo "Jumlah: " . $sum . "\n";
}

function selisihHimpunan()
{
    echo "\n============= Selisih 2 Himpunan Bilangan =============\n\n";
    $firstSet = stringToArray(readline("Masukkan Himpunan A (contoh [1, 2, 3, 4, 5]): "));
    $secondSet = stringToArray(readline("Masukkan Himpunan B (contoh [1, 2, 3]): "));

    newLine(1);

    $result = array_diff($firstSet, $secondSet);

    $result = implode(", ", $result);
    echo "Selisih: [" . $result . "]\n";
}

function prima()
{
    echo "\n============= Bilangan Prima atau Bukan =============\n\n";
    $number = (int) readline("Masukkan Angka: ");

    newLine(1);

    $isPrime = true;

    for ($i = 2; $i < $number; $i++) {
        if ($number % $i == 0) {
            $isPrime = false;
        }
    }

    if ($isPrime) {
        echo "Prima\n";
    } else {
        echo "Bukan Prima\n";
    }
}

function deretPrima()
{
    echo "\n============= Menampilkan Deret Bilangan Prima =============\n\n";
    $number = (int) readline("Masukkan Jumlah Deret: ");

    newLine(1);

    $primes = [];

    for ($i = 2; $i <= $number; $i++) {
        $isPrime = true;

        for ($j = 2; $j < $i; $j++) {
            if ($i % $j == 0) {
                $isPrime = false;
            }
        }

        if ($isPrime) {
            array_push($primes, $i);
        }
    }

    echo "Deret Bilangan Prima: " . implode(", ", $primes) . "\n";
}

function newLine($n) {
    for ($i = 0; $i < $n; $i++) {
        echo "\n";
    }
}

function stringToArray($string) {
    $string = str_replace("[", "", $string);
    $string = str_replace("]", "", $string);
    $string = str_replace(" ", "", $string);
    return explode(",", $string);
}