<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CustomersController extends Controller
{
    public function customers()
    {
        $customers = Customers::where('status_aktif', '=', 'aktif')->get();
        return view('admin/customers/customer', compact('customers'));
    }
    public function create()
    {
        $customers = Customers::where('status_aktif', '=', 'aktif')->get();
        return view('admin/customers/crud/create', compact('customers'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'phone' => ['required', 'numeric'],
            'email' => ['required', 'email', 'regex:/^.+@.+\..+$/'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else{
            Customers::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'created_at' => now(),
                'updated_at' => now(),
                'status_aktif' => 'aktif'
            ]);

            return redirect()->route('customers');
        }
    }
    public function edit(int $id)
    {
        $customers = Customers::where('id', $id)->first();
        return view('admin/customers/crud/edit', compact('customers'));
    }
    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'phone' => ['required', 'numeric'],
            'email' => ['required', 'email', 'regex:/^.+@.+\..+$/'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else{
            $model = Customers::where('id', $id)->first();
            $model->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'created_at' => now(),
                'updated_at' => now(),
                'status_aktif' => 'aktif'
            ]);
            return redirect()->route('customers', $model->id);
        }
    }
    public function history(){
        $customers = Customers::where('status_aktif', '=', 'Nonaktif')->get();
        return view('admin/customers/historycustomer', compact('customers'));
    }
    public function softdelete(int $id)
    {
        $customers = Customers::where('id', '=', $id)->first();
        $customers->status_aktif = 'Nonaktif';
        $customers->save();

        return redirect()->route('customers');
    }
    public function restore(int $id){
        $customers = Customers::where('id', '=', $id)->first();
        $customers->status_aktif = 'Aktif';
        $customers->save();

        return redirect()->route('customers.history');
    }
    public function delete(int $id)
    {
        $customers = Customers::where('id', '=', $id)->first();
        $customers->delete();

        return redirect()->route('customers.history');
    }
}
