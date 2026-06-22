<?php
// file: KaryawanMagang.php
require_once 'Karyawan.php';

class KaryawanMagang extends Karyawan {
    private $uangSakuBulanan;
    private $sertifikatKampusMerdeka;

    public function __construct($id = null, $nama = null, $dept = null, $hariMasuk = null, $gajiHari = null, $uangSakuBulanan = null, $sertifikatKampusMerdeka = null) {
        parent::__construct($id, $nama, $dept, $hariMasuk, $gajiHari);
        $this->uangSakuBulanan = $uangSakuBulanan;
        $this->sertifikatKampusMerdeka = $sertifikatKampusMerdeka;
    }

    /**
     * OVERRIDING: Gaji harian dipotong 20% untuk orientasi/pelatihan (Sisa hak 80% atau 0.80)
     */
    public function hitungGajiBersih() {
        return ($this->hariKerjaMasuk * $this->gajiDasarPerHari) * 0.80;
    }

    public function tampilkanProfilKaryawan() {
        return "Status: Magang | No Sertifikat MSIB: " . $this->sertifikatKampusMerdeka;
    }

    public static function getDaftarMagang($db) {
        $query = "SELECT id_karyawan, nama_karyawan, departemen, hari_kerja_masuk, gaji_dasar_per_hari, uang_saku_bulanan, sertifikat_kampus_merdeka 
                  FROM tabel_karyawan WHERE jenis_karyawan = 'magang'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        
        $daftarKaryawan = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $daftarKaryawan[] = new self($row['id_karyawan'], $row['nama_karyawan'], $row['departemen'], $row['hari_kerja_masuk'], $row['gaji_dasar_per_hari'], $row['uang_saku_bulanan'], $row['sertifikat_kampus_merdeka']);
        }
        return $daftarKaryawan;
    }
}