@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Registros</h6>
                                <h2 class="text-white mb-0">Personas</h2>
                            </div>
                            <div class="col">
                                <ul class="nav nav-pills justify-content-end">
                                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-personas" data-update='{"data":{"datasets":[{"data":[{{$pEne->count()}},{{$pFeb->count()}},{{$pMar->count()}},{{$pJun->count()}},{{$pJul->count()}},{{$pAbr->count()}},{{$pMay->count()}},{{$pAgo->count()}},{{$pSep->count()}},{{$pOpt->count()}},{{$pNov->count()}},{{$pDic->count()}}]}]}}' data-prefix="" data-suffix=" Personas">
                                        <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                                            <span class="d-none d-md-block">2019</span>
                                            <span class="d-md-none">2019</span>
                                        </a>
                                        <input hidden id="chart-personas-data" value="{{$pEne->count()}},{{$pFeb->count()}},{{$pMar->count()}},{{$pAbr->count()}},{{$pMay->count()}},{{$pJun->count()}},{{$pJul->count()}},{{$pAgo->count()}},{{$pSep->count()}},{{$pOpt->count()}},{{$pNov->count()}},{{$pDic->count()}}">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <!-- Chart wrapper -->
                            <canvas id="chart-personas" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!--div class="col-xl-4">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                                <h2 class="mb-0">Total orders</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body"-->
                        <!-- Chart -->
                        <!--div class="chart">
                            <canvas id="chart-orders" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div-->
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush

@section('scripts')
<?php echo $personasChart; ?>
@endsection
