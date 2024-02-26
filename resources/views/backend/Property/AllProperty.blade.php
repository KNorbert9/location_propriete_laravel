@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">


        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="{{ route('add.properties') }}" class="btn btn-inverse-info"> Ajouter une nouvelle propriété </a>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title"> Listes des Propriété </h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>Numéro</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Secteur</th>
                                        <th>Lits</th>
                                        <th>Douches</th>
                                        <th>Garage</th>
                                        <th>plan</th>
                                        <th>image</th>
                                        <th>Type de propriété</th>
                                        <th>Ameneties</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($properties as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->location }}</td>
                                            <td>{{ $item->add }}</td>
                                            <td>{{ $item->area }}</td>
                                            <td>{{ $item->beds }}</td>
                                            <td>{{ $item->bath }}</td>
                                            <td>{{ $item->garage }}</td>
                                            <td>{{ $item->plan }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->propertyType->type_name }}</td>

                                            <td>
                                                @foreach ($item->ameneties as $amenety)
                                                    {{ $amenety->amenety_name }}
                                                    @if (!$loop->last)
                                                        ,
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                <a href="{{ route('update.properties', $item->id) }}"
                                                    class="btn btn-inverse-warning"> Edit </a>
                                                <a href="{{ route('delete.properties', $item->id) }}"
                                                    class="btn btn-inverse-danger" id="delete"> Delete </a>
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
