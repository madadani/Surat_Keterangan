@php \Carbon\Carbon::setLocale('id'); @endphp
<style>
    body {
        font-family: 'Times New Roman', Times, serif;
        background-color: #f1f5f9;
        margin: 0;
        padding: 0;
        line-height: 1.4;
        color: #000;
        font-size: 12pt;
    }

    @page {
        size: 210mm 330mm;
        margin: 0;
    }

    .paper {
        width: 210mm;
        min-height: 330mm;
        padding: 10mm 20mm 12.5mm 17.5mm;
        margin: 20px auto;
        background: white;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        box-sizing: border-box;
        position: relative;
    }

    .field-container {
        margin-bottom: 20px;
    }

    .field {
        display: flex;
        margin-bottom: 5px;
    }

    .label {
        width: 180px;
    }

    .dots {
        width: 15px;
        text-align: center;
    }

    .value {
        font-weight: bold;
        flex: 1;
    }

    .section-title {
        font-weight: bold;
        text-decoration: underline;
        margin-top: 15px;
        margin-bottom: 5px;
    }

    .checkbox-list {
        list-style: none;
        padding-left: 20px;
        margin-top: 0;
        margin-bottom: 15px;
    }

    .checkbox-item {
        display: flex;
        align-items: center;
        margin-bottom: 3px;
    }

    @media print {
        body {
            background: none;
        }

        .paper {
            margin: 0;
            box-shadow: none;
            width: 100%;
            padding: 10mm 20mm 12.5mm 17.5mm;
        }

        .no-print {
            display: none !important;
        }
    }

    .no-print {
        background: rgba(255, 255, 255, 0.8) !important;
        backdrop-filter: blur(10px);
        padding: 15px !important;
        border-bottom: 1px solid rgba(226, 232, 240, 0.8) !important;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        animation: slideDown 0.5s ease-out;
    }

    @keyframes slideDown {
        from {
            transform: translateY(-100%);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .btn-print-action {
        padding: 12px 24px;
        cursor: pointer;
        border: none;
        border-radius: 12px;
        font-weight: 800;
        font-family: sans-serif;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        font-size: 11px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        align-items: center;
        gap: 8px;
        color: white;
        text-decoration: none;
        position: relative;
        overflow: hidden;
    }

    .btn-print-action:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }

    .btn-cetak {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        box-shadow: 0 4px 14px 0 rgba(16, 185, 129, 0.3);
    }

    .btn-unduh {
        background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
        box-shadow: 0 4px 14px 0 rgba(99, 102, 241, 0.3);
    }

    .btn-tutup {
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        box-shadow: 0 4px 14px 0 rgba(239, 68, 68, 0.3);
    }

    .btn-print-action svg {
        width: 18px;
        height: 18px;
        transition: transform 0.3s ease;
    }

    .btn-print-action:hover svg {
        transform: scale(1.1);
    }
</style>