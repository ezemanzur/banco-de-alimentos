<div class="table-responsive resume-table">
    {{-- Listado de donaciones --}}
    @if($listDonations)
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">Nombre de donante</th>
                <th scope="col">Barrio</th>
                <th scope="col">Responsable del retiro</th>
                <th scope="col">Resumen</th>
            </tr>
            </thead>
            <tbody>
            @php $count = 0; @endphp
            @forelse ($donations->where('status', \App\Donation::ESTADO_COMPLETADO) as $d)
                <tr>
                    <th scope="row">
                        {{ $d->myUser()->name }}
                    </th>
                    <td>
                        {{$neighborhoods->where('neighborhood_id', $d->myUser()->myGiver()->neighborhood_id)->first()->name}}
                    </td>
                    <td>
                        {{$d->responsible_for_retirement}}
                    </td>
                    <td class="text-center">
                        <a href="{{route('empleado', ['id' => $d->donation_id,'panel' => 3, 'list' => 0, 'detail' => 1]) }}"
                           class="link">Ver
                            resumen</a>
                    </td>
                </tr>

                @php $count++; @endphp
            @empty
                <p>No hay solicitudes de donaciones</p>
            @endforelse
            </tbody>
        </table>
    @else

        @if($resumeDonation)
            {{-- REsumen de donacion --}}
            <div class="resume-donation col-12 " style=" width: 100%;height: 100%">
                <div class="card-header py-2 px-3">
                    Resumen donación:
                    <a class="link close" href=" {{route('empleado', ['panel' => 3]) }} ">
                        Volver al listado
                    </a>
                </div>
                <div class="card-body p-3 border-none shadow-none">
                    <h6>Nombre: {{$current_donation->myUser()->myGiver()->company_name}} </h6>
                    <table class="table table-bordered">
                        <thead>
                        <tr class="list-donations">
                            <th scope="col">Productos</th>
                            <th scope="col">Fecha de vencimiento</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Refrigeración</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($current_donation->products() as $p)
                            <tr class="list-donations">
                                <th scope="row">
                                    {{ $p->name }}
                                </th>
                                <td>
                                    @if($p->has_exp_date)
                                        {{$p->exp_date}}
                                    @else
                                        No tiene
                                    @endif
                                </td>
                                <td>
                                    {{$p->amount}}
                                </td>
                                <td class="text-center">
                                    @if($p->need_refrigeration)
                                        Si
                                    @else
                                        No
                                    @endif
                                </td>
                            </tr>

                        @empty
                            <p>No hay solicitudes de donaciones</p>
                        @endforelse
                        </tbody>
                    </table>
                    <h3>Información del responsable:</h3>
                    <p>Nombre: {{$current_donation->myUser()->name}}</p>
                    <p>DNI: {{$current_donation->myUser()->dni}}</p>
                    <p>Email: {{ $current_donation->myUser()->email}}</p>
                    <p>Número de teléfono: {{$current_donation->myUser()->phone}}</p>

                    <p>Dirección de retiro: Calle {{ $current_donation->myUser()->myGiver()->address_street}},
                        #{{ $current_donation->myUser()->myGiver()->address_number}}
                        @if($current_donation->myUser()->myGiver()->address_floor != NULL)
                            Piso: {{ $current_donation->myUser()->myGiver()->address_floor }} @endif
                        @if($current_donation->myUser()->myGiver()->address_apartment != NULL)
                            Depto: {{$current_donation->myUser()->myGiver()->address_apartment }} @endif
                        ,
                        {{$neighborhoods->where('neighborhood_id', $current_donation->myUser()->myGiver()->neighborhood_id)->first()->name}} </p> </p>

                    <h3>Información del responsable:</h3>

                    <p>Fecha programada de retiro: {{$current_donation->retirement_date}}</p>
                    <p>Hora programada de retiro: {{$current_donation->retirement_time}}</p>
                    <p>Responsable : {{$current_donation->responsible_for_retirement}}</p>
                </div>

            </div>
        @endif
    @endif
</div>
