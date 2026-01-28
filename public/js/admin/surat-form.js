document.addEventListener('DOMContentLoaded', function () {
    const config = window.suratConfig || { nextNomor: '', selectedId: '', isEdit: false };
    let lastNomor = config.nextNomor;

    // Nomor Surat Toggle Logic
    const useNomorCheck = document.getElementById('use_nomor');
    const nomorInput = document.getElementById('nomor_surat_input');

    if (useNomorCheck && nomorInput) {
        useNomorCheck.addEventListener('change', function () {
            if (this.checked) {
                nomorInput.value = lastNomor;
                nomorInput.readOnly = true;
                nomorInput.classList.add('bg-gray-50', 'text-gray-400');
                nomorInput.classList.remove('bg-white', 'text-brand-darkblue');
            } else {
                nomorInput.readOnly = false;
                nomorInput.classList.remove('bg-gray-50', 'text-gray-400');
                nomorInput.classList.add('bg-white', 'text-brand-darkblue');
                if (nomorInput.value === lastNomor) {
                    nomorInput.value = '';
                    nomorInput.focus();
                }
            }
        });

        // Initial state for nomor surat
        if (useNomorCheck.checked) {
            nomorInput.readOnly = true;
            nomorInput.classList.add('bg-gray-50', 'text-gray-400');
        }
    }

    // Pendaftar Selection Logic
    const pendaftarSelect = document.getElementById('pendaftar_select');
    if (pendaftarSelect) {
        pendaftarSelect.addEventListener('change', function () {
            const selected = this.options[this.selectedIndex];
            const tipeBerkasRow = document.getElementById('row_tipe_berkas');
            const tipeBerkasSelect = document.getElementById('tipe_berkas_select');

            if (!this.value || !selected) {
                if (tipeBerkasRow) tipeBerkasRow.classList.add('hidden');
                resetDisplayFields();
                return;
            }

            try {
                const data = selected.dataset;

                // Show & Update Tipe Berkas
                if (tipeBerkasRow) tipeBerkasRow.classList.remove('hidden');
                if (tipeBerkasSelect && !config.isEdit) {
                    fillTipeBerkasOptions(data, tipeBerkasSelect);
                }

                fillDisplayFields(data);

                // Nomor Surat logic
                const nomorInput = document.getElementById('nomor_surat_input');
                let targetNomor = data.nomorSurat || config.nextNomor;
                lastNomor = targetNomor;

                if (nomorInput) {
                    if (useNomorCheck && useNomorCheck.checked) {
                        nomorInput.value = targetNomor;
                    }

                    if (data.nomorSurat) {
                        nomorInput.classList.add('bg-yellow-50', 'text-yellow-700', 'border-yellow-200');
                    } else {
                        nomorInput.classList.remove('bg-yellow-50', 'text-yellow-700', 'border-yellow-200');
                    }
                }

            } catch (err) {
                console.error('Auto-fill error:', err);
            }
        });

        // Trigger change if selected_id is preset
        if (config.selectedId) {
            pendaftarSelect.dispatchEvent(new Event('change'));
        }
    }

    // Tipe Berkas Change Logic
    const tipeBerkasSelect = document.getElementById('tipe_berkas_select');
    if (tipeBerkasSelect) {
        tipeBerkasSelect.addEventListener('change', function () {
            toggleSections(this.value);
        });

        // If edit mode or value preset, trigger sections
        if (tipeBerkasSelect.value) {
            toggleSections(tipeBerkasSelect.value);
        }
    }

    // BMI Calculation
    const mcuTinggi = document.getElementById('mcu_tinggi');
    const mcuBerat = document.getElementById('mcu_berat');
    if (mcuTinggi) mcuTinggi.addEventListener('input', calculateBMI);
    if (mcuBerat) mcuBerat.addEventListener('input', calculateBMI);

    // Helpers
    function resetDisplayFields() {
        const fields = ['display_gender', 'display_tempat', 'display_tanggal', 'display_alamat', 'display_hp', 'display_tinggi', 'display_berat', 'display_pekerjaan', 'display_pendidikan', 'input_keperluan', 'display_perusahaan'];
        fields.forEach(id => {
            const el = document.getElementById(id);
            if (el) el.value = '';
        });

        // Reset nomor surat ke default global
        lastNomor = config.nextNomor;
        const nomorInput = document.getElementById('nomor_surat_input');
        if (nomorInput && useNomorCheck && useNomorCheck.checked) {
            nomorInput.value = lastNomor;
        }
    }

    function fillDisplayFields(data) {
        const setVal = (id, val) => {
            const el = document.getElementById(id);
            if (el) el.value = val || '';
        };
        setVal('display_gender', data.gender);
        setVal('display_tempat', data.tempat);
        setVal('display_tanggal', data.tanggal);
        setVal('display_alamat', data.alamat);
        setVal('display_hp', data.hp);
        setVal('display_tinggi', data.tinggi);
        setVal('display_berat', data.berat);
        setVal('display_pekerjaan', data.pekerjaan);
        setVal('display_pendidikan', data.pendidikan);
        setVal('display_perusahaan', data.perusahaan);
        setVal('mcu_tinggi', data.tinggi);
        setVal('mcu_berat', data.berat);
        setVal('input_keperluan', data.keperluan);
        setVal('no_rm_gigi_input', data.noRm);
        setVal('keperluan_gigi_input', data.keperluan);

        // Auto calculate BMI if data available
        calculateBMI();
    }

    function fillTipeBerkasOptions(data, select) {
        select.innerHTML = '<option value="">-- Pilih Tipe Surat --</option>';
        const tests = (data.tests || '').split(', ');
        const existing = (data.existing || '').split(', ');

        tests.forEach(test => {
            let val = '';
            const t = test.toLowerCase();
            if (t.includes('jiwa')) val = 'Kesehatan Jiwa';
            else if (t.includes('narkoba')) val = 'Bebas Narkoba';
            else if (t.includes('tht')) val = 'Kesehatan THT';
            else if (t.includes('mata')) val = 'Kesehatan Mata';
            else if (t.includes('gigi')) val = 'Kesehatan Gigi';
            else if (t.includes('ortho')) val = 'Kesehatan Orthopedi';
            else if (t.includes('paru')) val = 'Kesehatan Paru';
            else if (t.includes('dalam')) val = 'Kesehatan Penyakit Dalam';
            else if (t.includes('jantung')) val = 'Kesehatan Jantung';
            else if (t.includes('mcu')) val = 'Medical Check Up';
            else if (t.includes('tkhi')) val = 'Kesehatan TKHI';
            else if (t.includes('kesehatan')) val = 'Kesehatan';

            if (val && !existing.includes(val)) {
                const opt = document.createElement('option');
                opt.value = val;
                opt.textContent = `SURAT KETERANGAN ${val.toUpperCase()}`;
                select.appendChild(opt);
            }
        });
    }

    function toggleSections(val) {
        const sections = {
            'Kesehatan': 'section_kesehatan',
            'Kesehatan Jiwa': 'section_jiwa',
            'Bebas Narkoba': 'section_narkoba',
            'Kesehatan Mata': 'section_mata',
            'Kesehatan THT': 'section_tht',
            'Kesehatan Gigi': 'section_gigi',
            'Kesehatan Jantung': 'section_jantung',
            'Medical Check Up': 'section_mcu',
            'Kesehatan TKHI': 'section_tkhi'
        };

        // Hide all
        Object.values(sections).forEach(id => {
            const el = document.getElementById(id);
            if (el) el.classList.add('hidden');
        });
        const spSec = document.getElementById('section_poli_spesialis');
        if (spSec) spSec.classList.add('hidden');

        // Show specific
        if (sections[val]) {
            document.getElementById(sections[val]).classList.remove('hidden');

            // Auto select docter based on type
            if (val === 'Kesehatan') autoSelectDokter('Umum');
            else if (val === 'Kesehatan Jiwa' || val === 'Bebas Narkoba') autoSelectDokter('Psikiatri');
            else if (val === 'Kesehatan Mata') autoSelectDokter('Mata');
            else if (val === 'Kesehatan THT') autoSelectDokter('THT');
            else if (val === 'Kesehatan Gigi') autoSelectDokter('Gigi');
            else if (val === 'Kesehatan Jantung') autoSelectDokter('Jantung');
            else if (val === 'Medical Check Up' || val === 'Kesehatan TKHI') {
                autoSelectDokter('Umum');
                handleTKHIUI(val);
            }
        } else if (val.includes('Kesehatan')) {
            // General spesialis
            if (spSec) {
                spSec.classList.remove('hidden');
                document.getElementById('title_poli').innerText = `HASIL PEMERIKSAAN ${val.toUpperCase()}`;

                if (val.includes('Paru')) autoSelectDokter('Paru');
                else if (val.includes('Dalam')) autoSelectDokter('Penyakit Dalam');
                else if (val.includes('Ortho')) autoSelectDokter('Orthopedi');

                handleSpesialisUI(val);
            }
        }
    }

    function handleTKHIUI(val) {
        const mcuTitle = document.getElementById('mcu_header_title');
        const tkhiFields = ['row_tkhi_keluhan', 'row_tkhi_jiwa', 'row_tkhi_napza', 'row_tkhi_riwayat', 'row_tkhi_fisik_table', 'row_tkhi_lab', 'row_tkhi_rad_ekg'];

        if (val === 'Kesehatan TKHI') {
            if (mcuTitle) mcuTitle.innerText = 'DATA KESEHATAN TKHI';
            tkhiFields.forEach(id => {
                const el = document.getElementById(id);
                if (el) el.classList.remove('hidden');
            });
        } else {
            if (mcuTitle) mcuTitle.innerText = 'DATA MEDICAL CHECK-UP';
            tkhiFields.forEach(id => {
                const el = document.getElementById(id);
                if (el) el.classList.add('hidden');
            });
        }
    }

    function handleSpesialisUI(val) {
        const rowFisik = document.getElementById('row_fisik_poli');
        const labelHasil = document.getElementById('label_hasil_poli');
        const labelSaran = document.getElementById('label_saran_poli');

        if (val.includes('Paru')) {
            if (rowFisik) rowFisik.classList.add('hidden');
            if (labelHasil) labelHasil.innerText = 'Diagnosa';
            if (labelSaran) labelSaran.innerText = 'Keterangan';
        } else {
            if (rowFisik) rowFisik.classList.remove('hidden');
            if (labelHasil) labelHasil.innerText = 'Hasil Pemeriksaan';
            if (labelSaran) labelSaran.innerText = val.includes('Orthopedi') ? 'Keterangan' : 'Saran / Terapi';
        }
    }

    function autoSelectDokter(spesialis) {
        const select = document.getElementById('dokter_select');
        if (!select) return;
        const options = select.options;
        const targetSpesialis = spesialis.toLowerCase().trim();
        for (let i = 0; i < options.length; i++) {
            const optionSpesialis = (options[i].dataset.spesialis || '').toLowerCase().trim();
            if (optionSpesialis === targetSpesialis || optionSpesialis.includes(targetSpesialis)) {
                select.selectedIndex = i;
                break;
            }
        }
    }

    function calculateBMI() {
        const tinggiEl = document.getElementById('mcu_tinggi');
        const beratEl = document.getElementById('mcu_berat');
        const bmiInput = document.getElementById('mcu_bmi');
        const bmiKatInput = document.getElementById('mcu_bmi_kat');

        if (!tinggiEl || !beratEl || !bmiInput || !bmiKatInput) return;

        const tinggi = parseFloat(tinggiEl.value) / 100;
        const berat = parseFloat(beratEl.value);

        if (tinggi > 0 && berat > 0) {
            const bmi = berat / (tinggi * tinggi);
            bmiInput.value = bmi.toFixed(2);

            let kategori = '';
            if (bmi < 18.5) kategori = 'Underweight';
            else if (bmi < 25) kategori = 'Normal';
            else if (bmi < 30) kategori = 'Overweight';
            else kategori = 'Obesity';

            bmiKatInput.value = kategori;
        } else {
            bmiInput.value = '';
            bmiKatInput.value = '';
        }
    }
});
