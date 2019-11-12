<div class="table-responsive resume-table">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Nombre de donante</th>
                    <th scope="col">Barrio</th>
                    <th scope="col">Vencimiento más proximo</th>
                    <th scope="col">Resumen</th>
                </tr>
            </thead>
            <tbody>
                @php $count = 0; @endphp
                @forelse ($donations as $d)    
                    <tr>
                        <th scope="row">
                            {{ $d->created_at }}
                        </th>
                        <td>
                            2019-10-18 15:07:01
                        </td>
                        <td>
                            Los productos están proximos a vencer.
                        </td>
                        <td class="text-center">
                            <a class="link" onclick="showResumeDonation({{ $count }},'donationResumeRechazada')">Ver resumen</a>
                        </td>
                    </tr>
                    @php $count++; @endphp
                @empty
                    <p>No hay solicitudes de donaciones</p>
                @endforelse
            </tbody>
        </table>
    </div>