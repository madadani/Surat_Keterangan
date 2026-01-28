// Update time every second
setInterval(() => {
    const now = new Date();
    const dateStr = now.toLocaleDateString('id-ID', { day: '2-digit', month: '2-digit', year: 'numeric' });
    const timeStr = now.toLocaleTimeString('id-ID', { hour12: false });
    const timeElement = document.getElementById('current-time');
    if (timeElement) {
        timeElement.innerText = `${dateStr.replace(/\//g, '-')} ${timeStr}`;
    }
}, 1000);
