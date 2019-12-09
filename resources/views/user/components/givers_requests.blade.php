<div class="table-responsive resume-table">
    @php $count = 0; @endphp
    <ul class="list-givers container">
        @forelse ($givers as $g)

            <li class="item-givers row">
                <div class="info-givers col-8">
                    <p> Nombre: {{ $g->myGiver()->company_name }}</p>
                    <p>CUIT: {{ $g->myGiver()->company_cuit}}</p>
                    <p>Número de teléfono: {{ $g->myGiver()->company_phone}}</p>
                    <p>Dirección: Calle {{ $g->myGiver()->address_street}}, #{{ $g->myGiver()->address_number}}
                        @if($g->myGiver()->address_floor != NULL) Piso: {{ $g->myGiver()->address_floor }} @endif
                        @if($g->myGiver()->address_apartment != NULL) Depto: {{$g->myGiver()->address_apartment }} @endif
                        ,
                        {{$neighborhoods->where('neighborhood_id', $g->myGiver()->neighborhood_id)->first()->name}} </p>
                    <a class="link" onclick="showResumeDonation({{$count}},'infoUser')">Ver información de la persona responsable</a>
                </div>
                <div class="info-givers col-4 text-right">
                    <a class="btn btn-light-green" href="{{route('refuseGiver', ['id' => $g->id]) }}">Rechazar</a>
                    <a class="btn btn-light-green" href="{{route('acceptGiver', ['id' => $g->id]) }}">Aceptar</a>
                </div>
                <div class="card my-4 col-12 infoUser">
                    <div class="card-header py-2 px-3">
                        Responsable:
                        <button type="button" class="close" onclick="hideResumeDonation('infoUser')">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body p-3 border-none shadow-none">
                        <p>Nombre: {{$g->name}}</p>
                        <p>DNI: {{$g->dni}}</p>
                        <p>Email: {{$g->email}}</p>
                        <p>Número de teléfono: {{$g->phone}}</p>
                    </div>
                </div>
            </li>
            @php $count++; @endphp
    </ul>
    @empty
        <p>No hay solicitudes de donaciones</p>
    @endforelse

</div>
