<?php

namespace App\Services;

use App\Models\SuratKeterangan;
use App\Models\Dokter;
use Illuminate\Support\Str;
use Carbon\Carbon;

class RtfService
{
    public function generate(SuratKeterangan $surat)
    {
        Carbon::setLocale('id');
        $surat->load(['pendaftar', 'dokter']);
        $pendaftar = $surat->pendaftar;
        $dokter = $surat->dokter;

        $tanggal_lahir = Carbon::parse($pendaftar->tanggal_lahir)->translatedFormat('d F Y');
        $tanggal_cetak = Carbon::parse($surat->tanggal_cetak)->translatedFormat('d F Y');
        $pada_tanggal = Carbon::parse($surat->pada_tanggal)->translatedFormat('d F Y');
        $umur = Carbon::parse($pendaftar->tanggal_lahir)->age;

        $mengetahui = Dokter::where('jabatan', 'LIKE', '%Kepala Bidang Pelayanan%')->first();
        $m_nama = $mengetahui ? $mengetahui->nama_dokter : "dr. Mayasari Ayu Hendrawati, MM";
        $m_nip = $mengetahui ? $mengetahui->nip : "198105172010012026";
        $m_jabatan = $mengetahui ? $mengetahui->jabatan : "Kepala Bidang Pelayanan RSUD dr. Soeratno Gemolong Kabupaten Sragen";
        $m_jabatan_fmt = str_replace(' Gemolong', '\\line Gemolong', $m_jabatan);

        // Clean NIPs globally (remove multiple spaces, tabs, and non-breaking spaces)
        if ($m_nip) {
            $m_nip = trim(preg_replace('/[\s\xc2\xa0]+/', ' ', $m_nip));
        }
        if ($dokter && $dokter->nip) {
            $dokter->nip = trim(preg_replace('/[\s\xc2\xa0]+/', ' ', $dokter->nip));
        }
        if ($dokter && $dokter->sip) {
            $dokter->sip = trim(preg_replace('/[\s\xc2\xa0]+/', ' ', $dokter->sip));
        }

        // Prepare Logos
        $logoSragen = $this->imageToRtf(public_path('images/logo-sragen.png'), 53);
        $logoRS = $this->imageToRtf(public_path('images/logo.png'), 60);
        $ttdMaya = $this->imageToRtf(public_path('images/ttd_dr_maya.png'), 100);

        $viewData = compact(
            'surat',
            'pendaftar',
            'dokter',
            'tanggal_lahir',
            'tanggal_cetak',
            'pada_tanggal',
            'umur',
            'm_nama',
            'm_nip',
            'm_jabatan',
            'm_jabatan_fmt',
            'logoSragen',
            'logoRS',
            'ttdMaya'
        );

        $rtfContent = view('admin.rtf.main', $viewData)->render();

        // Clean up any extra whitespace from Blade that might break RTF
        // RTF is sensitive, but usually Blade's newline is okay. 
        // We'll return the raw rendered string.
        return $rtfContent;
    }

    private function imageToRtf($path, $width_px = 80)
    {
        if (!file_exists($path))
            return "";
        $data = @file_get_contents($path);
        if (!$data)
            return "";

        $hex = bin2hex($data);
        $size = @getimagesize($path);
        if (!$size)
            return "";

        $w_orig = $size[0];
        $h_orig = $size[1];
        $h_px = ($h_orig / $w_orig) * $width_px;

        $picwgoal = round($width_px * 20);
        $pichgoal = round($h_px * 20);

        return "{\\pict\\pngblip\\picw{$w_orig}\\pich{$h_orig}\\picwgoal{$picwgoal}\\pichgoal{$pichgoal} {$hex}}";
    }
}
