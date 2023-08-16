
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar Kunjungan</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/dist/css/adminlte.min.css">
  <style>
    .login-page {
      background-image: url("<?php echo base_url(); ?>assets/img/home_lapas.jpg");
      background-position: center center;
      background-size: cover;
      background-attachment: fixed;
    }
  </style>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <img src="<?php echo base_url(); ?>assets/img/kemenkumham.png" height="42" width="46">
      <img src="<?php echo base_url(); ?>assets/img/logo_lapas.png" height="42" width="46">
      <span class="text-warning"><b>SIKANTAP </b></a></span>
    </div>
    <!-- /.login-logo -->
    <div class="card" style="margin: 20px;">
      <div class="card-body login-card-body" style="width: 800px; height: 900px; align-self: center;">
        <p class="login-box-msg" style="font-size: 20px;"><b>DAFTAR KUNJUNGAN TATAP MUKA</b></p>

        <form action="<?php echo base_url("daftarkunjungan"); ?>" method="post" enctype="multipart/form-data">

          <div class="form-group row">
                <label for="nama_pjg" class="col-sm-2 col-form-label">Tanggal Kunjungan</label>
                <div class="col-sm-4">
                  <input type="text" name="tanggal" id="tanggal" value="<?= date('Y-m-d', strtotime('+1 day')) ?>" readonly>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('tgl_kunjungan')); ?></span>
                </div>
                <label for="sesi" class="col-sm-2 col-form-label">Sesi</label>
                <div class="col-sm-4">
                  <?php echo form_dropdown('id_sesi', $ddsesi, set_value('id_sesi')); ?>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('id_sesi')); ?></span>
                </div>
          </div>

          <div class="form-group row">
                <label for="nama_pjg" class="col-sm-2 col-form-label">Nama Pengunjung</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="nama_pjg" id="nama_pjg" value="<?php echo set_value('nama_pjg'); ?>" placeholder="Masukkan Nama Pengunjung">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('nama_pjg')); ?></span>
                </div>
                <label for="jenis_barang" class="col-sm-2 col-form-label">Jenis Barang</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="jenis_barang" id="jenis_barang" value="<?php echo set_value('jenis_barang'); ?>" placeholder="Makanan, Pakaian, dll">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('jenis_barang')); ?></span>
                </div>
          </div>

          <div class="form-group row">
                <label for="nik_pjg" class="col-sm-2 col-form-label">NIK</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="nik_pjg" id="nik_pjg" value="<?php echo set_value('nik_pjg'); ?>" placeholder="Masukkan NIK" pattern="[0-9]+" title="NIK harus berupa angka">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('nik_pjg')); ?></span>
                </div>
                <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-4">
                  <textarea class="form-control" name="keterangan" id="keterangan" value="<?php echo set_value('keterangan'); ?>" placeholder="Nasi, Baju, dll"></textarea>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('keterangan')); ?></span>
                </div>
          </div>

              <div class="form-group row">
                <label for="id_jk" class="col-sm-2 col-form-label">Pilih Jenis Kelamin</label>
                <div class="col-sm-4">
                  <?php echo form_dropdown('id_jk', $ddjenis_kelamin, set_value('id_jk')); ?>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('id_jk')); ?></span>
                </div>
                <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="jumlah" id="jumlah" value="<?php echo set_value('jumlah'); ?>" placeholder="Masukkan Jumlah Barang">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('jumlah')); ?></span>
                </div>
              </div>

              <div class="form-group row">
              <label for="id_tahanan" class="col-sm-2 col-form-label">Nama NAPI</label>
              <div class="col-sm-4">
                  <input type="text" class="form-control" name="id_tahanan" id="id_tahanan" value="<?php echo set_value('id_tahanan'); ?>" placeholder="Masukkan Nama NAPI">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('id_tahanan')); ?></span>
              </div>

                <label for="relasi" class="col-sm-2 col-form-label">Hubungan dengan NAPI</label>
                <div class="col-sm-4">
                  <?php echo form_dropdown('id_relasi', $ddrelasi, set_value('id_relasi')); ?>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('id_relasi')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="alamat_pjg" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-4">
                  <textarea class="form-control" name="alamat_pjg" id="alamat_pjg" value="<?php echo set_value('alamat_pjg'); ?>" placeholder="Masukkan Alamat"></textarea>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('alamat_pjg')); ?></span>
                </div>
                <label for="pengikut" class="col-sm-2 col-form-label">Keluarga Yang Ikut</label>
                <div class="col-sm-4">
                  <textarea class="form-control" name="pengikut" id="pengikut" value="<?php echo set_value('pengikut'); ?>" placeholder="Keluarga Maksimal 4"></textarea>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('pengikut')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="vaksin" class="col-sm-2 col-form-label">Vaksin</label>
                <div class="col-sm-4">
                  <input type="file" class="form-control" name="vaksin" >
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('vaksin')); ?></span>
                </div>
                <label for="kk" class="col-sm-2 col-form-label">Kartu Keluarga/Surat Kuasa</label>
                <div class="col-sm-4">
                  <input type="file" class="form-control" name="kk" >
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('kk')); ?></span>
                </div>
              </div>

          <div class="row">
            <div class="col-6">
              <button type="button" class="btn btn-danger btn-block" onclick="window.location.href='landing'">Kembali</button>
            </div>
            <!-- /.col -->

            <div class="col-6">
              <button type="submit" class="btn btn-success btn-block" onclick="return confirm('Yakin Ingin Mendaftar Kunjungan Tatap Muka?')">Daftar</button>
            </div>

            <!-- /.col -->
            
          </div>
        </form>

      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>assets/adminlte/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI -->
  <script src="<?php echo base_url(); ?>assets/adminlte/plugins/jquery-ui/jquery-ui.min.js">"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url(); ?>assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>assets/adminlte/dist/js/adminlte.min.js"></script>

<script type="text/javascript">
$(function() {
  $("#id_tahanan").autocomplete({
    source: function(request, response) {
      $.ajax({
        url: "<?php echo base_url('daftarkunjungan/get_autocomplete_data'); ?>",
        dataType: "json",
        data: {
          term: request.term
        },
        success: function(data) {
          response($.map(data, function(item) {
            return {
              label: item.nama_napi, // Label untuk opsi Autocomplete
              value: item.id_tahanan // Nilai yang akan diisi pada input saat opsi dipilih
            };
          }));
        }
      });
    },
    minLength: 1, // Minimal jumlah karakter yang harus diketik sebelum permintaan autocomplete dikirimkan
    select: function(event, ui) {
      // Menetapkan nilai input id_tahanan saat opsi dipilih
      $("#id_tahanan").val(ui.item.value);
      return false;
    }
  });
});
</script>
</body>

</html>