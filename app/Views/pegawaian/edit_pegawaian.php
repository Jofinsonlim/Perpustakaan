<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="card-body">
            <div class="basic-form">
              <form class="form-horizontal form-label-left" novalidate  action="<?= base_url('home/aksi_edit_pegawaian')?>" method="post">
                  <input type="hidden" name="id" value="<?= $jofinson->id_user ?>">

                  <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">NIP<span style="color: red;">*</span></label>
                        <input type="number" id="nip" name="nip" 
                        class="form-control text-capitalize" placeholder="NIP" value="<?= $jofinson->nip?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Pegawai<span style="color: red;">*</span></label>
                        <input type="text" id="nama_petugas" name="nama_petugas" class="form-control text-capitalize" placeholder="Nama Pegawai" value="<?= $jofinson->nama_petugas?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Jenis Kelamin<span style="color: red;">*</span></label>
                            <select id="jk" class="form-control col-12" data-validate-length-range="6" data-validate-words="2" name="jk" required="required">
                            <option class="text-uppercase" value="<?= $jofinson->jk?>"><?= $jofinson->jk?></option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Alamat<span style="color: red;">*</span></label>
                        <input type="text" id="alamat" name="alamat" class="form-control text-capitalize" placeholder="Alamat" value="<?= $jofinson->alamat?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">No Telpon<span style="color: red;">*</span></label>
                        <input type="number" id="telp" name="telp" class="form-control" placeholder="No Telpon" value="<?= $jofinson->telp?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Username<span style="color: red;">*</span></label>
                        <input type="text" id="username" name="username" class="form-control text-capitalize" placeholder="Username" value="<?= $jofinson->username?>">
                    </div>
                    <div class="input input-group">
                        <label class="form-label">Level<span style="color: red;">*</span></label>
                        <div class="col-12">
                            <select id="level" class="form-control col-12" data-validate-length-range="6" data-validate-words="2" name="level" required="required">
                                <option class="text-uppercase" value="<?= $jofinson->level?>"><?= $jofinson->level?></option>
                                <option value="1">Administrator</option>
                                <option value="2">Operator</option>
                                <option value="3">Peminjam</option>
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <a href="<?= base_url('/home/pegawaian')?>" type="submit" class="btn btn-primary">Cancel</a></button>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>