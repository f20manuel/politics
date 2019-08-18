<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Personas</h5>
                                    <span class="h2 font-weight-bold mb-0">{{ $personas->count() }}
                                        @if ($personas->count() == 1)
                                            <small>Registrado</small>
                                        @else
                                            <small>Registrados</small>
                                        @endif
                                    </span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                @if($comprometidas->count() == 0)
                                    <span class="text-danger mr-2"><i class="fas fa-users mr-2"></i>0%</span>
                                    <span class="text-danger">Comprometido</span>
                                @elseif(number_format($comprometidas->count() * 100 / $personas->count(), 0) == 1)
                                    <span class="text-danger mr-2"><i class="fas fa-users mr-2"></i>{{ number_format($comprometidas->count() * 100 / $personas->count(), 0) }}%</span>
                                    <span class="text-danger">Comprometido</span>
                                @elseif (number_format($comprometidas->count() * 100 / $personas->count(), 0) > 0 and number_format($comprometidas->count() * 100 / $personas->count(), 0) < 5)
                                    <span class="text-danger mr-2"><i class="fas fa-users mr-2"></i>{{ number_format($comprometidas->count() * 100 / $personas->count(), 0) }}%</span>
                                    <span class="text-danger">Comprometidos</span>
                                @elseif(number_format($comprometidas->count() * 100 / $personas->count(), 0) > 0 and number_format($comprometidas->count() * 100 / $personas->count(), 0) < 10)
                                    <span class="text-warning mr-2"><i class="fas fa-users mr-2"></i>{{ number_format($comprometidas->count() * 100 / $personas->count(), 0) }}%</span>
                                    <span class="text-warning">Comprometidos</span>
                                @else
                                    <span class="text-success mr-2"><i class="fas fa-users mr-2"></i>{{ number_format($comprometidas->count() * 100 / $personas->count(), 0) }}%</span>
                                    <span class="text-success">Comprometidos</span>
                                @endif
                                <br>
                                @if($contactados->count() == 0)
                                    <small class="text-danger mr-2"><i class="fas fa-users mr-2"></i>0%</small>
                                    <small class="text-danger">Contactado</small>
                                @elseif(number_format($contactados->count() * 100 / $personas->count(), 0) == 1)
                                    <small class="text-danger mr-2"><i class="fas fa-users mr-2"></i>{{ number_format($contactados->count() * 100 / $personas->count(), 0) }}%</small>
                                    <small class="text-danger">Contactado</small>
                                @elseif (number_format($contactados->count() * 100 / $personas->count(), 0) > 0 and number_format($contactados->count() * 100 / $personas->count(), 0) < 5)
                                    <small class="text-danger mr-2"><i class="fas fa-users mr-2"></i>{{ number_format($contactados->count() * 100 / $personas->count(), 0) }}%</small>
                                    <small class="text-danger">Contactados</small>
                                @elseif(number_format($contactados->count() * 100 / $personas->count(), 0) > 0 and number_format($contactados->count() * 100 / $personas->count(), 0) < 10)
                                    <small class="text-warning mr-2"><i class="fas fa-users mr-2"></i>{{ number_format($contactados->count() * 100 / $personas->count(), 0) }}%</small>
                                    <small class="text-warning">Contactados</small>
                                @else
                                    <small class="text-success mr-2"><i class="fas fa-users mr-2"></i>{{ number_format($contactados->count() * 100 / $personas->count(), 0) }}%</small>
                                    <small class="text-success">Contactados</small>
                                @endif
                                <br>
                                @if($noContactados->count() == 0)
                                <small class="text-danger mr-2"><i class="fas fa-users mr-2"></i>0%</small>
                                <small class="text-danger">No Contactado</small>
                                @elseif(number_format($noContactados->count() * 100 / $personas->count(), 0)  == 1)
                                    <small class="text-danger mr-2"><i class="fas fa-users mr-2"></i>{{ number_format($noContactados->count() * 100 / $personas->count(), 0) }}%</small>
                                    <small class="text-danger">No Contactado</small>
                                @elseif (number_format($noContactados->count() * 100 / $personas->count(), 0)  > 0 and number_format($noContactados->count() * 100 / $personas->count(), 0)  < 5)
                                    <small class="text-danger mr-2"><i class="fas fa-users mr-2"></i>{{ number_format($noContactados->count() * 100 / $personas->count(), 0) }}%</small>
                                    <small class="text-danger">No Contactados</small>
                                @elseif(number_format($noContactados->count() * 100 / $personas->count(), 0)  > 0 and number_format($noContactados->count() * 100 / $personas->count(), 0)  < 10)
                                    <small class="text-warning mr-2"><i class="fas fa-users mr-2"></i>{{ number_format($noContactados->count() * 100 / $personas->count(), 0) }}%</small>
                                    <small class="text-warning">No Contactados</small>
                                @else
                                    <small class="text-success mr-2"><i class="fas fa-users mr-2"></i>{{ number_format($noContactados->count() * 100 / $personas->count(), 0) }}%</small>
                                    <small class="text-success">No Contactados</small>
                                @endif
                                <br>
                                @if($indecisos->count() == 0)
                                    <small class="text-danger mr-2"><i class="fas fa-users mr-2"></i>0%</small>
                                    <small class="text-danger">Indeciso</small>
                                @elseif($indecisos->count() == 1)
                                    <small class="text-danger mr-2"><i class="fas fa-users mr-2"></i>{{ number_format($indecisos->count() * 100 / $personas->count(), 0) }}%</small>
                                    <small class="text-danger">Indeciso</small>
                                @elseif ($indecisos->count() > 0 and $indecisos->count() < 5)
                                    <small class="text-danger mr-2"><i class="fas fa-users mr-2"></i>{{ number_format($indecisos->count() * 100 / $personas->count(), 0) }}%</small>
                                    <small class="text-danger">indecisos</small>
                                @elseif($indecisos->count() > 0 and $indecisos->count() < 10)
                                    <small class="text-warning mr-2"><i class="fas fa-users mr-2"></i>{{ number_format($indecisos->count() * 100 / $personas->count(), 0) }}%</small>
                                    <small class="text-warning">indecisos</small>
                                @else
                                    <small class="text-success mr-2"><i class="fas fa-users mr-2"></i>{{ number_format($indecisos->count() * 100 / $personas->count(), 0) }}%</small>
                                    <small class="text-success">indecisos</small>
                                @endif
                                <br>
                                @if($noApoyan->count() == 0)
                                    <small class="text-danger mr-2"><i class="fas fa-users mr-2"></i>0%</small>
                                    <small class="text-danger">No Apoya</small>
                                @elseif($noApoyan->count() == 1)
                                    <small class="text-danger mr-2"><i class="fas fa-users mr-2"></i>{{ number_format($noApoyan->count() * 100 / $personas->count(), 0) }}%</small>
                                    <small class="text-danger">No Apoya</small>
                                @elseif ($noApoyan->count() > 0 and $noApoyan->count() < 5)
                                    <small class="text-danger mr-2"><i class="fas fa-users mr-2"></i>{{ number_format($noApoyan->count() * 100 / $personas->count(), 0) }}%</small>
                                    <small class="text-danger">No Apoyan</small>
                                @elseif($noApoyan->count() > 0 and $noApoyan->count() < 10)
                                    <small class="text-warning mr-2"><i class="fas fa-users mr-2"></i>{{ number_format($noApoyan->count() * 100 / $personas->count(), 0) }}%</small>
                                    <small class="text-warning">No Apoyan</small>
                                @else
                                    <small class="text-success mr-2"><i class="fas fa-users mr-2"></i>{{ number_format($noApoyan->count() * 100 / $personas->count(), 0) }}%</small>
                                    <small class="text-success">No Apoyan</small>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Lideres</h5>
                                    <span class="h2 font-weight-bold mb-0">{{ $lider->count() }}
                                        @if ($lider->count() == 1)
                                            <small>Registrado</small>
                                        @else
                                            <small>Registrados</small>
                                        @endif
                                    </span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                        <i class="fas fa-user-shield"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                @if($lcom->count() == 0)
                                    <span class="text-danger mr-2"><i class="fas fa-user-shield mr-2"></i>0%</span>
                                    <span class="text-danger">Comprometido</span>
                                @elseif(number_format($lcom->count() * 100 / $lider->count(), 0) == 1)
                                    <span class="text-danger mr-2"><i class="fas fa-user-shield mr-2"></i>{{ number_format($lcom->count() * 100 / $lider->count(), 0) }}%</span>
                                    <span class="text-danger">Comprometido</span>
                                @elseif (number_format($lcom->count() * 100 / $lider->count(), 0) > 0 and number_format($lcom->count() * 100 / $lider->count(), 0) < 5)
                                    <span class="text-danger mr-2"><i class="fas fa-user-shield mr-2"></i>{{ number_format($lcom->count() * 100 / $lider->count(), 0) }}%</span>
                                    <span class="text-danger">Comprometidos</span>
                                @elseif(number_format($lcom->count() * 100 / $lider->count(), 0) > 0 and number_format($lcom->count() * 100 / $lider->count(), 0) < 10)
                                    <span class="text-warning mr-2"><i class="fas fa-user-shield mr-2"></i>{{ number_format($lcom->count() * 100 / $lider->count(), 0) }}%</span>
                                    <span class="text-warning">Comprometidos</span>
                                @else
                                    <span class="text-success mr-2"><i class="fas fa-user-shield mr-2"></i>{{ number_format($lcom->count() * 100 / $lider->count(), 0) }}%</span>
                                    <span class="text-success">Comprometidos</span>
                                @endif
                                <br>
                                @if($lcontactados->count() == 0)
                                    <small class="text-danger mr-2"><i class="fas fa-users mr-2"></i>0%</small>
                                    <small class="text-danger">Contactado</small>
                                @elseif(number_format($lcontactados->count() * 100 / $lider->count(), 0) == 1)
                                    <small class="text-danger mr-2"><i class="fas fa-users mr-2"></i>{{ number_format($lcontactados->count() * 100 / $lider->count(), 0) }}%</small>
                                    <small class="text-danger">Contactado</small>
                                @elseif (number_format($lcontactados->count() * 100 / $lider->count(), 0) > 0 and number_format($lcontactados->count() * 100 / $lider->count(), 0) < 5)
                                    <small class="text-danger mr-2"><i class="fas fa-users mr-2"></i>{{ number_format($lcontactados->count() * 100 / $lider->count(), 0) }}%</small>
                                    <small class="text-danger">Contactados</small>
                                @elseif(number_format($lcontactados->count() * 100 / $lider->count(), 0) > 0 and number_format($lcontactados->count() * 100 / $lider->count(), 0) < 10)
                                    <small class="text-warning mr-2"><i class="fas fa-users mr-2"></i>{{ number_format($lcontactados->count() * 100 / $lider->count(), 0) }}%</small>
                                    <small class="text-warning">Contactados</small>
                                @else
                                    <small class="text-success mr-2"><i class="fas fa-users mr-2"></i>{{ number_format($lcontactados->count() * 100 / $lider->count(), 0) }}%</small>
                                    <small class="text-success">Contactados</small>
                                @endif
                                <br>
                                @if($lnoContactados->count() == 0)
                                <small class="text-danger mr-2"><i class="fas fa-users mr-2"></i>0%</small>
                                <small class="text-danger">No Contactado</small>
                                @elseif(number_format($lnoContactados->count() * 100 / $lider->count(), 0) == 1)
                                    <small class="text-danger mr-2"><i class="fas fa-users mr-2"></i>{{ number_format($lnoContactados->count() * 100 / $lider->count(), 0) }}%</small>
                                    <small class="text-danger">No Contactado</small>
                                @elseif (number_format($lnoContactados->count() * 100 / $lider->count(), 0) > 0 and number_format($lnoContactados->count() * 100 / $lider->count(), 0) < 5)
                                    <small class="text-danger mr-2"><i class="fas fa-users mr-2"></i>{{ number_format($lnoContactados->count() * 100 / $lider->count(), 0) }}%</small>
                                    <small class="text-danger">No Contactados</small>
                                @elseif(number_format($lnoContactados->count() * 100 / $lider->count(), 0) > 0 and number_format($lnoContactados->count() * 100 / $lider->count(), 0) < 10)
                                    <small class="text-warning mr-2"><i class="fas fa-users mr-2"></i>{{ number_format($lnoContactados->count() * 100 / $lider->count(), 0) }}%</small>
                                    <small class="text-warning">No Contactados</small>
                                @else
                                    <small class="text-success mr-2"><i class="fas fa-users mr-2"></i>{{ number_format($lnoContactados->count() * 100 / $lider->count(), 0) }}%</small>
                                    <small class="text-success">No Contactados</small>
                                @endif
                                <br>
                                @if($lindecisos->count() == 0)
                                    <small class="text-danger mr-2"><i class="fas fa-users mr-2"></i>0%</small>
                                    <small class="text-danger">Indeciso</small>
                                @elseif(number_format($lindecisos->count() * 100 / $lider->count(), 0) == 1)
                                    <small class="text-danger mr-2"><i class="fas fa-users mr-2"></i>{{ number_format($lindecisos->count() * 100 / $lider->count(), 0) }}%</small>
                                    <small class="text-danger">Indeciso</small>
                                @elseif (number_format($lindecisos->count() * 100 / $lider->count(), 0) > 0 and number_format($lindecisos->count() * 100 / $lider->count(), 0) < 5)
                                    <small class="text-danger mr-2"><i class="fas fa-users mr-2"></i>{{ number_format($lindecisos->count() * 100 / $lider->count(), 0) }}%</small>
                                    <small class="text-danger">indecisos</small>
                                @elseif(number_format($lindecisos->count() * 100 / $lider->count(), 0) > 0 and number_format($lindecisos->count() * 100 / $lider->count(), 0) < 10)
                                    <small class="text-warning mr-2"><i class="fas fa-users mr-2"></i>{{ number_format($lindecisos->count() * 100 / $lider->count(), 0) }}%</small>
                                    <small class="text-warning">indecisos</small>
                                @else
                                    <small class="text-success mr-2"><i class="fas fa-users mr-2"></i>{{ number_format($lindecisos->count() * 100 / $lider->count(), 0) }}%</small>
                                    <small class="text-success">indecisos</small>
                                @endif
                                <br>
                                @if($lnoApoyan->count() == 0)
                                    <small class="text-danger mr-2"><i class="fas fa-users mr-2"></i>0%</small>
                                    <small class="text-danger">No Apoya</small>
                                @elseif(number_format($lnoApoyan->count() * 100 / $lider->count(), 0) == 1)
                                    <small class="text-danger mr-2"><i class="fas fa-users mr-2"></i>{{ number_format($lnoApoyan->count() * 100 / $lider->count(), 0) }}%</small>
                                    <small class="text-danger">No Apoya</small>
                                @elseif (number_format($lnoApoyan->count() * 100 / $lider->count(), 0) > 0 and number_format($lnoApoyan->count() * 100 / $lider->count(), 0) < 5)
                                    <small class="text-danger mr-2"><i class="fas fa-users mr-2"></i>{{ number_format($lnoApoyan->count() * 100 / $lider->count(), 0) }}%</small>
                                    <small class="text-danger">No Apoyan</small>
                                @elseif(number_format($lnoApoyan->count() * 100 / $lider->count(), 0) > 0 and number_format($lnoApoyan->count() * 100 / $lider->count(), 0) < 10)
                                    <small class="text-warning mr-2"><i class="fas fa-users mr-2"></i>{{ number_format($lnoApoyan->count() * 100 / $lider->count(), 0) }}%</small>
                                    <small class="text-warning">No Apoyan</small>
                                @else
                                    <small class="text-success mr-2"><i class="fas fa-users mr-2"></i>{{ number_format($lnoApoyan->count() * 100 / $lider->count(), 0) }}%</small>
                                    <small class="text-success">No Apoyan</small>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Comunas</h5>
                                    @if($personaComuna->count() == 1)
                                        <span class="h2 font-weight-bold mb-0">1</span> Persona
                                    @else
                                        <span class="h2 font-weight-bold mb-0">{{ $personaComuna->count() }}</span> Personas
                                    @endif
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                @for($i=1;$i<=$comunas->count();$i++)
                                    <?php
                                        $personaComuna[$i] = $personas->where('comuna_id', $i);
                                        $comuna_id[$i] = $comunas->where('id', $i)->first();
                                    ?>
                                        @if($personaComuna[$i]->count() == 0)
                                        @else
                                            <span class="text-warning mr-2"><i class="fas fa-users"></i></span>
                                            <span class="text-nowrap">{{ $personaComuna[$i]->count() }} en la {{ $comuna_id[$i]->name }}</span>
                                            <br>
                                        @endif
                                @endfor
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0"><small>Corregimientos</small></h5>
                                    @if($personaCorregimiento->count() == 1)
                                        <span class="h2 font-weight-bold mb-0">1</span> Persona
                                    @else
                                        <span class="h2 font-weight-bold mb-0">{{ $personaCorregimiento->count() }}</span> Personas
                                    @endif
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                @for($i=1;$i<=$corregimientos->count();$i++)
                                <?php
                                    $personasCorregimientos[$i] = $personas->where('comuna_id', 13+$i);
                                    $comuna_id[$i] = $corregimientos->where('id', 13+$i)->first();
                                ?>
                                    @if($personasCorregimientos[$i]->count() == 0)
                                    @else
                                        <small class="text-warning mr-2"><i class="fas fa-users"></i></small>
                                        <small class="text-nowrap">{{ $personasCorregimientos[$i]->count() }} en el {{ $comuna_id[$i]->name }}</small>
                                        <br>
                                    @endif
                                @endfor
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
