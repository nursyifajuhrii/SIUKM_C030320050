<!DOCTYPE html>
<html>
<head>
    <title>Unduh Surat Kunjungan</title>
</head>
<body>
    <h1>Unduh Surat Kunjungan</h1>
    
    <?php var_dump($kunjungan); ?> <!-- Cetak nilai variabel kunjungan -->

    <!-- Tombol unduh surat kunjungan -->
    <a href="<?php echo base_url().'daftarkunjungan/downloadSuratKunjungan/'.$kunjungan->id_kunjungan;?>">Unduh Surat Kunjungan</a>

</body>
</html>
