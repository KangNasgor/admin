<?php

namespace App\Http\Controllers;

use App\Models\Photographers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PhotographersController extends Controller
{
    public function photographers()
    {
        $photographers = Photographers::where('status_aktif', '=', 'aktif')->get();
        return view('admin/photographers/photographers', compact('photographers'));
    }
    public function create()
    {
        $photographers = Photographers::where('status_aktif', '=', 'aktif')->get();
        return view('admin/photographers/crud/create', compact('photographers'));
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
            Photographers::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'created_at' => now(),
                'updated_at' => now(),
                'status_aktif' => 'aktif'
            ]);

            return redirect()->route('photographers');
        }
    }
    public function edit(int $id)
    {
        $photographers = Photographers::where('id', $id)->first();
        return view('admin/photographers/crud/edit', compact('photographers'));
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
            $model = Photographers::where('id', $id)->first();
            $model->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'created_at' => now(),
                'updated_at' => now(),
                'status_aktif' => 'aktif'
            ]);
            return redirect()->route('photographers', $model->id);
        }
    }
    public function history(){
        $photographers = Photographers::where('status_aktif', '=', 'Nonaktif')->get();
        return view('admin/photographers/historyphotographers', compact('photographers'));
    }
    public function softdelete(int $id)
    {
        $photographers = Photographers::where('id', '=', $id)->first();
        $photographers->status_aktif = 'Nonaktif';
        $photographers->save();

        return redirect()->route('photographers');
    }
    public function restore(int $id){
        $photographers = Photographers::where('id', '=', $id)->first();
        $photographers->status_aktif = 'Aktif';
        $photographers->save();

        return redirect()->route('photographers.history');
    }
    public function delete(int $id)
    {
        $photographers = Photographers::where('id', '=', $id)->first();
        $photographers->delete();

        return redirect()->route('photographers.history');
    }
}
