<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa fa-bars"></i> Langkah Perhitungan</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?= base_url('officer') ?>">Dashboard</a></li>
                    <li><i class="fa fa-search"></i> Langkah Perhitungan</li>
                </ol>
            </div>
        </div>
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Langkah Perhitungan
                    </header>
                    <style type="text/css">
                        span b{color: darkblue;}
                    </style>
                    <div class="panel-body">
                        <h3 style="padding: 0% 5% 5% 5%; color: darkblue;"><strong>Implementasi Aturan</strong></h3><br>
                    <p style="padding: 5%; margin-top: -15%;">
                    <?php echo nl2br("


<span><b>[R1] = IF Kompetensi Fungsional Menguasai AND Kompetensi Peran Sangat   Bisa Memimpin THEN Kinerja karyawan Baik.</b></span><br>
μKFMenguasai [81]=((81-80))/50=  1/50=0.02
μKPSangatBisaMemimpin [51]=  ((51-50))/50=  1/50=0.02
α-predikat 1
= μKFMenguasai ∩ μKIBaik
           = Min (0.02 ; 0.02)
           = Min (0.02) <br> 
Hasil himpunan kinerja karyawan Baik :
((Z1-51))/50=0.02    
Z1 – 51 = 0.02 x  50
Z1 – 51 = 1
     Z1   = 1 + 51 = 52 <br>

<span><b>[R2] = IF Kompetensi Fungsional Sangat Menguasai AND Kompetensi Inti Baik   THEN Kinerja Karyawan Baik.</b></span><br>

μKFSangatMenguasai [81]=((81-80))/50=  1/50=0.02 
μKIBaik [51]=  ((51-50))/50=  1/50=0.02 
α-predikat 2
= μKFSangatMenguasai ∩ μKIBaik  
           = Min (0.02 ; 0.02)
           = Min (0.02) <br>
Hasil himpunan kinerja karyawan Baik :
((Z2-51))/50=0.02    
Z2 – 51 = 0.02 x  50
Z2 – 51 = 1
     Z2   = 1 + 51 = 52 <br>

<span><b>[R3] = IF Kompetensi Peran Kurang Bisa Memimpin AND Kompetensi  Pengalaman  Kerja Pengalaman THEN Kinerja Karyawan Kurang Baik.</b></span><br>

μKPKurangBisa Memimpin [20]=((51-20))/50=  31/50=0.62 
μKPKPengalaman [51]=  ((51-50))/50=  1/50=0.02  
α-predikat 3
= μKPKurangBisaMemimpin ∩ μKPKPengalaman    
           = Min (0.62 ; 0.02)
           = Min (0.02) <br>
Hasil himpunan kinerja karyawan Kurang Baik :
((51-Z3))/50=0.02    
51 – Z3  = 0.02 x  50
        -Z3 = 1
         -Z3 = 1 – 51
        -Z3 = -50
       -Z3  = 50 <br>

<span><b>[R4] = IF Kompetensi Pendidikan D3 AND Kompetensi Fungsional Menguasai  THEN Kinerja Karyawan Baik.</b></span><br>

μKPd D3 [81]=((81-80))/50=  1/50=0.02 
μKFMenguasai [51]=  ((51-50))/50=  1/50=0.02    
α-predikat 4
= μKPd D3 ∩ μKFMenguasai    
           = Min (0.02 ; 0.02)
           = Min (0.02) <br>
Hasil himpunan kinerja karyawan Baik :
((Z4-51))/50=0.02    
Z4 – 51 = 0.02 x  50
Z4 – 51 = 1
     Z4   = 1 + 51 = 52 <br>

<span><b>[R5] = IF Kompetensi Inti Sangat Baik AND Kompetensi Pengalaman Kerja   Sangat  Pengalaman THEN Kinerja Karyawan Sangat Baik.</b></span><br>


μKISangatBaik[81]=((81-80))/50=  1/50=0.02 
μKPKSangatPengalaman [81]=  ((81-80))/50=  1/50=0.02    
α-predikat 5
= μKISangatBaik ∩ μKPKSangatPengalaman  
           = Min (0.02 ; 0.02)
           = Min (0.02) <br>
Hasil himpunan kinerja karyawan Sangat Baik :
((Z5-80))/50=0.02    
Z5 – 80 = 0.02 x  50
Z5 – 80 = 1
     Z5   = 1 + 80 = 82
<br><br>

    <span><b>Defuzzyfikasi</b></span>
      
    Defuzzyfikasi disebut dengan penegasan, yaitu tahap untuk mengubah himpunan fuzzy menjadi bilangan real. Input yang dihasilkan dari himpunan fuzzy diperole h dari aturan-aturan fuzzy sedangkan outputnya dihasilkan dari bilangan pada domain himpunan fuzzy. Berikut adalah nilai perhitungan defuzzyfikasi untuk menentukan kinerja karyawan berdasarkan rata-rata berbobot.<br>
Z =  (α- 〖pred〗_1*〖 Z〗_1+ α- 〖pred〗_2*Z_2+ α- 〖pred〗_3  * Z_3+ α- 〖pred〗_4  * Z_4+ α- 〖pred〗_5  * Z_5  )/(α- 〖pred〗_1+ α- 〖pred〗_2+ α- 〖pred〗_(3+ α- 〖pred〗_4+ α- 〖pred〗_5 ) )
   =  (0.02 *52+0.02 *52+0.02 *50+0.02*52+0.02 *82)/(0.02+0.02+0.02+0.02+0.02)  
   =  (1.04+1.04+1+1.04+1.64)/0.1   
   =  5.76/0.1=57.6 <br>
Jadi, perhitungan antara ke lima rule diatas dengan melakukan dari bilangan fuzzy  ke bilangan crisp yang dimana hasilnya Baik untuk penilaian kinerja karyawan pada PT. Sumatera Prima Fibreboard .


                    "); ?>
                        </p>
                    </div>
                </section>
            </div>
        </div>
    <!-- page end-->
    </section>
</section>
<!--main content end-->