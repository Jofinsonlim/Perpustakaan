<?php
namespace App\Models;
use CodeIgniter\Model;
class M_model extends model
{

	public function tampil ($table)
	{
		return $this->db->table($table)->get()->getResult();
	}

	public function tampil_jenis ($table, $column)
	{
		return $this->db->table($table)->orderBy($column, 'DESC')->get()->getResult();
	}

	public function hapus($table, $where)
	{
		return $this->db->table($table)->delete($where);
	}

	public function simpan($table, $data)
	{
		return $this->db->table($table)->insert($data);
	}

	public function getRow($table, $where)
	{
		return $this->db->table($table)->getWhere($where)->getRow();
	}

	public function tampilPegawaian($table1, $table2, $on, $column)
	{
		return $this->db->table($table1)->join($table2, $on)->orderBy($column, 'DESC')->get()->getResult();
	}

	public function tampilinventaris($table1, $table2, $table3, $on, $on2, $column)
	{
		return $this->db->table($table1)->join($table2, $on)->join($table3, $on2)->orderBy($column, 'DESC')->get()->getResult();
	}

	public function tampilAbsen($table1, $table2, $on, $column)
	{
		return $this->db->table($table1)->join($table2, $on)->orderBy($column, 'DESC')->get()->getResult();
	}

	public function tampilAgenda($table1, $table2, $on, $column)
	{
		return $this->db->table($table1)->join($table2, $on)->orderBy($column, 'DESC')->get()->getResult();
	}

	public function tampiltambahPegawaian($table1, $table2, $on, $column)
	{
		return $this->db->table($table1)->join($table2, $on)->orderBy($column, 'DESC')->get()->getResult();
	}

	public function tampil_title ($table)
	{
		return $this->db->table($table)->get()->getRow();
	}

	public function tampilOrderBy ($table, $column)
	{
		return $this->db->table($table)->orderBy($column, 'DESC')->get()->getResult();
	}

	public function log_activity($table1, $table2, $on, $where)
	{
		return $this->db->table($table1)->join($table2, $on, 'left')->where($where)->get()->getResult();
	}

	public function filter4($table, $awal, $akhir) {
		return $this->db->query(
			"SELECT *
			FROM ".$table."
			JOIN barang ON ".$table.".id_barang=barang.id_barang
			JOIN user ON ".$table.".maker_masuk=user.id_user
			WHERE ".$table.".tanggal_masuk
			BETWEEN '".$awal."'
			AND '".$akhir."'"
		)->getResult();
	}

	public function filter_u($table, $awal, $akhir) {
		return $this->db->query(
			"SELECT *
			FROM ".$table."
			JOIN kelas ON ".$table.".id_kelas=kelas.id_kelas
			JOIN user ON ".$table.".id_user_user=user.id_user
			WHERE ".$table.".tanggal_pgu
			BETWEEN '".$awal."'
			AND '".$akhir."'"
		)->getResult();
	}

	public function filter_p($table, $awal, $akhir) {
		return $this->db->query(
			"SELECT *
			FROM ".$table."
			JOIN kelas ON ".$table.".id_kelas=kelas.id_kelas
			JOIN user ON ".$table.".maker_uk=user.id_user
			WHERE ".$table.".tanggal_uk
			BETWEEN '".$awal."'
			AND '".$akhir."'"
		)->getResult();
	}

	public function filter_employee_salary ($table, $awal,$akhir)
	{
		return $this->db->query(
			"SELECT *
			FROM ".$table."
			join guru ON ".$table.".id_guru_gaji = guru.id_guru
			WHERE ".$table.".tanggal_gaji
			BETWEEN '".$awal."'
			AND '".$akhir."'"
		)->getResult();
	}

	public function filter_guru ($table, $awal,$akhir,$where)
	{
		return $this->db->query(
			"SELECT *
			FROM ".$table."
			join guru ON ".$table.".id_guru_gaji = guru.id_guru
			WHERE ".$table.".tanggal_gaji
			BETWEEN '".$awal."'
			AND '".$akhir."'"
		)->getWhere($where)->getResult();
	}

	public function filter_invoice ($table, $awal,$akhir)
	{
		return $this->db->query(
			"SELECT *
			FROM ".$table."
			join siswa ON ".$table.".id_siswa_spp = siswa.id_siswa
			join paket ON ".$table.".id_paket_spp = paket.id_paket
			WHERE ".$table.".tanggal_spp
			BETWEEN '".$awal."'
			AND '".$akhir."'"
		)->getResult();
	}

	public function filter_absensi ($table, $awal,$akhir)
	{
		return $this->db->query(
			"SELECT *
			FROM ".$table."
			join user ON ".$table.".maker_absen = user.id_user
			WHERE ".$table.".tanggal_absen
			BETWEEN '".$awal."'
			AND '".$akhir."'"
		)->getResult();
	}

	public function filter_agenda ($table, $awal,$akhir)
	{
		return $this->db->query(
			"SELECT *
			FROM ".$table."
			join user ON ".$table.".maker_agenda = user.id_user
			WHERE ".$table.".tanggal_agenda
			BETWEEN '".$awal."'
			AND '".$akhir."'"
		)->getResult();
	}

	public function filter_gaji ($table, $awal,$akhir)
	{
		return $this->db->query(
			"SELECT *
			FROM ".$table."
			join pegawai ON ".$table.".id_pegawai_gaji = pegawai.id_pegawai
			WHERE ".$table.".tanggal_gaji
			BETWEEN '".$awal."'
			AND '".$akhir."'"
		)->getResult();
	}

	public function filter_f($table, $awal, $akhir) {
		return $this->db->query(
			"SELECT *
			FROM ".$table."
			JOIN kelas ON ".$table.".id_kelas=kelas.id_kelas
			JOIN user ON ".$table.".maker_denda=user.id_user
			WHERE ".$table.".tanggal_denda
			BETWEEN '".$awal."'
			AND '".$akhir."'"
		)->getResult();
	}

	public function filter_e($table, $awal, $akhir) {
		return $this->db->query(
			"SELECT *
			FROM ".$table."
			JOIN kelas ON ".$table.".id_kelas=kelas.id_kelas
			JOIN user ON ".$table.".maker_p=user.id_user
			WHERE ".$table.".tanggal_p
			BETWEEN '".$awal."'
			AND '".$akhir."'"
		)->getResult();
	}
	// public function filter3 ($table,$table2,$awal,$akhir)
	// {
	// 	return $this->db->query(
	// 		"SELECT *
	// 		FROM ".$table."
	// 		join dta_jabatan
	// 		on ".$table.".id_jabatan=dta_jabatan.id_jabatan
	// 		WHERE ".$table.".tanggal_karyawan
	// 		BETWEEN '".$awal."'
	// 		and '".$akhir."'"

	// 	)->getResult();
	// }

	public function filter5($table, $awal, $akhir) {
		return $this->db->query(
			"SELECT *
			FROM ".$table."
			JOIN barang ON ".$table.".id_barang=barang.id_barang
			JOIN user ON ".$table.".maker_keluar=user.id_user
			WHERE ".$table.".tanggal_keluar
			BETWEEN '".$awal."'
			AND '".$akhir."'"
		)->getResult();
	}

	public function filter3($table, $awal, $akhir) {
		return $this->db->query(
			"SELECT *
			FROM ".$table."
			JOIN dta_jabatan ON ".$table.".id_jabatan=dta_jabatan.id_jabatan
			JOIN dta_departement ON ".$table.".id_departement=dta_departement.id_departement
			JOIN user ON ".$table.".maker=user.id_user
			WHERE ".$table.".tanggal_karyawan
			BETWEEN '".$awal."'
			AND '".$akhir."'"
		)->getResult();
	}


	public function tes ($table)
	{
		return $this->db->query("
			SELECT *
			FROM ".$table."
			ORDER BY kode DESC
			")->getRow();
	}

	public function kodeJabatan ()
	{
		return $this->db->query("
			SELECT *
			FROM dta_jabatan
			ORDER BY kode_jabatan DESC
			")->getRow();
	}

	// public function filter ($table, $awal,$akhir)
	// {
	// 	return $this->db->table($table)->getWhere($where)->getResult();

	// 	return $this->db->query("
	// 	    SELECT *
	// 	    FROM ".$table."
	// 	    WHERE ".$table.".tanggal_transaksi
	// 	    BETWEEN '".$awal."'
	// 	    AND '".$akhir."'
	// 	")->getResult();
	// }

	public function filter($table, $awal, $akhir)
	{
		if (!empty($awal) && !empty($akhir)) {
			return $this->db->table($table)
			->where('tanggal_laporan >=', $awal)
			->where('tanggal_laporan <=', $akhir)
			->get()
			->getResult();
		} else {
			return [];
		}
	}


// public function filter ($table, $awal,$akhir)
// 	{
// 		$sql = "SELECT *
//         FROM $table
//         WHERE tanggal BETWEEN ? AND ?";
// 		$query = $this->db->query($sql, array($awal, $akhir));
// 		$result = $query->getResult();
// 		return $result;
// 	}

	// public function filter ($table,$awal,$akhir)
	// {

	// 	return $this->db->query(
	// 		"SELECT *
	// 		FROM ".$table."
	// 		join user
	// 		on ".$table.".maker_barang=user.id_user
	// 		WHERE ".$table.".tanggal_barang
	// 		BETWEEN '".$awal."'
	// 		and '".$akhir."'"

	// 	)->getResult();
	// }

	public function filter_c ($table, $awal,$akhir)
	{
		return $this->db->table($table)->getWhere($where)->getResult();

		return $this->db->query("
			SELECT *
			FROM ".$table."
			WHERE ".$table.".tanggal_k
			BETWEEN '".$awal."'
			AND '".$akhir."'
			")->getResult();
	}

	public function filter_b ($table,$awal,$akhir)
	{
		return $this->db->query("
			SELECT *
			FROM ".$table."
			join karyawan
			on ".$table.".id_user=karyawan.id_user
			WHERE ".$table.".tanggal
			BETWEEN '".$awal."'
			and '".$akhir."'"

		)->getResult();
	}

	// public function filter_f ($table,$awal,$akhir)
	// {
	// 	return $this->db->query("
	// 		SELECT *
	// 		FROM ".$table."
	// 		join karyawan
	// 		on ".$table.".id_user=karyawan.id_user
	// 		join barang
	// 		on ".$table.".id_brg=barang.id_brg
	// 		WHERE ".$table.".tanggal
	// 		BETWEEN '".$awal."'
	// 		and '".$akhir."'"

	// 	    )->getResult();
	// }

	public function getWhere($table, $where)
	{
		return $this->db->table($table)->getWhere($where)->getResult();
	}

	public function edit_pp($table, $where)
	{
		return $this->db->table($table)->getWhere($where)->getRow();
	}

	public function getarray($table, $where)
	{
		return $this->db->table($table)->getWhere($where)->getRowArray();
	}

	public function edit($table, $data, $where)
	{
		return $this->db->table($table)->update($data, $where);
	}

	public function fusion($table1, $table2, $on)
	{
		return $this->db->table($table1)->join($table2, $on)->get()->getResult();
	}

	public function fusionArray($table1, $table2, $table3, $on, $where)
	{
		return $this->db->table($table1)->join($table2, $on)->getWhere($where)->getRowArray();
	}

	public function fusion_where($table1, $table2, $on,$where)
	{
		return $this->db->table($table1)->join($table2, $on)->getWhere($where)->getResult();
	}

	public function fusionOderBy($table1, $table2, $on, $column)
	{
		return $this->db->table($table1)->join($table2, $on)->orderBy($column, 'DESC')->get()->getResult();
	}

	public function monsterOderBy($table1, $table2, $table3, $table4, $table5, $on, $on2, $on3, $on4, $column)
	{
		return $this->db->table($table1)->join($table2, $on)->join($table3, $on2)->join($table4, $on3)->join($table5, $on4)->orderBy($column, 'DESC')->get()->getResult();
	}

	public function siswaOderBy($table1, $table2, $table3, $table4, $table5, $on, $on2, $on3, $on4, $column)
	{
		return $this->db->table($table1)->join($table2, $on)->join($table3, $on2)->join($table4, $on3)->join($table5, $on4)->orderBy($column, 'DESC')->get()->getResult();
	}

	public function fusion_Row($table1, $table2, $on,$where)
	{
		return $this->db->table($table1)->join($table2, $on)->getWhere($where)->getRow();
	}

	public function fusionleft($table1, $table2, $on)
	{
		return $this->db->table($table1)->join($table2, $on, 'left')->get()->getResult();
	}

	public function super($table1, $table2, $table3, $on, $on2)
	{
		return $this->db->table($table1)->join($table2, $on)->join($table3, $on2)->get()->getResult();
	}

	public function superLike2($table1, $table2, $on1, $column, $column2, $where)
	{
		return $this->db->table($table1)->join($table2, $on1)->groupStart()->like($column, $where)->orLike($column2, $where)->groupEnd()->get()->getResult();
	}

	public function search_log($table1, $table2, $on1, $column, $where)
	{
		return $this->db->table($table1)->join($table2, $on1)->like($column, $where)->get()->getResult();
	}

	public function superOderBy($table1, $table2, $table3, $on, $on2, $column)
	{
		return $this->db->table($table1)->join($table2, $on)->join($table3, $on2)->orderBy($column, 'DESC')->get()->getResult();
	}

	public function ultraOderBy($table1, $table2, $table3, $table4, $on, $on2, $on3, $column)
	{
		return $this->db->table($table1)->join($table2, $on)->join($table3, $on2)->join($table4, $on3)->orderBy($column, 'DESC')->get()->getResult();
	}

	public function superOderByWhere($table1, $table2, $table3, $on, $on2, $column,$where)
	{
		return $this->db->table($table1)->join($table2, $on)->join($table3, $on2)->orderBy($column, 'DESC')->getWhere($where)->getResult();
	}

	public function superData($table1, $table2, $table3, $table4, $on, $on2, $on3, $column, $where)
	{
		return $this->db->table($table1)->join($table2, $on)->join($table3, $on2)->join($table4, $on3)->orderBy($column, 'ASC')->getWhere($where)->getResult();
	}

	public function superDataDouble($table1, $table2, $table3, $on, $on2, $column, $where)
	{
		return $this->db->table($table1)->join($table2, $on)->join($table3, $on2)->orderBy($column, 'DESC')->getWhere($where)->getResult();
	}

	public function fusionDataDouble($table1, $table2,  $on,  $column, $where)
	{
		return $this->db->table($table1)->join($table2, $on)->orderBy($column, 'DESC')->getWhere($where)->getResult();
	}

	public function fusionOderByWhere($table1, $table2, $on, $column, $where)
	{
		return $this->db->table($table1)->join($table2, $on)->orderBy($column, 'DESC')->getWhere($where)->getResult();
	}

	public function bayar($table1, $table2, $on, $column, $where)
	{
		return $this->db->table($table1)->join($table2, $on)->orderBy($column, 'ASC')->getWhere($where)->getRow();
	}

	public function ultra($table1, $table2, $table3, $table4, $on, $on2, $on3)
	{
		return $this->db->table($table1)->join($table2, $on)->join($table3, $on2)->join($table4, $on3)->get()->getResult();
	}

	public function monster($table1, $table2, $table3, $table4, $table5, $on, $on2, $on3, $on4)
	{
		return $this->db->table($table1)->join($table2, $on)->join($table3, $on2)->join($table4, $on3)->join($table5, $on4)->get()->getResult();
	}

	public function ultraRow($table1, $table2, $table3, $table4, $on, $on2, $on3, $where)
	{
		return $this->db->table($table1)->join($table2, $on)->join($table3, $on2)->join($table4, $on3)->getWhere($where)->getRow();
	}

	public function edit_user($table1, $table2, $on, $where)
	{
		return $this->db->table($table1)->join($table2, $on)->getWhere($where)->getRow();
	}

	public function getwhereIn($table, $column, $whereIn)
	{
		return $this->db->table($table)->whereIn($whereInColumn, $whereInValues)->update([$columnToUpdate => $newValue]);
	}

	public function edit_keranjang($table1, $table2, $table3, $on, $on2, $where)
	{
		return $this->db->table($table1)->join($table2, $on)->join($table3, $on2)->getWhere($where)->getRow();
	}

	public function edit_siswa($table1, $table2, $table3, $table4, $table5, $on, $on2, $on3, $on4, $where)
	{
		return $this->db->table($table1)->join($table2, $on)->join($table3, $on2)->join($table4, $on3)->join($table5, $on4)->getWhere($where)->getRow();
	}

	public function detail($table1, $table2, $on, $where)
	{
		return $this->db->table($table1)->join($table2, $on)->getWhere($where)->getRow();
	}

	public function detail_s($table1, $table2, $table3, $table4, $table5, $on, $on2, $on3, $on4, $where)
	{
		return $this->db->table($table1)->join($table2, $on)->join($table3, $on2)->join($table4, $on3)->join($table5, $on4)->getWhere($where)->getRow();
	}

	public function detail_siswa($table1, $table2, $table3, $table4, $table5, $on, $on2, $on3, $on4, $where)
	{
		return $this->db->table($table1)->join($table2, $on)->join($table3, $on2)->join($table4, $on3)->join($table5, $on4)->getWhere($where)->getRow();
	}

	public function spp_test($table1, $table2, $table3, $on, $on2, $where)
	{
		return $this->db->table($table1)->join($table2, $on)->join($table3, $on2)->getWhere($where)->getRow();
	}

	public function fusionRows($table1, $table2, $on, $where)
	{
		return $this->db->table($table1)->join($table2, $on)->getWhere($where)->getRow();
	}

	public function edit_jenis($table1, $where)
	{
		return $this->db->table($table1)->getWhere($where)->getRow();
	}

	public function edit_inventaris($table1, $table2, $table3, $on, $on2, $where)
	{
		return $this->db->table($table1)->join($table2, $on)->join($table3, $on2)->getWhere($where)->getRow();
	}

	public function monsterRows($table1, $table2, $table3, $table4, $table5, $on, $on2, $on3, $on4, $where)
	{
		return $this->db->table($table1)->join($table2, $on)->join($table3, $on2)->join($table4, $on3)->join($table5, $on4)->getWhere($where)->getRow();
	}

	public function ultraRows($table1, $table2, $table3, $on, $on2, $where)
	{
		return $this->db->table($table1)->join($table2, $on)->join($table3, $on2)->getWhere($where)->getRow();
	}

	public function edit_petugas($table1, $table2, $on, $where)
	{
		return $this->db->table($table1)->join($table2, $on)->getWhere($where)->getRow();
	}


	public function edit_gaji($table1, $table2, $on, $where)
	{
		return $this->db->table($table1)->join($table2, $on)->getWhere($where)->getRow();
	}

	public function penerimaan_gaji($table1, $where)
	{
		return $this->db->table($table1)->getWhere($where)->getRow();
	}

	public function klsRows($table1, $table2, $table3, $table4, $on, $on2, $on3, $where)
	{
		return $this->db->table($table1)->join($table2, $on)->join($table3, $on2)->join($table4, $on3)->getWhere($where)->getRow();
	}

	public function bayar_invoice($table1, $table2, $on, $where)
	{
		return $this->db->table($table1)->join($table2, $on)->getWhere($where)->getRow();
	}

	public function superRows($table1, $table2, $table3,  $on, $on2, $where)
	{
		return $this->db->table($table1)->join($table2, $on)->join($table3, $on2)->getWhere($where)->getRow();
	}

	public function edit_invoice($table1, $table2, $table3, $table4, $on, $on2, $on3, $where)
	{
		return $this->db->table($table1)->join($table2, $on)->join($table3, $on2)->join($table4, $on3)->getWhere($where)->getRow();
	}

	public function superRowsAsc($table1, $table2, $table3,  $on, $on2, $column, $where)
	{
		return $this->db->table($table1)->join($table2, $on)->join($table3, $on2)->orderBy($column, 'ASC')->getWhere($where)->getRow();
	}
	
	public function tesRows($table1, $table2, $on, $where)
	{
		return $this->db->table($table1)->join($table2, $on)->getWhere($where)->getRow();
	}

	public function ultraOrderBy($table1, $table2, $table3, $table4, $on, $on2, $on3, $column)
	{
		return $this->db->table($table1)->join($table2, $on)->join($table3, $on2)->join($table4, $on3)->orderBy($column, 'DESC')->get()->getResult();
	}
	
	public function ultra_bayar($table1, $table2, $table3, $table4, $on, $on2, $on3, $where)
	{
		return $this->db->table($table1)->join($table2, $on, 'left')->join($table3, $on2, 'left')->join($table4, $on3, 'left')->getwhere($where)->getResult();
	}

	public function details()
	{
		return $this->db->table('dta_departement')->orderBy('tanggal', 'DESC')->get()->getResult();
	}

	public function deleteData($data_id)
	{
		return $this->db->table($this->table)->where('id', $data_id)->delete();
	}

	public function tampilW($table1, $table2, $on, $where)
	{
		return $this->db->table($table1)->join($table2, $on, 'left')->getWhere($where)->getResult();
	}

	public function like2($table,$column,$column2, $where)
	{
		$this->db->table($table)
		->groupStart()
		->like($column, $where[$column])
		->orLike($column2, $where[$column2])
		->groupEnd();

		return $this->db->get()->getResult();
	}
	
	public function asc_date($table1, $table2, $table3, $table4, $on, $on2, $on3, $column)
	{
		return $this->db->table($table1)->join($table2, $on)->join($table3, $on2)->join($table4, $on3)->orderBy($column, 'ASC')->get()->getResult();
	}

	public function log($table1, $table2, $on, $where, $column)
	{
		return $this->db->table($table1)->join($table2, $on)->where($where)->orderBy($column, 'DESC')->get()->getResult();
	}

	public function hapusSemua($table)
	{
		$this->db->table($table)->emptyTable();
	}

	public function hapusKeranjangByIdUser($table, $id_user)
	{
		$this->db->table($table)->where('id_user', $id_user)->delete();
	}

	public function absen_nama($table1, $table2, $on, $column, $where)
	{
		return $this->db->table($table1)->join($table2, $on)->orderBy($column, 'DESC')->getWhere($where)->getResult();
	}
}