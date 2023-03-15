@extends('layouts.app')

@section('title', 'Author Details')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Author</h1>
            <a href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-arrow-left fa-sm text-white-50"></i> Back
            </a>
        </div>
        {{-- Alert Messages --}}
        @include('common.alert')

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Author Details</h6>
            </div>

            <div class="card-body">
                <div class="form-group row">

                    {{-- Full Name --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label><h5>Name: </h5></label>
                        {{$author->first_name. ' ' .$author->last_name}}
                    </div>

                    {{-- Geneder --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label>
                            <h5>Geneder:</h5></label>
                        {{$author->gender}}
                    </div>

                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label>
                            <h5>Birthday:</h5></label>
                        {{Carbon\Carbon::parse($author->birthday)->format('d. m. Y') }}
                    </div>

                    @if(empty($author->books))
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">

                            <a class="btn btn-danger m-2 delete" href="#" data-toggle="modal"
                               data-target="#deleteAuthor" data-authorId="{{$author->id }}">
                                <i class="fas fa-trash"></i> Delete Author
                            </a>
                        </div>
                    @endif

                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Books</h6>

                </div>

                <div class="card-body">
                    @if($author->books)
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th width="20%">Title</th>
                                        <th width="25%">Description</th>
                                        <th width="15%">Release Date</th>
                                        <th width="15%">Number of pages</th>

                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($author->books as $book)
                                        <tr>
                                            <td>{{ $book['title'] }}</td>
                                            <td>{{ $book['description'] }}</td>
                                            <td>{{ Carbon\Carbon::parse($book['release_date'])->toDateString() }}</td>
                                            <td>{{$book['number_of_pages'] }}</td>

                                            <td style="display: flex">
                                                <a class="btn btn-danger m-2 delete-book" href="#" data-toggle="modal"
                                                    data-bookId="{{ $book['id'] }}">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{--                                        {{ $authors->links() }}--}}
                        </div>
                    @else
                        <div class="card-body">
                            <h6>Author Hasn't any Book yet...</h6>
                            @endif
                        </div>

                </div>

                @include('authors.delete-modal')
            </div>


    </div>

@endsection