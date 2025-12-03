<?php
    //function dengan return type
    function perhitungan1($angka1, $angka2) {
        return $angka1 * $angka2;
    }


    $angka1 = 20;
    $angka2 = 5;
    $hasil = perhitungan1($angka1, $angka2);


    echo "Proses ini dilakukan oleh function `perhitungan1` <br>";
    echo "Angka yang akan dikalikan adalah angka $angka1 dengan $angka2 <br>";
    echo "Hasil yang didapatkan adalah: $hasil";


    echo "<hr>";


    //function tanpa return type
    function perhitungan2($angka1, $angka2) {
        $hasil = perhitungan1($angka1, $angka2);
        echo "Sedangkan proses ini dilakukan oleh function `perhitungan2` <br>";
        echo "Hasil yang didapatkan sama yaitu: $hasil";
    } 


    perhitungan2($angka1, $angka2);
?>
