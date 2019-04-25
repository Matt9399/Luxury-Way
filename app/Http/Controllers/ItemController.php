<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
    public function index()
    {
        return Item::latest()->paginate(10);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'  => 'required|string|max:191',
            'type' => 'required|string',
            'current_stock' => 'required|integer',
            'stock' => 'required|integer',
            'price' => 'required|integer'
        ]);

        return Item::create([
            'name'  => $request['name'],
            'type' => $request['type'],
            'current_stock' => $request['current_stock'],
            'stock' => $request['stock'],
            'price' => $request['price']
        ]);
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $this->validate($request,[
            'name'  => 'required|string|max:191',
            'type' => 'required|string',
            'current_stock' => 'required|integer',
            'stock' => 'required|integer',
            'price' => 'required|integer'
        ]);
        $item->update($request->all());

        return ['message' => 'updated'];
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);

        // delete the user

        $item->delete();

        return ['message' => 'Item Deleted'];
    }

}
