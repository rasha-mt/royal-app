@extends('layouts.app')

@section('title', 'Users List')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Authors</h1>
            <div class="row">

            </div>

        </div>

        {{-- Alert Messages --}}
        @include('common.alert')

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Authors</h6>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="20%">First Name</th>
                                <th width="25%">Last Name</th>
                                <th width="15%">birthday</th>
                                <th width="15%">gender</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($authors as $author)
                                <tr>
                                    <td>{{ $author['first_name'] }}</td>
                                    <td>{{ $author['last_name'] }}</td>
                                    <td>{{ Carbon\Carbon::parse($author['birthday'])->toDateString() }}</td>
                                    <td>{{ $author['gender'] }}</td>

                                    <td style="display: flex">

                                        <a href="/authors/{{$author['id']}}"
                                           class="btn btn-primary m-2">
                                            <i class="fa fa-eye"></i>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

{{--                                        {{ $authors->links() }}--}}
                                    </div>
                </div>
            </div>

        </div>

@endsection

@section('scripts')

@endsection
