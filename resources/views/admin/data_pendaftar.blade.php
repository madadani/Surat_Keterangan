@extends('layouts.admin')

@section('title', 'Data Pendaftar')

@section('content')
    <!-- Header -->
    <header
        class="h-20 lg:h-28 bg-white/80 backdrop-blur-md border-b border-gray-100 flex items-center justify-between px-4 lg:px-8 z-10 sticky top-0 transition-all duration-300">
        <div class="flex items-center gap-3 lg:gap-6 flex-1">
            <button id="sidebarToggle"
                class="w-10 h-10 flex items-center justify-center rounded-xl bg-gray-50 text-brand-darkblue hover:bg-brand-blue hover:text-white transition-all shadow-sm border border-gray-100 shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <div class="hidden md:block">
                <h2 class="text-sm lg:text-xl font-black text-brand-darkblue tracking-tight uppercase">Data Pendaftar</h2>
                <p class="text-[8px] lg:text-[10px] text-brand-gray font-bold uppercase tracking-widest mt-0.5">Manajemen
                    Pasien</p>
            </div>

            <!-- Integrated Header Filter -->
            <div class="flex-1 max-w-4xl flex items-center gap-3 ml-2 lg:ml-6">
                <div class="relative flex-1 group">
                    <input type="text" id="searchInput" placeholder="Cari nama, reg, NIK..."
                        class="w-full bg-gray-50 border border-gray-200 rounded-xl py-2.5 pl-10 pr-4 text-xs font-bold text-brand-darkblue focus:ring-4 focus:ring-brand-blue/10 focus:bg-white focus:border-brand-blue transition-all outline-none">
                    <div
                        class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-brand-blue transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>

                <select id="filterStatus"
                    class="bg-gray-50 border border-gray-200 rounded-xl py-2.5 px-3 text-[10px] font-black uppercase tracking-widest text-brand-darkblue focus:ring-4 focus:ring-brand-blue/10 outline-none cursor-pointer hidden sm:block">
                    <option value="">Status</option>
                    <option value="Pending">Pending</option>
                    <option value="Proses">Proses</option>
                    <option value="Selesai">Selesai</option>
                </select>
            </div>
        </div>
    </header>

    <!-- Content Body -->
    <div class="flex-1 flex flex-col p-4 lg:px-8 lg:py-6 bg-[#f8fafc] overflow-hidden">

        <!-- Table Card (Scrollable area) -->
        <div
            class="flex-1 min-h-0 bg-white rounded-3xl shadow-sm border border-gray-100 flex flex-col overflow-hidden relative">
            <div class="flex-1 overflow-auto">
                <table id="mainTable" class="w-full text-left border-collapse min-w-[1000px]">
                    <thead class="sticky top-0 z-[5] bg-white">
                        <tr
                            class="bg-gray-50/80 text-[10px] font-black text-gray-400 uppercase tracking-widest border-b border-gray-100">
                            <th class="px-6 py-5 text-center w-12">No</th>
                            <th class="px-6 py-5 min-w-[280px]">Identitas Pasien</th>
                            <th class="px-6 py-5 min-w-[150px] hidden md:table-cell">Tempat, Tgl Lahir</th>
                            <th class="px-6 py-5 min-w-[100px] hidden lg:table-cell">Gender</th>
                            <th class="px-6 py-5 min-w-[200px] hidden xl:table-cell">Kontak & Alamat</th>
                            <th class="px-6 py-5 min-w-[180px]">Keperluan & Test</th>
                            <th class="px-6 py-5 min-w-[120px]">Estimasi Biaya</th>
                            <th class="px-6 py-5 min-w-[100px]">Status</th>
                            <th class="px-6 py-5 text-center min-w-[100px]">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody" class="divide-y divide-gray-50 text-sm font-medium text-gray-700">
                        <!-- Data will be loaded here -->
                    </tbody>
                </table>

                <!-- Pagination (Inside Scroll for Bottom Scrollbar) -->
                <div id="paginationContainer"
                    class="sticky left-0 bottom-0 shrink-0 px-8 py-4 border-t border-gray-50 bg-gray-50/50 backdrop-blur-sm z-10">
                    <!-- Pagination links will be loaded here -->
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const baseUrl = '{{ rtrim(url('/'), '/') }}';
        let currentPage = 1;
        let searchQuery = '';
        let statusFilter = '';
        let searchTimeout;

        const loadData = (page = 1) => {
            const params = new URLSearchParams({
                page: page,
                search: searchQuery,
                status: statusFilter
            });

            fetch(`{{ route('pendaftar.json') }}?${params}`, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
                .then(response => response.json())
                .then(data => {
                    renderTable(data.data);
                    renderPagination(data);
                    currentPage = page;
                })
                .catch(error => {
                    console.error('Error loading data:', error);
                    document.getElementById('tableBody').innerHTML = `
                                                        <tr>
                                                            <td colspan="9" class="px-6 py-32 text-center text-red-500 font-bold">
                                                                Gagal memuat data. Silakan refresh halaman.
                                                            </td>
                                                        </tr>
                                                    `;
                });
        };

        const renderTable = (items) => {
            const tbody = document.getElementById('tableBody');

            if (!items || items.length === 0) {
                tbody.innerHTML = `
                                                    <tr>
                                                        <td colspan="9" class="px-6 py-32 text-center text-gray-300 font-black uppercase tracking-[0.3em]">
                                                            Data pendaftar tidak ditemukan
                                                        </td>
                                                    </tr>
                                                `;
                return;
            }

            tbody.innerHTML = items.map((item, index) => {
                const statusColor = item.status === 'Pending' ? 'yellow' :
                    item.status === 'Proses' ? 'blue' : 'green';

                const tests = item.jenis_test ? item.jenis_test.split(',').map(t =>
                    `<span class="bg-brand-blue/10 text-brand-blue text-[9px] font-black px-2.5 py-1.5 rounded-lg uppercase tracking-widest border border-brand-blue/10 inline-block mr-1 mb-1">${t.trim()}</span>`
                ).join('') : '-';

                // Format tanggal lahir
                const birthDate = new Date(item.tanggal_lahir);
                const formattedBirthDate = birthDate.toLocaleDateString('id-ID', { day: '2-digit', month: 'short', year: 'numeric' });

                // Estimasi biaya dari database
                const estimatedPrice = item.estimasi_biaya || 0;

                return `
                                                    <tr class="hover:bg-blue-50/20 transition-colors group">
                                                        <td class="px-6 py-5 text-center text-gray-400 font-mono text-xs">${item.DT_RowIndex}</td>
                                                        <td class="px-6 py-5">
                                                            <div class="space-y-2">
                                                                <div class="font-black text-brand-darkblue uppercase tracking-tight text-sm">${item.nama_lengkap}</div>
                                                                <div class="inline-block text-[10px] font-mono font-bold text-blue-600 bg-blue-50/50 px-3 py-1 rounded-lg">#${item.no_registrasi}</div>
                                                                <div class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">${item.pekerjaan || '-'}</div>
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-5 hidden md:table-cell">
                                                            <div class="space-y-0.5">
                                                                <div class="text-xs font-bold text-gray-700">${item.tempat_lahir || '-'}</div>
                                                                <div class="text-[10px] text-gray-500">${formattedBirthDate}</div>
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-5 hidden lg:table-cell">
                                                            <span class="px-2.5 py-1.5 text-[10px] font-bold uppercase rounded ${item.jenis_kelamin === 'Laki-laki' ? 'bg-blue-50 text-blue-600' : 'bg-pink-50 text-pink-600'}">${item.jenis_kelamin || '-'}</span>
                                                        </td>
                                                        <td class="px-6 py-5 hidden xl:table-cell">
                                                            <div class="space-y-1">
                                                                <div class="text-xs font-mono text-gray-700">📞 ${item.no_hp || '-'}</div>
                                                                <div class="text-[10px] text-gray-500 line-clamp-2">${item.alamat || '-'}</div>
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-5">
                                                            <div class="space-y-1">
                                                                <div class="text-xs font-semibold text-gray-500 mb-1 uppercase tracking-wider">${item.keperluan || '-'}</div>
                                                                <div>${tests}</div>
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-5">
                                                        <div class="inline-flex items-center gap-2 bg-green-50 px-3 py-2 rounded-xl border border-green-100 whitespace-nowrap">
                                                            <div class="text-[13px] font-black text-green-600">
                                                                Rp. ${item.estimasi_biaya.min.toLocaleString('id-ID')}
                                                                ${item.estimasi_biaya.max > item.estimasi_biaya.min ? ' - ' + item.estimasi_biaya.max.toLocaleString('id-ID') : ''}
                                                            </div>
                                                        </div>
                                                        </td>
                                                        <td class="px-6 py-5">
                                                            <span class="px-2.5 py-1.5 text-[9px] font-black uppercase rounded-lg bg-${statusColor}-50 text-${statusColor}-600 border border-${statusColor}-100">${item.status}</span>
                                                        </td>
                                                        <td class="px-6 py-5 text-center">
                                                            <div class="flex items-center justify-center gap-2">
                                                                <a href="${baseUrl}/admin/buat-surat/tambah?pendaftar_id=${item.id}"
                                                                    class="w-9 h-9 bg-green-500 text-white rounded-xl flex items-center justify-center shadow-lg shadow-green-500/20 hover:bg-green-600 hover:-translate-y-0.5 transition-all"
                                                                    title="Buat Surat">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                                                    </svg>
                                                                </a>
                                                                <a href="${baseUrl}/admin/data-pendaftar/edit/${item.id}"
                                                                    class="w-9 h-9 bg-brand-blue text-white rounded-xl flex items-center justify-center shadow-lg shadow-brand-blue/20 hover:bg-blue-600 hover:-translate-y-0.5 transition-all">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                    </svg>
                                                                </a>
                                                                <form action="${baseUrl}/admin/data-pendaftar/delete/${item.id}" method="POST" class="inline delete-form">
                                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <button type="button" onclick="confirmDelete(this.form)" class="w-9 h-9 bg-red-500 text-white rounded-xl flex items-center justify-center shadow-lg shadow-red-500/20 hover:bg-red-600 hover:-translate-y-0.5 transition-all">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                        </svg>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                `;
            }).join('');
        };

        const renderPagination = (data) => {
            const container = document.getElementById('paginationContainer');
            const totalPages = data.last_page;
            const currentPage = data.current_page;

            if (totalPages <= 1) {
                container.classList.add('hidden');
                return;
            }

            container.classList.remove('hidden');

            let paginationHTML = '<nav class="flex items-center justify-between"><div class="flex items-center gap-2">';

            // Previous button
            if (currentPage > 1) {
                paginationHTML += `<button onclick="loadData(${currentPage - 1})" class="px-3 py-2 text-sm font-bold text-brand-blue hover:bg-brand-blue/10 rounded-lg transition-colors">← Sebelumnya</button>`;
            }

            // Page numbers
            paginationHTML += '<div class="flex items-center gap-1">';
            for (let i = 1; i <= totalPages; i++) {
                if (i === currentPage) {
                    paginationHTML += `<span class="px-4 py-2 text-sm font-bold bg-brand-blue text-white rounded-lg">${i}</span>`;
                } else if (i === 1 || i === totalPages || (i >= currentPage - 1 && i <= currentPage + 1)) {
                    paginationHTML += `<button onclick="loadData(${i})" class="px-4 py-2 text-sm font-bold text-brand-blue hover:bg-brand-blue/10 rounded-lg transition-colors">${i}</button>`;
                } else if (i === currentPage - 2 || i === currentPage + 2) {
                    paginationHTML += `<span class="px-2 text-gray-400">...</span>`;
                }
            }
            paginationHTML += '</div>';

            // Next button
            if (currentPage < totalPages) {
                paginationHTML += `<button onclick="loadData(${currentPage + 1})" class="px-3 py-2 text-sm font-bold text-brand-blue hover:bg-brand-blue/10 rounded-lg transition-colors">Selanjutnya →</button>`;
            }

            paginationHTML += '</div></nav>';
            container.innerHTML = paginationHTML;
        };

        const confirmDelete = (form) => {
            Swal.fire({
                title: '<span class="text-sm font-black uppercase tracking-widest text-brand-darkblue">Konfirmasi Hapus</span>',
                html: '<p class="text-[11px] font-bold text-slate-500 uppercase leading-relaxed">Apakah Anda yakin ingin menghapus data pendaftar ini?<br><span class="text-red-500 font-black">Tindakan ini tidak dapat dibatalkan!</span></p>',
                icon: 'warning',
                iconColor: '#ef4444',
                showCancelButton: true,
                confirmButtonText: 'YA, HAPUS',
                cancelButtonText: 'BATAL',
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#f1f5f9',
                customClass: {
                    popup: 'rounded-[2rem] border-0',
                    confirmButton: 'rounded-xl font-black text-[10px] px-8 py-4 shadow-lg shadow-red-500/20',
                    cancelButton: 'rounded-xl font-black text-[10px] px-8 py-4 text-slate-400'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        };

        // Event Listeners
        document.getElementById('searchInput').addEventListener('input', (e) => {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                searchQuery = e.target.value;
                loadData(1);
            }, 500);
        });

        document.getElementById('filterStatus').addEventListener('change', (e) => {
            statusFilter = e.target.value;
            loadData(1);
        });

        // Initial load
        loadData(1);

        // Auto-refresh every 5 seconds for realtime updates
        setInterval(() => {
            loadData(currentPage);
        }, 5000);
    </script>
@endpush