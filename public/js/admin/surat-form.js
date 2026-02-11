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
                if (tipeBerkasSelect) {
                    tipeBerkasSelect.required = false;
                    tipeBerkasSelect.value = '';
                }
                resetDisplayFields();
                return;
            }

            try {
                const data = selected.dataset;

                // Show & Update Tipe Berkas
                if (tipeBerkasRow) {
                    tipeBerkasRow.classList.remove('hidden');
                    if (tipeBerkasSelect) {
                        tipeBerkasSelect.required = true;
                        if (!config.isEdit) {
                            fillTipeBerkasOptions(data, tipeBerkasSelect);
                        }
                    }
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
        const fields = [
            'display_gender', 'display_tempat', 'display_tanggal', 'display_alamat', 'display_hp',
            'display_tinggi', 'display_berat', 'display_pekerjaan', 'display_pendidikan',
            'input_keperluan', 'display_perusahaan', 'tinggi_tht_input', 'berat_tht_input',
            'tinggi_poli_input', 'berat_poli_input', 'mcu_tinggi', 'mcu_berat'
        ];
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
        setVal('tinggi_tht_input', data.tinggi);
        setVal('berat_tht_input', data.berat);
        setVal('tinggi_poli_input', data.tinggi);
        setVal('berat_poli_input', data.berat);
        setVal('mcu_tinggi', data.tinggi);
        setVal('mcu_berat', data.berat);
        setVal('resmcu_tb_input', data.tinggi);
        setVal('resmcu_bb_input', data.berat);

        setVal('display_pekerjaan', data.pekerjaan);
        setVal('display_pendidikan', data.pendidikan);
        setVal('display_perusahaan', data.perusahaan);
        setVal('resmcu_perusahaan_input', data.perusahaan);
        setVal('input_keperluan', data.keperluan);
        setVal('no_rm_gigi_input', data.noRm);
        setVal('keperluan_gigi_input', data.keperluan);

        // Auto calculate BMI if data available
        calculateBMI();
    }

    function fillTipeBerkasOptions(data, select) {
        select.innerHTML = '<option value="">-- Pilih Tipe Surat --</option>';
        const tests = (data.tests || '').split(/,\s*/);
        const existing = (data.existing || '').split(/,\s*/);

        tests.forEach(test => {
            let val = '';
            const t = test.trim().toLowerCase();
            if (t.includes('jiwa')) val = 'Kesehatan Jiwa';
            else if (t.includes('narkoba')) val = 'Bebas Narkoba';
            else if (t.includes('tht')) val = 'Kesehatan THT';
            else if (t.includes('mata')) val = 'Kesehatan Mata';
            else if (t.includes('gigi')) val = 'Kesehatan Gigi';
            else if (t.includes('ortho')) val = 'Orthopedi';
            else if (t.includes('paru')) val = 'Paru';
            else if (t.includes('dalam')) val = 'Dalam';
            else if (t.includes('jantung')) val = 'Kesehatan Jantung';
            else if (t.includes('tkhi')) val = 'Kesehatan TKHI';
            else if (t.includes('resume mcu')) val = 'Resume MCU';
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
            'Kesehatan TKHI': 'section_tkhi',
            'Resume MCU': 'section_resume_mcu'
        };

        const allSectionIds = Object.values(sections);
        allSectionIds.push('section_poli_spesialis');

        // Sembunyikan dan NONAKTIFKAN semua section agar datanya tidak terkirim
        allSectionIds.forEach(id => {
            const el = document.getElementById(id);
            if (el) {
                el.classList.add('hidden');
                const inputs = el.querySelectorAll('input, select, textarea');
                inputs.forEach(input => input.disabled = true);
            }
        });

        // Tampilkan dan AKTIFKAN section yang dipilih
        let targetId = sections[val];

        // Spesialis Logic (Jika tidak ada di mapping dasar, cek spesialis)
        const spesialisPoli = ['Dalam', 'Paru', 'Orthopedi'];
        if (!targetId && (val.includes('Kesehatan') || spesialisPoli.some(s => val.includes(s)))) {
            targetId = 'section_poli_spesialis';
        }

        if (targetId) {
            const el = document.getElementById(targetId);
            if (el) {
                el.classList.remove('hidden');
                const inputs = el.querySelectorAll('input, select, textarea');
                inputs.forEach(input => input.disabled = false);

                // Penyesuaian UI spesifik
                if (val === 'Kesehatan TKHI') {
                    handleTKHIUI(val);
                } else if (targetId === 'section_poli_spesialis') {
                    document.getElementById('title_poli').innerText = `HASIL PEMERIKSAAN ${val.toUpperCase()}`;
                    handleSpesialisUI(val);
                }
            }
        }

        // Auto select dokter berdasarkan tipe (pindahkan ke sini agar lebih rapi)
        if (val === 'Kesehatan') autoSelectDokter('Umum');
        else if (val === 'Kesehatan Jiwa' || val === 'Bebas Narkoba') autoSelectDokter('Psikiatri');
        else if (val === 'Kesehatan Mata') autoSelectDokter('Mata');
        else if (val === 'Kesehatan THT') autoSelectDokter('THT');
        else if (val === 'Kesehatan Gigi') autoSelectDokter('Gigi');
        else if (val === 'Kesehatan Jantung') autoSelectDokter('Jantung');
        else if (val.includes('Paru')) autoSelectDokter('Paru');
        else if (val.includes('Dalam')) autoSelectDokter('Penyakit Dalam');
        else if (val.includes('Ortho')) autoSelectDokter('Orthopedi');
        else if (val === 'Kesehatan TKHI' || val === 'Resume MCU') autoSelectDokter('Umum');
    }

    function handleTKHIUI(val) {
        const mcuTitle = document.getElementById('mcu_header_title');
        const tkhiFields = ['row_tkhi_keluhan', 'row_tkhi_jiwa', 'row_tkhi_napza', 'row_tkhi_riwayat', 'row_tkhi_fisik_table', 'row_tkhi_lab', 'row_tkhi_rad_ekg'];

        if (val === 'Kesehatan TKHI') {
            if (mcuTitle) mcuTitle.innerText = 'DATA KESEHATAN TKHI';
            tkhiFields.forEach(id => {
                const el = document.getElementById(id);
                if (el) {
                    el.classList.remove('hidden');
                    const inputs = el.querySelectorAll('input, select, textarea');
                    inputs.forEach(input => input.disabled = false);
                }
            });
        } else {
            if (mcuTitle) mcuTitle.innerText = 'DATA MEDICAL CHECK-UP';
            tkhiFields.forEach(id => {
                const el = document.getElementById(id);
                if (el) {
                    el.classList.add('hidden');
                    const inputs = el.querySelectorAll('input, select, textarea');
                    inputs.forEach(input => input.disabled = true);
                }
            });
        }
    }

    function handleSpesialisUI(val) {
        const rowFisik = document.getElementById('row_fisik_poli');
        const labelHasil = document.getElementById('label_hasil_poli');
        const labelSaran = document.getElementById('label_saran_poli');

        if (val.includes('Paru')) {
            if (rowFisik) {
                rowFisik.classList.add('hidden');
                const inputs = rowFisik.querySelectorAll('input, select, textarea');
                inputs.forEach(input => input.disabled = true);
            }
            if (labelHasil) labelHasil.innerText = 'Diagnosa';
            if (labelSaran) labelSaran.innerText = 'Keterangan';
        } else {
            if (rowFisik) {
                rowFisik.classList.remove('hidden');
                const inputs = rowFisik.querySelectorAll('input, select, textarea');
                inputs.forEach(input => input.disabled = false);
            }
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
        // Helper to perform calculation
        const performCalc = (tVal, bVal, bmiEl, catEl) => {
            if (!tVal || !bVal || (!bmiEl && !catEl)) return;

            const tinggi = parseFloat(tVal) / 100;
            const berat = parseFloat(bVal);

            if (tinggi > 0 && berat > 0) {
                const bmi = berat / (tinggi * tinggi);
                const bmiFixed = bmi.toFixed(2);

                if (bmiEl) bmiEl.value = bmiFixed;

                if (catEl) {
                    let kategori = '';
                    if (bmi < 18.5) kategori = 'Underweight';
                    else if (bmi < 25) kategori = 'Normal';
                    else if (bmi < 30) kategori = 'Overweight';
                    else kategori = 'Obesity';
                    catEl.value = kategori;
                }
            } else {
                if (bmiEl) bmiEl.value = '';
                if (catEl) catEl.value = '';
            }
        };

        // 1. MCU TKHI
        const mcuT = document.getElementById('mcu_tinggi');
        const mcuB = document.getElementById('mcu_berat');
        const mcuBMI = document.getElementById('mcu_bmi');
        const mcuCat = document.getElementById('mcu_bmi_kat');
        if (mcuT && mcuB) performCalc(mcuT.value, mcuB.value, mcuBMI, mcuCat);

        // 2. Resume MCU
        const resT = document.getElementById('resmcu_tb_input');
        const resB = document.getElementById('resmcu_bb_input');
        const resBMI = document.getElementById('resmcu_bmi_input');
        const resCat = document.getElementById('resmcu_bmi_kat_input');
        if (resT && resB) performCalc(resT.value, resB.value, resBMI, resCat);

        // 3. General Health Certificate (Create)
        const genT = document.getElementById('display_tinggi');
        const genB = document.getElementById('display_berat');
        const genBMI = document.getElementById('bmi_input');
        if (genT && genB) performCalc(genT.value, genB.value, genBMI, null);

        // 4. General Health Certificate (Edit)
        const editT = document.getElementById('edit_tinggi_badan');
        const editB = document.getElementById('edit_berat_badan');
        const editBMI = document.getElementById('edit_bmi');
        if (editT && editB) performCalc(editT.value, editB.value, editBMI, null);
    }

    // Add listeners for real-time BMI calculation in Resume MCU
    ['resmcu_tb_input', 'resmcu_bb_input'].forEach(id => {
        const el = document.getElementById(id);
        if (el) el.addEventListener('input', calculateBMI);
    });

    // GENERAL HEALTH CERTIFICATE BMI Auto-Calc
    const inputsHealth = ['display_tinggi', 'display_berat', 'edit_tinggi_badan', 'edit_berat_badan'];
    inputsHealth.forEach(id => {
        const el = document.getElementById(id);
        if (el) el.addEventListener('input', calculateBMI);
    });
});
