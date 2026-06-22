<?php
// file: Karyawan.php

abstract class Karyawan {
    // Properti/Atribut Terenkapsulasi (protected)
    protected $id_karyawan;
    protected $nama_karyawan;
    protected $departemen; // Diperbaiki dari 'dapartemen' agar laras dengan nama kolom database
    protected $hariKerjaMasuk;     // Mapping dari kolom 'hari_kerja_masuk'
    protected $gajiDasarPerHari;   // Mapping dari kolom 'gaji_dasar_per_hari'

    /**
     * Konstruktor untuk memetakan data dari kolom database ke properti objek
     */
    public function __construct($id_karyawan = null, $nama_karyawan = null, $departemen = null, $hari_kerja_masuk = null, $gaji_dasar_per_hari = null) {
        $this->id_karyawan = $id_karyawan;
        $this->nama_karyawan = $nama_karyawan;
        $this->departemen = $departemen;
        $this->hariKerjaMasuk = $hari_kerja_masuk;
        $this->gajiDasarPerHari = $gaji_dasar_per_hari;
    }

    // Getter untuk mengakses properti terenkapsulasi secara aman dari luar class
    public function getIdKaryawan() { return $this->id_karyawan; }
    public function getNamaKaryawan() { return $this->nama_karyawan; }
    public function getDepartemen() { return $this->departemen; }
    public function getHariKerjaMasuk() { return $this->hariKerjaMasuk; }
    public function getGajiDasarPerHari() { return $this->gajiDasarPerHari; }

    // Metode Abstrak (Wajib diimplementasikan tanpa body oleh class anak)
    abstract public function hitungGajiBersih();
    abstract public function tampilkanProfilKaryawan();
}
?>