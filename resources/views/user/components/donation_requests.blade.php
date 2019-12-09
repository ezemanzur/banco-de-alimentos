<div class="table-responsive resume-table">
    {{-- Listado de donaciones --}}
    @if($listDonations)
        <table class="table table-bordered">
            <thead class="list-donations">
            <tr class="list-donations">
                <th scope="col">Nombre de donante</th>
                <th scope="col">Barrio</th>
                <th scope="col">Vencimiento más proximo</th>
                <th scope="col">Resumen</th>
            </tr>
            </thead>
            <tbody>
            @php $count = 0; @endphp
            @forelse ($donations->where('status', \App\Donation::ESTADO_VIGENTE) as $d)
                <tr class="list-donations">
                    <th scope="row">
                        {{ $d->myUser()->name }}
                    </th>
                    <td>
                        {{$neighborhoods->where('neighborhood_id', $d->myUser()->myGiver()->neighborhood_id)->first()->name}}
                    </td>
                    <td>
                        {{$d->nearestExpiration()->exp_date}}
                    </td>
                    <td class="text-center">
                        <a href="{{route('empleado', ['id' => $d->donation_id,'panel' => 1, 'list' => 0, 'detail' => 1]) }}"
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
                    <a class="link close" href=" {{route('empleado', ['panel' => 1]) }} ">
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
                    <p>Rango de fechas para la entrga: {{$current_donation->date_from}}
                        - {{$current_donation->date_to}} </p>
                </div>
                <div>
                    <a class="btn btn-n btn-light-green"
                       href="{{route('empleado', ['id' => $current_donation->donation_id ,'panel' => 1, 'list' => 0, 'detail' => 0]) }}">Aceptar</a>
                    <a class="btn btn-n btn-light-green" data-toggle="modal" data-target="#myModal">Rechazar</a>
                </div>
            </div>
            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Modal Heading</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="/donation/refuse" method="POST">
                                @csrf
                                <label for="">Motivo de rechazo:</label><br>
                                <textarea name="reason" style="width:100%; margin:10px;"> </textarea> <br>
                                <input type="hidden" value="{{$current_donation->donation_id}}" name="donation_id">
                                <button type="submit" class="btn btn-light-green">Aceptar</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            </form>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">


                    </div>
                </div>
            </div>
        @else
            <div class="resume-donation col-12 " style=" width: 100%;height: 100%">
                <div class="card-header py-2 px-3">
                    Resumen donación:
                    <a class="link close" href=" {{route('empleado', ['panel' => 1]) }} ">
                        Volver al listado
                    </a>
                </div>
                <div class="card-body p-3 border-none shadow-none">
                    <h6>Nombre: {{$current_donation->myUser()->myGiver()->company_name}} </h6>
                    <p>Información de la persona responsable:</p>
                    <p>Nombre: {{$current_donation->myUser()->name}}</p>
                    <p>DNI: {{$current_donation->myUser()->dni}}</p>
                    <p>Email: {{$current_donation->myUser()->email}}</p>
                    <p>Número de teléfono: {{$current_donation->myUser()->phone}}</p>

                    <div>
                        <span>Coordinación de retiro:</span>
                        <p>Rango fecha: {{$current_donation->date_from}} - {{$current_donation->date_to}}</p>
                        <p>Rango hora: {{$current_donation->time_from}} - {{$current_donation->time_to}}</p>
                        <form method="POST" action="/donation/retirement_date">
                            @csrf
                            <input type="hidden" name="donation_id" value="{{$current_donation->donation_id}}">
                            <label for="">Fecha</label>
                            <input type="date" name="retirement_date" required> <br>
                            <label for="">Hora</label>
                            <input type="time" name="retirement_time" id="" required><br>
                            <label for="">Responsable de retiro</label>
                            <input type="text" name="responsible_for_retirement" required> <br><br>
                            <button type="submit" class="btn btn-n btn-light-green">Aceptar</button>
                            <a class="btn btn-n btn-light-green" onclick="return confirm('¿Estas seguro?');"
                               href="{{route('empleado',['panel' => 1]) }}">Cancelar</a>
                        </form>

                    </div>
                </div>
                @endif

                @endif
            </div>
</div>
