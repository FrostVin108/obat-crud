<?php

namespace App\Http\Controllers;

use App\Models\Obat;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function create(Request $request){
        $this->validate($request, [
            'item_code'       => 'required|min:14',
            'deskription'     => 'required',
            'uom'             => 'required',
            'stock_on_hand'   => 'required|min:1',

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
        $obat = obat::findOrFail($id);
        // dd ($obat);
    
        //render view with post
        return view('edit', compact('obat'), );
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
            'stock_on_hand'   => 'required|min:1',
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
        
        
}

