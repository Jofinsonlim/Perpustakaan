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

      <form action="<?= base_url('/home/keterangan/')?>" method="post">

        <a href="<?= base_url('/home/tambah_jenis/')?>"><button class="btn btn-success" type="button"><i class="fa fa-plus"></i>Tambah</button></a>
        <button type="submit" class="btn btn-primary">
          <span class="tf-icons bx bx-check-double"></span>&nbsp;
        </button>
      </a>
      <br>
      <div class="table-responsive custom-table" style="margin-top: 20px;"> <!-- Tambahkan kelas "custom-table" di sini -->
        <table class="table items-table table table-bordered table-striped verticle-middle table-responsive-sm">
          <thead>
            <tr>
              <th class="text-center">#</th>
              <th class="text-center">Nama Jenis</th>
              <th class="text-center">Kode Jenis</th>
              <th class="text-center">Keterangan</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no=1;
            foreach ($jofinson as $jo){
              ?>
              <tr>
               <td class="text-center">
                <input type="checkbox" class="checkbox__input" value="<?= $jo->id_jenis ?>" name="jenis[]" id="jenis_<?= $jo->id_jenis ?>"/>
              </td>
              <td class="text-capitalize text-center"><?php echo $jo->nama_jenis?></td>
              <td class="text-capitalize text-center"><?php echo $jo->kode_jenis?></td>
              <td class="text-capitalize text-center"><?php echo $jo->keterangan?></td>
              <td class="text-center">
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?= base_url('/home/edit_jenis/'.$jo->id_jenis)?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                    <a class="dropdown-item" href="<?= base_url('/home/hapus_jenis/'.$jo->id_jenis)?>"><i class="bx bx-trash me-1"></i> Delete</a>
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

