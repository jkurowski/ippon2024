@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        <div class="card-head container-fluid">
            <div class="row">
                <div class="col-6 pl-0">
                    <h4 class="page-title row"><i class="fe-database"></i>Import</h4>
                </div>
                <div class="col-6 d-flex justify-content-end align-items-center form-group-submit"></div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="table-overflow">
                <table id="sortable" class="table mb-0">
                    <thead>
                    <tr>
                        <th>Inwestycja</th>
                        <th>Nazwa powierzchni</th>
                        <th>Numer powierzchni</th>
                        <th>Piętro</th>
                        <th>Budynek</th>
                        <th>Metraż</th>
                        <th>Metraż powykonawczy</th>
                        <th>Kuchani / aneks</th>
                        <th>Pokoje</th>
                        <th>Wystawa okna</th>
                        <th>Dodatkowe</th>
                        <th>Dodatkowe pow.</th>
                        <th>Cena netto</th>
                        <th>Cena brutto</th>
                        <th>VAT</th>
                        <th>Cena promocja</th>
                        <th>Cena 30 dni</th>
                        <th>Status</th>
                        <th>Spacer 3d</th>
                        <th>Widok 360</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($importedData as $data)
                        @if($data['nazwa_powierzchni'] == "Mieszkanie")
                        <tr>

                            <td>{{ $data['pietro'] }}</td>
                            <td>{{ $data['metraz_powykonawczy'] }}</td>

                            <td>{{ $data['wystawa_okien'] }}</td>
                            <td>{{ $data['powierzchnia_dodatkowa'] }}</td>
                            <td>{{ $data['powierzchnia_powierzchni_dodatkowej'] }}</td>

                            <td>{{ $data['cena_promocyjna'] }}</td>
                            <td>{{ $data['cena_30_dni'] }}</td>

                        </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection