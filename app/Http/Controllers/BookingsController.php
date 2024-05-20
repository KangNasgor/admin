<?php

namespace App\Http\Controllers;
use App\Models\Bookings;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Customers;

class BookingsController extends Controller
{
    public function bookings()
    {
        $bookings = bookings::where('status_aktif', '=', 'aktif')->get();
        return view('admin/bookings/bookings', compact('bookings'));
    }
    public function create()
    {
        $bookings = bookings::where('status_aktif', '=', 'aktif')->get();
        $customer = Customers::where('status_aktif', '=', 'aktif')->get();
        return view('admin/bookings/crud/create', compact('bookings', 'customer'));
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
            bookings::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'created_at' => now(),
                'updated_at' => now(),
                'status_aktif' => 'aktif'
            ]);

            return redirect()->route('bookings');
        }
    }
    public function edit(int $id)
    {
        $bookings = bookings::where('id', $id)->first();
        return view('admin/bookings/crud/edit', compact('bookings'));
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
            $model = bookings::where('id', $id)->first();
            $model->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'created_at' => now(),
                'updated_at' => now(),
                'status_aktif' => 'aktif'
            ]);
            return redirect()->route('bookings', $model->id);
        }
    }
    public function history(){
        $bookings = bookings::where('status_aktif', '=', 'Nonaktif')->get();
        return view('admin/bookings/historybookings', compact('bookings'));
    }
    public function softdelete(int $id)
    {
        $bookings = bookings::where('id', '=', $id)->first();
        $bookings->status_aktif = 'Nonaktif';
        $bookings->save();

        return redirect()->route('bookings');
    }
    public function restore(int $id){
        $bookings = bookings::where('id', '=', $id)->first();
        $bookings->status_aktif = 'Aktif';
        $bookings->save();

        return redirect()->route('bookings.history');
    }
    public function delete(int $id)
    {
        $bookings = bookings::where('id', '=', $id)->first();
        $bookings->delete();

        return redirect()->route('bookings.history');
    }
}
