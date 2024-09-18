@extends('layouts.master')
@section('title')
    Roles
@endsection
@section('css')
    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/gridjs/theme/mermaid.min.css') }}">
@endsection
@section('page-title')
    Roles
@endsection
@section('body')

    <body>
    @endsection
    @section('content')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <div class="text-sm-end">
                                    <button type="button"
                                        class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"
                                        data-bs-toggle="modal" data-bs-target="#create-task"><i
                                            class="mdi mdi-plus me-1"></i>
                                        Create Roles</button>
                                </div>
                            </div>
                        </div>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div id="table-gridjs"></div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
        <x-modal id="create-task" title="Create Task">
            <form action="{{ route('roles.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <x-input-text id="name" lable="Name" name="name" />
                    </div>
                    <div class="col-md-6">
                        <x-input-text id="guard_name" lable="Guard Name" name="guard_name" />
                    </div>
                </div>
                <x-modal-button />
            </form>
        </x-modal>
    @endsection
    @section('scripts')
        <!-- gridjs js -->
        <script src="{{ URL::asset('build/libs/gridjs/gridjs.umd.js') }}"></script>
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script>
            $.ajax({
                url: '/api/roles',
                type: 'GET',
                success: function(response) {
                    const data = response.map((item) => {
                        return [item.name, item.guard_name, item.created_at, item.updated_at];
                    });
                    new gridjs.Grid({
                        columns: ["Roles", "Guard Name", "Created At", "Updated At"],
                        pagination: {
                            limit: 3
                        },
                        sort: true,
                        search: true,
                        data: data
                    }).render(document.getElementById("table-gridjs"));
                }
            });
        </script>
    @endsection
