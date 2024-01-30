<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="card-body">
            <div class="basic-form">
              <form class="form-horizontal form-label-left" novalidate  action="<?= base_url('home/aksi_tambah_inventaris')?>" method="post">

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Nama Inventaris<span style="color: red;">*</span></label>
                        <input type="text" id="nama" name="nama" 
                        class="form-control text-capitalize" placeholder="Nama Inventaris">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Kode Inventaris<span style="color: red;">*</span></label>
                        <input type="text" id="kode_inventaris" name="kode_inventaris" 
                        class="form-control text-capitalize" placeholder="Kode Inventaris">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Kondisi<span style="color: red;">*</span></label>
                        <input type="text" id="kondisi" name="kondisi" 
                        class="form-control text-capitalize" placeholder="Kondisi">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Jumlah<span style="color: red;">*</span></label>
                        <input type="number" id="jumlah" name="jumlah" 
                        class="form-control text-capitalize" placeholder="Jumlah">
                    </div>

                   <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Jenis <span class="required"></span></label>
                        <select name="id_jenis" class="form-control text-capitalize" id="id_jenis" required>
                            <option>Pilih Nama Jenis</option>
                            <?php 
                            foreach ($j as $jabatan) {
                                if(session()->get('level') == 1 && $jabatan->keterangan == "Jenis Tersedia") {
                            ?>
                                <option class="text-capitalize" value="<?php echo $jabatan->id_jenis ?>"><?php echo $jabatan->nama_jenis ?> / <?php echo $jabatan->kode_jenis ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Ruang <span class="required"></span></label>
                        <select  name="id_ruang" class="form-control text-capitalize" id="id_ruang" required>
                            <option>Pilih Nama Ruang</option>
                            <?php 
                            foreach ($r as $ruang) {
                                if(session()->get('level') == 1 && $ruang->keterangan == "Ruangan Tersedia") {
                                ?>
                                <option class="text-capitalize" value="<?php echo $ruang->id_ruang ?>"><?php echo $ruang->nama_ruang ?> / <?php echo $ruang->kode_ruang ?></option>
                            <?php }} ?>
                        </select>
                    </div>
                </div>  
                <a href="<?= base_url('/home/inventaris')?>" type="submit" class="btn btn-primary">Cancel</a></button>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>