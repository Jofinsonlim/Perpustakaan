<style>
/* CSS untuk mengatur tampilan card */
.custom-card {
  border: 1px solid #ccc;
  border-radius: 15px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  padding: 20px;
  margin-top: 20px;
}

/* CSS untuk mengatur tombol Tambah */
.custom-add-button {
  margin-bottom: 20px;
}

/* CSS untuk mengatur tabel */
.custom-table {
  /* Tambahkan properti CSS sesuai keinginan Anda */
}
</style>

<div class="col-lg-12">
<div class="card custom-card"> <!-- Tambahkan kelas "custom-card" di sini -->
  <div class="card-body">
    <a href="<?= base_url('/home/tambah_pegawaian/')?>"><button class="btn btn-success"><i class="fa fa-plus"></i>Tambah</button></a>
  </a>
  <br>
  <div class="table-responsive custom-table" style="margin-top: 20px;"> <!-- Tambahkan kelas "custom-table" di sini -->
    <table class="table items-table table table-bordered table-striped verticle-middle table-responsive-sm">
      <thead>
        <tr>
          <th class="text-center">No</th>
          <th class="text-center">NIP</th>
          <th class="text-center">Username</th>
          <th class="text-center">Nama Pegawai</th>
          <th class="text-center">Jenis Kelamin</th>
          <th class="text-center">Alamat</th>
          <th class="text-center">No Telpon</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no=1;
        foreach ($jofinson as $jo){
          ?>
          <tr>
            <th class="text-center"><?php echo $no++ ?></th>
            <td class="text-capitalize text-center"><?php echo $jo->nip?></td>
            <td class="text-capitalize text-center"><?php echo $jo->username?></td>
            <td class="text-capitalize text-center"><?php echo $jo->nama_petugas?></td>
            <td class="text-capitalize text-center"><?php echo $jo->jk?></td>
            <td class="text-capitalize text-center"><?php echo $jo->alamat?></td>
            <td class="text-capitalize text-center"><?php echo $jo->telp?></td>
            <td class="text-center">
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                <a class="dropdown-item" href="<?= base_url('/home/reset_pw/'.$jo->id_user_petugas)?>"><i class="bx bx-edit-alt me-1"></i> Reset Password</a>
                  <a class="dropdown-item" href="<?= base_url('/home/edit_pegawaian/'.$jo->id_user_petugas)?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                    <a class="dropdown-item" href="<?= base_url('/home/hapus_pegawaian/'.$jo->id_user_petugas)?>"><i class="bx bx-trash me-1"></i> Delete</a>
                    </div>
                  </div>
                </td>
              </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

