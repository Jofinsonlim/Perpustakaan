<?php

namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\M_model;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Home extends BaseController
{
    public function index()
    {
        if(session()->get('id')>0 ) {
            return redirect()->to('home/dashboard');

        }else{

            $model=new M_model();
            echo view('login');
        }
    }


    public function aksi_login()
    {
        $n=$this->request->getPost('username'); 
        $p=$this->request->getPost('password');

        $captchaResponse = $this->request->getPost('g-recaptcha-response');
        $captchaSecretKey = '6Le4D6snAAAAAHD3_8OPnw4teaKXWZdefSyXn4H3';

        $verifyCaptchaResponse = file_get_contents(
            "https://www.google.com/recaptcha/api/siteverify?secret={$captchaSecretKey}&response={$captchaResponse}"
        );

        $captchaData = json_decode($verifyCaptchaResponse);

        if (!$captchaData->success) {

            session()->setFlashdata('error', 'CAPTCHA verification failed. Please try again.');
            return redirect()->to('/Home');
        }

        $model= new M_model();
        $data=array(
            'username'=>$n, 
            'password'=>md5($p)
        );
        $cek=$model->getarray('user', $data);
        if ($cek>0) {
            // $where=array('id_user'=>$cek['id_user']);
            // $pengguna=$model->getarray('petugas', $where);
            session()->set('id', $cek['id_user']);
            session()->set('username', $cek['username']);

            // session()->set('nama_petugas', $pengguna['nama_petugas']);

            session()->set('level', $cek['level']);
            return redirect()->to('home/dashboard');

        }else {
            return redirect()->to('/');
        }
    }


    public function log_out()
    {
        if(session()->get('id')>0) {

           session()->destroy();
           return redirect()->to('/');

       }else{
        return redirect()->to('/home/dashboard');
    }
}

public function dashboard()
{
    // if(session()->get('id')>0) {

        $model= new M_model();
        $where=array('id_user' => session()->get('id'));
        $kui['foto']=$model->getRow('user',$where);       

        echo view('header', $kui);
        echo view('menu');
        echo view('dashboard');
        echo view('footer');
    // }else{
    //     return redirect()->to('/');
    // }
}

public function pegawaian()
{
    $model=new M_model();
    $on='petugas.id_user_petugas=user.id_user';
    $kui['jofinson']=$model->tampilPegawaian('petugas', 'user', $on, 'tanggal_petugas');

    $id=session()->get('id');
    $where=array('id_user'=>$id);

    $where=array('id_user' => session()->get('id'));
    $kui['foto']=$model->getRow('user',$where);

    echo view('header',$kui);
    echo view('menu');
    echo view('pegawaian/pegawaian');
    echo view('footer'); 
}

public function tambah_pegawaian()
{
    $model=new M_model();
    $kui['jofinson']=$model->tampil('petugas');

    $id=session()->get('id');
    $where=array('id_user'=>$id);

    $where=array('id_user' => session()->get('id'));
    $kui['foto']=$model->getRow('user',$where);

    echo view('header',$kui);
    echo view('menu');
    echo view('pegawaian/tambah_pegawaian');
    echo view('footer');
}

public function aksi_tambah_pegawaian()
{
    $model=new M_model();

    $nip=$this->request->getPost('nip');
    $nama_petugas=$this->request->getPost('nama_petugas');
    $jk=$this->request->getPost('jk');
    $alamat=$this->request->getPost('alamat');
    $telp=$this->request->getPost('telp');
    $username=$this->request->getPost('username');
    $password=$this->request->getPost('password');
    $level=$this->request->getPost('level');

    $user=array(
        'username'=>$username,
        'password'=>md5('Jofinson123'),
        'level'=>$level,
    );

    $model=new M_model();
    $model->simpan('user', $user);
    $where=array('username'=>$username);
    $id=$model->getarray('user', $where);
    $iduser = $id['id_user'];

    $pegawai=array(
        'nip'=>$nip,
        'nama_petugas'=>$nama_petugas,
        'jk'=>$jk,
        'alamat'=>$alamat,
        'telp'=>$telp,
        'id_user_petugas'=>$iduser,
    );
    $model->simpan('petugas', $pegawai);
    return redirect()->to('/home/pegawaian');
}

public function reset_pw($id)
{
    $model=new M_model();
    $where=array('id_user'=>$id);
    $data=array(
        'password'=>md5('Jofinson123')
    );
    $model->edit('user',$data,$where);
    return redirect()->to('/home/pegawaian');
}

public function edit_pegawaian($id)
{
    $model=new M_model();
    $where2=array('petugas.id_user_petugas'=>$id);
    $on='petugas.id_user_petugas=user.id_user';
    $kui['jofinson']=$model->edit_petugas('petugas', 'user',$on, $where2);

    $id=session()->get('id');
    $where=array('id_user'=>$id);

    $where=array('id_user' => session()->get('id'));
    $kui['foto']=$model->getRow('user',$where);

    echo view('header',$kui);
    echo view('menu');
    echo view('pegawaian/edit_pegawaian');
    echo view('footer');
}

public function aksi_edit_pegawaian()
{
    $id= $this->request->getPost('id');
    $nip=$this->request->getPost('nip');
    $nama_petugas=$this->request->getPost('nama_petugas');
    $jk=$this->request->getPost('jk');
    $alamat=$this->request->getPost('alamat');
    $telp=$this->request->getPost('telp');
    $username=$this->request->getPost('username');
    $password=$this->request->getPost('password');
    $level=$this->request->getPost('level');

    $where=array('id_user'=>$id);    
    $where2=array('id_user_petugas'=>$id);
    if ($password !='') {
        $user=array(
            'username'=>$username,
            'level'=>$level,
        );
    }else{
        $user=array(
            'username'=>$username,
            'level'=>$level,
        );
    }

    $model=new M_model();
    $model->edit('user', $user,$where);

    $pegawai=array(
        'nip'=>$nip,
        'nama_petugas'=>$nama_petugas,
        'jk'=>$jk,
        'alamat'=>$alamat,
        'telp'=>$telp,
    );
    $model->edit('petugas', $pegawai, $where2);
    return redirect()->to('/home/pegawaian');
}

public function hapus_pegawaian($id)
{
    $model=new M_model();
    $where2=array('id_user'=>$id);
    $where=array('id_user_petugas'=>$id);
    $model->hapus('petugas',$where);
    $model->hapus('user',$where2);
    return redirect()->to('/home/pegawaian');
}

public function jenis()
{
    $model=new M_model();
    $kui['jofinson']=$model->tampil_jenis('jenis', 'tanggal_jenis');

    $id=session()->get('id');
    $where=array('id_user'=>$id);

    $where=array('id_user' => session()->get('id'));
    $kui['foto']=$model->getRow('user',$where);

    echo view('header',$kui);
    echo view('menu');
    echo view('jenis/jenis');
    echo view('footer'); 
}

public function tambah_jenis()
{
    $model=new M_model();
    $kui['jofinson']=$model->tampil_jenis('jenis', 'tanggal_jenis');

    $id=session()->get('id');
    $where=array('id_user'=>$id);
    $kui['foto']=$model->getRow('user',$where);

    echo view('header',$kui);
    echo view('menu');
    echo view('jenis/tambah_jenis');
    echo view('footer'); 
}

public function aksi_tambah_jenis()
{
    $model=new M_model();
    $nama_jenis=$this->request->getPost('nama_jenis');
    $kode_jenis=$this->request->getPost('kode_jenis');
    $data=array(
        'nama_jenis'=>$nama_jenis,
        'kode_jenis'=>$kode_jenis,
        'keterangan'=>'Tidak Tersedia',
    );
    $model->simpan('jenis',$data);
    return redirect()->to('/home/jenis');
}

public function edit_jenis($id)
{
    $model=new M_model();
    $where2=array('id_jenis'=>$id);
    $kui['jofinson']=$model->edit_jenis('jenis', $where2);

    $id=session()->get('id');
    $where=array('id_user'=>$id);

    $where=array('id_user' => session()->get('id'));
    $kui['foto']=$model->getRow('user',$where);

    echo view('header',$kui);
    echo view('menu');
    echo view('jenis/edit_jenis');
    echo view('footer');
}

public function aksi_edit_jenis()
{
    $model=new M_model();
    $id=$this->request->getPost('id');
    $nama_jenis=$this->request->getPost('nama_jenis');
    $kode_jenis=$this->request->getPost('kode_jenis');
    $data=array(
        'nama_jenis'=>$nama_jenis,
        'kode_jenis'=>$kode_jenis,
    );        
    $where=array('id_jenis'=>$id);
    $model->edit('jenis',$data,$where);
    return redirect()->to('/home/jenis');
}

public function hapus_jenis($id)
{
    $model=new M_model();
    $where=array('id_jenis'=>$id);
    $model->hapus('jenis',$where);
    return redirect()->to('/home/jenis');
}

public function keterangan()
{
        // if (session()->get('level') == 2) {
    $ids = $this->request->getPost('jenis');

    if (is_array($ids)) {
        $model = new M_model();
        $data = array(
            'keterangan' => "Jenis Tersedia"
        );

        foreach ($ids as $id) {
            $where = array('id_jenis' => $id);
            $model->edit('jenis', $data, $where);
        }

        return redirect()->to('home/jenis');
    } else {
        return redirect()->to('home/jenis')->with('error', 'Invalid input data');
    }
        // } else {
        //     return redirect()->to('/home/dashboard');
        // }
}

public function ruangan()
{
    $model=new M_model();
    $kui['jofinson']=$model->tampil_jenis('ruang', 'tanggal_ruangan');

    $id=session()->get('id');
    $where=array('id_user'=>$id);

    $where=array('id_user' => session()->get('id'));
    $kui['foto']=$model->getRow('user',$where);

    echo view('header',$kui);
    echo view('menu');
    echo view('ruangan/ruangan');
    echo view('footer'); 
}

public function tambah_ruang()
{
    $model=new M_model();
    $kui['jofinson']=$model->tampil_jenis('ruang', 'tanggal_ruangan');

    $id=session()->get('id');
    $where=array('id_user'=>$id);
    $kui['foto']=$model->getRow('user',$where);

    echo view('header',$kui);
    echo view('menu');
    echo view('ruangan/tambah_ruang');
    echo view('footer'); 
}

public function aksi_tambah_ruang()
{
    $model=new M_model();
    $nama_ruang=$this->request->getPost('nama_ruang');
    $kode_ruang=$this->request->getPost('kode_ruang');
    $data=array(
        'nama_ruang'=>$nama_ruang,
        'kode_ruang'=>$kode_ruang,
        'keterangan'=>'Tidak Tersedia',
    );
    $model->simpan('ruang',$data);
    return redirect()->to('/home/ruangan');
}

public function edit_ruang($id)
{
    $model=new M_model();
    $where2=array('id_ruang'=>$id);
    $kui['jofinson']=$model->edit_jenis('ruang', $where2);

    $id=session()->get('id');
    $where=array('id_user'=>$id);

    $where=array('id_user' => session()->get('id'));
    $kui['foto']=$model->getRow('user',$where);

    echo view('header',$kui);
    echo view('menu');
    echo view('ruangan/edit_ruang');
    echo view('footer');
}

public function aksi_edit_ruang()
{
    $model=new M_model();
    $id=$this->request->getPost('id');
    $nama_ruang=$this->request->getPost('nama_ruang');
    $kode_ruang=$this->request->getPost('kode_ruang');
    $data=array(
        'nama_ruang'=>$nama_ruang,
        'kode_ruang'=>$kode_ruang,
    );        
    $where=array('id_ruang'=>$id);
    $model->edit('ruang',$data,$where);
    return redirect()->to('/home/ruangan');
}

public function hapus_ruang($id)
{
    $model=new M_model();
    $where=array('id_ruang'=>$id);
    $model->hapus('ruang',$where);
    return redirect()->to('/home/ruangan');
}

public function keterangan_ruang()
{
        // if (session()->get('level') == 2) {
    $ids = $this->request->getPost('ruang');

    if (is_array($ids)) {
        $model = new M_model();
        $data = array(
            'keterangan' => "Ruangan Tersedia"
        );

        foreach ($ids as $id) {
            $where = array('id_ruang' => $id);
            $model->edit('ruang', $data, $where);
        }

        return redirect()->to('home/ruangan');
    } else {
        return redirect()->to('home/ruangan')->with('error', 'Invalid input data');
    }
        // } else {
        //     return redirect()->to('/home/dashboard');
        // }
}

public function inventaris()
{
    $model=new M_model();
    $on='inventaris.id_jenis=jenis.id_jenis';
    $on2='inventaris.id_ruang=ruang.id_ruang';
    $kui['jofinson']=$model->tampilinventaris('inventaris', 'jenis', 'ruang', $on, $on2, 'tanggal_tanggal');

    $id=session()->get('id');
    $where=array('id_user'=>$id);

    $where=array('id_user' => session()->get('id'));
    $kui['foto']=$model->getRow('user',$where);

    echo view('header',$kui);
    echo view('menu');
    echo view('inventaris/inventaris');
    echo view('footer'); 
}

public function tambah_inventaris()
{
    $model=new M_model();
    $on='inventaris.id_jenis=jenis.id_jenis';
    $on2='inventaris.id_ruang=ruang.id_ruang';
    $kui['jofinson']=$model->tampilinventaris('inventaris', 'jenis', 'ruang', $on, $on2, 'tanggal_tanggal');

    $id=session()->get('id');
    $where=array('id_user'=>$id);
    $kui['foto']=$model->getRow('user',$where);

    $kui['j']=$model->tampil('jenis'); 
    $kui['r']=$model->tampil('ruang'); 

    echo view('header',$kui);
    echo view('menu');
    echo view('inventaris/tambah_inventaris');
    echo view('footer'); 
}

public function aksi_tambah_inventaris()
{
    $model=new M_model();
    $jenis=$this->request->getPost('id_jenis');
    $ruang=$this->request->getPost('id_ruang');
    $nama=$this->request->getPost('nama');
    $kode_inventaris=$this->request->getPost('kode_inventaris');
    $kondisi=$this->request->getPost('kondisi');
    $jumlah=$this->request->getPost('jumlah');
    $data=array(
        'id_jenis'=> $jenis,
        'id_ruang'=> $ruang,
        'nama'=>$nama,
        'kode_inventaris'=>$kode_inventaris,
        'kondisi'=>$kondisi,
        'jumlah'=>$jumlah,
        'keterangan_inventaris'=>'Pengecekkan / Perbaiki',
        'status'=>'-',
    );
    $model->simpan('inventaris',$data);
    return redirect()->to('/home/inventaris');
}

public function keterangan_inventaris()
{
        // if (session()->get('level') == 2) {
    $ids = $this->request->getPost('inventaris');

    if (is_array($ids)) {
        $model = new M_model();
        $data = array(
            'keterangan_inventaris' => "Dapat Digunakan"
        );

        foreach ($ids as $id) {
            $where = array('id_inventaris' => $id);
            $model->edit('inventaris', $data, $where);
        }

        return redirect()->to('home/inventaris');
    } else {
        return redirect()->to('home/inventaris')->with('error', 'Invalid input data');
    }
        // } else {
        //     return redirect()->to('/home/dashboard');
        // }
}

public function hapus_inventaris($id)
{
    $model=new M_model();
    $where=array('id_inventaris'=>$id);
    $model->hapus('inventaris',$where);
    return redirect()->to('/home/inventaris');
}

public function edit_inventaris($id)
{
    $model=new M_model();
    $where2=array('id_inventaris'=>$id);
    $on='inventaris.id_jenis=jenis.id_jenis';
    $on2='inventaris.id_ruang=ruang.id_ruang';
    $kui['jofinson']=$model->edit_inventaris('inventaris', 'jenis', 'ruang', $on, $on2, $where2);
    $kui['j']=$model->tampil('jenis');
    $kui['r']=$model->tampil('ruang');

    $id=session()->get('id');
    $where=array('id_user'=>$id);

    $where=array('id_user' => session()->get('id'));
    $kui['foto']=$model->getRow('user',$where);

    echo view('header',$kui);
    echo view('menu');
    echo view('inventaris/edit_inventaris');
    echo view('footer');
}

public function aksi_edit_inventaris()
{
    $model=new M_model();
    $id=$this->request->getPost('id');
    $jenis=$this->request->getPost('id_jenis');
    $ruang=$this->request->getPost('id_ruang');
    $nama=$this->request->getPost('nama');
    $kode_inventaris=$this->request->getPost('kode_inventaris');
    $kondisi=$this->request->getPost('kondisi');
    $jumlah=$this->request->getPost('jumlah');
    $data=array(
        'id_jenis'=> $jenis,
        'id_ruang'=> $ruang,
        'nama'=>$nama,
        'kode_inventaris'=>$kode_inventaris,
        'kondisi'=>$kondisi,
        'jumlah'=>$jumlah,
    );        
    $where=array('id_inventaris'=>$id);
    $model->edit('inventaris',$data,$where);
    return redirect()->to('/home/inventaris');
}

}
