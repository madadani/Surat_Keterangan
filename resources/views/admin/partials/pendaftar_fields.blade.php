<div class="p-8 lg:p-12 space-y-8">
    <div class="space-y-2">
        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Nama Lengkap
            Pasien</label>
        <input type="text" name="nama_lengkap" value="{{ $pendaftar->nama_lengkap ?? old('nama_lengkap') }}"
            class="w-full bg-gray-50 border border-gray-400 rounded-2xl px-5 py-4 font-bold text-brand-darkblue focus:bg-white focus:border-brand-blue outline-none transition-all"
            required>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="space-y-2">
            <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" value="{{ $pendaftar->tempat_lahir ?? old('tempat_lahir') }}"
                class="w-full bg-gray-50 border border-gray-400 rounded-2xl px-5 py-4 font-bold text-brand-darkblue focus:bg-white focus:border-brand-blue outline-none transition-all"
                required>
        </div>
        <div class="space-y-2">
            <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" value="{{ $pendaftar->tanggal_lahir ?? old('tanggal_lahir') }}"
                class="w-full bg-gray-50 border border-gray-400 rounded-2xl px-5 py-4 font-bold text-brand-darkblue focus:bg-white focus:border-brand-blue outline-none transition-all"
                required>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="space-y-2">
            <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Jenis Kelamin</label>
            <div class="flex gap-4">
                <label class="flex-1">
                    <input type="radio" name="gender" value="Laki-laki" class="hidden peer" {{ ($pendaftar->jenis_kelamin ?? old('gender')) == 'Laki-laki' ? 'checked' : '' }} required>
                    <div
                        class="p-4 text-center border border-gray-400 rounded-xl font-black text-xs cursor-pointer peer-checked:bg-brand-blue peer-checked:text-white peer-checked:border-brand-blue transition-all text-gray-400 uppercase tracking-widest">
                        LAKI-LAKI</div>
                </label>
                <label class="flex-1">
                    <input type="radio" name="gender" value="Perempuan" class="hidden peer" {{ ($pendaftar->jenis_kelamin ?? old('gender')) == 'Perempuan' ? 'checked' : '' }}>
                    <div
                        class="p-4 text-center border border-gray-400 rounded-xl font-black text-xs cursor-pointer peer-checked:bg-brand-blue peer-checked:text-white peer-checked:border-brand-blue transition-all text-gray-400 uppercase tracking-widest">
                        PEREMPUAN</div>
                </label>
            </div>
        </div>
        <div class="space-y-2">
            <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Nomor HP /
                WhatsApp</label>
            <input type="tel" name="no_hp" value="{{ $pendaftar->no_hp ?? old('no_hp') }}"
                class="w-full bg-gray-50 border border-gray-400 rounded-2xl px-5 py-4 font-bold text-brand-darkblue focus:bg-white focus:border-brand-blue outline-none transition-all"
                oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="space-y-2">
            <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Tinggi Badan (cm)</label>
            <input type="text" name="tinggi_badan" value="{{ $pendaftar->tinggi_badan ?? old('tinggi_badan') }}"
                class="w-full bg-gray-50 border border-gray-400 rounded-2xl px-5 py-4 font-bold text-brand-darkblue focus:bg-white focus:border-brand-blue outline-none transition-all"
                oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
        </div>
        <div class="space-y-2">
            <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Berat Badan (kg)</label>
            <input type="text" name="berat_badan" value="{{ $pendaftar->berat_badan ?? old('berat_badan') }}"
                class="w-full bg-gray-50 border border-gray-400 rounded-2xl px-5 py-4 font-bold text-brand-darkblue focus:bg-white focus:border-brand-blue outline-none transition-all"
                oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="space-y-2">
            <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Pekerjaan</label>
            <input type="text" name="pekerjaan" value="{{ $pendaftar->pekerjaan ?? old('pekerjaan') }}"
                class="w-full bg-gray-50 border border-gray-400 rounded-2xl px-5 py-4 font-bold text-brand-darkblue focus:bg-white focus:border-brand-blue outline-none transition-all"
                required>
        </div>
        <div class="space-y-2">
            <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Pendidikan
                Terakhir</label>
            <input type="text" name="pendidikan" value="{{ $pendaftar->pendidikan ?? old('pendidikan') }}"
                class="w-full bg-gray-50 border border-gray-400 rounded-2xl px-5 py-4 font-bold text-brand-darkblue focus:bg-white focus:border-brand-blue outline-none transition-all"
                required>
        </div>
    </div>

    <div class="space-y-2">
        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Keperluan Pembuatan
            Surat</label>
        <input type="text" name="keperluan" value="{{ $pendaftar->keperluan ?? old('keperluan') }}"
            class="w-full bg-gray-50 border border-gray-400 rounded-2xl px-5 py-4 font-bold text-brand-darkblue focus:bg-white focus:border-brand-blue outline-none transition-all"
            required placeholder="Contoh: Melamar Pekerjaan, Melanjutkan Pendidikan, dll">
    </div>

    <div class="space-y-2">
        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Alamat Lengkap</label>
        <textarea name="alamat" rows="3"
            class="w-full bg-gray-50 border border-gray-400 rounded-2xl px-5 py-4 font-bold text-brand-darkblue focus:bg-white focus:border-brand-blue outline-none transition-all resize-none"
            required>{{ $pendaftar->alamat ?? old('alamat') }}</textarea>
    </div>

    <div class="pt-8 border-t border-gray-50">
        <label class="text-[10px] font-black text-brand-blue uppercase tracking-[0.2em] block mb-6">Pilih Jenis
            Pemeriksaan</label>
        @php
            $selectedTests = isset($pendaftar) ? explode(', ', $pendaftar->jenis_test) : old('jenis_test', []);
        @endphp
        <div class="grid grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach(['Kesehatan', 'Kesehatan Jiwa', 'Bebas Narkoba', 'THT', 'Mata', 'Orthopedi', 'Paru', 'Dalam', 'Gigi', 'Jantung', 'MCU', 'TKHI'] as $test)
                <label
                    class="flex items-center gap-3 p-4 bg-gray-50 rounded-2xl cursor-pointer hover:bg-brand-blue/5 transition-all group">
                    <input type="checkbox" name="jenis_test[]" value="{{ $test }}" {{ in_array($test, $selectedTests) ? 'checked' : '' }} class="w-5 h-5 rounded border-gray-300 text-brand-blue focus:ring-brand-blue">
                    <span
                        class="text-[10px] font-black text-gray-500 uppercase tracking-tighter group-hover:text-brand-blue transition-colors">{{ $test }}</span>
                </label>
            @endforeach
        </div>
    </div>

    <div class="pt-10 border-t border-gray-50 flex gap-6">
        <button type="submit"
            class="flex-1 bg-brand-blue text-white py-5 rounded-2xl font-black uppercase tracking-[0.2em] shadow-xl shadow-brand-blue/20 hover:bg-brand-darkblue hover:-translate-y-1 transition-all">
            {{ isset($pendaftar) ? 'SIMPAN PERUBAHAN' : 'SIMPAN DATA PENDAFTAR' }}
        </button>
        <a href="{{ url('/admin/data-pendaftar') }}"
            class="px-10 bg-gray-100 text-gray-500 py-5 rounded-2xl font-black uppercase tracking-[0.2em] hover:bg-gray-200 transition-all text-center">
            BATAL
        </a>
    </div>
</div>