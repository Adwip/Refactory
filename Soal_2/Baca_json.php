<?php

$data = file_get_contents('Soal_2.json');
$data = json_decode($data,true);


$temp_name=null;
$temp_id=null;
$temp_judul=null;
$tanpa_no_hp=[];
$user_dengan_artikel=[];
$user_nama_annis=[];
$user_artikel_tahun_2020=[];
$user_lahir_1986=[];
$artikel_dengan_kat_tips=[];
$artikel_sebelum_2019=[];

for ($i=0; $i < count($data); $i++) {
    foreach ($data[$i] as $user => $val_user) {
        if ($user=='profile') {
            foreach ($val_user as $profile => $val_profile) {
                if ($profile=='full_name') {
                    $temp_name=$val_profile;
                    if (strpos($val_profile,'Annis')) {
                        $user_nama_annis[]=$val_profile;
                    }
                }elseif ($profile=='birthday') {
                    if (date('Y',strtotime($val_profile))==1986) {
                        $user_lahir_1986[]=$temp_name;
                    }
                }elseif ($profile=='phones') {
                    if (count($val_profile)==0) {
                        $tanpa_no_hp[]=$temp_name;
                    }
                }
            }
        }elseif ($user=='articles:') {
            if (count($val_user)>0) {
                $user_dengan_artikel[]=$temp_name;
                for ($j=0; $j < count($val_user); $j++) { 
                    foreach ($val_user[$j] as $artikel => $val_artikel) {
                        
                        if ($artikel=='title') {
                            $temp_judul=$val_artikel;
                            if (strpos($val_artikel,'Tips')!==false) {
                                $artikel_dengan_kat_tips[]=$temp_judul;
                            }
                        }elseif ($artikel=='published_at') {
                            if ((int)date('Y',strtotime(str_replace(['T'],' ',$val_artikel)))==2020) {
                                $user_artikel_tahun_2020=$temp_name;
                            }
                            $waktu_1 = new DateTime(date('Y-m-d',strtotime(str_replace(['T'],' ',$val_artikel))));
                            $waktu_2 = new DateTime('2019-08');
                            if ($waktu_1<$waktu_2) {
                                $artikel_sebelum_08_2019[]=$temp_judul;
                            }
                        }
                    }
                }
            }
            
        }
    }
}

echo 'Tanpa no hp : '.json_encode($tanpa_no_hp)."\n";
echo 'User dengan artikel : '.json_encode($user_dengan_artikel)."\n";
echo 'User dengan nama annis : '.json_encode($user_nama_annis)."\n";
echo 'User artikel tahun 2020 : '.json_encode($user_artikel_tahun_2020)."\n";
echo 'User lahir 1986 : '.json_encode($user_lahir_1986)."\n";
echo 'Artikel dengan kata tips : '.json_encode($artikel_dengan_kat_tips)."\n";
echo 'Artikel sebelum 08 2019 : '.json_encode($artikel_sebelum_08_2019)."\n";