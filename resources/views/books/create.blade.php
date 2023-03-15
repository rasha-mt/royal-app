@extends('layouts.app')

@section('title', 'Add Users')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Book</h1>
            <a href="{{'/'}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-arrow-left fa-sm text-white-50"></i> Back
            </a>
        </div>

        {{-- Alert Messages --}}
        @include('common.alert')

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add New Book</h6>
            </div>
            <form method="POST" action="{{ '/books' }}">
                @csrf
                <div class="card-body">
                    <div class="form-group row">

                        {{-- Title --}}
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span>
                            Title</label>
                            <input
                                    type="text"
                                    class="form-control form-control-user @error('title') is-invalid @enderror"
                                    id="exampleTitle"
                                    placeholder="Title"
                                    name="title">

                            @error('title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        {{-- Number of pages --}}
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span>
                            Number of pages</label>
                            <input
                                    type="number"
                                    class="form-control form-control-user @error('pages_number') is-invalid @enderror"
                                    id="PagesNumber"
                                    placeholder="Number of pages"
                                    name="pages_number"
                                    >

                            @error('pages_number')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        {{-- author --}}
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span>Author</label>
                            <select class="form-control form-control-user @error('role_id') is-invalid @enderror" name="author_id">
                                <option selected disabled>Select Author</option>
                                @foreach ($authors as $author)
                                    <option value="{{$author['id']}}">{{$author['first_name']}} {{$author['last_name']}} </option>
                                @endforeach
                            </select>
                            @error('author_id')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>


                        {{-- Description --}}
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span>
                            Description</label>
                            <TEXTAREA
                                    type="text"
                                    class="form-control form-control-user @error('description') is-invalid @enderror"
                                    id="exampleDescription"
                                    placeholder="description"
                                    name="description"
                                    value="{{ old('description') }}"></TEXTAREA>

                            @error('description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>


                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-user float-right mb-3">Save</button>
                    <a class="btn btn-primary float-right mr-3 mb-3" href="{{ '/authors' }}">Cancel</a>
                </div>
            </form>
        </div>

    </div>

@endsection