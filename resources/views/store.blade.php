@extends('layout.main')

@section('content_header')
    <h1>List Obat</h1>
    <a href="/obat">balik</a>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <p style="font-size: 20px">pilih sesuai keperluan</p>
                
                <a href="create"><button type="button" class="btn btn-success" style="font-size:15px">Masukin Obat</button></a>
                <a href="store"><button type="button" class="btn btn-secondary" style="font-size:15px">Check Obat</button></a>
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