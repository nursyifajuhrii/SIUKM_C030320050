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

//==================================== MAHASISWA ====================================
else if ($page == 'mahasiswa') {
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
          <a href=<?php echo base_url("admin/mahasiswa_tambah") ?> class="btn btn-primary" style="margin-bottom:15px" m><i class="fas fa-plus"></i>
            Tambah Mahasiswa</a>
          <table id="datatable_01" class="table table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <?php 
            foreach ($mahasiswa as $d) : ?>
              <tr>
                <td><?php echo $d['id'] ?></td>
                <td><?php echo $d['nim'] ?></td>
                <td><?php echo $d['nama'] ?></td>
                <td><?php echo $d['tgl_lahir'] ?></td>
                <td><?php echo $d['alamat'] ?></td>
               
                <td>
                    <a href=<?php echo base_url("admin/mahasiswa_edit/").$d['id']; ?> > <i class="nav-icon fas fa-solid fa-pencil-alt"></i></a><br>
                    <a href=<?php echo base_url("admin/mahasiswa_detil/").$d['id']; ?> > <i class="nav-icon fas fa-solid fa-search-plus"></i></a><br>
                    <a href=<?php echo base_url("admin/mahasiswa_hapus/").$d['id']; ?> onclick="return confirm('Yakin menghapus : <?php echo $d['nama']; ?> ?');" ;> <i class="nav-icon fas fa-solid fa-trash-alt"></i></a>
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
else if ($page == 'mahasiswa_detil') {
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
            <dd class="col-sm-10"><?php echo $d['id']; ?></dd>
            <dt class="col-sm-2">NIM</dt>
            <dd class="col-sm-10"><?php echo $d['nim']; ?></dd>
            <dt class="col-sm-2">Nama</dt>
            <dd class="col-sm-10"><?php echo $d['nama']; ?></dd>
            <dt class="col-sm-2">Tanggal Lahir</dt>
            <dd class="col-sm-10"><?php echo $d['tgl_lahir']; ?></dd>
            <dt class="col-sm-2">alamat</dt>
            <dd class="col-sm-10"><?php echo $d['alamat']; ?></dd>
          </dl>

        </div>
      </div>
    </section>
  </div>
<?php
}

//--------------------------------- Tambah ---------------------------------
else if ($page == 'mahasiswa_tambah') {
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

          <form method="POST" action="<?php echo base_url('admin/mahasiswa_tambah'); ?>" class="form-horizontal">

            <div class="card-body">

              <div class="form-group row">
                <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nim" id="nim" value="<?php echo set_value('nim'); ?>" placeholder="Masukkan NIM">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('nim')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama" id="nama" value="<?php echo set_value('nama'); ?>" placeholder="Masukkan Nama">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('nama')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?php echo set_value('tgl_lahir'); ?>"></textarea>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('tgl_lahir')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="alamat" id="alamat" value="<?php echo set_value('alamat'); ?>" placeholder="Masukkan Alamat"></textarea>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('alamat')); ?></span>
                </div>
              </div>

            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Simpan</button>
            </div>
          </form>

        </div>
    </section>
  </div>
<?php
}

//--------------------------------- Edit ---------------------------------
else if ($page == 'mahasiswa_edit') {
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

          <form method="POST" action="<?php echo base_url('admin/mahasiswa_edit/'.$d['id']); ?>" class="form-horizontal">
            <div class="card-body">

              <div class="form-group row">
                <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nim" id="nim" value="<?php echo set_value('nim', $d['nim']); ?>" placeholder="Masukkan NIM">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('nim')); ?></span>
                </div>
              </div>
              
              <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama" id="nama" value="<?php echo set_value('nama', $d['nama']); ?>" placeholder="Masukkan Jam Selesai">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('nama')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?php echo set_value('tgl_lahir', $d['tgl_lahir']); ?>" placeholder="Masukkan Jam Selesai">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('tgl_lahir')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="alamat" id="alamat" value="<?php echo set_value('alamat', $d['alamat']); ?>" placeholder="Masukkan Alamat"></textarea>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('alamat')); ?></span>
                </div>
              </div>

            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Simpan</button>
            </div>
          </form>


        </div>
    </section>
  </div>
<?php
}

//==================================== MAHASISWA ====================================
else if ($page == 'ukm') {
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
          <a href=<?php echo base_url("admin/ukm_tambah") ?> class="btn btn-primary" style="margin-bottom:15px" m><i class="fas fa-plus"></i>
            Tambah UKM</a>
          <table id="datatable_01" class="table table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <?php 
            foreach ($ukm as $d) : ?>
              <tr>
                <td><?php echo $d['id_ukm'] ?></td>
                <td><?php echo $d['nama_ukm'] ?></td>
                <td><?php echo $d['deskripsi'] ?></td>
               
                <td>
                    <a href=<?php echo base_url("admin/ukm_edit/").$d['id_ukm']; ?> > <i class="nav-icon fas fa-solid fa-pencil-alt"></i></a><br>
                    <a href=<?php echo base_url("admin/ukm_detil/").$d['id_ukm']; ?> > <i class="nav-icon fas fa-solid fa-search-plus"></i></a><br>
                    <a href=<?php echo base_url("admin/ukm_hapus/").$d['id_ukm']; ?> onclick="return confirm('Yakin menghapus : <?php echo $d['nama_ukm']; ?> ?');" ;> <i class="nav-icon fas fa-solid fa-trash-alt"></i></a>
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
else if ($page == 'ukm_detil') {
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
            <dd class="col-sm-10"><?php echo $d['id_ukm']; ?></dd>
            <dt class="col-sm-2">Nama</dt>
            <dd class="col-sm-10"><?php echo $d['nama_ukm']; ?></dd>
            <dt class="col-sm-2">Deskripsi</dt>
            <dd class="col-sm-10"><?php echo $d['deskripsi']; ?></dd>
          </dl>

        </div>
      </div>
    </section>
  </div>
<?php
}

//--------------------------------- Tambah ---------------------------------
else if ($page == 'ukm_tambah') {
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

          <form method="POST" action="<?php echo base_url('admin/ukm_tambah'); ?>" class="form-horizontal">

            <div class="card-body">


              <div class="form-group row">
                <label for="nama_ukm" class="col-sm-2 col-form-label">Nama UKM</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama_ukm" id="nama_ukm" value="<?php echo set_value('nama_ukm'); ?>" placeholder="Masukkan nama_ukm">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('nama_ukm')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="<?php echo set_value('deskripsi'); ?>" placeholder="Masukkan deskripsi">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('deskripsi')); ?></span>
                </div>
              </div>

            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Simpan</button>
            </div>
          </form>

        </div>
    </section>
  </div>
<?php
}

//--------------------------------- Edit ---------------------------------
else if ($page == 'ukm_edit') {
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

          <form method="POST" action="<?php echo base_url('admin/ukm_edit/'.$d['id_ukm']); ?>" class="form-horizontal">
            <div class="card-body">

              <div class="form-group row">
                <label for="nama_ukm" class="col-sm-2 col-form-label">Nama UKM</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama_ukm" id="nama_ukm" value="<?php echo set_value('nama_ukm', $d['nama_ukm']); ?>" placeholder="Masukkan nama_ukm">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('nama_ukm')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="<?php echo set_value('deskripsi', $d['deskripsi']); ?>" placeholder="Masukkan deskripsi">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('deskripsi')); ?></span>
                </div>
              </div>

              
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Simpan</button>
            </div>
          </form>


        </div>
    </section>
  </div>
<?php
}



//==================================== ANGGOTA ====================================
else if ($page == 'anggota') {
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
          <a href=<?php echo base_url("admin/anggota_tambah") ?> class="btn btn-primary" style="margin-bottom:15px" m><i class="fas fa-plus"></i>
            Daftar Anggota</a>
          <table id="datatable_01" class="table table-bordered">
            <thead>
              <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>UKM</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <?php 
            foreach ($anggota as $d) : ?>
              <tr>
                <td><?php echo $d['nim'] ?></td>
                <td><?php echo $d['nama'] ?></td>
                <td><?php echo $d['nama_ukm'] ?></td>
               
                <td>
                    <a href=<?php echo base_url("admin/anggota_hapus/").$d['id_anggota']; ?> onclick="return confirm('Yakin Keluarkan : <?php echo $d['nama_ukm']; ?> ?');" ;> <i><u>Keluarkan</u></i></a>
                </td>
              </tr>
            <?php endforeach; ?>
          </table>

        </div>
    </section>
  </div>

<?php
}

//--------------------------------- Tambah ---------------------------------
else if ($page == 'anggota_tambah') {
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

          <form method="POST" action="<?php echo base_url('admin/anggota_tambah'); ?>" class="form-horizontal">

            <div class="card-body">


              <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <?php echo form_dropdown('id', $ddmahasiswa, set_value('id')); ?>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('id')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="id_ukm" class="col-sm-2 col-form-label">UKM</label>
                <div class="col-sm-10">
                  <?php echo form_dropdown('id_ukm', $ddukm, set_value('id_ukm')); ?>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('id_ukm')); ?></span>
                </div>
              </div>


            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Simpan</button>
            </div>
          </form>

        </div>
    </section>
  </div>
<?php
}

//==================================== PEGAWAI ====================================
else if ($page == 'pegawai') {
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
          <a href=<?php echo base_url("admin/pegawai_tambah") ?> class="btn btn-primary" style="margin-bottom:15px" m><i class="fas fa-plus"></i>
            Tambah Pegawai</a>
          <table id="datatable_01" class="table table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>JK</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Role</th>
                <th>Foto</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <?php 
            foreach ($pegawai as $d) : ?>
              <tr>
                <td><?php echo $d['id_pegawai'] ?></td>
                <td><?php echo $d['nama_pgw'] ?></td>
                <td><?php echo $d['ket'] ?></td>
                <td><?php echo $d['alamat_pgw'] ?></td>
                <td><?php echo $d['email_pgw'] ?></td>
                <td><?php echo $d['telp_pgw'] ?></td>
                <td><?php echo $d['nama_role'] ?></td>
                <td><img width=100 src="<?php echo base_url().'assets/foto/'.$d['foto']?>"></td>
                <td>
                    <a href=<?php echo base_url("admin/pegawai_edit/").$d['id_pegawai']; ?> > <i class="nav-icon fas fa-solid fa-pencil-alt"></i></a><br>
                    <a href=<?php echo base_url("admin/pegawai_detil/").$d['id_pegawai']; ?> > <i class="nav-icon fas fa-solid fa-search-plus"></i></a><br>
                    <a href=<?php echo base_url("admin/pegawai_hapus/").$d['id_pegawai']; ?> onclick="return confirm('Yakin menghapus Pegawai : <?php echo $d['nama_pgw']; ?> ?');" ;> <i class="nav-icon fas fa-solid fa-trash-alt"></i></a>
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
else if ($page == 'pegawai_detil') {
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
            <dt class="col-sm-2">Id Pegawai</dt>
            <dd class="col-sm-10"><?php echo $d['id_pegawai']; ?></dd>
            <dt class="col-sm-2">Nama Pegawai</dt>
            <dd class="col-sm-10"><?php echo $d['nama_pgw']; ?></dd>
            <dt class="col-sm-2">Jabatan</dt>
            <dd class="col-sm-10"><?php echo $d['jabatan']; ?></dd>
            <dt class="col-sm-2">Jenis Kelamin</dt>
            <dd class="col-sm-10"><?php echo $d['ket']; ?></dd>
            <dt class="col-sm-2">Alamat</dt>
            <dd class="col-sm-10"><?php echo $d['alamat_pgw']; ?></dd>
            <dt class="col-sm-2">Email</dt>
            <dd class="col-sm-10"><?php echo $d['email_pgw']; ?></dd>
            <dt class="col-sm-2">Username</dt>
            <dd class="col-sm-10"><?php echo $d['username']; ?></dd>
            <dt class="col-sm-2">Password</dt>
            <dd class="col-sm-10"><?php echo $d['password']; ?></dd>
            <dt class="col-sm-2">Telepon</dt>
            <dd class="col-sm-10"><?php echo $d['telp_pgw']; ?></dd>
            <dt class="col-sm-2">Role</dt>
            <dd class="col-sm-10"><?php echo $d['nama_role']; ?></dd>
            <dt class="col-sm-2">Foto</dt>
            <dd class="col-sm-10"><img width=100 src="<?php echo base_url().'assets/foto/'.$d['foto']?>"></dd>
          </dl>

        </div>
      </div>
    </section>
  </div>
<?php

  //--------------------------------- Tambah ---------------------------------
} else if ($page == 'pegawai_tambah') {
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

          <form method="POST" action="<?php echo base_url('admin/pegawai_tambah'); ?>" class="form-horizontal" enctype="multipart/form-data">

            <div class="card-body">

              <div class="form-group row">
                <label for="nama_pgw" class="col-sm-2 col-form-label">Nama Pegawai</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama_pgw" id="nama_pgw" value="<?php echo set_value('nama_pgw'); ?>" placeholder="Masukkan Nama Pegawai">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('nama_pgw')); ?></span>
                </div>
              </div>
              
              <div class="form-group row">
                <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="jabatan" id="jabatan" value="<?php echo set_value('jabatan'); ?>" placeholder="Masukkan Jabatan">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('jabatan')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="id_jk" class="col-sm-2 col-form-label">Pilih Jenis Kelamin</label>
                <div class="col-sm-10">
                  <?php echo form_dropdown('id_jk', $ddjenis_kelamin, set_value('id_jk')); ?>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('id_jk')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="alamat_pgw" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="alamat_pgw" id="alamat_pgw" value="<?php echo set_value('alamat_pgw'); ?>" placeholder="Masukkan Alamat"></textarea>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('alamat_pgw')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="email_pgw" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="email_pgw" id="email_pgw" value="<?php echo set_value('email_pgw'); ?>" placeholder="Masukkan Email">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('email_pgw')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="username" id="username" value="<?php echo set_value('username'); ?>" placeholder="Masukkan Username">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('username')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="password" id="password" value="" placeholder="Masukkan Password">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('password')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="telp_pgw" class="col-sm-2 col-form-label">Telepon</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="telp_pgw" id="telp_pgw" value="<?php echo set_value('telp_pgw'); ?>" placeholder="Masukkan Telepon">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('telp_pgw')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="id_role" class="col-sm-2 col-form-label">Pilih Role</label>
                <div class="col-sm-10">
                  <?php echo form_dropdown('id_role', $ddrole, set_value('id_role')); ?>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('id_role')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" name="foto" >
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('foto')); ?></span>
                </div>
              </div>

            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Simpan</button>
            </div>
          </form>


        </div>
    </section>
  </div>
<?php
}

  //--------------------------------- Edit ---------------------------------
else if ($page == 'pegawai_edit') {
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

          <form method="POST" action="<?php echo base_url('admin/pegawai_edit/'.$d['id_pegawai']); ?>" class="form-horizontal" enctype="multipart/form-data">
            <div class="card-body">

              <div class="form-group row">
                <label for="nama_santri" class="col-sm-2 col-form-label">Nama Pegawai</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama_pgw" id="nama_pgw" value="<?php echo set_value('nama_pgw', $d['nama_pgw']); ?>" placeholder="Masukkan Nama Pegawai">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('nama_pgw')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="nama_alias" class="col-sm-2 col-form-label">Jabatan</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="jabatan" id="jabatan" value="<?php echo set_value('jabatan', $d['jabatan']); ?>" placeholder="Masukkan Jabatan">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('jabatan')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="id_jk" class="col-sm-2 col-form-label">Pilih Jenis Kelamin</label>
                <div class="col-sm-10">
                  <?php echo form_dropdown('id_jk', $ddjenis_kelamin, set_value('id_jk', $d['id_jk'])); ?>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('id_jk')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="alamat_pgw" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="alamat_pgw" id="alamat_pgw" value="<?php echo set_value('alamat_pgw', $d['alamat_pgw']); ?>" placeholder="Masukkan Alamat"></textarea>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('alamat_pgw')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="email_pgw" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="email_pgw" id="email_pgw" value="<?php echo set_value('email_pgw', $d['email_pgw']); ?>" placeholder="Masukkan Email">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('email_pgw')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="username" id="username" value="<?php echo set_value('username', $d['username']); ?>" placeholder="Masukkan Username">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('username')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="password" id="password" value="" placeholder="Masukkan Password">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('password')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="telp_pgw" class="col-sm-2 col-form-label">Telepon</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="telp_pgw" id="telp_pgw" value="<?php echo set_value('telp_pgw', $d['telp_pgw']); ?>" placeholder="Masukkan Telepon">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('telp_pgw')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="id_role" class="col-sm-2 col-form-label">Pilih Role</label>
                <div class="col-sm-10">
                  <?php echo form_dropdown('id_role', $ddrole, set_value('id_role', $d['id_role'])); ?>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('id_role')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" name="foto" id="foto" value="<?php echo set_value('foto', $d['foto']); ?>" placeholder="Upload Foto">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('foto')); ?></span>
                </div>
              </div>

            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Simpan</button>
            </div>
          </form>


        </div>
    </section>
  </div>
<?php
}

//=============================== NARAPIDANA ===============================
else if ($page == 'napi') {
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
          <a href=<?php echo base_url("admin/napi_tambah") ?> class="btn btn-primary" style="margin-bottom:15px" m><i class="fas fa-plus"></i>
            Tambah Narapidana</a>
          <table id="datatable_01" class="table table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>JK</th>
                <th>Ruangan</th>
                <th>Kasus</th>
                <th>Foto</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <?php 
            foreach ($napi as $n) : ?>
              <tr>
                <td><?php echo $n['id_tahanan'] ?></td>
                <td><?php echo $n['nik_napi'] ?></td>
                <td><?php echo $n['nama_napi'] ?></td>
                <td><?php echo $n['ket'] ?></td>
                <td><?php echo $n['ruangan'] ?></td>
                <td><?php echo $n['kasus'] ?></td>
                <td><img width=100 src="<?php echo base_url().'assets/foto/napi/'.$n['foto_napi']?>"></td>
                <td>
                    <a href=<?php echo base_url("admin/napi_edit/").$n['id_tahanan']; ?> > <i class="nav-icon fas fa-solid fa-pencil-alt"></i></a><br>
                    <a href=<?php echo base_url("admin/napi_detil/").$n['id_tahanan']; ?> > <i class="nav-icon fas fa-solid fa-search-plus"></i></a><br>
                    <a href=<?php echo base_url("admin/napi_hapus/").$n['id_tahanan']; ?> onclick="return confirm('Yakin menghapus Napi : <?php echo $n['nama_napi']; ?> ?');" ;> <i class="nav-icon fas fa-solid fa-trash-alt"></i></a>
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
else if ($page == 'napi_detil') {
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
            <dt class="col-sm-2">ID Tahanan</dt>
            <dd class="col-sm-10"><?php echo $d['id_tahanan']; ?></dd>
            <dt class="col-sm-2">NIK NAPI</dt>
            <dd class="col-sm-10"><?php echo $d['nik_napi']; ?></dd>
            <dt class="col-sm-2">Nama</dt>
            <dd class="col-sm-10"><?php echo $d['nama_napi']; ?></dd>
            <dt class="col-sm-2">Jenis Kelamin</dt>
            <dd class="col-sm-10"><?php echo $d['ket']; ?></dd>
            <dt class="col-sm-2">Tanggal Masuk</dt>
            <dd class="col-sm-10"><?php echo $d['tgl_masuk']; ?></dd>
            <dt class="col-sm-2">Tanggal Keluar</dt>
            <dd class="col-sm-10"><?php echo $d['tgl_keluar']; ?></dd>
            <dt class="col-sm-2">Ruangan</dt>
            <dd class="col-sm-10"><?php echo $d['ruangan']; ?></dd>
            <dt class="col-sm-2">Kasus</dt>
            <dd class="col-sm-10"><?php echo $d['kasus']; ?></dd>
            <dt class="col-sm-2">Foto</dt>
            <dd class="col-sm-10"><img width=100 src="<?php echo base_url().'assets/foto/napi/'.$d['foto_napi']?>"></dd>
          </dl>

        </div>
      </div>
    </section>
  </div>
<?php
}

 //--------------------------------- Tambah ---------------------------------
else if ($page == 'napi_tambah') {
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

          <form method="POST" action="<?php echo base_url('admin/napi_tambah'); ?>" class="form-horizontal" enctype="multipart/form-data">

            <div class="card-body">

              <div class="form-group row">
                <label for="nik_napi" class="col-sm-2 col-form-label">NIK NAPI</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nik_napi" id="nik_napi" value="<?php echo set_value('nik_napi'); ?>" placeholder="Masukkan NIK NAPI" pattern="[0-9]+" title="NIK harus berupa angka">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('nik_napi')); ?></span>
                </div>
              </div>
              
              <div class="form-group row">
                <label for="nama_napi" class="col-sm-2 col-form-label">Nama </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama_napi" id="nama_napi" value="<?php echo set_value('nama_napi'); ?>" placeholder="Masukkan Nama NAPI">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('nama_napi')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="id_jk" class="col-sm-2 col-form-label">Pilih Jenis Kelamin</label>
                <div class="col-sm-10">
                  <?php echo form_dropdown('id_jk', $ddjenis_kelamin, set_value('id_jk')); ?>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('id_jk')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="tgl_masuk" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" name="tgl_masuk" id="tgl_masuk" value="<?php echo set_value('tgl_masuk'); ?>" placeholder="Masukkan Alamat"></textarea>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('tgl_masuk')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="tgl_keluar" class="col-sm-2 col-form-label">Tanggal Keluar</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" name="tgl_keluar" id="tgl_keluar" value="<?php echo set_value('tgl_keluar'); ?>" placeholder="Masukkkan Alamat"></input>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('tgl_keluar')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="email_pgw" class="col-sm-2 col-form-label">Ruangan</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="ruangan" id="ruangan" value="<?php echo set_value('ruangan'); ?>" placeholder="Masukkan Ruangan">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('ruangan')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="kasus" class="col-sm-2 col-form-label">Kasus</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="kasus" id="kasus" value="<?php echo set_value('kasus'); ?>" placeholder="Masukkan kasus">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('kasus')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="foto_napi" class="col-sm-2 col-form-label">Foto Napi</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" name="foto_napi" >
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('foto_napi')); ?></span>
                </div>
              </div>

            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Simpan</button>
            </div>
          </form>

        </div>
    </section>
  </div>
<?php
}

  //--------------------------------- Edit ---------------------------------
else if ($page == 'napi_edit') {
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

          <form method="POST" action="<?php echo base_url('admin/napi_edit/'.$d['id_tahanan']); ?>" class="form-horizontal" enctype="multipart/form-data">
            <div class="card-body">

              <div class="form-group row">
                <label for="nik_napi" class="col-sm-2 col-form-label">NIK NAPI</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nik_napi" id="nik_napi" value="<?php echo set_value('nik_napi', $d['nik_napi']); ?>" placeholder="Masukkan NIK NAPI" pattern="[0-9]+" title="NIK harus berupa angka">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('nik_napi')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="nama_napi" class="col-sm-2 col-form-label">Nama </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama_napi" id="nama_napi" value="<?php echo set_value('nama_napi', $d['nama_napi']); ?>" placeholder="Masukkan Nama NAPI">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('nama_napi')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="id_jk" class="col-sm-2 col-form-label">Pilih Jenis Kelamin</label>
                <div class="col-sm-10">
                  <?php echo form_dropdown('id_jk', $ddjenis_kelamin, set_value('id_jk', $d['id_jk'])); ?>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('id_jk')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="tgl_masuk" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" name="tgl_masuk" id="tgl_masuk" value="<?php echo set_value('tgl_masuk', $d['tgl_masuk']); ?>" placeholder="Masukkan Alamat"></textarea>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('tgl_masuk')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="tgl_keluar" class="col-sm-2 col-form-label">Tanggal Keluar</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" name="tgl_keluar" id="tgl_keluar" value="<?php echo set_value('tgl_keluar', $d['tgl_keluar']); ?>" placeholder="Masukkkan Alamat"></input>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('tgl_keluar')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="email_pgw" class="col-sm-2 col-form-label">Ruangan</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="ruangan" id="ruangan" value="<?php echo set_value('ruangan', $d['ruangan']); ?>" placeholder="Masukkan Ruangan">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('ruangan')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="kasus" class="col-sm-2 col-form-label">Kasus</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="kasus" id="kasus" value="<?php echo set_value('kasus',$d['kasus']); ?>" placeholder="Masukkan kasus">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('kasus')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="foto_napi" class="col-sm-2 col-form-label">Foto Napi</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" name="foto_napi" id="foto_napi" value="<?php echo set_value('foto_napi', $d['foto_napi']); ?>" placeholder="Upload Foto">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('foto_napi')); ?></span>
                </div>
              </div>

            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Simpan</button>
            </div>
          </form>


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
          <a href=<?php echo base_url("admin/barang_tambah") ?> class="btn btn-primary" style="margin-bottom:15px" m><i class="fas fa-plus"></i>
            Tambah Barang</a>
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
                    <a href=<?php echo base_url("admin/barang_edit/").$b['id_barang']; ?> > <i class="nav-icon fas fa-solid fa-pencil-alt"></i></a><br>
                    <a href=<?php echo base_url("admin/barang_detil/").$b['id_barang']; ?> > <i class="nav-icon fas fa-solid fa-search-plus"></i></a><br>
                    <a href=<?php echo base_url("admin/barang_hapus/").$b['id_barang']; ?> onclick="return confirm('Yakin menghapus Barang Milik <?php echo $b['nama_napi']; ?> ?');" ;> <i class="nav-icon fas fa-solid fa-trash-alt"></i></a>
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

 //--------------------------------- Tambah ---------------------------------
else if ($page == 'barang_tambah') {
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

          <form method="POST" action="<?php echo base_url('admin/barang_tambah'); ?>" class="form-horizontal">

            <div class="card-body">

              <div class="form-group row">
                <label for="id_tahanan" class="col-sm-2 col-form-label">Nama NAPI</label>
                <div class="col-sm-10">
                  <?php echo form_dropdown('id_tahanan', $ddnapi, set_value('id_tahanan')); ?>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('id_tahanan')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="id_tahanan" class="col-sm-2 col-form-label">Nama Pengunjung</label>
                <div class="col-sm-10">
                  <?php echo form_dropdown('id_pengunjung', $ddpjg, set_value('id_pengunjung')); ?>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('id_pengunjung')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="jenis_barang" class="col-sm-2 col-form-label">Jenis Barang</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="jenis_barang" id="jenis_barang" value="<?php echo set_value('jenis_barang'); ?>" placeholder="Masukkan Jenis Barang">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('jenis_barang')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="keterangan" id="keterangan" value="<?php echo set_value('keterangan'); ?>" placeholder="Masukkan Keterangan"></textarea>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('keterangan')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="jumlah" id="jumlah" value="<?php echo set_value('jumlah'); ?>" placeholder="Masukkan Jumlah Barang">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('jumlah')); ?></span>
                </div>
              </div>

            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Simpan</button>
            </div>
          </form>

        </div>
    </section>
  </div>
<?php
}

//--------------------------------- Edit ---------------------------------
else if ($page == 'barang_edit') {
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

          <form method="POST" action="<?php echo base_url('admin/barang_edit/'.$d['id_barang']); ?>" class="form-horizontal">
            <div class="card-body">


              <div class="form-group row">
                <label for="id_tahanan" class="col-sm-2 col-form-label">Nama NAPI</label>
                <div class="col-sm-10">
                  <?php echo form_dropdown('id_tahanan', $ddnapi, set_value('id_tahanan',$d['id_tahanan'])); ?>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('id_tahanan')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="id_tahanan" class="col-sm-2 col-form-label">Nama Pengunjung</label>
                <div class="col-sm-10">
                  <?php echo form_dropdown('id_pengunjung', $ddpjg, set_value('id_pengunjung',$d['id_pengunjung'])); ?>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('id_pengunjung')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="jenis_barang" class="col-sm-2 col-form-label">Jenis Barang</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="jenis_barang" id="jenis_barang" value="<?php echo set_value('jenis_barang', $d['jenis_barang']); ?>" placeholder="Masukkan Jenis Barang">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('jenis_barang')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="keterangan" id="keterangan" value="<?php echo set_value('keterangan', $d['keterangan']); ?>" placeholder="Masukkan Keterangan"></textarea>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('keterangan')); ?></span>
                </div>
              </div>
              
              <div class="form-group row">
                <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="jumlah" id="jumlah" value="<?php echo set_value('jumlah', $d['jumlah']); ?>" placeholder="Masukkan Jumlah Barang">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('jumlah')); ?></span>
                </div>
              </div>

            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Simpan</button>
            </div>
          </form>


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
          <a href=<?php echo base_url("admin/pengunjung_tambah") ?> class="btn btn-primary" style="margin-bottom:15px" m><i class="fas fa-plus"></i>
            Tambah Pengunjung</a>
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
                    <a href=<?php echo base_url("admin/pengunjung_edit/").$b['id_pengunjung']; ?> > <i class="nav-icon fas fa-solid fa-pencil-alt"></i></a><br>
                    <a href=<?php echo base_url("admin/pengunjung_detil/").$b['id_pengunjung']; ?> > <i class="nav-icon fas fa-solid fa-search-plus"></i></a><br>
                    <a href=<?php echo base_url("admin/pengunjung_hapus/").$b['id_pengunjung']; ?> onclick="return confirm('Yakin menghapus Pengunjung <?php echo $b['nama_pjg']; ?> ?');" ;> <i class="nav-icon fas fa-solid fa-trash-alt"></i></a>
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

//--------------------------------- Tambah ---------------------------------
else if ($page == 'pengunjung_tambah') {
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

          <form method="POST" action="<?php echo base_url('admin/pengunjung_tambah'); ?>" class="form-horizontal" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-group row">
                <label for="nama_pjg" class="col-sm-2 col-form-label">Nama Pengunjung</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama_pjg" id="nama_pjg" value="<?php echo set_value('nama_pjg'); ?>" placeholder="Masukkan Nama Pengunjung">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('nama_pjg')); ?></span>
                </div>
              </div>
              
              <div class="form-group row">
                <label for="nik_pjg" class="col-sm-2 col-form-label">NIK</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nik_pjg" id="nik_pjg" value="<?php echo set_value('nik_pjg'); ?>" placeholder="Masukkan NIK">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('nik_pjg')); ?></span>
                </div>
              </div>


              <div class="form-group row">
                <label for="id_jk" class="col-sm-2 col-form-label">Pilih Jenis Kelamin</label>
                <div class="col-sm-10">
                  <?php echo form_dropdown('id_jk', $ddjenis_kelamin, set_value('id_jk')); ?>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('id_jk')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="id_tahanan" class="col-sm-2 col-form-label">Nama NAPI</label>
                <div class="col-sm-10">
                  <?php echo form_dropdown('id_tahanan', $ddnapi, set_value('id_tahanan')); ?>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('id_tahanan')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="alamat_pjg" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="alamat_pjg" id="alamat_pjg" value="<?php echo set_value('alamat_pjg'); ?>" placeholder="Masukkan Alamat"></textarea>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('alamat_pjg')); ?></span>
                </div>
              </div>
                          
              <div class="form-group row">
                <label for="relasi" class="col-sm-2 col-form-label">Hubungan dengan NAPI</label>
                <div class="col-sm-10">
                  <?php echo form_dropdown('id_relasi', $ddrelasi, set_value('id_relasi')); ?>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('id_relasi')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="pengikut" class="col-sm-2 col-form-label">Keluarga Yang Ikut</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="pengikut" id="pengikut" value="<?php echo set_value('pengikut'); ?>" placeholder="Keluarga Maksimal 4"></textarea>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('pengikut')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="vaksin" class="col-sm-2 col-form-label">Vaksin</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" name="vaksin" >
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('vaksin')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="kk" class="col-sm-2 col-form-label">Kartu Keluarga/Surat Kuasa</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" name="kk" >
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('kk')); ?></span>
                </div>
              </div>

            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Simpan</button>
            </div>
          </form>


        </div>
    </section>
  </div>
<?php
}

//--------------------------------- Edit ---------------------------------
else if ($page == 'pengunjung_edit') {
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

          <form method="POST" action="<?php echo base_url('admin/pengunjung_edit/'.$d['id_pengunjung']); ?>" class="form-horizontal" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-group row">
                <label for="nama_pjg" class="col-sm-2 col-form-label">Nama Pengunjung</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama_pjg" id="nama_pjg" value="<?php echo set_value('nama_pjg', $d['nama_pjg']); ?>" placeholder="Masukkan Nama Pengunjung">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('nama_pjg')); ?></span>
                </div>
              </div>
              
              <div class="form-group row">
                <label for="nik_pjg" class="col-sm-2 col-form-label">NIK</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nik_pjg" id="nik_pjg" value="<?php echo set_value('nik_pjg', $d['nik_pjg']); ?>" placeholder="Masukkan NIK">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('nik_pjg')); ?></span>
                </div>
              </div>


              <div class="form-group row">
                <label for="id_jk" class="col-sm-2 col-form-label">Pilih Jenis Kelamin</label>
                <div class="col-sm-10">
                  <?php echo form_dropdown('id_jk', $ddjenis_kelamin, set_value('id_jk', $d['id_jk'])); ?>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('id_jk')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="id_tahanan" class="col-sm-2 col-form-label">Nama NAPI</label>
                <div class="col-sm-10">
                  <?php echo form_dropdown('id_tahanan', $ddnapi, set_value('id_tahanan', $d['id_tahanan'])); ?>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('id_tahanan')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="alamat_pjg" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="alamat_pjg" id="alamat_pjg" value="<?php echo set_value('alamat_pjg', $d['alamat_pjg']); ?>" placeholder="Masukkan Alamat"></textarea>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('alamat_pjg')); ?></span>
                </div>
              </div>
                          
              <div class="form-group row">
                <label for="relasi" class="col-sm-2 col-form-label">Hubungan dengan NAPI</label>
                <div class="col-sm-10">
                  <?php echo form_dropdown('id_relasi', $ddrelasi, set_value('id_relasi', $d['id_relasi'])); ?>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('id_relasi')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="pengikut" class="col-sm-2 col-form-label">Keluarga Yang Ikut</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="pengikut" id="pengikut" value="<?php echo set_value('pengikut', $d['pengikut']); ?>" placeholder="Keluarga Maksimal 4"></textarea>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('pengikut')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="vaksin" class="col-sm-2 col-form-label">Vaksin</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" name="vaksin" id="vaksin" value="<?php echo set_value('vaksin', $d['vaksin']); ?>">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('vaksin')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="kk" class="col-sm-2 col-form-label">Kartu Keluarga/Surat Kuasa</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" name="kk" id="kk" value="<?php echo set_value('kk', $d['kk']); ?>">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('kk')); ?></span>
                </div>
              </div>

            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Simpan</button>
            </div>
          </form>


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
          <a href=<?php echo base_url("admin/sesi_tambah") ?> class="btn btn-primary" style="margin-bottom:15px" m><i class="fas fa-plus"></i>
            Tambah Sesi</a>
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
                    <a href=<?php echo base_url("admin/sesi_edit/").$b['id_sesi']; ?> > <i class="nav-icon fas fa-solid fa-pencil-alt"></i></a><br>
                    <a href=<?php echo base_url("admin/sesi_detil/").$b['id_sesi']; ?> > <i class="nav-icon fas fa-solid fa-search-plus"></i></a><br>
                    <a href=<?php echo base_url("admin/sesi_hapus/").$b['id_sesi']; ?> onclick="return confirm('Yakin menghapus Sesi <?php echo $b['id_sesi']; ?> ?');" ;> <i class="nav-icon fas fa-solid fa-trash-alt"></i></a>
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

 //--------------------------------- Tambah ---------------------------------
else if ($page == 'sesi_tambah') {
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

          <form method="POST" action="<?php echo base_url('admin/sesi_tambah'); ?>" class="form-horizontal">

            <div class="card-body">

              <div class="form-group row">
                <label for="jam_mulai" class="col-sm-2 col-form-label">Jam Mulai</label>
                <div class="col-sm-10">
                  <input type="time" class="form-control" name="jam_mulai" id="jam_mulai" value="<?php echo set_value('jam_mulai'); ?>" placeholder="Masukkan Jam Mulai">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('jam_mulai')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="jam_selesai" class="col-sm-2 col-form-label">Jam Selesai</label>
                <div class="col-sm-10">
                  <input type="time" class="form-control" name="jam_selesai" id="jam_selesai" value="<?php echo set_value('jam_selesai'); ?>" placeholder="Masukkan Jam elesai">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('jam_selesai')); ?></span>
                </div>
              </div>

            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Simpan</button>
            </div>
          </form>

        </div>
    </section>
  </div>
<?php
}

//--------------------------------- Edit ---------------------------------
else if ($page == 'sesi_edit') {
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

          <form method="POST" action="<?php echo base_url('admin/sesi_edit/'.$d['id_sesi']); ?>" class="form-horizontal">
            <div class="card-body">

              <div class="form-group row">
                <label for="keterangan" class="col-sm-2 col-form-label">Jam Mulai</label>
                <div class="col-sm-10">
                  <input type="time" class="form-control" name="jam_mulai" id="jam_mulai" value="<?php echo set_value('jam_mulai', $d['jam_mulai']); ?>" placeholder="Masukkan Jam Mulai">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('jam_mulai')); ?></span>
                </div>
              </div>
              
              <div class="form-group row">
                <label for="jumlah" class="col-sm-2 col-form-label">Jam Selesai</label>
                <div class="col-sm-10">
                  <input type="time" class="form-control" name="jam_selesai" id="jam_selesai" value="<?php echo set_value('jam_selesai', $d['jam_selesai']); ?>" placeholder="Masukkan Jam Selesai">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('jam_selesai')); ?></span>
                </div>
              </div>

            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Simpan</button>
            </div>
          </form>


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
          <a href=<?php echo base_url("admin/kunjungan_tambah") ?> class="btn btn-primary" style="margin-bottom:15px" m><i class="fas fa-plus"></i>
            Tambah Kunjungan</a>
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
                    <a href=<?php echo base_url("admin/kunjungan_edit/").$b['id_kunjungan']; ?> > <i class="nav-icon fas fa-solid fa-pencil-alt"></i></a><br>
                    <a href=<?php echo base_url("admin/kunjungan_detil/").$b['id_kunjungan']; ?> > <i class="nav-icon fas fa-solid fa-search-plus"></i></a><br>
                    <a href=<?php echo base_url("admin/kunjungan_hapus/").$b['id_kunjungan']; ?> onclick="return confirm('Yakin menghapus kunjungan <?php echo $b['id_kunjungan']; ?> ?');" ;> <i class="nav-icon fas fa-solid fa-trash-alt"></i></a>
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
 //--------------------------------- Tambah ---------------------------------
else if ($page == 'kunjungan_tambah') {
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

          <form method="POST" action="<?php echo base_url('admin/kunjungan_tambah'); ?>" class="form-horizontal" enctype="multipart/form-data">

            <div class="card-body">

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
                  <?php echo form_dropdown('id_jk', $ddjk, set_value('id_jk')); ?>
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
                  <?php echo form_dropdown('id_tahanan', $ddnapi, set_value('id_tahanan')); ?>
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

            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Simpan</button>
            </div>
          </form>

        </div>
    </section>
  </div>
<?php
}

//--------------------------------- Edit ---------------------------------
else if ($page == 'kunjungan_edit') {
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

          <form method="POST" action="<?php echo base_url('admin/kunjungan_edit/'.$d['id_kunjungan']);?>" class="form-horizontal">

            <div class="card-body">

              <div class="form-group row">
                <label for="tgl_kunjungan" class="col-sm-2 col-form-label">Tanggal Kunjungan</label>
                <div class="col-sm-4">
                  <input type="date" name="tgl_kunjungan" id="tgl_kunjungan" value="<?php echo set_value('tgl_kunjungan', $d['tgl_kunjungan']); ?>">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('tgl_kunjungan')); ?></span>
                </div>
                <label for="sesi" class="col-sm-2 col-form-label">Sesi</label>
                <div class="col-sm-4">
                  <?php echo form_dropdown('id_sesi', $ddsesi, set_value('id_sesi', $d['id_sesi'])); ?>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('id_sesi')); ?></span>
                </div>
            </div>

            <div class="form-group row">
                <label for="id_pengunjung" class="col-sm-2 col-form-label">Nama Pengunjung</label>
                <div class="col-sm-4">
                  <?php echo form_dropdown('id_pengunjung', $ddpjg, set_value('id_pengunjung', $d['id_pengunjung'])); ?>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('id_pengunjung')); ?></span>
                </div>
            </div>

            <div class="form-group row">
                <label for="id_status" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-4">
                  <?php echo form_dropdown('id_status', $ddstatus, set_value('id_status', $d['id_status'])); ?>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('id_status')); ?></span>
                </div>
                <label for="no_antrian" class="col-sm-2 col-form-label">Antrian</label>
                <div class="col-sm-4">
                  <input type="text" name="no_antrian" id="no_antrian" value="<?php echo set_value('no_antrian', $d['no_antrian']); ?>">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('no_antrian')); ?></span>
                </div>
            </div>

            <div class="form-group row">
                <label for="jam_mulai" class="col-sm-2 col-form-label">Jam Mulai</label>
                <div class="col-sm-4">
                  <input type="time" class="form-control" name="jam_mulai" id="jam_mulai" value="<?php echo set_value('jam_mulai', $d['jam_mulai']); ?>" placeholder="Masukkan Jam Mulai">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('jam_mulai')); ?></span>
                </div>
                <label for="jam_selesai" class="col-sm-2 col-form-label">Jam Selesai</label>
                <div class="col-sm-4">
                  <input type="time" class="form-control" name="jam_selesai" id="jam_selesai" value="<?php echo set_value('jam_selesai', $d['jam_selesai']); ?>" placeholder="Masukkan Jam Selesai">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('jam_selesai')); ?></span>
                </div>
              </div>

            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Simpan</button>
            </div>
          </form>

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
                      }); 
                    }, 700); // Jeda 2 detik sebelum memutar suara nomor antrian belas
                  } else {
                    audioNomorAntrian.play();
                    setTimeout(function() {
                      document.getElementById('waktuHabis').play();
                    }); 
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

            <form method="POST" action="<?php echo base_url('admin/cetaklaporan')?>">
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
                  $this->m_admin->dt_cetlap($bulantahun);
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