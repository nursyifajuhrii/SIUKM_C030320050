<!-- surat_view.php -->

<!DOCTYPE html>
<html>
<head>
    
    <style>
        /* CSS untuk merancang tampilan surat */
        body {
            font-family: Arial, sans-serif;
        }

        .surat {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .kop-surat {
            text-align: center;
            margin-bottom: 20px;
            position: relative;
        }

        .kop-surat img {
            position: absolute;
            width: 80px;
            height: auto;
        }

        .kop-surat img.kiri {
            left: 20px;
        }

        .kop-surat img.kanan {
            right: 20px;
        }

        .kop-surat p {
            margin-bottom: 5px;
        }

        .garis-hitam {
            border-bottom: 5px double #000;
            margin-bottom: 10px;
        }

        .judul {
            text-align: center;
            margin-bottom: 20px;
        }

        .isi-surat p {
            margin-bottom: 10px;
        }

        p {
          margin: 5px 0;
        }

        b {
          display: inline-block;
          width: 200px;
        }

        .bold-text {
        font-weight: bold;
      }

      .tanda-tangan {
        text-align: right;
        margin-top: 50px; /* Atur jarak antara isi surat dengan tanda tangan */
    }

    .tanda-tangan img {
        width: 150px; /* Atur lebar tanda tangan sesuai preferensi */
        height: auto;
        border: 1px solid #000; /* Atur border tanda tangan jika diinginkan */
        padding: 5px; /* Atur padding tanda tangan jika diinginkan */
    }

    .tanda-tangan p {
        margin: 5px 0;
        font-weight: bold;
    }

    </style>
</head>
<body>
    <div class="surat">
      <div class="kop-surat">
            <img class="kiri" src="../assets/img/kemenkumham.png" alt="Logo Kiri">
            <img class="kanan" src="../assets/img/logo_lapas.png" alt="Logo Kanan">
            <h3>
              Lembaga Pemasyarakatan Banjarbaru<br>
              Kantor Wilayah Kemenkumham<br>
              Kalimantan Selatan
            </h3>
            <p style="font-size: smaller;">Jl. Bangkal, Kec. Cempaka, Kota Banjar Baru, Kalimantan Selatan</p>
            <p style="font-size: smaller;">Telp: 0853-8680-4605</p><br>
            <div class="garis-hitam"></div>
        </div>
        <h3 class="judul">BUKTI PENDAFTARAN KUNJUNGAN</h3><br>
        <div class="isi-surat">
            <p><b>Nomor Antrian</b>           : <?php echo $d->no_antrian; ?></p>
            <p><b>Sesi</b>                    : <?php echo $d->id_sesi; ?></p>
            <p><b>Tanggal Kunjungan</b>       : <?php echo $d->tgl_kunjungan; ?></p>
            <p><b>Jam Mulai</b>               : <?php echo $d->jam_mulai; ?></p>
            <p><b>Jam Selesai</b>             : <?php echo $d->jam_selesai; ?></p>
            <p><b>Nama Pengunjung</b>         : <?php echo $d->nama_pjg; ?></p>
            <p><b>Nama NAPI</b>               : <?php echo $d->nama_napi; ?></p>
            <p><b>NIK Pengunjung</b>          : <?php echo $d->nik_pjg; ?></p>
            <p><b>Alamat</b>                  : <?php echo $d->alamat_pjg; ?></p>
            <p><b>Pengikut</b>                : <?php echo $d->pengikut; ?></p>
            <p><b>Jenis Barang</b>            : <?php echo $d->jenis_barang; ?></p>
            <p><b>Keterangan Barang</b>       : <?php echo $d->keterangan; ?></p>
            <p><b>Jumlah Barang</b>           : <?php echo $d->jumlah; ?></p><br>
        </div>

        <div style="text-align: center;">
            <p><b>Mengetahui,</b></p>
            <p><b>Pimpinan Lapas Banjarbaru</b></p>
            <img src="../assets/img/ttd.png">
            <p><b>Nama Pimpinan Lapas</b></p>
        </div><br><br><br>

            <p class="bold-text">Catatan :<br>
            1. Hadir paling lambat 30 menit sebelum Jam Mulai<br>
            2. Surat ini wajib dibawa saat melakukan Kunjungan Tatap Muka Agar dapat di Verifikasi Oleh Petugas<br>
            3. Surat boleh dalam bentuk file atau surat fisik (print)</p>
        
    </div>

    <script>
        // JavaScript untuk mencetak halaman sebagai PDF saat halaman dimuat
        window.onload = function() {
            window.print();
        };
    </script>
</body>
</html>
