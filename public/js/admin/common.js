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

// Toast Mixin for consistent styling
const GlassToast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3500,
    timerProgressBar: true,
    background: 'rgba(255, 255, 255, 0.8)',
    backdrop: 'transparent',
    customClass: {
        popup: 'rounded-[1.5rem] border border-white/40 shadow-[0_8px_32px_0_rgba(31,38,135,0.07)] backdrop-blur-xl p-4',
        title: 'text-sm font-black text-brand-darkblue uppercase tracking-tight',
        timerProgressBar: 'bg-brand-blue/30 h-1'
    },
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    },
    showClass: {
        popup: 'animate__animated animate__fadeInRight animate__faster'
    },
    hideClass: {
        popup: 'animate__animated animate__fadeOutRight animate__faster'
    }
});

// Common success alert helper (Toast)
function showSuccessAlert(message) {
    GlassToast.fire({
        icon: 'success',
        iconColor: '#10b981',
        title: 'Berhasil Disimpan',
        html: `<p class="text-[10px] font-bold text-gray-500 uppercase tracking-widest mt-1">${message}</p>`,
        customClass: {
            popup: 'rounded-2xl border border-emerald-100 shadow-[0_20px_50px_rgba(16,185,129,0.1)] backdrop-blur-xl p-5',
            title: 'text-xs font-black text-emerald-800 uppercase tracking-[0.1em]',
            timerProgressBar: 'bg-emerald-500/20 h-1 rounded-full'
        }
    });
}

// Common error alert helper (Toast-ish but stays)
function showErrorAlert(title, htmlContent) {
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'error',
        iconColor: '#ef4444',
        title: `<span class="text-xs font-black text-brand-darkblue uppercase tracking-tight">${title}</span>`,
        html: `<div class="text-[10px] mt-2 font-bold text-red-600 uppercase tracking-wider leading-relaxed bg-red-50/50 p-3 rounded-xl border border-red-100/50">${htmlContent}</div>`,
        showConfirmButton: true,
        confirmButtonText: 'Tutup',
        background: 'rgba(255, 255, 255, 0.9)',
        backdrop: 'transparent',
        customClass: {
            popup: 'rounded-2xl border border-red-100 shadow-[20px_20px_60px_rgba(239,68,68,0.1)] backdrop-blur-xl p-6 w-[350px]',
            confirmButton: 'rounded-lg px-4 py-2 text-[9px] font-black uppercase tracking-widest bg-red-500 text-white hover:bg-red-600 transition-all ml-auto'
        },
        buttonsStyling: false
    });
}

// Common confirm delete helper (Kept as Modal for Safety, but Prettier)
function confirmDeletePremium(button, title = 'Hapus Data?', text = 'Data akan dihapus permanen.') {
    Swal.fire({
        title: `<span class="text-xl font-black text-brand-darkblue uppercase tracking-tighter">${title}</span>`,
        html: `<p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest leading-loose mt-4 px-6">${text}</p>`,
        icon: 'warning',
        iconColor: '#f87171',
        showCancelButton: true,
        confirmButtonColor: '#ef4444',
        cancelButtonColor: '#94a3b8',
        confirmButtonText: 'YA, HAPUS',
        cancelButtonText: 'BATAL',
        reverseButtons: true,
        background: '#ffffff',
        backdrop: `rgba(15, 23, 42, 0.1) blur(8px)`,
        showClass: {
            popup: 'animate__animated animate__zoomIn animate__faster'
        },
        hideClass: {
            popup: 'animate__animated animate__zoomOut animate__faster'
        },
        customClass: {
            popup: 'rounded-[3rem] p-12 border border-blue-50/50 shadow-2xl bg-white/95 backdrop-blur-2xl px-10',
            confirmButton: 'rounded-xl px-8 py-3.5 text-[10px] font-black uppercase tracking-widest shadow-lg shadow-red-500/20 hover:-translate-y-0.5 hover:shadow-red-500/40 transition-all mx-2',
            cancelButton: 'rounded-xl px-8 py-3.5 text-[10px] font-black uppercase tracking-widest bg-gray-50 text-gray-400 hover:bg-gray-100 transition-all mx-2'
        },
        buttonsStyling: false
    }).then((result) => {
        if (result.isConfirmed) {
            button.closest('form').submit();
        }
    });
}
