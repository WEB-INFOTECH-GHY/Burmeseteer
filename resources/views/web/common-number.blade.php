
@php
    // Common Number Results
    $results = [
        [
            'game' => 'BHUTAN',
            'direct' => rand(10, 99) . ',' . rand(10, 99),
            'house' => rand(0, 9),
            'ending' => rand(0, 9),
        ],
        [
            'game' => 'BHUTAN',
            'direct' => rand(10, 99),
            'house' => rand(0, 9),
            'ending' => rand(0, 9),
        ],
    ];

    // Navigation tiles
    $links = [
        [
            'label' => 'Teer Result',
            'url' => url('/'),
            'type' => 'result',
            'style' => 'navy',
        ],
        [
            'label' => 'Social Network',
            'url' => '#social',
            'type' => 'social',
            'style' => 'white',
        ],
        [
            'label' => 'Common Number',
            'url' => route('common-number'),
            'type' => 'common',
            'style' => 'coral',
        ],
        [
            'label' => 'Dream Number',
            'url' => url('/dream-number'),
            'type' => 'dream',
            'style' => 'coral',
        ],
        [
            'label' => 'Predict Target',
            'url' => route('target-game'),
            'type' => 'target',
            'style' => 'brown',
        ],
        [
            'label' => 'Previous Result',
            'url' => url('/previous-result'),
            'type' => 'previous',
            'style' => 'teal',
        ],
    ];
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Common Number | Burmeseteer</title>

    <meta name="description"
          content="Check common numbers and calculations for Bhutan Teer on Burmeseteer.">

    <style>
        :root {
            --header-bg: #99ccff;
            --ink: #111;
            --white: #fff;
            --coral: #ff6f52;
            --teal: #2aacb2;
            --green: #36cbb4;
            --footer-bottom: #85c0dc;
            --maxw: 1440px;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        html {
            -webkit-text-size-adjust: 100%;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            color: var(--ink);
            background: var(--white);
            line-height: 1.4;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .cn-wrap {
            width: 100%;
            max-width: var(--maxw);
            margin: 0 auto;
        }

        /* Header */

        .cn-header {
            background: var(--header-bg);
            padding: 5px 20px;
        }

        .cn-brand {
            display: inline-flex;
            align-items: center;
            gap: 7px;
        }

        .cn-brand-mark {
            width: 32px;
            height: 32px;
            flex: none;
        }

        .cn-brand-name {
            font-family: "Arial Narrow", Arial, sans-serif;
            font-size: 22px;
            letter-spacing: -1px;
            color: #222;
        }

        /* Main Section */

        .cn-main {
            width: 100%;
            padding: 38px 20px 28px;
        }

        /* Date */

        .cn-date {
            text-align: center;
            font-size: clamp(23px, 3vw, 32px);
            font-weight: 700;
            margin: 0 0 18px;
        }

        /* Result Tables */

        .cn-results {
            display: flex;
            flex-direction: column;
            gap: 20px;
            width: 100%;
        }

        .cn-table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
            text-align: center;
        }

        .cn-table th,
        .cn-table td {
            border: 1px solid #111;
            padding: 2px 5px;
            line-height: 1.25;
        }

        .cn-table-title {
            background: #e7e7e7;
            font-size: 14px;
            font-weight: 400;
        }

        .cn-table-heading {
            background: var(--green);
            font-size: 14px;
            font-weight: 700;
        }

        .cn-table-value {
            background: #fff;
            font-size: 14px;
            font-weight: 400;
        }

        /* Disclaimer */

        .cn-disclaimer {
            margin: 17px 10px 27px;
            text-align: center;
            font-size: clamp(12px, 1.4vw, 16px);
            line-height: 1.35;
            font-weight: 700;
            text-transform: uppercase;
        }

        /* Navigation Grid */

        .cn-links {
            display: grid;
            grid-template-columns: repeat(6, minmax(0, 1fr));
            gap: 5px;
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .cn-link-item {
            min-width: 0;
        }

        .cn-tile {
            width: 100%;
            aspect-ratio: 1 / 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            padding: 8% 5% 6%;
            text-align: center;
            color: var(--white);
            overflow: hidden;
            transition: filter .2s ease;
        }

        .cn-tile:hover {
            filter: brightness(.92);
        }

        .cn-tile:focus-visible {
            outline: 3px solid #111;
            outline-offset: -3px;
        }

        .cn-tile svg {
            width: 75%;
            flex: 1;
            min-height: 0;
            max-height: 78%;
        }

        .cn-tile span {
            font-family: "Trebuchet MS", Verdana, sans-serif;
            font-weight: 700;
            font-size: clamp(10px, 1.45vw, 21px);
            line-height: 1.2;
            text-shadow: 0 1px 2px rgba(0,0,0,.25);
        }

        /* Tile Colors */

        .cn-navy {
            background: #34495e;
        }

        .cn-white {
            background: #fff;
            color: #34495e;
            border: 3px solid #34495e;
        }

        .cn-coral {
            background: var(--coral);
        }

        .cn-brown {
            background: linear-gradient(160deg, #7a6650, #5e4d3a);
        }

        .cn-teal {
            background: var(--teal);
        }

        /* Copyright */

        .cn-copyright {
            background: var(--footer-bottom);
            text-align: center;
            padding: 5px 10px;
            font-size: 14px;
            line-height: 1.3;
        }

        .cn-copyright a {
            margin: 0 3px;
        }

        .cn-copyright a:hover {
            text-decoration: underline;
        }

        /* Tablet */

        @media (max-width: 900px) {

            .cn-main {
                padding: 30px 12px 22px;
            }

            .cn-links {
                grid-template-columns: repeat(3, minmax(0, 1fr));
                gap: 6px;
            }

            .cn-tile span {
                font-size: clamp(12px, 2.2vw, 20px);
            }

            .cn-tile svg {
                width: 65%;
            }
        }

        /* Mobile */

        @media (max-width: 480px) {

            .cn-header {
                padding: 5px 12px;
            }

            .cn-main {
                padding: 23px 8px 18px;
            }

            .cn-date {
                font-size: 24px;
                margin-bottom: 15px;
            }

            .cn-results {
                gap: 15px;
            }

            .cn-table th,
            .cn-table td {
                padding: 3px 3px;
                font-size: 12px;
            }

            .cn-disclaimer {
                margin: 15px 3px 20px;
                font-size: 11px;
            }

            .cn-links {
                grid-template-columns: repeat(3, minmax(0, 1fr));
                gap: 5px;
            }

            .cn-tile {
                padding: 7% 4% 6%;
            }

            .cn-tile span {
                font-size: clamp(10px, 3vw, 14px);
            }

            .cn-tile svg {
                width: 70%;
            }

            .cn-copyright {
                font-size: 12px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .cn-tile {
                transition: none;
            }
        }
    </style>
</head>

<body>

    <!-- Header -->
    <header class="cn-header">
        <div class="cn-wrap">

            <a class="cn-brand" href="/" aria-label="Burmeseteer Home">

                <svg class="cn-brand-mark"
                     viewBox="0 0 40 40"
                     aria-hidden="true">

                    <circle cx="20" cy="17" r="14"
                            fill="none" stroke="#111" stroke-width="3"/>

                    <circle cx="20" cy="17" r="7"
                            fill="none" stroke="#111" stroke-width="3"/>

                    <path d="M20 8v30"
                          stroke="#111" stroke-width="3"/>

                    <path d="M15 33l5 6 5-6z"
                          fill="#111"/>

                </svg>

                <span class="cn-brand-name">Burmeseteer.com</span>

            </a>

        </div>
    </header>


    <!-- Main Content -->
    <main class="cn-wrap cn-main">

        <!-- Date -->
        <h1 class="cn-date">
            {{ now()->format('d-m-Y') }}
        </h1>


        <!-- Common Number Results -->
        <section class="cn-results">

            @foreach ($results as $result)

                <table class="cn-table">

                    <thead>

                        <tr>
                            <th colspan="3" class="cn-table-title">
                                {{ $result['game'] }}
                            </th>
                        </tr>

                        <tr>
                            <th class="cn-table-heading">Direct</th>
                            <th class="cn-table-heading">House</th>
                            <th class="cn-table-heading">Ending</th>
                        </tr>

                    </thead>

                    <tbody>

                        <tr>
                            <td class="cn-table-value">
                                {{ $result['direct'] }}
                            </td>

                            <td class="cn-table-value">
                                {{ $result['house'] }}
                            </td>

                            <td class="cn-table-value">
                                {{ $result['ending'] }}
                            </td>
                        </tr>

                    </tbody>

                </table>

            @endforeach

        </section>


        <!-- Disclaimer -->
        <div class="cn-disclaimer">

            DISCLAIMER : THESE COMMON NUMBERS ARE PURELY BASED ON
            CERTAIN CALCULATIONS DONE USING PAST RESULTS.
            THERE IS NO GUARANTEE OF THE ACCURACY OF THESE NUMBERS.

        </div>


        <!-- Navigation Tiles -->
        <ul class="cn-links">

            @foreach ($links as $link)

                <li class="cn-link-item">

                    <a href="{{ $link['url'] }}"
                       class="cn-tile cn-{{ $link['style'] }}"
                       aria-label="{{ $link['label'] }}">

                        @if ($link['type'] === 'result')

                            <!-- Teer Result -->
                            <svg viewBox="0 0 100 100" aria-hidden="true">
                                <circle cx="57" cy="52" r="36" fill="#6b1d2a"/>
                                <circle cx="57" cy="52" r="27" fill="none" stroke="#fff" stroke-width="5"/>
                                <circle cx="57" cy="52" r="17" fill="none" stroke="#fff" stroke-width="5"/>
                                <circle cx="57" cy="52" r="7" fill="#fff"/>
                                <path d="M8 12L43 47 M12 65L39 53 M32 8L49 43"
                                      stroke="#f0b94a" stroke-width="4"/>
                                <path d="M5 5l8 3-4 8z M9 58l8 3-4 8z"
                                      fill="#f0b94a"/>
                            </svg>

                        @elseif ($link['type'] === 'social')

                            <!-- Social Network -->
                            <svg viewBox="0 0 100 100" aria-hidden="true">
                                <g fill="#f4b183">
                                    <circle cx="20" cy="20" r="11"/>
                                    <circle cx="50" cy="20" r="11"/>
                                    <circle cx="80" cy="20" r="11"/>
                                    <circle cx="20" cy="55" r="11"/>
                                    <circle cx="50" cy="55" r="11"/>
                                    <circle cx="80" cy="55" r="11"/>
                                </g>
                                <g fill="#5b9bd5">
                                    <rect x="8" y="34" width="24" height="10" rx="5"/>
                                    <rect x="38" y="34" width="24" height="10" rx="5"/>
                                    <rect x="68" y="34" width="24" height="10" rx="5"/>
                                </g>
                            </svg>

                        @elseif ($link['type'] === 'common')

                            <!-- Common Number -->
                            <svg viewBox="0 0 100 100" aria-hidden="true">
                                <circle cx="50" cy="50" r="39"
                                        fill="none" stroke="#3b3b3b" stroke-width="7"/>
                                <text x="50" y="68"
                                      text-anchor="middle"
                                      font-size="56"
                                      font-family="Arial"
                                      fill="#3b3b3b">C</text>
                            </svg>

                        @elseif ($link['type'] === 'dream')

                            <!-- Dream Number -->
                            <svg viewBox="0 0 100 100" aria-hidden="true">
                                <rect x="22" y="28" width="46" height="58"
                                      fill="none" stroke="#3b3b3b" stroke-width="5"/>
                                <circle cx="45" cy="52" r="9" fill="#3b3b3b"/>
                                <path d="M36 64l22 14"
                                      stroke="#3b3b3b" stroke-width="8"
                                      stroke-linecap="round"/>
                                <ellipse cx="82" cy="16" rx="12" ry="8"
                                         fill="none" stroke="#3b3b3b" stroke-width="3"/>
                            </svg>

                        @elseif ($link['type'] === 'target')

                            <!-- Predict Target -->
                            <svg viewBox="0 0 100 100" aria-hidden="true">
                                <path d="M5 18h60l12 8-12 8H5z"
                                      fill="#f4eee2"/>
                                <path d="M5 42h70l10 8-10 8H5z"
                                      fill="#f0b94a"/>
                                <path d="M95 66H25l-10 8 10 8h70z"
                                      fill="#e8e0cc"/>
                                <path d="M95 88H35l-10 6"
                                      stroke="#f0794a"
                                      stroke-width="7"
                                      fill="none"/>
                            </svg>

                        @elseif ($link['type'] === 'previous')

                            <!-- Previous Result -->
                            <svg viewBox="0 0 100 100" aria-hidden="true">
                                <circle cx="50" cy="45" r="40" fill="#fff"/>
                                <circle cx="50" cy="45" r="28"
                                        fill="none" stroke="#0f7d77" stroke-width="6"/>
                                <path d="M50 22v60"
                                      stroke="#0f7d77" stroke-width="6"/>
                                <path d="M38 35l12-14 12 14z"
                                      fill="#0f7d77"/>
                            </svg>

                        @endif

                        <span>{{ $link['label'] }}</span>

                    </a>

                </li>

            @endforeach

        </ul>

    </main>


    <!-- Copyright -->
    <footer class="cn-copyright">

        &copy; {{ date('Y') }}. All rights Reserved. Burmeseteer.

        <br>

        <a href="#">Terms</a> |
        <a href="#">Contact</a> |
        <a href="#">Privacy Policy</a>

    </footer>

</body>
</html>
