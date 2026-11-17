<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Previous Results | Burmeseteer</title>
    <meta name="description" content="Burmeseteer previous F/R and S/R results by month.">
    <style>
        :root {
            --header-bg: #99ccff;
            --head-grey: #e6e6e6;
            --head-green: #3fd6c0;
            --line: #9a9a9a;
            --ink: #111;
            --white: #fff;
            --coral: #ff6f52;
            --teal: #2aacb2;
            --footer-bottom: #85c0dc;
            --maxw: 1200px;
        }
        *, *::before, *::after { box-sizing: border-box; }
        html { -webkit-text-size-adjust: 100%; }
        body { margin: 0; font-family: Arial, Helvetica, sans-serif; color: var(--ink); background: var(--white); line-height: 1.4; }
        a { color: inherit; text-decoration: none; }
        .wrap { width: 100%; max-width: var(--maxw); margin: 0 auto; padding: 0 clamp(8px, 2vw, 20px); }

        /* Header */
        .site-header { background: var(--header-bg); padding: 10px 0; }
        .brand { display: inline-flex; align-items: center; gap: 10px; }
        .brand-mark { width: 34px; height: 34px; flex: none; }
        .brand-name { font-family: "Arial Narrow", Arial, sans-serif; font-size: clamp(20px, 4vw, 28px); letter-spacing: -1px; color: #2a2a2a; }

        /* Heading + filter */
        .page-title { text-align: center; font-size: clamp(15px, 3.4vw, 18px); margin: 22px 0 16px; }
        .filter { display: flex; flex-wrap: wrap; justify-content: center; gap: 8px; margin: 0 0 22px; }
        .filter select, .filter button {
            font: inherit; font-size: 16px; height: 38px; padding: 0 12px;
            border: 1px solid #ccc; background: var(--white); color: var(--ink); border-radius: 2px;
        }
        .filter select { min-width: 130px; }
        .filter button { background: #20d3aa; border-color: #20d3aa; color: var(--white); font-weight: 700; cursor: pointer; padding: 0 20px; }
        .filter button:hover { background: #17bb96; }
        .filter select:focus-visible, .filter button:focus-visible { outline: 3px solid var(--ink); outline-offset: 2px; }

        /* Result tables */
        .month { margin: 0 0 22px; border: 1px solid var(--line); }
        .month table { width: 100%; border-collapse: collapse; table-layout: fixed; }
        .month caption { background: var(--head-grey); font-size: clamp(15px, 3.4vw, 19px); padding: 4px 6px; caption-side: top; }
        .month th { background: var(--head-green); font-weight: 400; font-size: clamp(12px, 2.6vw, 15px); padding: 1px 4px; }
        .month td { text-align: center; font-size: clamp(12px, 2.6vw, 15px); padding: 2px 4px; border-top: 1px solid #ddd; }
        .month td:not(:first-child), .month th:not(:first-child) { border-left: 1px solid #ddd; }
        .month th:nth-child(1), .month td:nth-child(1) { width: 26%; }
        .month th:nth-child(2), .month td:nth-child(2) { width: 34%; }
        .month tbody tr:nth-child(even) { background: #fafafa; }
        .month tbody tr:hover { background: #eefaf8; }
        .empty { text-align: center; padding: 30px 10px; color: #555; border: 1px solid var(--line); margin-bottom: 22px; }

        /* Quick links */
        .links { display: grid; grid-template-columns: repeat(3, 1fr); gap: 6px; margin: 10px 0 0; padding: 0; list-style: none; }
        .tile {
            aspect-ratio: 1 / 1; display: flex; flex-direction: column; align-items: center; justify-content: space-between;
            padding: 8% 5% 6%; text-align: center; color: var(--white); overflow: hidden;
        }
        .tile:focus-visible { outline: 3px solid var(--ink); outline-offset: -3px; }
        .tile svg { width: 56%; flex: 1; min-height: 0; }
        .tile span { font-family: "Trebuchet MS", Verdana, sans-serif; font-weight: 700; font-size: clamp(11px, 2.8vw, 22px); text-shadow: 0 1px 2px rgba(0,0,0,.25); }
        .t-navy  { background: #34495e; }
        .t-white { background: #fff; color: #34495e; border: 3px solid #34495e; }
        .t-coral { background: var(--coral); }
        .t-brown { background: linear-gradient(160deg, #7a6650, #5e4d3a); }
        .t-teal  { background: var(--teal); }
        @media (min-width: 760px) { .links { grid-template-columns: repeat(6, 1fr); } }

        .copyright { background: var(--footer-bottom); text-align: center; padding: 8px 10px; font-size: clamp(13px, 3vw, 16px); margin-top: 6px; }
        .copyright a { margin: 0 4px; }
        .copyright a:hover { text-decoration: underline; }
    </style>
</head>
<body>

<header class="site-header">
    <div class="wrap">
        <a class="brand" href="/" aria-label="Burmeseteer home">
            <svg class="brand-mark" viewBox="0 0 40 40" aria-hidden="true">
                <circle cx="20" cy="17" r="14" fill="none" stroke="#111" stroke-width="3"/>
                <circle cx="20" cy="17" r="7" fill="none" stroke="#111" stroke-width="3"/>
                <path d="M20 8v30" stroke="#111" stroke-width="3"/>
                <path d="M15 33l5 6 5-6z" fill="#111"/>
            </svg>
            <span class="brand-name">Burmeseteer</span>
        </a>
    </div>
</header>

<main class="wrap">
    <h1 class="page-title">PREVIOUS RESULTS</h1>

    {{-- Filter: GET /previous-result?month=9&year=2026 --}}
    <form class="filter" method="GET" action="{{ url('/previous-result') }}">
        <select name="month" aria-label="Select month">
            <option value="">Select Month</option>
            @foreach (range(1, 12) as $m)
                <option value="{{ $m }}" @selected(($month ?? null) == $m)>{{ \Carbon\Carbon::create(null, $m, 1)->format('F') }}</option>
            @endforeach
        </select>
        <select name="year" aria-label="Select year">
            <option value="">Select Year</option>
            @foreach (($years ?? range(now()->year, now()->year - 5)) as $y)
                <option value="{{ $y }}" @selected(($year ?? null) == $y)>{{ $y }}</option>
            @endforeach
        </select>
        <button type="submit">SUBMIT</button>
    </form>

    {{--
        $results format (backend can supply the same shape):
        [
            ['label' => 'SEPTEMBER, 2026', 'rows' => [
                ['city' => 'BURMESE', 'date' => '2026-09-01', 'fr' => '64', 'sr' => '92'],
                ...
            ]],
        ]
    --}}
    @forelse ($results ?? [] as $group)
        <section class="month">
            <table>
                <caption>RESULTS : {{ $group['label'] }}</caption>
                <thead>
                    <tr><th scope="col">CITY</th><th scope="col">DATE</th><th scope="col">F/R</th><th scope="col">S/R</th></tr>
                </thead>
                <tbody>
                    @foreach ($group['rows'] as $row)
                        <tr>
                            <td>{{ $row['city'] }}</td>
                            <td>{{ $row['date'] }}</td>
                            <td>{{ $row['fr'] }}</td>
                            <td>{{ $row['sr'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    @empty
        <p class="empty">No results found for this selection.</p>
    @endforelse

    <ul class="links">
        <li><a class="tile t-navy" href="/">
            <svg viewBox="0 0 100 100" aria-hidden="true"><circle cx="58" cy="52" r="34" fill="#6b1d2a"/><circle cx="58" cy="52" r="24" fill="#fff"/><circle cx="58" cy="52" r="16" fill="#6b1d2a"/><circle cx="58" cy="52" r="7" fill="#fff"/><path d="M10 14l30 30M12 66l22-14" stroke="#ddd" stroke-width="4"/><circle cx="12" cy="14" r="7" fill="#f0b94a"/><circle cx="12" cy="66" r="7" fill="#f0b94a"/></svg>
            <span>Teer Result</span></a></li>
        <li><a class="tile t-white" href="#social">
            <svg viewBox="0 0 100 100" aria-hidden="true"><g fill="#f4b183"><circle cx="20" cy="20" r="11"/><circle cx="50" cy="20" r="11"/><circle cx="80" cy="20" r="11"/><circle cx="20" cy="52" r="11"/><circle cx="50" cy="52" r="11"/><circle cx="80" cy="52" r="11"/></g><g fill="#5b9bd5"><rect x="9" y="33" width="22" height="10" rx="5"/><rect x="39" y="33" width="22" height="10" rx="5"/><rect x="69" y="33" width="22" height="10" rx="5"/></g></svg>
            <span>Social Network</span></a></li>
        <li><a class="tile t-coral" href="#common-number">
            <svg viewBox="0 0 100 100" aria-hidden="true"><circle cx="50" cy="50" r="40" fill="none" stroke="#3b3b3b" stroke-width="7"/><text x="50" y="68" text-anchor="middle" font-size="56" font-family="Arial" fill="#3b3b3b">C</text></svg>
            <span>Common Number</span></a></li>
        <li><a class="tile t-coral" href="#dream-number">
            <svg viewBox="0 0 100 100" aria-hidden="true"><rect x="22" y="28" width="46" height="58" fill="none" stroke="#3b3b3b" stroke-width="5"/><circle cx="45" cy="52" r="9" fill="#3b3b3b"/><path d="M36 64l22 14" stroke="#3b3b3b" stroke-width="8" stroke-linecap="round"/><ellipse cx="82" cy="16" rx="12" ry="8" fill="none" stroke="#3b3b3b" stroke-width="3"/></svg>
            <span>Dream Number</span></a></li>
        <li><a class="tile t-brown" href="#predict">
            <svg viewBox="0 0 100 100" aria-hidden="true"><path d="M5 18h60l12 8-12 8H5z" fill="#f4eee2"/><path d="M5 42h70l10 8-10 8H5z" fill="#f0b94a"/><path d="M95 66H25l-10 8 10 8h70z" fill="#e8e0cc"/><path d="M95 88H35l-10 6" stroke="#f0794a" stroke-width="7" fill="none"/></svg>
            <span>Predict Target</span></a></li>
        <li><a class="tile t-teal" href="{{ url('/previous-result') }}">
            <svg viewBox="0 0 100 100" aria-hidden="true"><circle cx="50" cy="45" r="40" fill="#fff"/><circle cx="50" cy="45" r="28" fill="none" stroke="#0f7d77" stroke-width="6"/><path d="M50 22v60" stroke="#0f7d77" stroke-width="6"/><path d="M38 35l12-14 12 14z" fill="#0f7d77"/></svg>
            <span>Previous Result</span></a></li>
    </ul>
</main>

<div class="copyright">
    &copy; {{ date('Y') }}. All rights reserved. Burmeseteer.<br>
    <a href="#">Terms</a> | <a href="#">Contact</a> | <a href="#">Privacy Policy</a>
</div>

</body>
</html>
