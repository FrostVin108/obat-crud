@extends('layout.main')

@section('content_header')
    <h1>Edit Obat</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

            {{-- @forelse($obat as $ob) --}}
                <form action="{{ route('obat.update', $obat->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="form-group">
                        
                        <label for="exampleInputEmail1">Deskripsi Obat</label>
                        <input type="text" class="form-control " placeholder="Masukan Deskripsi Obat" value="{{ old('deskription', $obat->deskription) }}" name="deskription">

                    
                        <label for="exampleInputEmail1">UOM Obat</label>
                        <input type="text" class="form-control placeholder="Masukan Jumlah Stock Obat" value="{{ old('uom', $obat->uom) }}" name="uom">

                        <label for="exampleInputEmail1">Item Code</label><br>
                        <input type="number"  placeholder="Masukan Kode Obat" value="{{ old('obat', $obat->item_code) }}" name="item_code"><br>

                        <label for="exampleInputEmail1">Stock On Hand</label><br>
                        <input type="number"  placeholder="Masukan Stock Obat Di Tangan" value="{{ old('stock_on_hand', $obat->stock_on_hand) }}" name="stock_on_hand">
                        <hr>

                    </div>
                    {{-- @empty 
                    <div class="alert alert-danger">
                        Data Obat belum Tersedia.
                    </div> --}}
                    <button type="submit" class="btn btn-md btn-primary">Update</button>
                    <a href="/" class="btn btn-success">Return</a>
                    <button type="reset" class="btn btn-md btn-warning">Reset</button>
                </form>
            {{-- @endforelse --}}
    </div>
</div>

@stop