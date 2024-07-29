@extends('layout.main')

@section('content_header')
    <h1>List Obat</h1>
    {{-- <a href="/obat">balik</a> --}}
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <p style="font-size: 25px">pilih sesuai keperluan</p>

        <form class="form-inline" action="{{route('search') }}" method="GET">
            <input class="col-md-3" type="text"  style="font-size: 18px"name="search" placeholder="Cari Kode Item Atau UOM" value="{{ old('search') }}" class="form-control mr-sm-2">
            <input type="submit" style="border-radius: 3px" style="font-size: 14px" type="button" class="btn btn-outline-info my-3 my-sm-0" value="Search">
            <a href="/"><button  type="button" style="border-radius: 3px" style="font-size: 10px" class="btn btn-outline-info my-2 my-sm-0">balik</button></a>
        </form><br>
                
                <a href="create"><button type="button" class="btn btn-success" style="font-size:18px">Masukin Obat</button></a>
                {{-- <a href="store"><button type="button" class="btn btn-secondary" style="font-size:15px">Check Obat</button></a> --}}
            <hr>
    </div>
</div>
<br>
<div class="card">
    <div class="card-body">
        <table class="table table-hover ">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Kode Item</th>
                <th scope="col">Deskripsi Obat</th>
                <th scope="col">UOM</th>
                <th scope="col">Stock On Hand</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            
            <tbody>
              @forelse ($obat as $key => $ob)
                  <tr>
                      <th scope="row">{{$key+1}}</th>
                      <td>{{$ob->item_code}}</td>
                      <td>{{$ob->deskription}}</td>
                      <td>{{$ob->uom}}</td>
                      <td>{{$ob->stock_on_hand}}</td>
                      <td>
                          <form onsubmit="return confirm('Apakah Anda Yakin?');"action="{{route('obats.destroy', $ob->id)}}" method="POST"
                          >
                              <a href="{{ route('obat.edit', $ob->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                              
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                          </form>
                              
                      </td>
                  </tr>
                  @empty
                  <div class="alert alert-danger">
                      Data Obat belum Tersedia.
                  </div>
              @endforelse
            </tbody>
          
          </table>

    </div>
</div>

@stop