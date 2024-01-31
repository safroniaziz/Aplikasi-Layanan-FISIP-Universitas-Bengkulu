<style>
    td{
        font-family:'Times New Roman', Times, serif;
    }

    *{
        font-size: 12px;
    }

    #table {
        border-collapse: collapse;
        width: 100%;
    }

    #table td, #table th {
        border: 1px solid #ddd;
        padding: 2px;
    }

    #table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        color: black;
    }
</style>
<table style="width: 100%">
    <tr>
        <td style="width: 15%"></td>
        <td style="width: 15%"></td>
        <td style="width: 15%"></td>
        <td colspan="3">ANAK LAMPIRAN</td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td colspan="3">PERATURAN BADAN KEPEGAWAIAN NEGARA</td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td colspan="3">REPUBLIK INDONESIA</td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td colspan="3">NOMOR 24 TAHUN 2017</td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td colspan="3">TENTANG</td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td colspan="3">TATA CARA PEMBERIAN CUTI PEGAWAI NEGERI SIPIL</td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>Bengkulu,</td>
        <td></td>

    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>Kepada</td>
        <td></td>

    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>Yth.</td>
        <td></td>

    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>....................................................</td>
        <td></td>

    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>....................................................</td>
        <td></td>

    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>di Universitas Bengkulu</td>
        <td></td>

    </tr>
</table>

<h1 style="text-align: center">FORMULIR PERMINTAAN DAN PEMBERIAN CUTI</h1>
<table style="width: 100%; border-collapse: collapse;">
    <tr>
        <td colspan="4" style="border: 1px solid #000; padding: 2px; font-weight: bold;">I. DATA PEGAWAI</td>
    </tr>
    <tr>
        <td style="border: 1px solid #000; padding: 2px;">Nama</td>
        <td style="border: 1px solid #000; padding: 2px;">{{ $nama_pegawai }}</td>
        <td style="border: 1px solid #000; padding: 2px;">NIP</td>
        <td style="border: 1px solid #000; padding: 2px;">{{ $nip }}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #000; padding: 2px;">Jabatan</td>
        <td style="border: 1px solid #000; padding: 2px;">{{ $jabatan }}</td>
        <td style="border: 1px solid #000; padding: 2px;">Masa Kerja</td>
        <td style="border: 1px solid #000; padding: 2px;">{{ $masa_kerja }} Tahun</td>
    </tr>
    <tr>
        <td colspan="3" style="border: 1px solid #000; padding: 2px;">Unit Kerja</td>
        <td style="border: 1px solid #000; padding: 2px;">{{ $unit_kerja }}</td>
    </tr>
</table>
<br>
<table style="width: 100%; border-collapse: collapse;">
    <tr>
        <td colspan="4" style="border: 1px solid #000; padding: 2px; font-weight: bold;">II. JENIS CUTI YANG DIAMBIL</td>
    </tr>
    <tr>
        <td style="border: 1px solid #000; padding: 2px;">1. Cuti Tahunan</td>
        <td style="border: 1px solid #000; padding: 2px;">{{ $jenis_cuti == "cuti_tahunan" ? 'Ya' : '' }}</td>
        <td style="border: 1px solid #000; padding: 2px;">2. Cuti Besar</td>
        <td style="border: 1px solid #000; padding: 2px;">{{ $jenis_cuti == "cuti_besar" ? 'Ya' : '' }}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #000; padding: 2px;">3. Cuti Sakit</td>
        <td style="border: 1px solid #000; padding: 2px;">{{ $jenis_cuti == "cuti_sakit" ? 'Ya' : '' }}</td>
        <td style="border: 1px solid #000; padding: 2px;">4. Cuti Melahirkan</td>
        <td style="border: 1px solid #000; padding: 2px;">{{ $jenis_cuti == "cuti_melahirkan" ? 'Ya' : '' }}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #000; padding: 2px;">5. Cuti Karena Alasan Penting</td>
        <td style="border: 1px solid #000; padding: 2px;">{{ $jenis_cuti == "cuti_alasan_penting" ? 'Ya' : '' }}</td>
        <td style="border: 1px solid #000; padding: 2px;">6. Cuti di Luar Tanggungan Negara</td>
        <td style="border: 1px solid #000; padding: 2px;">{{ $jenis_cuti == "cuti_luar_tanggungan" ? 'Ya' : '' }}</td>
    </tr>
</table>
<br>
<table style="width: 100%; border-collapse: collapse;">
    <tr>
        <td style="border: 1px solid #000; padding: 2px; font-weight: bold;">III. ALASAN CUTI</td>
    </tr>
    <tr>
        <td style="border: 1px solid #000; padding: 2px; font-weight: bold;">{{ $keperluan }}</td>
    </tr>
</table>
<br>
<table style="width: 100%; border-collapse: collapse;">
    <tr>
        <td colspan="6" style="border: 1px solid #000; padding: 2px; font-weight: bold;">IV. LAMA CUTI</td>
    </tr>
    <tr>
        <td style="border: 1px solid #000; padding: 2px; font-weight: bold;">Selama</td>
        <td style="border: 1px solid #000; padding: 2px; font-weight: bold;">{{ $lama_cuti }} </td>
        <td style="border: 1px solid #000; padding: 2px; font-weight: bold;">Mulai Dari</td>
        <td style="border: 1px solid #000; padding: 2px; font-weight: bold;">{{ $dari_tanggal }}</td>
        <td style="border: 1px solid #000; padding: 2px; font-weight: bold;">s/d</td>
        <td style="border: 1px solid #000; padding: 2px; font-weight: bold;">{{ $sampai_tanggal }}</td>
    </tr>
</table>
<br>
<table style="width: 100%; border-collapse: collapse;">
    <tr>
        <td colspan="5" style="border: 1px solid #000; padding: 2px; font-weight: bold;">V. CATATAN CUTI***</td>
    </tr>
    <tr>
        <td colspan="3" style="border: 1px solid #000; padding: 2px;">1. Cuti Tahunan</td>
        <td style="border: 1px solid #000; padding: 2px;">2. CUTI BESAR</td>
        <td style="border: 1px solid #000; padding: 2px;"></td>
    </tr>
    <tr>
        <td style="border: 1px solid #000; padding: 2px;">Tahun</td>
        <td style="border: 1px solid #000; padding: 2px;">Sisa</td>
        <td style="border: 1px solid #000; padding: 2px;">Keterangan</td>
        <td style="border: 1px solid #000; padding: 2px;">3. CUTI SAKIT</td>
        <td style="border: 1px solid #000; padding: 2px;"></td>
    </tr>
    <tr>
        <td style="border: 1px solid #000; padding: 2px;">N-2</td>
        <td style="border: 1px solid #000; padding: 2px;"></td>
        <td style="border: 1px solid #000; padding: 2px;"></td>
        <td style="border: 1px solid #000; padding: 2px;">4. CUTI MELAHIRKAN</td>
        <td style="border: 1px solid #000; padding: 2px;"></td>
    </tr>
    <tr>
        <td style="border: 1px solid #000; padding: 2px;">N-1</td>
        <td style="border: 1px solid #000; padding: 2px;"></td>
        <td style="border: 1px solid #000; padding: 2px;"></td>
        <td style="border: 1px solid #000; padding: 2px;">5. CUTI KARENA ALASAN PENTING</td>
        <td style="border: 1px solid #000; padding: 2px;"></td>
    </tr>
    <tr>
        <td style="border: 1px solid #000; padding: 2px;">N</td>
        <td style="border: 1px solid #000; padding: 2px;"></td>
        <td style="border: 1px solid #000; padding: 2px;"></td>
        <td style="border: 1px solid #000; padding: 2px;">6. CUTI DI LUAR TANGGUNGAN NEGARA</td>
        <td style="border: 1px solid #000; padding: 2px;"></td>
    </tr>
</table>
<br>
<table style="width: 100%; border-collapse: collapse;">
    <tr>
        <td colspan="3" style="border: 1px solid #000; padding: 2px; font-weight: bold;">VI. ALAMAT SELAMA MENJALANKAN CUTI</td>
    </tr>
    <tr>
        <td style="border: 1px solid #000; padding: 2px; width:65%"></td>
        <td style="border: 1px solid #000; padding: 2px;">TELEPHONE</td>
        <td style="border: 1px solid #000; padding: 2px;">{{ $telephone }}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #000; padding: 2px;"></td>
        <td style="border: 1px solid #000; padding: 2px; text-align:center  " colspan="2">Hormat Saya, <br><br><br><br>({{ $nama_pegawai }}) <br> {{ $nip }}</td>
    </tr>
</table>
<br>
<table style="width: 100%; border-collapse: collapse;">
    <tr>
        <td colspan="4" style="border: 1px solid #000; padding: 2px; font-weight: bold;">VII. PERTIMBANGAN ATASAN LANGSUNG**</td>
    </tr>
    <tr>
        <td style="border: 1px solid #000; padding: 2px;">DISETUJUI</td>
        <td style="border: 1px solid #000; padding: 2px;">PERUBAHAN****</td>
        <td style="border: 1px solid #000; padding: 2px;">DITANGGUHKAN****</td>
        <td style="border: 1px solid #000; padding: 2px;">TIDAK DISETUJUI****</td>
    </tr>
    <tr>
        <td style="border: 1px solid #000; padding: 2px;"></td>
        <td style="border: 1px solid #000; padding: 2px;"></td>
        <td style="border: 1px solid #000; padding: 2px;"></td>
        <td style="border: 1px solid #000; padding: 2px;"></td>
    </tr>
    <tr>
        <td style="border: 1px solid #000; padding: 2px;"></td>
        <td style="border: 1px solid #000; padding: 2px;"></td>
        <td style="border: 1px solid #000; padding: 2px;"></td>
        <td style="border: 1px solid #000; padding: 2px; text-align:center"><br><br><br><br>({{ $nama_atasan }}) <br> NIP {{ $nip_atasan }}</td>
    </tr>
</table>
<br>
<table style="width: 100%; border-collapse: collapse;">
    <tr>
        <td colspan="4" style="border: 1px solid #000; padding: 2px; font-weight: bold;">VIII. KEPUTUSAN PEJABAT YANG BERWENANG MEMBERIKAN CUTI**</td>
    </tr>
    <tr>
        <td style="border: 1px solid #000; padding: 2px;">DISETUJUI</td>
        <td style="border: 1px solid #000; padding: 2px;">PERUBAHAN****</td>
        <td style="border: 1px solid #000; padding: 2px;">DITANGGUHKAN****</td>
        <td style="border: 1px solid #000; padding: 2px;">TIDAK DISETUJUI****</td>
    </tr>
    <tr>
        <td style="border: 1px solid #000; padding: 2px;"></td>
        <td style="border: 1px solid #000; padding: 2px;"></td>
        <td style="border: 1px solid #000; padding: 2px;"></td>
        <td style="border: 1px solid #000; padding: 2px;"></td>
    </tr>
    <tr>
        <td style="border: 1px solid #000; padding: 2px;"></td>
        <td style="border: 1px solid #000; padding: 2px;"></td>
        <td style="border: 1px solid #000; padding: 2px;"></td>
        <td style="border: 1px solid #000; padding: 2px; text-align:center"><br><br><br><br>({{ $nama_berwenang }}) <br> NIP {{ $nip_berwenang }}</td>
    </tr>
</table>
<br>
Catatan <br>
* Coret yang tidak perlu <br>
** Pilih salah satu dengan memberikan tanda centang <br>
*** Diisi oleh pejabat yang menandatangani bidang kepegawaian sebelum PNS mengajukan cuti <br>
**** Diberi tanda centang dan alasannya <br>
N = Cuti tahun berjalan <br>
N-1 = Sisa cuti 1 tahun sebelumnya <br>
