@php
    // [Sl. no, Dream, Direct, House, Ending]
    $dreams = [
        [1, 'Quarrel between husband and wife', '03, 08, 13, 37, 40, 73', '', '3'],
        [2, 'Erotic dream', '17, 40, 53, 59, 60, 83', '', ''],
        [3, 'Bathing in the open', '08, 18, 28, 48, 78, 98', '', '8'],
        [4, 'Travelling', '08, 14, 18, 52, 64, 68, 74, 78, 98', '', '8'],
        [5, 'Travelling in an aeroplane', '23, 43, 53, 63, 68, 73, 83, 93', '', '3'],
        [6, 'Taking a walk', '', '', '0,1'],
        [7, 'Studying', '', '', '5'],
        [8, 'Corpse', '', '9', '9'],
        [9, 'Playing', '00, 27, 40, 50, 57, 60', '', ''],
        [10, 'Talking over the phone', '98, 96, 94', '', ''],
        [11, 'Eating', '01, 02, 05, 15, 16, 45, 75, 85, 95', '', ''],
        [12, 'Breast Feeding', '02, 03, 05, 12, 20, 52, 53', '', ''],
        [13, 'Male', '6', '6', ''],
        [14, 'Female', '5', '5', ''],
        [15, 'Child', '2,3', '2,3', ''],
        [16, 'Police', '7, 87, 8', '', ''],
        [17, 'Wild Pig', '46', '', ''],
        [18, 'Snake or ilea fish', '09, 17, 37, 57, 77, 99', '', '7'],
        [19, 'Cow, goat or buffalo', '12, 18, 19, 22, 24, 34, 42, 54, 72, 74, 84, 94, 97', '', ''],
        [20, 'Cow', '4', '4', ''],
        [21, 'Tiger', '9', '9', ''],
        [22, 'Dog', '4,5,6', '4', ''],
        [23, 'Horse', '8', '8', ''],
        [24, 'Bird', '2', '2', ''],
        [25, 'Elephant', '9', '9', ''],
        [26, 'Snail', '0', '0', '0'],
        [27, 'Turtle', '9', '9', ''],
        [28, 'Crab', '6, 2', '6', '2'],
        [29, 'Spider', '6, 12', '', ''],
        [30, 'Honey bee', '74, 24, 14, 04, 94', '', '4'],
        [31, 'Insect', '37, 21', '', ''],
        [32, 'Sour fruits', '00, 03, 11, 12, 13, 23, 32, 43, 53, 63, 70, 73, 79, 93', '', ''],
        [33, 'Paddy field', '24, 38, 52, 54, 64, 68, 74', '', ''],
        [34, 'Pumpkin', '28, 35, 48, 53, 58, 68, 78, 88, 98', '', ''],
        [35, 'Bamboo', '0, 1', '', ''],
        [36, 'Big Tree', '8, 9', '', ''],
        [37, 'Small tree', '2, 3, 8', '', ''],
        [38, 'Banana', '11, 3', '', ''],
        [39, 'Jackfruit', '4', '', '4'],
        [40, 'Papaya', '1, 12', '1', ''],
        [41, 'Orange', '8,9', '', ''],
        [42, 'Chilli', '1, 2', '1', '2'],
        [43, 'Bamboo Shoot', '1, 11', '1', '1'],
        [44, 'Tool used to cut wood', '1, 57, 61, 67', '', '6'],
        [45, 'Tools : cutter, chopper, hammer', '07, 17, 27, 47, 67, 71, 87', '', '7'],
        [46, 'An event or a shopping place', '18, 28, 38, 52, 58, 62', '', '8'],
        [47, 'Money', '00, 14, 15, 20, 25, 35, 50', '', '0, 5'],
        [48, 'Small water body', '00, 01, 02, 80, 90', '4,7', '0'],
        [49, 'Tools : cutter, chopper, hammer', '07, 17, 27, 47, 67, 71, 87', '', '7'],
        [50, 'An event or a shopping place', '18, 28, 38, 52, 58, 62', '4,7', '0'],
        [51, 'Footpath or a road made of bricks', '19, 61, 71, 91', '', ''],
        [53, 'Automobile : 4 wheeler', '21, 24, 54, 62, 64', '8', '4'],
        [54, 'Automobile : 2/3 wheeler', '52, 53, 54, 58, 60, 62, 68', '', ''],
        [55, 'God', '09, 13, 29, 89', '', ''],
        [56, 'Book, pen, paper', '00, 02, 05', '0', '3'],
        [57, 'Earthquake', '00, 07, 08, 14, 41, 75, 95', '', ''],
        [58, 'Ghost or apparition', '52, 54, 58, 62, 64, 68', '9', '9'],
        [59, 'Oven, kiln, fireplace', '12, 31, 63, 66, 68', '', ''],
        [60, 'Fire', '', '', '0'],
        [61, 'Hand Pump', '2, 3, 7, 17, 18, 20, 71', '', ''],
        [62, 'Water Carrier', '8', '8', '8'],
        [63, 'Lake', '6', '', ''],
        [64, 'Boat', '3', '', ''],
        [65, 'Rice Chopper', '8', '', ''],
        [66, 'Big river', '8', '', ''],
        [67, 'Cooking pan', '2', '', ''],
        [68, 'Shoe', '8', '', ''],
        [69, 'Train', '9', '', ''],
        [70, 'Temple', '1, 2, 9', '', ''],
        [72, 'Umbrella', '1', '1', '1'],
        [73, 'Pencil', '7, 77, 79', '7', '7'],
    ];
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dream Number | Burmeseteer</title>
    <meta name="description" content="Burmeseteer dream number guide: a compilation of dream meanings with direct, house and ending numbers.">
    <style>
        :root {
            --header-bg: #99ccff;
            --th-bg: #5ba3f0;
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

        .intro { text-align: center; font-style: italic; font-size: clamp(13px, 3.2vw, 17px); margin: 14px 0 22px; }

        /* Dream table */
        .table-scroll { overflow-x: auto; border: 1px solid var(--line); margin-bottom: 20px; -webkit-overflow-scrolling: touch; }
        .dreams { width: 100%; border-collapse: collapse; min-width: 340px; }
        .dreams th {
            background: var(--th-bg); color: var(--ink); font-weight: 400;
            font-size: clamp(12px, 2.6vw, 15px); padding: 3px 6px; border: 1px solid var(--line);
        }
        .dreams td {
            text-align: center; font-size: clamp(12px, 2.6vw, 15px); padding: 3px 6px;
            border: 1px solid #ddd; word-break: break-word;
        }
        .dreams th:nth-child(1), .dreams td:nth-child(1) { width: 8%; white-space: nowrap; }
        .dreams th:nth-child(4), .dreams td:nth-child(4),
        .dreams th:nth-child(5), .dreams td:nth-child(5) { width: 9%; white-space: nowrap; }
        .dreams tbody tr:nth-child(even) { background: #fafafa; }
        .dreams tbody tr:hover { background: #eef5fe; }

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
    <h1 class="intro">BELOW IS A COMPILATION OF DREAM MEANINGS.</h1>

    <div class="table-scroll">
        <table class="dreams">
            <thead>
                <tr>
                    <th scope="col">Sl. no</th>
                    <th scope="col">Dream</th>
                    <th scope="col">Direct</th>
                    <th scope="col">House</th>
                    <th scope="col">Ending</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dreams as [$no, $dream, $direct, $house, $ending])
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $dream }}</td>
                        <td>{{ $direct }}</td>
                        <td>{{ $house }}</td>
                        <td>{{ $ending }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

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
        <li><a class="tile t-coral" href="{{ url('/dream-number') }}">
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
