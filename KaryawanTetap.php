<?php
// file: KaryawanTetap.php
require_once 'Karyawan.php';

class KaryawanTetap extends Karyawan {
    private $tunjanganKesehatan;
    private $opsiSahamId;

    public function __construct($id = null, $nama = null, $dept = null, $hariMasuk = null, $gajiHari = null, $tunjanganKesehatan = null, $opsiSahamId = null) {
        parent::__construct($id, $nama, $dept, $hariMasuk, $gajiHari);
        $this->tunjanganKesehatan = $tunjanganKesehatan;
        $this->opsiSahamId = $opsiSahamId;
    }

    /**
     * OVERRIDING: Gaji pokok ditambah tunjangan kesehatan
     */
    public function hitungGajiBersih() {
        return ($this->hariKerjaMasuk * $this->gajiDasarPerHari) + $this->tunjanganKesehatan;
    }

    public function tampilkanProfilKaryawan() {
        return "Status: Tetap | ID Saham: " . $this->opsiSahamId;
    }

    public static function getDaftarTetap($db) {
        $query = "SELECT id_karyawan, nama_karyawan, departemen, hari_kerja_masuk, gaji_dasar_per_hari, tunjangan_kesehatan, opsi_saham_id 
                  FROM tabel_karyawan WHERE jenis_karyawan = 'tetap'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        
        $daftarKaryawan = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $daftarKaryawan[] = new self($row['id_karyawan'], $row['nama_karyawan'], $row['departemen'], $row['hari_kerja_masuk'], $row['gaji_dasar_per_hari'], $row['tunjangan_kesehatan'], $row['opsi_saham_id']);
        }
        return $daftarKaryawan;
    }
}