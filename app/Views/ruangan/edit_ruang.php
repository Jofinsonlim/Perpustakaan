<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="card-body">
            <div class="basic-form">
              <form class="form-horizontal form-label-left" novalidate  action="<?= base_url('home/aksi_edit_ruang')?>" method="post">
              <input type="hidden" name="id" value="<?= $jofinson->id_ruang ?>">

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Nama Ruangan<span style="color: red;">*</span></label>
                        <input type="text" id="nama_ruang" name="nama_ruang" 
                        class="form-control text-capitalize" placeholder="Nama Ruangan" value="<?= $jofinson->nama_ruang?>">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Kode Ruangan<span style="color: red;">*</span></label>
                        <input type="text" id="kode_ruang" name="kode_ruang" 
                        class="form-control text-capitalize" placeholder="Kode Ruangan" value="<?= $jofinson->kode_ruang?>">
                    </div>
                </div>
                <a href="<?= base_url('/home/ruangan')?>" type="submit" class="btn btn-primary">Cancel</a></button>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>