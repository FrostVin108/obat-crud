@extends('layout.main')

@section('content_header')
    <h1>Masukin Obat</h1>
@stop

@section('content')
    
    <div class="card">
        <div class="card-body">

        <form action="{{route('obat.create') }}" method="POST" class="gap-form m-4">
            @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Description Obat</label>
    <input type="text" class="form-control " placeholder="Masukan Deskripsi Obat" name="deskription">
        @error('deskription')
        <div class="alert alert-danger mt-2">
                {{ $message }}
        @enderror
        </div>
        <br>

    <label for="exampleInputEmail1"> Masukin UOM Item</label>
    <input type="text" class="form-control " placeholder="Masukan UOM" name="uom">
        @error('uom')
        <div class="alert alert-danger mt-2">
                {{ $message }}
        </div>
        @enderror
    <br>

    <label for="exampleInputEmail1">Masukan Kode Item</label><br>
    <input type="number"  placeholder="Kode Item" name="item_code">
        @error('item_code')
        <div class="alert alert-danger mt-2">
                {{ $message }}
        </div>
        @enderror
        <hr>

    <label for="exampleInputEmail1">Mauskan JUmlah Stock Di Tangan</label><br>
    <input type="number" placeholder="Jumlah Stock" name="stock_on_hand">
        @error('stock_on_hand')
        <div class="alert alert-danger mt-2">
                {{ $message }}
        </div>
        @enderror
        <hr>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="/" class="btn btn-warning">Return</a>
</div>


</form>

        </div>
    </div>


@stop