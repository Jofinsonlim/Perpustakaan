<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="card-body">
            <div class="basic-form">
              <form class="form-horizontal form-label-left" novalidate  action="<?= base_url('home/aksi_tambah_jenis')?>" method="post">

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Nama Jenis<span style="color: red;">*</span></label>
                        <input type="text" id="nama_jenis" name="nama_jenis" 
                        class="form-control text-capitalize" placeholder="Nama Jenis">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Kode Jenis<span style="color: red;">*</span></label>
                        <input type="text" id="kode_jenis" name="kode_jenis" 
                        class="form-control text-capitalize" placeholder="Kode Jenis">
                    </div>
                </div>  
                <a href="<?= base_url('/home/jenis')?>" type="submit" class="btn btn-primary">Cancel</a></button>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>