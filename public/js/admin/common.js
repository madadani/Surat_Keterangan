document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.getElementById('sidebar');
    const sidebarOverlay = document.getElementById('sidebar-overlay');
    const sidebarToggle = document.getElementById('sidebarToggle') || document.getElementById('sidebar-toggle');
    const body = document.body;

    // Toggle Sidebar
    function toggleSidebar() {
        if (window.innerWidth >= 1024) {
            // Desktop: Toggle collapsed class
            body.classList.toggle('sidebar-collapsed');
            // Save state
            localStorage.setItem('sidebarCollapsed', body.classList.contains('sidebar-collapsed'));
        } else {
            // Mobile: Toggle open class
            body.classList.toggle('sidebar-open');
        }
    }

    // Restore State on Load (Desktop)
    if (window.innerWidth >= 1024 && localStorage.getItem('sidebarCollapsed') === 'true') {
        body.classList.add('sidebar-collapsed');
    }

    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', toggleSidebar);
    }

    if (sidebarOverlay) {
        sidebarOverlay.addEventListener('click', toggleSidebar);
    }
});

// Common confirm delete helper
function confirmDeletePremium(button, title = 'Hapus Data?', text = 'Data ini akan dihapus permanen dan tidak dapat dikembalikan!') {
    Swal.fire({
        title: `<span class="text-2xl font-black text-brand-darkblue uppercase tracking-tighter">${title}</span>`,
        html: `<p class="text-[11px] font-bold text-gray-400 uppercase tracking-widest leading-relaxed mt-4">${text}</p>`,
        icon: 'warning',
        iconColor: '#f87171',
        showCancelButton: true,
        confirmButtonColor: '#ef4444',
        cancelButtonColor: '#94a3b8',
        confirmButtonText: 'YA, HAPUS PERMANEN',
        cancelButtonText: 'BATALKAN',
        reverseButtons: true,
        background: '#ffffff',
        backdrop: `rgba(248, 113, 113, 0.1) blur(4px)`,
        showClass: {
            popup: 'animate__animated animate__fadeInDown animate__faster'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutDown animate__faster'
        },
        customClass: {
            popup: 'rounded-[3.5rem] p-12 border border-gray-100 shadow-[0_20px_70px_-10px_rgba(239,68,68,0.15)] bg-white/95 backdrop-blur-2xl',
            confirmButton: 'rounded-xl px-8 py-4 text-[10px] font-black uppercase tracking-widest shadow-lg shadow-red-500/20 hover:-translate-y-0.5 transition-all',
            cancelButton: 'rounded-xl px-8 py-4 text-[10px] font-black uppercase tracking-widest bg-gray-100 text-gray-500 hover:bg-gray-200 transition-all'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            button.closest('form').submit();
        }
    });
}

// Common success alert helper
function showSuccessAlert(message) {
    Swal.fire({
        position: 'center',
        icon: 'success',
        iconColor: '#34d399', // More vibrant green
        title: '<span class="text-2xl font-black text-brand-darkblue uppercase tracking-tighter">Berhasil Disimpan!</span>',
        html: `
            <div class="mt-4 px-6 py-4 bg-emerald-50 rounded-2xl border border-emerald-100 animate__animated animate__fadeInUp animate__delay-1s">
                <p class="text-[10px] font-black text-emerald-700 uppercase tracking-[0.2em] leading-relaxed">
                    ${message}
                </p>
            </div>
        `,
        showConfirmButton: false,
        timer: 2500,
        timerProgressBar: true,
        background: '#ffffff',
        backdrop: `rgba(15, 23, 42, 0.2) blur(4px)`, // Modern backdrop
        showClass: {
            popup: 'animate__animated animate__backInDown animate__faster'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutDown animate__faster'
        },
        customClass: {
            popup: 'rounded-[3.5rem] p-12 border border-gray-100 shadow-[0_20px_70px_-10px_rgba(59,130,246,0.15)] bg-white/95 backdrop-blur-2xl',
            timerProgressBar: 'bg-gradient-to-r from-emerald-400 to-teal-500 h-1.5 rounded-full'
        }
    });
}

// Common error alert helper
function showErrorAlert(title, htmlContent) {
    Swal.fire({
        icon: 'error',
        iconColor: '#ef4444',
        title: `<span class="text-2xl font-black text-brand-darkblue uppercase tracking-tighter">${title}</span>`,
        html: `<div class="text-left text-[10px] mt-4 bg-red-50 p-6 rounded-2xl border border-red-100 uppercase font-black tracking-widest leading-relaxed">${htmlContent}</div>`,
        confirmButtonText: 'Perbaiki Data',
        confirmButtonColor: '#3b82f6',
        background: '#ffffff',
        backdrop: `rgba(239, 68, 68, 0.1) blur(4px)`,
        showClass: {
            popup: 'animate__animated animate__shakeX'
        },
        customClass: {
            popup: 'rounded-[3.5rem] p-12 border border-gray-100 shadow-[0_20px_70px_-10px_rgba(239,68,68,0.15)] bg-white/95 backdrop-blur-2xl',
            confirmButton: 'rounded-xl px-10 py-4 text-[10px] font-black uppercase tracking-widest shadow-lg shadow-brand-blue/20 hover:-translate-y-0.5 transition-all'
        }
    });
}
