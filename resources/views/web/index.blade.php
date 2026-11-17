<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Burmeseteer | Result Today</title>
    <meta name="description" content="Burmeseteer - today's F/R 04:00PM and S/R 05:00PM results.">
    <style>
        :root {
            --header-bg: #99ccff;
            --footer-bg: #5ba3f0;
            --footer-bottom: #85c0dc;
            --head-grey: #e6e6e6;
            --head-green: #20d3aa;
            --ink: #111;
            --white: #fff;
            --coral: #ff6f52;
            --teal: #2aacb2;
            --blue: #10608f;
            --brown: #5e4d3a;
            --maxw: 1250px;
        }
        *, *::before, *::after { box-sizing: border-box; }
        html { -webkit-text-size-adjust: 100%; }
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            color: var(--ink);
            background: var(--white);
            line-height: 1.4;
        }
        a { color: inherit; text-decoration: none; }
        .wrap { width: 100%; max-width: var(--maxw); margin: 0 auto; padding: 0 clamp(10px, 2.5vw, 30px); }

        /* Header */
        .site-header { background: var(--header-bg); padding: 10px 0; }
        .brand { display: inline-flex; align-items: center; gap: 10px; }
        .brand-mark { width: 38px; height: 38px; flex: none; }
        .brand-name {
            font-family: "Arial Narrow", Arial, sans-serif;
            font-size: clamp(22px, 4vw, 30px);
            letter-spacing: -1px;
            color: #2a2a2a;
        }

        /* Result */
        .result { margin: clamp(24px, 6vw, 50px) 0 20px; }
        .result-date { text-align: center; font-size: clamp(22px, 5vw, 24px); font-weight: 700; margin: 0 0 8px; }
        .result-table { width: 100%; border-collapse: collapse; border: 2px solid var(--ink); table-layout: fixed; }
        .result-table th, .result-table td { border: 2px solid var(--ink); text-align: center; }
        .result-table .title { background: var(--head-grey); font-size: clamp(16px, 2.4vw, 18px); padding: 10px; }
        .result-table .round { background: var(--head-green); font-size: clamp(18px, 4.6vw,22px); padding: clamp(10px, 2.5vw, 10px) 6px; }
.result-table .number {
    font-size: clamp(21px, 6vw, 16px);
    font-weight: 700;
    padding: clamp(10px, 2.5vw, 8px) 6px;
}

        /* Tiles */
        .tiles {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: clamp(8px, 1.8vw, 20px);
            margin: 20px 0 30px;
            padding: 0;
            list-style: none;
        }
        .tile {
            position: relative;
            aspect-ratio: 1 / 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            padding: 8% 6% 6%;
            text-align: center;
            color: var(--white);
            overflow: hidden;
            transition: transform .15s ease;
        }
        .tile:hover, .tile:focus-visible { transform: translateY(-3px); }
        .tile:focus-visible { outline: 3px solid var(--ink); outline-offset: 2px; }
        .tile svg { width: 58%; height: auto; flex: 1; min-height: 0; }
        .tile span {
            font-family: "Trebuchet MS", Verdana, sans-serif;
            font-weight: 700;
            font-size: clamp(11px, 2.8vw, 26px);
            text-shadow: 0 1px 2px rgba(0,0,0,.25);
        }
        .t-coral { background: var(--coral); }
        .t-teal  { background: var(--teal); }
        .t-blue  { background: linear-gradient(160deg, #1b78a8, #0c3f78); }
        .t-brown { background: linear-gradient(160deg, #7a6650, var(--brown)); }
        .t-light { background: #fff; color: #c8200e; border: 1px solid #eee; }
        .t-light.dark { color: #4a3b2a; }
        .t-shop  { background: linear-gradient(180deg, #eee 0%, #eee 70%, #7a95c7 70%); }
        .t-shop span { color: var(--white); }

        /* Footer */
        .site-footer { background: var(--footer-bg); color: var(--white); text-align: center; padding: 28px 0 22px; }
        .site-footer h2 { margin: 0 0 10px; font-weight: 400; font-size: clamp(22px, 4.5vw, 30px); }
        .site-footer p { margin: 4px 0; font-size: clamp(13px, 2.6vw, 17px); color: #d6e8ff; }
        .social { display: flex; justify-content: center; gap: 16px; margin: 18px 0 0; padding: 0; list-style: none; }
        .social a {
            display: grid; place-items: center;
            width: 44px; height: 44px; border-radius: 50%;
            background: #7db6f4; color: var(--white);
            font-weight: 700; font-size: 16px;
        }
        .social a:hover, .social a:focus-visible { background: #94c4f8; }
        .copyright { background: var(--footer-bottom); text-align: center; padding: 8px 10px; font-size: clamp(13px, 3vw, 18px); }
        .copyright a { margin: 0 4px; }
        .copyright a:hover { text-decoration: underline; }

        @media (min-width: 900px) {
            .tiles { gap: 24px; }
        }
        @media (prefers-reduced-motion: reduce) {
            .tile { transition: none; }
        }
        .result-table .pending { font-size: clamp(13px, 3.2vw, 20px); font-weight: 400; color: #777; }
    </style>
</head>
<body>

<header class="site-header">
    <div class="wrap">
        <a class="brand" href="/" aria-label="Burmeseteer home">
            {{-- <svg class="brand-mark" viewBox="0 0 40 40" aria-hidden="true">
                <circle cx="20" cy="17" r="14" fill="none" stroke="#111" stroke-width="3"/>
                <circle cx="20" cy="17" r="7" fill="none" stroke="#111" stroke-width="3"/>
                <path d="M20 8v30" stroke="#111" stroke-width="3"/>
                <path d="M15 33l5 6 5-6z" fill="#111"/>
            </svg> --}}
            <span class="brand-name">Burmeseteer</span>
        </a>
    </div>
</header>

<main class="wrap">
<section class="result" aria-labelledby="result-date">
    <h1 class="result-date" id="result-date">{{ $date }}</h1>
    <table class="result-table">
        <thead>
            <tr><th class="title" colspan="2">BURMESE TEER</th></tr>
            <tr>
                <th class="round" scope="col">F/R({{ $frLabel }})</th>
                <th class="round" scope="col">S/R({{ $srLabel }})</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="number">
                    @if ($fr) {{ $fr }} @else <span class="pending">Not revealed yet</span> @endif
                </td>
                <td class="number">
                    @if ($sr) {{ $sr }} @else <span class="pending">Not revealed yet</span> @endif
                </td>
            </tr>
        </tbody>
    </table>
</section>

    <ul class="tiles">
        <li>
            <a class="tile t-coral" href="/previous-result">
                <svg viewBox="0 0 100 100" aria-hidden="true"><circle cx="50" cy="50" r="40" fill="none" stroke="#3b3b3b" stroke-width="7"/><text x="50" y="68" text-anchor="middle" font-size="56" font-family="Arial" fill="#3b3b3b">C</text></svg>
                <span>Common Number</span>
            </a>
        </li>
        <li>
            <a class="tile t-light" href="#social">
                <svg viewBox="0 0 100 100" aria-hidden="true"><path d="M20 12c35 10 40 65 10 80" fill="none" stroke="#c9961a" stroke-width="4"/><path d="M20 12L30 92" stroke="#a87a1a" stroke-width="1.5"/><path d="M18 60L88 30" stroke="#b5842a" stroke-width="2.5"/><path d="M88 30l-8 1 4 6z" fill="#777"/><path d="M18 60l6-8 4 6z" fill="#a31212"/></svg>
                <span>BURMESETEER SOCIAL</span>
            </a>
        </li>
        <li>
            <a class="tile t-coral" href="#dream-number">
                <svg viewBox="0 0 100 100" aria-hidden="true"><rect x="22" y="28" width="46" height="58" fill="none" stroke="#3b3b3b" stroke-width="5"/><circle cx="45" cy="52" r="9" fill="#3b3b3b"/><path d="M36 64l22 14" stroke="#3b3b3b" stroke-width="8" stroke-linecap="round"/><ellipse cx="82" cy="16" rx="12" ry="8" fill="none" stroke="#3b3b3b" stroke-width="3"/></svg>
                <span>Dream Number</span>
            </a>
        </li>
        <li>
            <a class="tile t-blue" href="#analytics">
                <svg viewBox="0 0 100 100" aria-hidden="true"><path d="M50 55L50 12A43 43 0 0 1 92 50z" fill="#2b72c4"/><path d="M50 55L92 50A43 43 0 0 1 78 82z" fill="#f08a3c"/><path d="M50 55L78 82A43 43 0 0 1 24 80z" fill="#6cc04a"/><path d="M50 55L24 80A43 43 0 0 1 8 50z" fill="#e8d86b"/><path d="M50 55L8 50A43 43 0 0 1 50 12z" fill="#c2185b"/></svg>
                <span>Analytics</span>
            </a>
        </li>
        <li>
            <a class="tile t-brown" href="#predict">
                <svg viewBox="0 0 100 100" aria-hidden="true"><path d="M5 18h60l12 8-12 8H5z" fill="#f4eee2"/><path d="M5 42h70l10 8-10 8H5z" fill="#f0b94a"/><path d="M95 66H25l-10 8 10 8h70z" fill="#e8e0cc"/><path d="M95 88H35l-10 6" stroke="#f0794a" stroke-width="7" fill="none"/></svg>
                <span>Predict Target</span>
            </a>
        </li>
        <li>
            <a class="tile t-teal" href="/previous-result">
                <svg viewBox="0 0 100 100" aria-hidden="true"><circle cx="50" cy="45" r="40" fill="#fff"/><circle cx="50" cy="45" r="28" fill="none" stroke="#0f7d77" stroke-width="6"/><path d="M50 22v60" stroke="#0f7d77" stroke-width="6"/><path d="M38 35l12-14 12 14z" fill="#0f7d77"/></svg>
                <span>Previous Result</span>
            </a>
        </li>
        <li>
            <a class="tile t-teal" href="/previous-result">
                <svg viewBox="0 0 100 100" aria-hidden="true"><path d="M18 30l60-12 8 58-52 14z" fill="none" stroke="#111" stroke-width="6" stroke-linejoin="round"/><path d="M18 30L10 92l34-6" fill="#111"/><g fill="#111"><rect x="42" y="40" width="10" height="10"/><rect x="58" y="38" width="10" height="10"/><rect x="40" y="56" width="10" height="10"/><rect x="56" y="54" width="10" height="10"/></g></svg>
                <span>Teer Calendar</span>
            </a>
        </li>
        <li>
            <a class="tile t-light dark" href="#counters">
                <svg viewBox="0 0 100 100" aria-hidden="true"><circle cx="62" cy="55" r="30" fill="#ffe600" stroke="#c9a400" stroke-width="4"/><circle cx="62" cy="55" r="12" fill="none" stroke="#c9a400" stroke-width="3"/><path d="M18 12c-14 20 4 40 22 40s22 25-6 36" fill="none" stroke="#1c8c5e" stroke-width="8" stroke-linecap="round"/></svg>
                <span>REPUTED COUNTERS</span>
            </a>
        </li>
        <li>
            <a class="tile t-shop" href="#shop">
                <svg viewBox="0 0 100 100" aria-hidden="true"><rect x="12" y="38" width="22" height="42" fill="#e53935"/><rect x="34" y="28" width="26" height="52" fill="#fb8c1f"/><rect x="48" y="8" width="26" height="72" fill="#7b2fa8" opacity=".9"/><rect x="68" y="34" width="22" height="46" fill="#2fbf6a"/></svg>
                <span>ONLINE SHOPPING</span>
            </a>
        </li>
    </ul>
</main>

<footer>
    <div class="site-footer">
        <div class="wrap">
            <h2>BURMESETEER.COM</h2>
            <p>Burmese Teer | Burmese Teer Result | Teer Burmese | Burmese Teer Today</p>
            <p>Result Teer Today | F/R 04:00PM S/R 05:00PM</p>
            <p>burmeseteer.com</p>
            <ul class="social">
                <li><a href="#" aria-label="Facebook">f</a></li>
                <li><a href="#" aria-label="Twitter">t</a></li>
                <li><a href="#" aria-label="YouTube">&#9654;</a></li>
            </ul>
        </div>
    </div>
    <div class="copyright">
        &copy; {{ date('Y') }}. All rights reserved. Burmeseteer.<br>
        <a href="#">Terms</a> | <a href="#">Contact</a> | <a href="#">Privacy Policy</a>
    </div>
</footer>


<script>
(function () {
    var offset  = {{ $serverNow }} - Date.now();
    var pending = @json(array_values(array_filter([$frPendingAt, $srPendingAt])));
    var wait = null;

    if (! @json($hasGame)) {
        wait = 60000;                                   // not generated yet: check every minute
    } else if (pending.length) {
        wait = Math.max(Math.min.apply(null, pending) - (Date.now() + offset) + 1500, 2000);
    }
    if (wait && wait < 86400000) { setTimeout(function () { location.reload(); }, wait); }
})();
</script>
</body>
</html>
