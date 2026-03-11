<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Report Digital | {{ $rapot->nama_siswa }}</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@700;900&display=swap" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-core: #1e3a8a;
            --accent: #2563eb;
            --bg-page: #f8fafc;
            --text-dark: #0f172a;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-page);
            color: var(--text-dark);
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
        }

        .no-print-area {
            position: sticky;
            top: 0;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(12px);
            padding: 1.25rem 0;
            z-index: 1000;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            box-shadow: 0 4px 20px rgba(0,0,0,0.02);
        }

        .rapot-paper-v2 {
            background: white;
            width: 210mm;
            min-height: 297mm;
            margin: 4rem auto;
            padding: 4rem;
            box-shadow: 0 50px 100px -20px rgba(0,0,0,0.15);
            position: relative;
            overflow: hidden;
            border-radius: 4px;
        }

        /* Sophisticated Watermark/Background */
        .rapot-paper-v2::before {
            content: "";
            position: absolute;
            top: -100px; right: -100px;
            width: 600px; height: 600px;
            background: radial-gradient(circle, rgba(37, 99, 235, 0.04) 0%, transparent 70%);
            z-index: 0;
        }

        .header-v2 {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 4px double var(--primary-core);
            padding-bottom: 2.5rem;
            margin-bottom: 4rem;
            position: relative;
            z-index: 1;
        }

        .school-info-v2 h2 {
            font-family: 'Playfair Display', serif;
            font-weight: 900;
            color: var(--primary-core);
            margin: 0;
            letter-spacing: -0.02em;
            font-size: 2.2rem;
        }

        .school-info-v2 p {
            font-size: 0.8rem;
            color: #64748b;
            margin: 0.2rem 0 0;
            font-weight: 700;
            letter-spacing: 0.05em;
        }

        .digital-stamp-v2 {
            width: 100px;
            height: 100px;
            border: 2px dashed rgba(37, 99, 235, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgba(37, 99, 235, 0.2);
            font-weight: 900;
            transform: rotate(-15deg);
            font-size: 0.7rem;
            text-align: center;
            padding: 10px;
        }

        .meta-grid-v2 {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
            margin-bottom: 4rem;
            position: relative;
            z-index: 1;
        }

        .meta-box-v2 {
            background: #f8fafc;
            padding: 1.5rem 2rem;
            border-radius: 16px;
            border: 1px solid #f1f5f9;
        }

        .meta-box-v2 label {
            display: block;
            font-size: 0.65rem;
            font-weight: 800;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-bottom: 0.5rem;
        }

        .meta-box-v2 span {
            font-size: 1.15rem;
            font-weight: 800;
            color: var(--text-dark);
        }

        .grades-grid-v2 {
            margin-bottom: 5rem;
            position: relative;
            z-index: 1;
        }

        .grade-item-v2 {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.5rem 2rem;
            background: #ffffff;
            border-bottom: 1px solid #f1f5f9;
            transition: all 0.2s;
        }

        .grade-item-v2:hover {
            background: #fcfdfe;
        }

        .grade-item-v2:first-child { border-top: 1px solid #f1f5f9; border-top-left-radius: 12px; border-top-right-radius: 12px; }
        .grade-item-v2:last-child { border-bottom-left-radius: 12px; border-bottom-right-radius: 12px; }

        .grade-label-v2 {
            display: flex;
            flex-direction: column;
        }

        .grade-name { font-weight: 800; font-size: 1.1rem; color: var(--text-dark); }
        .grade-category { font-size: 0.65rem; font-weight: 800; color: #94a3b8; text-transform: uppercase; }

        .grade-score-v2 {
            display: flex;
            align-items: center;
            gap: 2.5rem;
        }

        .score-circle-v2 {
            width: 55px;
            height: 55px;
            background: var(--bg-page);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 900;
            font-size: 1.35rem;
            color: var(--primary-core);
            border: 1px solid #f1f5f9;
        }

        .predicate-v2 {
            font-weight: 900;
            font-size: 1.5rem;
            width: 40px;
            text-align: center;
        }

        .footer-signatures-v2 {
            display: flex;
            justify-content: space-between;
            margin-top: 6rem;
            position: relative;
            z-index: 1;
        }

        .sig-block-v2 { text-align: center; width: 220px; }
        .sig-block-v2 p { margin: 0; font-size: 0.85rem; font-weight: 600; }
        .sig-block-v2 .name-v2 { margin-top: 5rem; font-weight: 900; border-bottom: 2px solid var(--text-dark); display: inline-block; padding-bottom: 2px; }

        @media print {
            body { background: white; margin: 0; padding: 0; }
            .no-print-area { display: none; }
            .rapot-paper-v2 { margin: 0; box-shadow: none; width: 100%; border-radius: 0; }
        }
    </style>
</head>
<body>

<div class="no-print-area">
    <div class="container d-flex justify-content-between align-items-center">
        <a href="{{ route('rapot.index') }}" class="btn btn-light rounded-pill px-4 py-2 fw-800 text-secondary d-flex align-items-center gap-2">
            <i class="bi bi-arrow-left"></i> RETURN TO REPOSITORY
        </a>
        <button onclick="window.print()" class="btn btn-primary rounded-pill px-5 py-2 fw-800 shadow-lg d-flex align-items-center gap-2">
            <i class="bi bi-printer-fill"></i> GENERATE PDF / PRINT
        </button>
    </div>
</div>

<div class="rapot-paper-v2">
    <div class="header-v2">
        <div class="school-info-v2">
            <h2>SMK INFORMATIKA UTAMA</h2>
            <p>ADVANCED VOCATIONAL CENTER • DEPOK CITY</p>
            <p>ISO 9001:2015 CERTIFIED • ACCREDITATION GRADE A+</p>
        </div>
        <div class="digital-stamp-v2">
            OFFICIAL DIGITAL <br> ARCHIVE • 2026
        </div>
    </div>

    <div class="meta-grid-v2">
        <div class="meta-box-v2">
            <label>Student Profile</label>
            <span>{{ $rapot->nama_siswa }}</span>
        </div>
        <div class="meta-box-v2">
            <label>Reference # (NIS)</label>
            <span class="font-monospace">{{ $rapot->nis }}</span>
        </div>
        <div class="meta-box-v2">
            <label>Academic Classification</label>
            <span>{{ $rapot->kelas }}</span>
        </div>
        <div class="meta-box-v2">
            <label>Evaluation Term</label>
            <span>{{ $rapot->semester == 'Ganjil' ? '01 (FALL/GANJIL)' : '02 (SPRING/GENAP)' }}</span>
        </div>
    </div>

    <div class="grades-grid-v2">
        @php
            $subjects = [
                ['name' => 'Advanced Mathematics', 'cat' => 'General Sciences', 'grade' => $rapot->matematika],
                ['name' => 'Indonesian Language', 'cat' => 'Linguistics & Arts', 'grade' => $rapot->b_indonesia],
                ['name' => 'English Proficiency', 'cat' => 'Linguistics & Arts', 'grade' => $rapot->b_inggris],
                ['name' => 'Vocational Specialization', 'cat' => 'Technical Competency', 'grade' => $rapot->produktif]
            ];
            $total = 0;
            foreach($subjects as $s) $total += $s['grade'];
            $average = $total / 4;
        @endphp

        @foreach($subjects as $item)
        <div class="grade-item-v2">
            <div class="grade-label-v2">
                <span class="grade-category">{{ $item['cat'] }}</span>
                <span class="grade-name">{{ $item['name'] }}</span>
            </div>
            <div class="grade-score-v2">
                <div class="score-circle-v2">{{ $item['grade'] }}</div>
                <div class="predicate-v2 {{ $item['grade'] >= 75 ? 'text-primary' : 'text-danger' }}">
                    {{ $item['grade'] >= 90 ? 'A' : ($item['grade'] >= 80 ? 'B' : ($item['grade'] >= 75 ? 'C' : 'D')) }}
                </div>
            </div>
        </div>
        @endforeach
        
        <div class="grade-item-v2 mt-4 border-0 rounded-4" style="background: var(--primary-core); color: white;">
            <div class="grade-label-v2">
                <span class="grade-category text-white opacity-75">CUMULATIVE METRIC</span>
                <span class="grade-name text-white">AGGREGATE PERFORMANCE INDEX (API)</span>
            </div>
            <div class="grade-score-v2">
                <div class="score-circle-v2 border-0 shadow-lg" style="background: rgba(255,255,255,0.2); color: white;">{{ number_format($average, 2) }}</div>
                <div class="predicate-v2 text-white">
                    {{ $average >= 90 ? 'A' : ($average >= 80 ? 'B' : ($average >= 75 ? 'C' : 'D')) }}
                </div>
            </div>
        </div>
    </div>

    <div class="footer-signatures-v2">
        <div class="sig-block-v2">
            <p>Parent / Guardian Authorization</p>
            <div class="name-v2">UNREGISTERED WALI</div>
        </div>
        <div class="sig-block-v2">
            <p>Academic Administrator</p>
            <div class="name-v2">{{ Auth::user()->name ?? 'HEAD OFFICE' }}</div>
            <p class="mt-1 tiny-text opacity-50">PUBLISHED: {{ date('d.m.Y') }}</p>
        </div>
    </div>
</div>

</body>
</html>
