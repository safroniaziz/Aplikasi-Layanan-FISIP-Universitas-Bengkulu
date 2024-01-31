<style>
    td{
        font-family:'Times New Roman', Times, serif;
    }





    #table {
        border-collapse: collapse;
        width: 100%;
    }

    #table td, #table th {
        border: 1px solid #ddd;
        padding: 8px;
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
        <td rowspan="7" style="width: 25%; height: 150px; display:  align-items: center; justify-content: center;">
            <div style="width: 30%; height: 150px; display: flex; align-items: center; justify-content: center;">
                <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/img/logo.svg'))) }}" width="100" alt="">
            </div>
        </td>


        <!-- Tambahkan padding atau margin pada elemen yang berada di sekitar kolom pertama -->
        <td colspan=2 style="text-align: center;padding: 5px; font-size:23px;">KEMENTERIAN PENDIDIKAN, KEBUDAYAAN</td>

    </tr>
    <tr>
        <td colspan="2" style="text-align: center; font-size:23px;">RISET DAN TEKNOLOGI </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center; font-size:23px;">UNIVERSITAS BENGKULU </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center;font-size:23px;"><b>FAKULTAS ILMU SOSIAL DAN ILMU POLITIK</b> </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center;">Jalan W.R. Supratman, Kandang Limun, Bengkulu 38371A </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center;">Telephone: (9736)21170, 21884, Faksimile: (9736)22105 </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center;">Laman: www.fisip.unib.ac.id <i>email</i>: fisip@unib.ac.id </td>
    </tr>
</table>
<hr>
<p style="font-size: 20px !important; text-align:center"><u><b>SURAT TUGAS</b></u></p>
<table style="width: 100%" id="table">
    <thead>
        <tr>
            <td style="text-align: center; font-weight:bold">No</td>
            <td style="text-align: center; font-weight:bold">Nama</td>
            <td style="text-align: center; font-weight:bold">Tugas</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($suratTugas->anggotas as $index=> $anggota)
            <tr>
                <td style="width: 1%">{{ $index+1 }}</td>
                <td style="text-align: justify">{!! $anggota->nama_yang_bertugas !!}</td>
                <td style="text-align:">{{ $anggota->keterangan_tugas }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<br>
<p>
    {{ $suratTugas->deskripsi_tugas }}
</p>
    <p>
    Demikian surat tugas ini dibuat sebenarnya untuk dipergunakan sebagaimana mestinya
</p>
<table style="width: 100%; padding-top:30px !important;">
    <tr>
        <td style="width: 60%"></td>
        <td>{{ $suratTugas->kepala_tanda_tangan }} </td>
    </tr>
    <tr>
        <td style="width: 60%"></td>
        <td>{{ $suratTugas->jabatan_yang_tanda_tangan }},</td>
    </tr>
    <tr>
        <td style="padding: 50px 0px 50px 0px"></td>
        <td></td>
    </tr>
    <tr>
        <td style="width: 60%"></td>
        <td>{{ $suratTugas->nama_yang_tanda_tangan }} </td>
    </tr>
    <tr>
        <td style="width: 60%"></td>
        <td>NIP {{ $suratTugas->nip_yang_tanda_tangan }} </td>
    </tr>
</table>
