<div class="col-xl-12">
  <div class="nav-align-top mb-4">
    <ul class="nav nav-tabs nav-fill" role="tablist">
      <li class="nav-item">
        <button
        type="button"
        class="nav-link active"
        role="tab"
        data-bs-toggle="tab"
        data-bs-target="#navs-justified-home"
        aria-controls="navs-justified-home"
        aria-selected="true"
        >
        <i class='tf-icons bx bx-book'></i> Inventaris
      </button>
    </li>
    <li class="nav-item">
      <button
      type="button"
      class="nav-link"
      role="tab"
      data-bs-toggle="tab"
      data-bs-target="#navs-justified-profile"
      aria-controls="navs-justified-profile"
      aria-selected="false"
      >
      <i class='tf-icons bx bx-dna'></i> Peminjaman
    </button>
  </li>
  <!-- <li class="nav-item">
    <button
    type="button"
    class="nav-link"
    role="tab"
    data-bs-toggle="tab"
    data-bs-target="#navs-justified-messages"
    aria-controls="navs-justified-messages"
    aria-selected="false"
    >
    <i class="tf-icons bx bx-message-square"></i> Pengembalian
  </button>
</li> -->
</ul>
<div class="tab-content">
  <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">
    <br>
    <form action="<?= base_url('/home/keterangan_inventaris/')?>" method="post">

      <a href="<?= base_url('/home/tambah_inventaris/')?>"><button class="btn btn-success" type="button"><i class="fa fa-plus"></i>Tambah</button></a>
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
            <th class="text-center">Nama Inventaris</th>
            <th class="text-center">Kode Inventaris</th>
            <th class="text-center">Kondisi</th>
            <th class="text-center">Keterangan</th>
            <th class="text-center">Jumlah</th>
            <th class="text-center">Nama Jenis</th>
            <th class="text-center">Nama Ruang</th>
            <th class="text-center">Status</th>
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
                <input type="checkbox" class="checkbox__input" value="<?= $jo->id_inventaris ?>" name="inventaris[]" id="inventaris_<?= $jo->id_inventaris ?>"/>
              </td>
              <td class="text-capitalize text-center"><?php echo $jo->nama?></td>
              <td class="text-capitalize text-center"><?php echo $jo->kode_inventaris?></td>
              <td class="text-capitalize text-center"><?php echo $jo->kondisi?></td>
              <td class="text-capitalize text-center"><?php echo $jo->keterangan_inventaris?></td>
              <td class="text-capitalize text-center"><?php echo $jo->jumlah?></td>
              <td class="text-capitalize text-center"><?php echo $jo->nama_jenis?></td>
              <td class="text-capitalize text-center"><?php echo $jo->nama_ruang?></td>
              <td class="text-capitalize text-center"><?php echo $jo->status?></td>
              <td class="text-center">
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?= base_url('/home/peminjaman/'.$jo->id_inventaris)?>"><i class='bx bxs-user-check me-1'></i> Peminjaman</a>
                    <a class="dropdown-item" href="<?= base_url('/home/edit_inventaris/'.$jo->id_inventaris)?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                    <a class="dropdown-item" href="<?= base_url('/home/hapus_inventaris/'.$jo->id_inventaris)?>"><i class="bx bx-trash me-1"></i> Delete</a>
                  </div>
                </div>
              </td>
            </tr>
          <?php }?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="tab-pane fade" id="navs-justified-profile" role="tabpanel">
    <br>
    <div class="table-responsive custom-table" style="margin-top: 20px;"> <!-- Tambahkan kelas "custom-table" di sini -->
      <table class="table items-table table table-bordered table-striped verticle-middle table-responsive-sm">
        <thead>
          <tr>
            <th class="text-center">#</th>
            <th class="text-center">Nama Inventaris</th>
            <th class="text-center">Kode Inventaris</th>
            <th class="text-center">Kondisi</th>
            <th class="text-center">Keterangan</th>
            <th class="text-center">Jumlah</th>
            <th class="text-center">Nama Jenis</th>
            <th class="text-center">Nama Ruang</th>
            <th class="text-center">Status</th>
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
                <input type="checkbox" class="checkbox__input" value="<?= $jo->id_inventaris ?>" name="inventaris[]" id="inventaris_<?= $jo->id_inventaris ?>"/>
              </td>
              <td class="text-capitalize text-center"><?php echo $jo->nama?></td>
              <td class="text-capitalize text-center"><?php echo $jo->kode_inventaris?></td>
              <td class="text-capitalize text-center"><?php echo $jo->kondisi?></td>
              <td class="text-capitalize text-center"><?php echo $jo->keterangan_inventaris?></td>
              <td class="text-capitalize text-center"><?php echo $jo->jumlah?></td>
              <td class="text-capitalize text-center"><?php echo $jo->nama_jenis?></td>
              <td class="text-capitalize text-center"><?php echo $jo->nama_ruang?></td>
              <td class="text-capitalize text-center"><?php echo $jo->status?></td>
              <td class="text-center">
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?= base_url('/home/peminjaman/'.$jo->id_inventaris)?>"><i class='bx bxs-user-check me-1'></i> Peminjaman</a>
                    <a class="dropdown-item" href="<?= base_url('/home/edit_inventaris/'.$jo->id_inventaris)?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                    <a class="dropdown-item" href="<?= base_url('/home/hapus_inventaris/'.$jo->id_inventaris)?>"><i class="bx bx-trash me-1"></i> Delete</a>
                  </div>
                </div>
              </td>
            </tr>
          <?php }?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="tab-pane fade" id="navs-justified-messages" role="tabpanel">
    <p>
      Oat cake chupa chups dragée donut toffee. Sweet cotton candy jelly beans macaroon gummies
      cupcake gummi bears cake chocolate.
    </p>
    <p class="mb-0">
      Cake chocolate bar cotton candy apple pie tootsie roll ice cream apple pie brownie cake. Sweet
      roll icing sesame snaps caramels danish toffee. Brownie biscuit dessert dessert. Pudding jelly
      jelly-o tart brownie jelly.
    </p>
  </div>
</div>
</div>
</div>