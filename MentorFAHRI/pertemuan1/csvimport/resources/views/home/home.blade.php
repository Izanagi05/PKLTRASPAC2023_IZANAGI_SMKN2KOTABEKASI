@extends('layouts/main')

@section('container')
    <div class="    ">
        <div class="card card-header card-head  ">
            <div class="d-flex justify-content-between align-items-center">
                <p class="display-5 fw-bolder">Data Bisnis</p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Import
                </button>

                {{-- <button class="btn btn-primary " style="margin: 30px 50px">Import</button> --}}
                @include ('component.modal')
            </div>
        </div>
        <div class="table-container kartuu card-info   card-outlined">
            <table class="table table-bordered outline-table text-truncate">
                <thead class="">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Series Reference</th>
                        <th scope="col">Period</th>
                        <th scope="col">Data Value</th>
                        <th scope="col">Suppressed</th>
                        <th scope="col">STATUS</th>
                        <th scope="col">UNITS</th>
                        <th scope="col">Magnitude</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Group</th>
                        <th scope="col">Series Title 1</th>
                        <th scope="col">Series Title 2</th>
                        <th scope="col">Series Title 3</th>
                        <th scope="col">Series Title 4</th>
                        <th scope="col">Series Title 5</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($databisnis as $key => $dtbs)
                        <tr>
                            <th scope="row">{{ $dtbs->bisnis_id }}</th>
                            <td>{{ $dtbs->series_reference }}</td>
                            <td>{{ $dtbs->period }}</td>
                            <td>{{ $dtbs->data_value }}</td>
                            <td>{{ $dtbs->suppressed }}</td>
                            <td>{{ $dtbs->status }}</td>
                            <td>{{ $dtbs->units }}</td>
                            <td>{{ $dtbs->magnitude }}</td>
                            <td>{{ $dtbs->subject }}</td>
                            <td>{{ $dtbs->group }}</td>
                            <td>{{ $dtbs->series_title_1 }}</td>
                            <td>{{ $dtbs->series_title_2 }}</td>
                            <td>{{ $dtbs->series_title_3 }}</td>
                            <td>{{ $dtbs->series_title_4 }}</td>
                            <td>{{ $dtbs->series_title_5 }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="d-flex justify-content-center ">
                {{ $databisnis->links() }}
            </div>
        </div>
    </div>
@endsection
