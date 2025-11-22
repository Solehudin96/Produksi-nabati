<div class="header">
    <table width="100%">
        <tr>
            <td width="60" valign="top">
                <img src="{{ public_path('images/nabati.png') }}" 
                     alt="Logo"
                     style="width: 50px; height: auto;">
            </td>

            <td valign="top">
                <strong>PT Kaldu Sari Nabati Indonesia</strong><br>
            Jl. Raya Cirebon-Bandung KM.24 Desa Banjaran Kec. Sumber Jaya Kab. Majalengka
            <br>Jawa Barat – Indonesia 45455

            </td>
        </tr>
    </table>
</div>


<h2 style="text-align:center;">Laporan Rekap Absensi Karyawan</h2>
<table width="100%" border="1" cellspacing="0" cellpadding="5">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Jam Masuk</th>
            <th>Jam Keluar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($absensis as $a)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $a->karyawan->nama }}</td>
            <td>{{ $a->tanggal }}</td>
            <td>{{ $a->status }}</td>
            <td>{{ $a->jam_masuk }}</td>
            <td>{{ $a->jam_keluar }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
