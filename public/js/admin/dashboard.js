document.addEventListener('DOMContentLoaded', function () {
    const config = window.dashboardConfig || { statsUrl: '', chartLabels: [], chartData: [] };

    function updateClock() {
        const now = new Date();
        const hour = now.getHours();
        let greeting = 'Selamat Malam';

        if (hour >= 5 && hour < 11) greeting = 'Selamat Pagi';
        else if (hour >= 11 && hour < 15) greeting = 'Selamat Siang';
        else if (hour >= 15 && hour < 18) greeting = 'Selamat Sore';

        const greetingEl = document.getElementById('greetingText');
        if (greetingEl) greetingEl.textContent = `${greeting}, Admin RSUD Gemolong!`;

        const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        const clockEl = document.getElementById('liveClock');
        if (clockEl) {
            const timeStr = `${days[now.getDay()]}, ${now.getDate()} ${months[now.getMonth()]} ${now.getFullYear()} | ${now.getHours().toString().padStart(2, '0')}:${now.getMinutes().toString().padStart(2, '0')}:${now.getSeconds().toString().padStart(2, '0')}`;
            clockEl.textContent = timeStr;
        }
    }

    setInterval(updateClock, 1000);
    updateClock();

    // Chart.js initialization
    const chartCanvas = document.getElementById('monthlyChart');
    if (chartCanvas) {
        const ctx = chartCanvas.getContext('2d');
        const gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, '#3b82f6');
        gradient.addColorStop(1, '#60a5fa');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: config.chartLabels,
                datasets: [{
                    label: 'Penerbitan Surat',
                    data: config.chartData,
                    backgroundColor: gradient,
                    borderRadius: 12,
                    borderSkipped: false,
                    barThickness: 32,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#1e293b',
                        titleFont: { family: 'Outfit', size: 13, weight: '900' },
                        bodyFont: { family: 'Outfit', size: 12, weight: '500' },
                        padding: 12,
                        cornerRadius: 12,
                        displayColors: false
                    }
                },
                scales: {
                    x: {
                        grid: { display: false },
                        ticks: { font: { weight: '900', family: 'Outfit', size: 10 }, color: '#94a3b8' }
                    },
                    y: {
                        beginAtZero: true,
                        grid: { color: '#f1f5f9', borderDash: [5, 5], drawBorder: false },
                        ticks: { stepSize: 1, font: { weight: '900', family: 'Outfit', size: 10 }, color: '#94a3b8' }
                    }
                }
            }
        });
    }

    // Real-time Update Logic
    function updateStats() {
        if (!config.statsUrl) return;
        fetch(config.statsUrl)
            .then(response => response.json())
            .then(data => {
                const map = {
                    'stat-sehat': data.sehat,
                    'stat-jiwa': data.jiwa,
                    'stat-narkoba': data.narkoba,
                    'stat-spesialis': data.spesialis,
                    'stat-total': data.total_pendaftar,
                    'stat-pending': data.pending
                };
                for (const [id, val] of Object.entries(map)) {
                    const el = document.getElementById(id);
                    if (el) el.innerText = (val || 0).toLocaleString();
                }
            })
            .catch(error => console.error('Error fetching stats:', error));
    }

    if (config.statsUrl) {
        setInterval(updateStats, 10000);
    }
});
