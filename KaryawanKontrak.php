<?php
// file: KaryawanKontrak.php
require_once 'Karyawan.php';

class KaryawanKontrak extends Karyawan {
    private $durasiKontrakBulan;
    private $agensiPenyalur;

    public function __construct($id = null, $nama = null, $dept = null, $hariMasuk = null, $gajiHari = null, $durasiKontrakBulan = null, $agensiPenyalur = null) {
        parent::__construct($id, $nama, $dept, $hariMasuk, $gajiHari);
        $this->durasiKontrakBulan = $durasiKontrakBulan;
        $this->agensiPenyalur = $agensiPenyalur;
    }

    /**
     * OVERRIDING: Gaji bersih murni berdasarkan jumlah hari kehadiran
     */
    public function hitungGajiBersih() {
        return $this->hariKerjaMasuk * $this->gajiDasarPerHari;
    }

    public function tampilkanProfilKaryawan() {
        return "Status: Kontrak | Agensi: " . $this->agensiPenyalur . " | Durasi: " . $this->durasiKontrakBulan . " Bulan";
    }

    public static function getDaftarKontrak($db) {
        $query = "SELECT id_karyawan, nama_karyawan, departemen, hari_kerja_masuk, gaji_dasar_per_hari, durasi_kontrak_bulan, agensi_penyalur 
                  FROM tabel_karyawan WHERE jenis_karyawan = 'kontrak'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        
        $daftarKaryawan = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $daftarKaryawan[] = new self($row['id_karyawan'], $row['nama_karyawan'], $row['departemen'], $row['hari_kerja_masuk'], $row['gaji_dasar_per_hari'], $row['durasi_kontrak_bulan'], $row['agensi_penyalur']);
        }
        return $daftarKaryawan;
    }
}