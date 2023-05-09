@extends('layout.app')

@section('title','Create Book')

@section('content')
<div class="container">
    <div class="row">
      <div class="col">

      </div>
      <div class="col-5">
        <form class="container bg-light rounded-4 p-5 shadow" action="{{route('createBook')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="d-flex justify-content-center">
                <h2>Create Book</h2>
            </div>
            <br>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Judul</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="judul" value="{{old('judul')}}">
            </div>
            @error('judul')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="" class="form-label">penulis</label>
                <input type="text" class="form-control" name="penulis" value="{{old('penulis')}}">
            </div>
            @error('penulis')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Sinopsis</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="sinopsis" value="{{old('sinopsis')}}">{{old('sinopsis')}}</textarea>
              </div>
            <div class="mb-3">
                <label for="" class="form-label">Tahun Terbt</label>
                <input type="number" class="form-control" name="tahun_terbit" value="{{old('tahun_terbit')}}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Cover Buku</label>
                <input name="cover_buku" type="file">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Category</label>
              <br>
              <select name="category_id" id="">
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
              </select>
          </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </form>
      </div>
      <div class="col">

      </div>
    </div>
  </div>

  <br>
  <hr>
@endsection
