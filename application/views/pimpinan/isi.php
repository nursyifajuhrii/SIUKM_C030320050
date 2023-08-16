<?php
//==================================== HOME ====================================
if ($page == 'home') {
?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo  $judul; ?></h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $jml_pjg; ?></h3>

                <p>Jumlah Pengunjung</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-people"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $jml_napi; ?></h3>

                <p>Jumlah Narapidana</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?php echo $jml_kunjungan; ?></h3>

                <p>Jumlah Kunjungan</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-person-booth"></i>
              </div>
              
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $jml_pgw; ?></h3>

                <p>Jumlah Pegawai</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-solid fa-user-tie"></i>
              </div>
              
            </div>
          </div>

        </div>
      </div>
    </section>

    <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><b>Selamat Datang <?php echo $this->session->userdata('nama_pgw'); ?></b></h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>

        <div class="card-body">
            <h2>Profil <?php echo $this->session->userdata('nama_pgw'); ?></h2>
            <div class="row">
                <div class="col-md-3">
                    <img src="<?php echo base_url('assets/foto/'.$this->session->userdata('foto')); ?>" class="img-circle elevation-3">
                </div>
                <div class="col-md-7">
                    <table class="table">
                        <dl class="row">
                            <dt class="col-sm-4">Nama Pegawai</dt>
                            <dd class="col-sm-8"><?php echo $this->session->userdata('nama_pgw'); ?></dd>
                            <dt class="col-sm-4">Role</dt>
                            <dd class="col-sm-8"><?php echo $this->session->userdata('id_role'); ?></dd>
                            <dt class="col-sm-4">Status</dt>
                            <dd class="col-sm-8">Aktif</dd>
                        </dl>
                    </table>
                </div>
            </div>
        </div>

        <div class="card-footer">
          Create By Nursyifa & Noor Rika P @2023
        </div>
      </div>

    </section>
    
  </div>
<?php
}

//==================================== LAPORAN ====================================
else if ($page == 'laporan') {
?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo  $judul; ?></h1>
          </div>
        </div>
      </div>
    </section>

              <div class="card mx-auto" style="width: 35%">
            <div class="card-header bg-info text-white text-center">Filter Laporan Kunjungan</div>

            <form method="POST" action="<?php echo base_url('pimpinan/cetaklaporan')?>">
            <div class="card-body">
              <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Bulan</label>
                <div class="col-sm-9">
                  <select class="form-control" name="bulan">
                    <option value="">--Pilih Bulan--</option>
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Agustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                  </select>
                </div>               
              </div>

              <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Tahun</label>
                <div class="col-sm-9">
                  <select class="form-control" name="tahun">
                    <option value="">--Pilih Tahun--</option>
                    <?php $tahun = date('Y');
                    for($i=2020;$i<$tahun+5;$i++) {?>
                      <option value="<?php echo $i?>"><?php echo $i?></option>
                    <?php } ?>
                  </select>
                </div>               
              </div>

              <button style="width: 100%" type="submit" class="btn btn-info"><i class="fas fa-print">Cetak Laporan</i></button>
              </form>
            </div>

          </div>
  </div>

<?php
}

//==================================== CETAK LAPORAN ====================================
else if ($page == 'cetaklaporan') {
?>
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
        <h3 class="judul">LAPORAN KUNJUNGAN</h3><br>
        <div class="isi-surat">
          <?php
              if ((isset($_POST['bulan']) && $_POST['bulan'] != '') &&
                (isset($_POST['tahun']) && $_POST['tahun'] != ''))
              {
                  $bulan = $_POST['bulan'];
                  $tahun = $_POST['tahun'];
                  $bulantahun = $bulan.$tahun;
                  $this->m_pimpinan->dt_cetlap($bulantahun);
              }
              else
              {
                 
                  // Menampilkan alert jika parameter kosong
                  echo "<script>alert('Data tidak ditemukan'); window.location.href = 'laporan';</script>";   
              }
          ?>
          <b>
          <tr>
              <td>Bulan</td>
              <td>:</td>
              <td><?php echo $bulan?></td>
          </tr>
          <br>
          <tr>
              <td>Tahun</td>
              <td>:</td>
              <td><?php echo $tahun?></td>
          </tr>
          </b>

        </div>

    <script>
        // JavaScript untuk mencetak halaman sebagai PDF saat halaman dimuat
        window.onload = function() {
            window.print();
        };
    </script>
</body>
</html>

        <section class="content">
      <div class="card">
        <div class="card-body">
          <?php echo $this->session->flashdata('pesan')?>
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Nama NAPI</th>
                <th>Antrian</th>
                <th>Tanggal</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
                
              </tr>
            </thead>
            <?php $no=1;
            foreach ($cetaklaporan as $b) : ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $b['nama_pjg'] ?></td>
                <td><?php echo $b['nama_napi'] ?></td>
                <td><?php echo $b['no_antrian'] ?></td>
                <td><?php echo $b['tgl_kunjungan'] ?></td>
                <td><?php echo $b['jam_mulai'] ?></td>
                <td><?php echo $b['jam_selesai'] ?></td>
                
              </tr>
            <?php endforeach; ?>
          </table>

        </div>
    </section>
<?php
}
?>