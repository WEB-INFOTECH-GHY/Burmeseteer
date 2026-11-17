@extends('admin.template.admin_master')

@section('content')

<div class="page-content">
    <div class="container-fluid">

        {{-- Flash messages --}}
        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-12 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center g-2">
                            <div class="col">
                                <h4 class="card-title mb-0">Today's Game</h4>
                                <small class="text-muted">{{ \Carbon\Carbon::parse($today)->format('d M Y, l') }}</small>
                            </div>
                            <div class="col-auto text-end">
                                <small class="text-muted d-block">Current time (IST)</small>
                                <span id="liveClock" class="fw-bold fs-5">{{ now()->format('h:i:s A') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        @if (! $game)
                            {{-- ========== NOT GENERATED YET ========== --}}
                            <p class="text-muted">Today's game has not been generated yet. Choose the reveal times (defaults are filled in) and generate.</p>

                            <form method="POST" action="{{ route('admin.game.generate') }}">
                                @csrf
                                <div class="row g-3">
                                    @foreach (['fr' => ['F/R reveal time', $defaultFr], 'sr' => ['S/R reveal time', $defaultSr]] as $key => [$label, $default])
                                        @php
                                            $t = \Carbon\Carbon::createFromFormat('H:i', old("{$key}_time", $default));
                                        @endphp
                                        <div class="col-12 col-sm-6">
                                            <label class="form-label">{{ $label }}</label>
                                            <div class="input-group time-picker">
                                                <select class="form-select tp-hour" aria-label="{{ $label }} hour">
                                                    @foreach (range(1, 12) as $h)
                                                        <option value="{{ $h }}" @selected((int) $t->format('g') === $h)>{{ sprintf('%02d', $h) }}</option>
                                                    @endforeach
                                                </select>
                                                <select class="form-select tp-minute" aria-label="{{ $label }} minute">
                                                    @foreach (range(0, 59) as $m)
                                                        <option value="{{ $m }}" @selected((int) $t->format('i') === $m)>{{ sprintf('%02d', $m) }}</option>
                                                    @endforeach
                                                </select>
                                                <select class="form-select tp-ampm" aria-label="{{ $label }} AM or PM">
                                                    <option value="AM" @selected($t->format('A') === 'AM')>AM</option>
                                                    <option value="PM" @selected($t->format('A') === 'PM')>PM</option>
                                                </select>
                                                {{-- Sent to the server as 24-hour H:i --}}
                                                <input type="hidden" name="{{ $key }}_time" class="tp-value" value="{{ $t->format('H:i') }}">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Generate Today's Game</button>
                            </form>

                        @else
                            {{-- ========== ALREADY GENERATED ========== --}}
                            @php
                                $frRevealed = $game->isFrRevealed();
                                $srRevealed = $game->isSrRevealed();
                            @endphp

                            <div class="table-responsive">
                                <table class="table table-bordered text-center align-middle mb-3">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Round</th>
                                            <th>Number</th>
                                            <th>Reveal time</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="fw-semibold">F/R</td>
                                            <td class="fs-4 fw-bold">{{ sprintf('%02d', $game->fr_number) }}</td>
                                            <td>{{ $game->fr_reveal_at->format('h:i A') }}</td>
                                            <td>
                                                @if ($frRevealed)
                                                    <span class="badge text-success border border-success px-2">Revealed</span>
                                                @else
                                                    <span class="badge text-warning border border-warning px-2">Pending</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-semibold">S/R</td>
                                            <td class="fs-4 fw-bold">{{ sprintf('%02d', $game->sr_number) }}</td>
                                            <td>{{ $game->sr_reveal_at->format('h:i A') }}</td>
                                            <td>
                                                @if ($srRevealed)
                                                    <span class="badge text-success border border-success px-2">Revealed</span>
                                                @else
                                                    <span class="badge text-warning border border-warning px-2">Pending</span>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            @if ($frRevealed && $srRevealed)
                                <p class="text-muted mb-0">Both rounds are revealed. Numbers can no longer be edited.</p>
                            @else
                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editGameModal">
                                    Edit Numbers
                                </button>
                                <small class="text-muted ms-2">A round locks at its reveal time.</small>
                            @endif
                        @endif

                    </div><!--end card-body-->
                </div><!--end card-->
            </div>
        </div>

    </div>
</div>

{{-- ========== EDIT MODAL ========== --}}
@if ($game && ! ($game->isFrRevealed() && $game->isSrRevealed()))
    <div class="modal fade" id="editGameModal" tabindex="-1" aria-labelledby="editGameModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form class="modal-content" method="POST" action="{{ route('admin.game.update', $game->id) }}">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title" id="editGameModalLabel">Edit Numbers</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-6">
                            <label for="fr_number" class="form-label">F/R number</label>
                            <input type="number" class="form-control" id="fr_number" name="fr_number"
                                   min="1" max="99" value="{{ $game->fr_number }}"
                                   @disabled($game->isFrRevealed())>
                            @if ($game->isFrRevealed())
                                <div class="form-text">Revealed, locked.</div>
                            @endif
                        </div>
                        <div class="col-6">
                            <label for="sr_number" class="form-label">S/R number</label>
                            <input type="number" class="form-control" id="sr_number" name="sr_number"
                                   min="1" max="99" value="{{ $game->sr_number }}"
                                   @disabled($game->isSrRevealed())>
                            @if ($game->isSrRevealed())
                                <div class="form-text">Revealed, locked.</div>
                            @endif
                        </div>
                    </div>
                    <p class="form-text mt-3 mb-0">Numbers must be between 01 and 99. You can change one or both.</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endif

<script>
(function () {
    // ---- Live clock (IST), starts from the server's time so a wrong PC clock doesn't matter ----
    var serverNow = {{ now()->getTimestamp() * 1000 }};
    var offset    = serverNow - Date.now();
    var clock     = document.getElementById('liveClock');

    function tick() {
        var d = new Date(Date.now() + offset);
        clock.textContent = d.toLocaleTimeString('en-IN', {
            timeZone: 'Asia/Kolkata', hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: true
        }).toUpperCase();
    }
    tick();
    setInterval(tick, 1000);

    // ---- 12-hour pickers -> hidden 24-hour H:i value ----
    document.querySelectorAll('.time-picker').forEach(function (box) {
        var hour = box.querySelector('.tp-hour');
        var min  = box.querySelector('.tp-minute');
        var ap   = box.querySelector('.tp-ampm');
        var out  = box.querySelector('.tp-value');

        function update() {
            var h = parseInt(hour.value, 10) % 12;
            if (ap.value === 'PM') { h += 12; }
            out.value = String(h).padStart(2, '0') + ':' + String(min.value).padStart(2, '0');
        }
        [hour, min, ap].forEach(function (el) { el.addEventListener('change', update); });
        update();
    });

    @if ($game)
    // ---- Refresh once when the next pending round reaches its reveal time ----
    var pending = [
        @if (! $game->isFrRevealed()) {{ $game->fr_reveal_at->timestamp * 1000 }}, @endif
        @if (! $game->isSrRevealed()) {{ $game->sr_reveal_at->timestamp * 1000 }}, @endif
    ];
    if (pending.length) {
        var wait = Math.min.apply(null, pending) - (Date.now() + offset) + 1500;
        if (wait > 0 && wait < 86400000) { setTimeout(function () { location.reload(); }, wait); }
    }
    @endif
})();
</script>

@endsection
