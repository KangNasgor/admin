@extends('layout/layout')
@section('content')
<div>
    <h1>Add Customer</h1>
    <div class="container row">
        <form action="/customers/create/update" method="POST" class="form w-75 border border-secondary rounded-1">
            @csrf
            <div class="box justify-content-evenly">
                <label class="form weight-bold col-4">Nama</label>
                <input class="border border-secondary rounded-1 col-6" name="name" placeholder="Someone" required>
            </div>
            <div class="box justify-content-evenly">
                <label class="form weight-bold col-4">Email</label>
                <input class="border border-secondary rounded-1 col-6" name="email" placeholder="Someone@gmail.com" required>
            </div>
            <div class="box justify-content-evenly">
                <label class="form weight-bold col-4">No Telp.</label>
                <input class="border border-secondary rounded-1 col-6" name="phone" type="tel" placeholder="123-456-7890" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
            <button type="button" class="btn btn-danger" onclick="history.go(-1);">Back</button>
        </form>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>
@endsection

<style>
    form{
        padding-top: 10px;
        padding-bottom: 10px;
    }
    .box{
        width: 300px;
        margin-bottom: 20px
    }
</style>