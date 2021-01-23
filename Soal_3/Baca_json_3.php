<?php

$data = file_get_contents('Soal_3.json');
$data = json_decode($data,true);


$temp_name=null;
$temp_id=null;
$temp_type=null;
$temp_room=null;
$item_di_ruang_miting=[];
$alat_elektronik=[];
$furniture=[];
$dibeli_16_januari_2020=[];
$item_warna_coklat=[];

for ($i=0; $i < count($data); $i++) {
    foreach ($data[$i] as $barang => $val_barang) {
        if ($barang=='name') {
            $temp_name=$val_barang;
        }elseif ($barang=='type') {
            if ($val_barang=='electronic') {
                $alat_elektronik[]=$temp_name;
            }elseif ($val_barang=='furniture') {
                $furniture[]= $temp_name;
            }
        }elseif ($barang=='tags') {
            for ($j=0; $j < count($val_barang); $j++) {
                if ($val_barang[$j]=='brown') {
                    $item_warna_coklat[]=$temp_name;
                }
            }
        }elseif ($barang=='purchased_at') {
            if (date('m-d',$val_barang)=='01-16') {
                $dibeli_16_januari_2020[]=$temp_name;
            }
        }elseif ($barang=='placement') {
            foreach ($val_barang as $placement => $val_placement) {
                if ($placement=='name') {
                    if ($val_placement=='Meeting Room') {
                        $item_di_ruang_miting[]=$temp_name;
                    }
                }
            }
        }
    }
}

echo 'Item di ruang miting : '.json_encode($item_di_ruang_miting)."\n";
echo 'Alat elektronik : '.json_encode($alat_elektronik)."\n";
echo 'Furniture : '.json_encode($furniture)."\n";
echo 'Dibeli tanggal 16 Jan 2020 : '.json_encode($dibeli_16_januari_2020)."\n";
echo 'Item warna coklat : '.json_encode($item_warna_coklat)."\n";