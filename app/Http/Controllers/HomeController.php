<?php

namespace App\Http\Controllers;
use App\Persona;
use App\Lider;
use App\EstadoApoyo;
use App\Comuna;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(Persona $personas, Lider $lider)
    {
        $comprometida = EstadoApoyo::where('name', 'Comprometido')->first();
        $noContactado = EstadoApoyo::where('name', 'No Contactado')->first();
        $contactado = EstadoApoyo::where('name', 'Contactado')->first();
        $noApoya = EstadoApoyo::where('name', 'No Apoya')->first();
        $indeciso = EstadoApoyo::where('name', 'Indeciso')->first();

        $comprometidas = Persona::where('estado_apoyo_id', $comprometida->id)->get();
        $noContactados = Persona::where('estado_apoyo_id', $noContactado->id)->get();
        $contactados = Persona::where('estado_apoyo_id', $contactado->id)->get();
        $noApoyan = Persona::where('estado_apoyo_id', $noApoya->id)->get();
        $indecisos = Persona::where('estado_apoyo_id', $indeciso->id)->get();

        $lcom = Lider::where('estado_apoyo_id', $comprometida->id)->get();
        $lnoContactados = Lider::where('estado_apoyo_id', $noContactado->id)->get();
        $lcontactados = Lider::where('estado_apoyo_id', $contactado->id)->get();
        $lnoApoyan = Lider::where('estado_apoyo_id', $noApoya->id)->get();
        $lindecisos = Lider::where('estado_apoyo_id', $indeciso->id)->get();

        $comunas = Comuna::where('name', 'LIKE', '%Comuna%')->get();
        $corregimientos = Comuna::where('name', 'LIKE', '%Corregimiento%')->get();

        $personaComuna = Persona::where('comuna_id', 1)
                                ->orWhere('comuna_id', 2)
                                ->orWhere('comuna_id', 3)
                                ->orWhere('comuna_id', 4)
                                ->orWhere('comuna_id', 5)
                                ->orWhere('comuna_id', 6)
                                ->orWhere('comuna_id', 7)
                                ->orWhere('comuna_id', 8)
                                ->orWhere('comuna_id', 9)
                                ->orWhere('comuna_id', 10)
                                ->orWhere('comuna_id', 11)
                                ->orWhere('comuna_id', 12)
                                ->orWhere('comuna_id', 13)
                                ->get();

        $personaCorregimiento = Persona::where('comuna_id', 14)
                                       ->orWhere('comuna_id', 15)
                                       ->orWhere('comuna_id', 16)
                                       ->orWhere('comuna_id', 17)
                                       ->orWhere('comuna_id', 18)
                                       ->orWhere('comuna_id', 19)
                                       ->orWhere('comuna_id', 20)
                                       ->orWhere('comuna_id', 21)
                                       ->orWhere('comuna_id', 22)
                                       ->orWhere('comuna_id', 23)
                                       ->orWhere('comuna_id', 24)
                                       ->orWhere('comuna_id', 25)
                                       ->orWhere('comuna_id', 26)
                                       ->orWhere('comuna_id', 27)
                                       ->orWhere('comuna_id', 28)
                                       ->orWhere('comuna_id', 29)
                                       ->orWhere('comuna_id', 30)
                                       ->orWhere('comuna_id', 31)
                                       ->orWhere('comuna_id', 32)
                                       ->get();

        //chartsData
        $pEne = Persona::whereMonth('created_at', '01')->whereYear('created_at', '2019')->get();
        $pFeb = Persona::whereMonth('created_at', '02')->whereYear('created_at', '2019')->get();
        $pMar = Persona::whereMonth('created_at', '03')->whereYear('created_at', '2019')->get();
        $pAbr = Persona::whereMonth('created_at', '04')->whereYear('created_at', '2019')->get();
        $pMay = Persona::whereMonth('created_at', '05')->whereYear('created_at', '2019')->get();
        $pJun = Persona::whereMonth('created_at', '06')->whereYear('created_at', '2019')->get();
        $pJul = Persona::whereMonth('created_at', '07')->whereYear('created_at', '2019')->get();
        $pAgo = Persona::whereMonth('created_at', '08')->whereYear('created_at', '2019')->get();
        $pSep = Persona::whereMonth('created_at', '09')->whereYear('created_at', '2019')->get();
        $pOpt = Persona::whereMonth('created_at', '10')->whereYear('created_at', '2019')->get();
        $pNov = Persona::whereMonth('created_at', '11')->whereYear('created_at', '2019')->get();
        $pDic = Persona::whereMonth('created_at', '12')->whereYear('created_at', '2019')->get();

        $pEneActual = Persona::whereMonth('created_at', '01')->whereYear('created_at', date('Y'))->get();
        $pFebActual = Persona::whereMonth('created_at', '02')->whereYear('created_at', date('Y'))->get();
        $pMarActual = Persona::whereMonth('created_at', '03')->whereYear('created_at', date('Y'))->get();
        $pAbrActual = Persona::whereMonth('created_at', '04')->whereYear('created_at', date('Y'))->get();
        $pMayActual = Persona::whereMonth('created_at', '05')->whereYear('created_at', date('Y'))->get();
        $pJunActual = Persona::whereMonth('created_at', '06')->whereYear('created_at', date('Y'))->get();
        $pJulActual = Persona::whereMonth('created_at', '07')->whereYear('created_at', date('Y'))->get();
        $pAgoActual = Persona::whereMonth('created_at', '08')->whereYear('created_at', date('Y'))->get();
        $pSepActual = Persona::whereMonth('created_at', '09')->whereYear('created_at', date('Y'))->get();
        $pOptActual = Persona::whereMonth('created_at', '10')->whereYear('created_at', date('Y'))->get();
        $pNovActual = Persona::whereMonth('created_at', '11')->whereYear('created_at', date('Y'))->get();
        $pDicActual = Persona::whereMonth('created_at', '12')->whereYear('created_at', date('Y'))->get();

        $meses2019 = $pEne->count().','.$pFeb->count().','.$pMar->count().','.$pAbr->count().','.$pMay->count().','.$pJun->count().','.$pJul->count().','.$pAgo->count().','.$pSep->count().','.$pOpt->count().','.$pNov->count().','.$pDic->count();
        $mesesActual = $pEne->count().','.$pFebActual->count().','.$pMarActual->count().','.$pAbrActual->count().','.$pMayActual->count().','.$pJunActual->count().','.$pJulActual->count().','.$pAgoActual->count().','.$pSepActual->count().','.$pOptActual->count().','.$pNovActual->count().','.$pDicActual->count();

        $personasChart = "
        <script>
        $(document).ready(function(){

            var PersonasChart = (function() {

            // Variables

            var Schart = $('#chart-personas');


            // Methods

            function init(Schart) {
                var PersonasChart = new Chart(Schart, {
                    type: 'line',
                    options: {
                        scales: {
                            yAxes: [{
                                gridLines: {
                                    color: Charts.colors.gray[900],
                                    zeroLineColor: Charts.colors.gray[900]
                                },
                                ticks: {
                                    callback: function(value) {
                                        if (!(value % 10)) {
                                            return value + ' Personas';
                                        }
                                    }
                                }
                            }]
                        },
                        tooltips: {
                            callbacks: {
                                label: function(item, data) {
                                    var label = data.datasets[item.datasetIndex].label || '';
                                    var yLabel = item.yLabel;
                                    var content = '';

                                    if (data.datasets.length > 1) {
                                        content += '<span class=\"popover-body-label mr-auto\">' + label + '</span>';
                                    }

                                    content += '<span class=\"popover-body-value\">' + yLabel + ' Personas</span>';
                                    return content;
                                }
                            }
                        }
                    },
                    data: {
                        labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Opt', 'Nov', 'Dic'],
                        datasets: [{
                            label: 'Performance',
                            data: [".$mesesActual."]
                        }]
                    }
                });

                // Save to jQuery object

                Schart.data('chart', PersonasChart);

            };

            // Events

            if (Schart.length) {
                init(Schart);
            }

            })();
            });
            </script>
        ";

        return view('dashboard', compact([
            'personas',
            'totalEstado',
            'pEne',
            'pFeb',
            'pMar',
            'pAbr',
            'pMay',
            'pJun',
            'pJul',
            'pAgo',
            'pSep',
            'pOpt',
            'pNov',
            'pDic',
            'personasChart',
            'lider',
            'comprometidas',
            'contactados',
            'noContactados',
            'noApoyan',
            'indecisos',
            'lcom',
            'lcomprometidas',
            'lcontactados',
            'lnoContactados',
            'lnoApoyan',
            'lindecisos',
            'comunas',
            'corregimientos',
            'personaComuna',
            'personaCorregimiento'
        ]));
    }
}
