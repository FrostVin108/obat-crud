<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ObatController extends Controller
{


    public function create(Request $request){
        $this->validate($request, [
            'item_code'       => 'required|min:14',
            'deskription'     => 'required',
            'uom'             => 'required',
            'stock_on_hand'   => 'required|numeric|min:1',

        ]);

            Obat::create([
            'item_code'       => $request->item_code,
            'deskription'     => $request->deskription,
            'uom'             => $request->uom,
            'stock_on_hand'   => $request->stock_on_hand,
            
        ]);
        return redirect()->route('obat.store');
    }

    // public function tes()
    // {
    //     $obat = Obat::first();
    //     // bersifat array
       
    //     return view('tes1', compact('obat'));
    // }
    
    public function destroy($id){
        $obat = Obat::findOrFail($id);
        $obat->delete();
        return redirect()->route('obat.store');
    }


    public function edit(Request $request, $id){
        
        // get post by ID
        $obat = Obat::findOrFail($id);
        // dd ($obat);
    
        //render view with post
        return view('edit', compact('obat') );
        }

            /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */

        public function update(Request $request, $id):RedirectResponse{
    
        //validate form
        $this->validate($request, [
            'deskription'     => 'required',
            'uom'             => 'required',
            'item_code'       => 'required|min:14',
            'stock_on_hand'   => 'required|numeric|min:1',
        ]);

        //get post by ID
        $post = Obat::findOrFail($id);
        $post->update([
            'deskription'     => $request->deskription,
            'uom'             => $request->uom,
            'item_code'       => $request->item_code,
            'stock_on_hand'   => $request->stock_on_hand,
        ]);
        return redirect()->route('obat.store');
    }


    public function updatestock(Request $request, $id):RedirectResponse{
    
        //validate form
        $this->validate($request, [
            'stock_on_hand'   => 'required|numeric|min:1',
        ]);

        //get post by ID
        $post = Obat::findOrFail($id);
        $post->update([
            'stock_on_hand'   => $request->stock_on_hand,
        ]);
        return redirect()->route('obat.store');
    }


    public function search(Request $request)
	{
		// menangkap data pencarian
		$search = $request->search;
 
    		// mengambil data dari table sesuai pencarian data
		$obat = Obat::
		where('item_code',$search)
        ->get();

        $obat = Obat::
		where('uom',$search)
        ->get();

        return view('/store', compact('obat', 'search'));
 
	}
    
    public function login()
    {  
        return view('auth.login');
    }
    // public function register()
    // {  
    //     return view('auth.register');
    // }
    
    public function dtable(Request $request)
    {
        // dd($request);'DD
            $products = Obat::all();
            return DataTables::of($products)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return "<a href='javascript:void(0)' class='btn btn-success' onclick='show_modal_edit(`modal_user`, $row->id)'>Edit</a> <a href='javascript:void(0)' class='btn btn-danger' onclick='show_modal_delete($row->id)'>delete</a>";
                })
                // ->filter(function($product){
                //     if (request()->has("data_range") && request()->input('data_range') !== '0') {
                //         $rangeInput = request()->input('data_range');
                //         $range = explode(' - ', $rangeInput);
                //         $min = (int) $range[0];
                //         $max = (int) $range[1];
                //         if ($max === 0) {
                //             // If $max is 0, include all prices from $min onwards
                //             $product->where('price', '>=', $min);
                //         } else {
                //         $product->whereBetween('price', [$min, $max]);
                //         }
                //     }
                // },true)
                ->toJson();
    }

    public function loglte()
    {
        return view('auth.login');
    }

    public function reglte()
    {
        return view('auth.register');
    }
}
