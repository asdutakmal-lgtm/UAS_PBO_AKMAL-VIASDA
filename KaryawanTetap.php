<?php
// file: KaryawanTetap.php
require_once 'Karyawan.php';

class KaryawanTetap extends Karyawan {
    // Properti tambahan spesifik
    private $tunjanganKesehatan;
    private $opsiSahamId;

    // Konstruktor untuk inisialisasi data objek
    public function __construct($id = null, $nama = null, $dept = null, $hariMasuk = null, $gajiHari = null, $tunjanganKesehatan = null, $opsiSahamId = null) {
        // Memanggil konstruktor dari abstract class induk (Karyawan)
        parent::__construct($id, $nama, $dept, $hariMasuk, $gajiHari);
        $this->tunjanganKesehatan = $tunjanganKesehatan;
        $this->opsiSahamId = $opsiSahamId;
    }

    /**
     * Metode Getter (Menyediakan akses aman untuk view.php)
     */
    public function getTunjanganKesehatan() { 
        return $this->tunjanganKesehatan; 
    }

    public function getOpsiSahamId() { 
        return $this->opsiSahamId; 
    }

    /**
     * OVERRIDING: Menghitung Gaji Bersih Karyawan Tetap
     * Rumus: (Hari Kerja * Gaji Dasar) + Tunjangan Kesehatan
     */
    public function hitungGajiBersih() {
        return ($this->hariKerjaMasuk * $this->gajiDasarPerHari) + $this->tunjanganKesehatan;
    }

    /**
     * OVERRIDING: Menampilkan informasi spesifik jabatan
     */
    public function tampilkanProfilKaryawan() {
        return "Status: Tetap | ID Saham: " . $this->opsiSahamId;
    }

    /**
     * Metode Query Select WHERE Spesifik menggunakan PDO
     */
    public static function getDaftarTetap($db) {
        $query = "SELECT id_karyawan, nama_karyawan, departemen, hari_kerja_masuk, gaji_dasar_per_hari, tunjangan_kesehatan, opsi_saham_id 
                  FROM tabel_karyawan 
                  WHERE jenis_karyawan = 'tetap'";
        
        $stmt = $db->prepare($query);
        $stmt->execute();
        
        $daftarKaryawan = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $daftarKaryawan[] = new self(
                $row['id_karyawan'],
                $row['nama_karyawan'],
                $row['departemen'],
                $row['hari_kerja_masuk'],
                $row['gaji_dasar_per_hari'],
                $row['tunjangan_kesehatan'],
                $row['opsi_saham_id']
            );
        }
        return $daftarKaryawan;
    }
}
?>