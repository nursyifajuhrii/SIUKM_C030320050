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
          <div class="col-lg-6 col-12">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $jml_pjg; ?></h3>

                <p>Jumlah Pengunjung</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-people"></i>
              </div>
              <a href="<?php echo base_url('penjaga/pengunjung') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-12">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?php echo $jml_kunjungan; ?></h3>

                <p>Jumlah Kunjungan</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-person-booth"></i>
              </div>
              <a href="<?php echo base_url('penjaga/kunjungan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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

//==================================== PENGUNJUNG ====================================
else if ($page == 'pengunjung') {
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
      <div class="card">
        <div class="card-body">
          <?php echo $this->session->flashdata('pesan')?>
          <table id="datatable_01" class="table table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama Pengunjung</th>
                <th>NIK</th>
                <th>NAPI</th>
                <th>Alamat</th>
                <th>Relasi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <?php 
            foreach ($pengunjung as $b) : ?>
              <tr>
                <td><?php echo $b['id_pengunjung'] ?></td>
                <td><?php echo $b['nama_pjg'] ?></td>
                <td><?php echo $b['nik_pjg'] ?></td>
                <td><?php echo $b['nama_napi'] ?></td>
                <td><?php echo $b['alamat_pjg'] ?></td>
                <td><?php echo $b['hub'] ?></td>
                <td>
                    <a href=<?php echo base_url("penjaga/pengunjung_detil/").$b['id_pengunjung']; ?> > <i class="nav-icon fas fa-solid fa-search-plus"></i></a><br>
                    
                </td>
              </tr>
            <?php endforeach; ?>
          </table>

        </div>
    </section>
  </div>

<?php
}

//--------------------------------- Detil ---------------------------------
else if ($page == 'pengunjung_detil') {
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
      <div class="card">
        <div class="card-body">

          <dl class="row">
            <dt class="col-sm-2">ID Pengunjung</dt>
            <dd class="col-sm-10"><?php echo $d['id_pengunjung']; ?></dd>
            <dt class="col-sm-2">Jenis Kelamin</dt>
            <dd class="col-sm-10"><?php echo $d['ket']; ?></dd>
            <dt class="col-sm-2">Nama Pengunjung</dt>
            <dd class="col-sm-10"><?php echo $d['nama_pjg']; ?></dd>
            <dt class="col-sm-2">NIK Pengunjung</dt>
            <dd class="col-sm-10"><?php echo $d['nik_pjg']; ?></dd>
            <dt class="col-sm-2">Nama NAPI</dt>
            <dd class="col-sm-10"><?php echo $d['nama_napi']; ?></dd>
            <dt class="col-sm-2">Alamat</dt>
            <dd class="col-sm-10"><?php echo $d['alamat_pjg']; ?></dd>
            <dt class="col-sm-2">Relasi dengan NAPI</dt>
            <dd class="col-sm-10"><?php echo $d['hub']; ?></dd>
            <dt class="col-sm-2">Pengikut</dt>
            <dd class="col-sm-10"><?php echo $d['pengikut']; ?></dd>
             <dt class="col-sm-2">Kartu Vaksin</dt>
            <dd class="col-sm-10"><img width=100 src="<?php echo base_url().'assets/foto/vaksin/'.$d['vaksin']?>"></dd>
            <dt class="col-sm-2">Kartu Keluarga</dt>
            <dd class="col-sm-10"><img width=100 src="<?php echo base_url().'assets/foto/kk/'.$d['kk']?>"></dd>
          </dl>

        </div>
      </div>
    </section>
  </div>
<?php
}


//==================================== BARANG ====================================
else if ($page == 'barang') {
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
      <div class="card">
        <div class="card-body">
          <?php echo $this->session->flashdata('pesan')?>
          <table id="datatable_01" class="table table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>NAPI</th>
                <th>Nama Pengunjung</th>
                <th>Jenis Barang</th>
                <th>Keterangan</th>
                <th>Jumlah</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <?php 
            foreach ($barang as $b) : ?>
              <tr>
                <td><?php echo $b['id_barang'] ?></td>
                <td><?php echo $b['nama_napi'] ?></td>
                <td><?php echo $b['nama_pjg'] ?></td>
                <td><?php echo $b['jenis_barang'] ?></td>
                <td><?php echo $b['keterangan'] ?></td>
                <td><?php echo $b['jumlah'] ?></td>
                <td>                
                    <a href=<?php echo base_url("penjaga/barang_detil/").$b['id_barang']; ?> > <i class="nav-icon fas fa-solid fa-search-plus"></i></a><br>
                </td>
              </tr>
            <?php endforeach; ?>
          </table>

        </div>
    </section>
  </div>

<?php
}

//--------------------------------- Detil ---------------------------------
else if ($page == 'barang_detil') {
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
      <div class="card">
        <div class="card-body">

          <dl class="row">
            <dt class="col-sm-2">ID Barang</dt>
            <dd class="col-sm-10"><?php echo $d['id_barang']; ?></dd>
            <dt class="col-sm-2">Nama NAPI</dt>
            <dd class="col-sm-10"><?php echo $d['nama_napi']; ?></dd>
            <dt class="col-sm-2">Nama Pengunjung</dt>
            <dd class="col-sm-10"><?php echo $d['nama_pjg']; ?></dd>
            <dt class="col-sm-2">Jenis Barang</dt>
            <dd class="col-sm-10"><?php echo $d['jenis_barang']; ?></dd>
            <dt class="col-sm-2">Keterangan</dt>
            <dd class="col-sm-10"><?php echo $d['keterangan']; ?></dd>
            <dt class="col-sm-2">Jumlah</dt>
            <dd class="col-sm-10"><?php echo $d['jumlah']; ?></dd>
          </dl>

        </div>
      </div>
    </section>
  </div>
<?php
}

//==================================== SESI ====================================
else if ($page == 'sesi') {
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
      <div class="card">
        <div class="card-body">
          <?php echo $this->session->flashdata('pesan')?>
          <table id="datatable_01" class="table table-bordered">
            <thead>
              <tr>
                <th>Sesi</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <?php 
            foreach ($sesi as $b) : ?>
              <tr>
                <td><?php echo $b['id_sesi'] ?></td>
                <td><?php echo $b['jam_mulai'] ?></td>
                <td><?php echo $b['jam_selesai'] ?></td>
                <td>
                    <a href=<?php echo base_url("penjaga/sesi_detil/").$b['id_sesi']; ?> > <i class="nav-icon fas fa-solid fa-search-plus"></i></a><br>
                </td>
              </tr>
            <?php endforeach; ?>
          </table>

        </div>
    </section>
  </div>

<?php
}

//==================================== KUNJUNGAN ====================================
else if ($page == 'kunjungan') {
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
      <div class="card">
        <div class="card-body">
          <?php echo $this->session->flashdata('pesan')?>
          <table id="datatable_01" class="table table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Sesi</th>
                <th>Status</th>
                <th>Antrian</th>
                <th>Tanggal</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <?php 
            foreach ($kunjungan as $b) : 

                $tanggalKunjungan = $b['tgl_kunjungan'];
                $jamMulai = $b['jam_mulai'];
                $jamSelesai = $b['jam_selesai'];
                
                $tglKunjungan = new DateTime($tanggalKunjungan . ' ' . $jamMulai);
                $tglSelesai = new DateTime($tanggalKunjungan . ' ' . $jamSelesai);
                $waktuSekarang = new DateTime(); // Use the current date and time
                
                if ($waktuSekarang > $tglSelesai) {
                  $status = 'Selesai Kunjungan';
                } else if ($waktuSekarang >= $tglKunjungan && $waktuSekarang < $tglSelesai) {
                  $status = 'Sedang Melakukan Kunjungan';
                } else {
                  $status = 'Belum Melakukan Kunjungan';
                }

              ?>
              <tr>
                <td><?php echo $b['id_kunjungan'] ?></td>
                <td><?php echo $b['nama_pjg'] ?></td>
                <td><?php echo $b['id_sesi'] ?></td>
                <td><?php echo $status ?></td>
                <td><?php echo $b['no_antrian'] ?></td>
                <td><?php echo $b['tgl_kunjungan'] ?></td>
                <td><?php echo $b['jam_mulai'] ?></td>
                <td><?php echo $b['jam_selesai'] ?></td>
                <td>
                    <a href=<?php echo base_url("penjaga/kunjungan_detil/").$b['id_kunjungan']; ?> > <i class="nav-icon fas fa-solid fa-search-plus"></i></a><br>
                </td>
              </tr>
            <?php endforeach; ?>
          </table>

        </div>
    </section>
  </div>

<?php
}

//--------------------------------- Detil ---------------------------------
else if ($page == 'kunjungan_detil') {
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
      <div class="card">
        <div class="card-body">

          <dl class="row">
            <dt class="col-sm-2">ID</dt>
            <dd class="col-sm-10"><?php echo $d['id_kunjungan']; ?></dd>
            <dt class="col-sm-2">Nama Pengunjung</dt>
            <dd class="col-sm-10"><?php echo $d['nama_pjg']; ?></dd>
            <dt class="col-sm-2">Sesi</dt>
            <dd class="col-sm-10"><?php echo $d['id_sesi']; ?></dd>
            <dt class="col-sm-2">Status</dt>
            <dd class="col-sm-10"><?php echo $d['status']; ?></dd>
            <dt class="col-sm-2">Antrian</dt>
            <dd class="col-sm-10"><?php echo $d['no_antrian']; ?></dd>
            <dt class="col-sm-2">Tanggal Kunjungan</dt>
            <dd class="col-sm-10"><?php echo $d['tgl_kunjungan']; ?></dd>
            <dt class="col-sm-2">Jam Mulai</dt>
            <dd class="col-sm-10"><?php echo $d['jam_mulai']; ?></dd>
            <dt class="col-sm-2">Jam Selesai</dt>
            <dd class="col-sm-10"><?php echo $d['jam_selesai']; ?></dd>
          </dl>

        </div>
      </div>
    </section>
  </div>

<?php
}

//--------------------------------- Detil ---------------------------------
else if ($page == 'sesi_detil') {
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
      <div class="card">
        <div class="card-body">

          <dl class="row">
            <dt class="col-sm-2">ID Sesi</dt>
            <dd class="col-sm-10"><?php echo $d['id_sesi']; ?></dd>
            <dt class="col-sm-2">Jam Mulai</dt>
            <dd class="col-sm-10"><?php echo $d['jam_mulai']; ?></dd>
            <dt class="col-sm-2">Jam Selesai</dt>
            <dd class="col-sm-10"><?php echo $d['jam_selesai']; ?></dd>
          </dl>

        </div>
      </div>
    </section>
  </div>
<?php
}

//==================================== ANTRIAN ====================================
else if ($page == 'antrian') {
?>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script type="text/javascript" src="../assets/inc/TimeCircles.js"></script>
      <link rel="stylesheet" href="../assets/inc/TimeCircles.css" />
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
      <div class="card">
        <div class="card-body">
          <?php echo $this->session->flashdata('pesan')?>
          <table id="datatable_01" class="table table-bordered">
            <thead>
              <tr>
                <th>Antrian</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
                <th>Waktu</th>  
                <th>Panggil</th>
              </tr>
            </thead>
            <?php 
            foreach ($antrian as $index => $b) : 

                $audioNomorAntrian = '';
                $audioNomorAntrianBelas = '';
                if ($b['no_antrian'] >= 1 && $b['no_antrian'] <= 11) {
                  $audioNomorAntrian = $b['no_antrian'] . '.wav';
                } else if ($b['no_antrian'] >= 12 && $b['no_antrian'] <= 19) {
                  if ($b['no_antrian'] == 12) {
                    $audioNomorAntrian = '2.wav';
                    $audioNomorAntrianBelas = 'belas.wav';
                  } else {
                    $audioNomorAntrian = substr($b['no_antrian'], -1) . '.wav';
                    $audioNomorAntrianBelas = 'belas.wav';
                  }
                } else if ($b['no_antrian'] >= 20 && $b['no_antrian'] <= 29) {
                  $audioNomorAntrian = '2.wav';
                  $audioNomorAntrianBelas = 'belas.wav';
                }

              ?>

              <tr>
                <td><?php echo $b['no_antrian'] ?></td>
                <td><?php echo $b['nama_pjg'] ?></td>
                <td><?php echo $b['tgl_kunjungan'] ?></td>
                <td><?php echo $b['jam_mulai'] ?></td>
                <td><?php echo $b['jam_selesai'] ?></td>
                <td>
                  <div id="DateCountdown_<?php echo $index; ?>" style="width: 300px; height: 100px;" data-date="<?php echo $b['tgl_kunjungan'] . ' ' . $b['jam_selesai']; ?>"></div>
                </td>

                <script>
                  // Mendapatkan tanggal kunjungan dan jam mulai dari data PHP
                  var tglKunjungan = new Date("<?php echo $b['tgl_kunjungan'] . ' ' . $b['jam_mulai']; ?>");

                  // Mendapatkan tanggal kunjungan dan jam selesai dari data PHP
                  var tglSelesai = new Date("<?php echo $b['tgl_kunjungan'] . ' ' . $b['jam_selesai']; ?>");

                  // Mendapatkan waktu sekarang
                  var currentTime = new Date();

                  // Mengecek apakah waktu sekarang belum memasuki tgl_kunjungan dan jam_mulai
                  if (currentTime < tglKunjungan) {
                    // Menampilkan tulisan "Durasi Kunjungan 15 Menit"
                    $("#DateCountdown_<?php echo $index; ?>").html("Durasi Kunjungan 15 Menit");
                  } else if (currentTime >= tglKunjungan && currentTime <= tglSelesai) {
                    // Menampilkan timecircle dengan waktu mundur dari jam_selesai
                    $("#DateCountdown_<?php echo $index; ?>").TimeCircles({
                      start: true,
                      count_past_zero: false,
                      animation_interval: "smooth",
                      time: {
                        Days: { show: true },
                        Hours: { show: true },
                        Minutes: { show: true },
                        Seconds: { show: true }
                      }
                    });
                  } else {
                    // Menampilkan timecircle yang tidak bergerak
                    $("#DateCountdown_<?php echo $index; ?>").TimeCircles({
                      start: false,
                      count_past_zero: false
                    });
                  }
                </script>
                <td>
                  <button class="btn btn-info" onclick="panggil('<?php echo $audioNomorAntrian ?>', '<?php echo $audioNomorAntrianBelas ?>')"><i class="fas fa-bullhorn"></i>Panggil</button>
                </td>
              </tr>
            <?php endforeach; ?>
          </table>
            <audio id="suarabel" src="<?php echo base_url('audio/Airport_Bell.mp3'); ?>"></audio>
          <audio id="nomorAntrian" src="<?php echo base_url('audio/antrian/nomor-urut.wav'); ?>"></audio>
          <audio id="waktuHabis" src="<?php echo base_url('audio/antrian/waktu_habis.mp3'); ?>"></audio>

          <script type="text/javascript">
            function panggil(audioNomorAntrian, audioNomorAntrianBelas) {
              var audioNomorAntrian = new Audio("<?php echo base_url('audio/antrian/'); ?>" + audioNomorAntrian);
              var audioNomorAntrianBelas = new Audio("<?php echo base_url('audio/antrian/'); ?>" + audioNomorAntrianBelas);
              document.getElementById('suarabel').play();
              setTimeout(function() {
                document.getElementById('nomorAntrian').play();
                setTimeout(function() {
                  if (audioNomorAntrianBelas) {
                    audioNomorAntrian.play();
                    setTimeout(function() {
                      audioNomorAntrianBelas.play();
                      setTimeout(function() {
                        document.getElementById('waktuHabis').play();
                      }); // Jeda 2 detik sebelum memutar suara waktu habis
                    }, 700); // Jeda 2 detik sebelum memutar suara nomor antrian belas
                  } else {
                    audioNomorAntrian.play();
                    setTimeout(function() {
                      document.getElementById('waktuHabis').play();
                    }); // Jeda 2 detik sebelum memutar suara waktu habis
                  }
                }, 2000); // Jeda 2 detik sebelum memutar suara nomor antrian
              }, 5000); // Jeda 5 detik sebelum memutar suara bel
            }
          </script>

        </div>
    </section>
  </div>

<?php
}
?>