<!DOCTYPE html>
<html lang="id">
@php \Carbon\Carbon::setLocale('id'); @endphp

<head>
    <meta charset="UTF-8">
    <title>{{ $judul_surat ?? 'Surat Keterangan' }} - {{ $surat->pendaftar->nama_lengkap }}</title>
    @include('admin.cetak.partials.styles')
</head>

<body>
    @include('admin.cetak.partials.toolbar')

    <div class="paper">
        @include('admin.cetak.partials.header')

        @include('admin.cetak.contents.' . $content_view)

        @include('admin.cetak.partials.footer', [
            'surat' => $surat,
            'mengetahui' => $mengetahui,
            'jabatan_dokter' => $jabatan_dokter ?? 'Dokter Pemeriksa',
            'use_sip' => $use_sip ?? false
        ])
    </div>
</body>

</html>
