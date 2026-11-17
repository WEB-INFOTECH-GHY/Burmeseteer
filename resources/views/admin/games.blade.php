@extends('admin.template.admin_master')

@section('content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center g-2">
                            <div class="col-12 col-lg">
                                <h4 class="card-title mb-0">All Games</h4>
                                <small class="text-muted">{{ $rangeLabel }} &middot; {{ $games->count() }} {{ \Illuminate\Support\Str::plural('game', $games->count()) }}</small>
                            </div>

                            {{-- Filter --}}
                            <div class="col-12 col-lg-auto">
                                <form method="GET" action="{{ route('admin.game.index') }}" class="row g-2 align-items-center">
                                    <div class="col-auto">
                                        <select name="month" class="form-select form-select-sm" aria-label="Select month">
                                            <option value="">All months</option>
                                            @foreach (range(1, 12) as $m)
                                                <option value="{{ $m }}" @selected($month == $m)>{{ \Carbon\Carbon::create(null, $m, 1)->format('F') }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-auto">
                                        <select name="year" class="form-select form-select-sm" aria-label="Select year">
                                            <option value="">Year</option>
                                            @foreach ($years as $y)
                                                <option value="{{ $y }}" @selected($year == $y)>{{ $y }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-sm btn-primary">Filter</button>
                                        <a href="{{ route('admin.game.index') }}" class="btn btn-sm btn-light">Reset</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!--end card-header-->

                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered text-center align-middle mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th rowspan="2" class="align-middle">Date</th>
                                        <th colspan="3">F/R</th>
                                        <th colspan="3">S/R</th>
                                    </tr>
                                    <tr>
                                        <th>Number</th>
                                        <th>Reveal time</th>
                                        <th>Status</th>
                                        <th>Number</th>
                                        <th>Reveal time</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($games as $game)
                                        @php
                                            $isToday = $game->game_date->isToday();
                                            $frDone  = $game->isFrRevealed();
                                            $srDone  = $game->isSrRevealed();
                                        @endphp
                                        <tr @class(['table-info' => $isToday])>
                                            <td class="text-nowrap">
                                                {{ $game->game_date->format('d M Y') }}
                                                <small class="text-muted d-block">{{ $game->game_date->format('l') }}@if($isToday), Today @endif</small>
                                            </td>

                                            <td class="fs-5 fw-bold">{{ sprintf('%02d', $game->fr_number) }}</td>
                                            <td class="text-nowrap">{{ $game->fr_reveal_at->format('h:i A') }}</td>
                                            <td>
                                                <span @class(['badge border px-2', 'text-success border-success' => $frDone, 'text-warning border-warning' => ! $frDone])>
                                                    {{ $frDone ? 'Revealed' : 'Pending' }}
                                                </span>
                                            </td>

                                            <td class="fs-5 fw-bold">{{ sprintf('%02d', $game->sr_number) }}</td>
                                            <td class="text-nowrap">{{ $game->sr_reveal_at->format('h:i A') }}</td>
                                            <td>
                                                <span @class(['badge border px-2', 'text-success border-success' => $srDone, 'text-warning border-warning' => ! $srDone])>
                                                    {{ $srDone ? 'Revealed' : 'Pending' }}
                                                </span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-muted py-4">No games found for this selection.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div><!--end table-responsive-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div>
        </div>

    </div>
</div>

@endsection
