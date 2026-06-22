<?php
// 1. Import semua file koneksi dan class yang diperlukan
//pbo
require_once 'koneksi.php';
require_once 'Karyawan.php';
require_once 'KaryawanKontrak.php';
require_once 'KaryawanTetap.php';
require_once 'KaryawanMagang.php';

// Inisialisasi koneksi database
$database = new Database();
$db = $database->getConnection();

if (!$db) {
    die("Gagal terhubung ke database.");
}

// 2. Memanfaatkan metode query spesifik untuk memisahkan data secara terkelompok
$daftarKontrak = KaryawanKontrak::getDaftarKontrak($db);
$daftarTetap    = KaryawanTetap::getDaftarTetap($db);
$daftarMagang   = KaryawanMagang::getDaftarMagang($db);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Slip Gaji Karyawan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
        }
        h2 {
            color: #2c3e50;
            border-left: 5px solid #3498db;
            padding-left: 10px;
            margin-top: 40px;
            margin-bottom: 15px;
        }
        .table-responsive {
            background: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #34495e;
            color: #fff;
        }
        tr:hover {
            background-color: #f9f9f9;
        }
        .badge {
            display: inline-block;
            padding: 5px 10px;
            background-color: #ecf0f1;
            color: #2c3e50;
            border-radius: 4px;
            font-size: 0.85em;
            font-weight: bold;
        }
        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .empty-row {
            text-align: center;
            color: #7f8c8d;
            font-style: italic;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Dashboard Manajemen Slip Gaji Karyawan</h1>

    <h2><span style="color: #3498db;">■</span> Kategori Karyawan Kontrak</h2>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>ID Karyawan</th>
                    <th>Nama Lengkap</th>
                    <th>Departemen</th>
                    <th class="text-center">Hari Kerja</th>
                    <th>Spesifikasi Jabatan (Polimorfisme)</th>
                    <th class="text-right">Tarif Harian</th>
                    <th class="text-right">Gaji Bersih Akhir (Polimorfisme)</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($daftarKontrak)): ?>
                    <tr><td colspan="7" class="empty-row">Tidak ada data karyawan kontrak.</td></tr>
                <?php else: ?>
                    <?php foreach ($daftarKontrak as $karyawan): ?>
                        <tr>
                            <td><strong><?= htmlspecialchars($karyawan->getIdKaryawan()) ?></strong></td>
                            <td><?= htmlspecialchars($karyawan->getNamaKaryawan()) ?></td>
                            <td><?= htmlspecialchars($karyawan->getDepartemen()) ?></td>
                            <td class="text-center"><?= htmlspecialchars($karyawan->getHariKerjaMasuk()) ?> hari</td>
                            <td><span class="badge" style="background-color: #eaf2f8; color: #2471a3;"><?= htmlspecialchars($karyawan->tampilkanProfilKaryawan()) ?></span></td>
                            <td class="text-right">Rp <?= number_format($karyawan->getGajiDasarPerHari(), 2, ',', '.') ?></td>
                            <td class="text-right" style="font-weight: bold; color: #27ae60;">
                                Rp <?= number_format($karyawan->hitungGajiBersih(), 2, ',', '.') ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <h2><span style="color: #2ecc71;">■</span> Kategori Karyawan Tetap</h2>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>ID Karyawan</th>
                    <th>Nama Lengkap</th>
                    <th>Departemen</th>
                    <th class="text-center">Hari Kerja</th>
                    <th>Spesifikasi Jabatan (Polimorfisme)</th>
                    <th class="text-right">Tarif Harian</th>
                    <th class="text-right">Tunjangan Kesehatan</th>
                    <th class="text-right">Gaji Bersih Akhir (Polimorfisme)</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($daftarTetap)): ?>
                    <tr><td colspan="8" class="empty-row">Tidak ada data karyawan tetap.</td></tr>
                <?php else: ?>
                    <?php foreach ($daftarTetap as $karyawan): ?>
                        <tr>
                            <td><strong><?= htmlspecialchars($karyawan->getIdKaryawan()) ?></strong></td>
                            <td><?= htmlspecialchars($karyawan->getNamaKaryawan()) ?></td>
                            <td><?= htmlspecialchars($karyawan->getDepartemen()) ?></td>
                            <td class="text-center"><?= htmlspecialchars($karyawan->getHariKerjaMasuk()) ?> hari</td>
                            <td><span class="badge" style="background-color: #e8f8f5; color: #117a65;"><?= htmlspecialchars($karyawan->tampilkanProfilKaryawan()) ?></span></td>
                            <td class="text-right">Rp <?= number_format($karyawan->getGajiDasarPerHari(), 2, ',', '.') ?></td>
                            <td class="text-right">Rp <?= number_format($karyawan->getTunjanganKesehatan(), 2, ',', '.') ?></td>
                            <td class="text-right" style="font-weight: bold; color: #27ae60;">
                                Rp <?= number_format($karyawan->hitungGajiBersih(), 2, ',', '.') ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <h2><span style="color: #e67e22;">■</span> Kategori Karyawan Magang</h2>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>ID Karyawan</th>
                    <th>Nama Lengkap</th>
                    <th>Departemen</th>
                    <th class="text-center">Hari Kerja</th>
                    <th>Spesifikasi Jabatan (Polimorfisme)</th>
                    <th class="text-right">Tarif Harian (Sebelum Potongan)</th>
                    <th class="text-right">Gaji Bersih Akhir (Polimorfisme - Potong 20%)</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($daftarMagang)): ?>
                    <tr><td colspan="7" class="empty-row">Tidak ada data karyawan magang.</td></tr>
                <?php else: ?>
                    <?php foreach ($daftarMagang as $karyawan): ?>
                        <tr>
                            <td><strong><?= htmlspecialchars($karyawan->getIdKaryawan()) ?></strong></td>
                            <td><?= htmlspecialchars($karyawan->getNamaKaryawan()) ?></td>
                            <td><?= htmlspecialchars($karyawan->getDepartemen()) ?></td>
                            <td class="text-center"><?= htmlspecialchars($karyawan->getHariKerjaMasuk()) ?> hari</td>
                            <td><span class="badge" style="background-color: #fdf2e9; color: #a04000;"><?= htmlspecialchars($karyawan->tampilkanProfilKaryawan()) ?></span></td>
                            <td class="text-right">Rp <?= number_format($karyawan->getGajiDasarPerHari(), 2, ',', '.') ?></td>
                            <td class="text-right" style="font-weight: bold; color: #27ae60;">
                                Rp <?= number_format($karyawan->hitungGajiBersih(), 2, ',', '.') ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>

</body>
</html>