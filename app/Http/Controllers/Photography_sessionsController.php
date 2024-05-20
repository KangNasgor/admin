<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Photographers;
use App\Models\Bookings;
use Illuminate\Http\Request;
use App\Models\Photography_sessions;
use Illuminate\Support\Facades\Validator;
class Photography_sessionsController extends Controller
{
    public function photography_sessions()
    {
        $photography_sessions = Photography_sessions::where('status_aktif', '=', 'aktif')->with('booking')->get();
        return view('admin/photography_sessions/photography_sessions', compact('photography_sessions'));
    }
    public function create()
    {
        $photography_sessions = Photographers::where('status_aktif', '=', 'aktif')->get();
        $customer = Customers::where('status_aktif', '=', 'aktif')->get();
        $date = Bookings::where('status_aktif', '=', 'aktif')->get();
        return view('admin/photography_sessions/crud/create', compact('photography_sessions', 'customer', 'date'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'start_time' => 'required|unique:photography_sessions,start_time',
            'end_time' => 'required|unique:photography_sessions,end_time',
        ]);
        Photography_sessions::create([
            'photographer_id' => $request->input('photographer'),
            'customer_id' =>$request->input('customer'),
            'bookings_id' => $request->input('date'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
            'paket' => $request->input('paket'),
            'created_at' => now(),
            'updated_at' => now(),
            'status_aktif' => 'aktif'
        ]);

        return redirect()->route('photography_sessions');
    }
    public function edit(int $id)
    {
        $photography_sessions = Photography_sessions::where('id', '=' ,$id)->first();
        $photographer = Photographers::where('status_aktif', '=', 'aktif')->get();
        $customer = Customers::where('status_aktif', '=', 'aktif')->get();
        $date = Bookings::where('status_aktif', '=', 'aktif')->get();
        return view('admin/photography_sessions/crud/edit', compact('photography_sessions', 'date','customer', 'photographer'));
    }
    public function update(Request $request, int $id)
    {
        $request->validate([
            'start_time' => 'required|unique:photography_sessions,start_time',
            'end_time' => 'required|unique:photography_sessions,end_time',
        ]);
        $model = Photography_sessions::where('id', $id)->first();
        $model->update([
            'photographer_id' => $request->input('photographer'),
            'customer_id' =>$request->input('customer'),
            'bookings_id' => $request->input('date'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
            'paket' => $request->input('paket'),
            'created_at' => now(),
            'updated_at' => now(),
            'status_aktif' => 'aktif'
        ]);
        return redirect()->route('photography_sessions', $model->id);
    }
    public function history(){
        $photography_sessions = Photography_sessions::where('status_aktif', '=', 'Nonaktif')->get();
        return view('admin/photography_sessions/historyphotography_sessions', compact('photography_sessions'));
    }
    public function softdelete(int $id)
    {
        $photography_sessions = Photography_sessions::where('id', '=', $id)->first();
        $photography_sessions->status_aktif = 'Nonaktif';
        $photography_sessions->save();

        return redirect()->route('photography_sessions');
    }
    public function restore(int $id){
        $photography_sessions = Photography_sessions::where('id', '=', $id)->first();
        $photography_sessions->status_aktif = 'Aktif';
        $photography_sessions->save();

        return redirect()->route('photography_sessions.history');
    }
    public function delete(int $id)
    {
        $photography_sessions = Photography_sessions::where('id', '=', $id)->first();
        $photography_sessions->delete();

        return redirect()->route('photography_sessions.history');
    }
}
