@extends('layout/layout')
@section('content')
<div>
    <h1>Add Photography_sessions</h1>
    <div class="container row">
        <form action="/photography_sessions/create/update" method="POST" class="form w-75 border border-secondary rounded-1">
            @csrf
            <div class="box justify-content-evenly">
                <label class="form weight-bold col-5">Photographer</label>
                <select class="custom-select border border-secondary rounded-1 col-6" id="inputGroupSelect01" name="photographer">
                    @foreach ($photography_sessions as $pho)
                        <option value="{{ $pho->id }}">{{$pho->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="box justify-content-evenly">
                <label class="form weight-bold col-5">Date</label>
                <select class="custom-select border border-secondary rounded-1 col-6" id="inputGroupSelect01" name="date">
                    @foreach ($date as $tgl)
                        <option value="{{ $tgl->id }}">{{ $tgl->booking_date }}</option>
                    @endforeach
                </select>
            </div>
            <div class="box justify-content-evenly">
                <label class="form weight-bold col-5">Start time</label>
                <input type="time" class="border border-secondary rounded-1 col-6" name="start_time" required>
            </div>
            <div class="box justify-content-evenly">
                <label class="form weight-bold col-5">End time</label>
                <input type="time" class="border border-secondary rounded-1 col-6" name="end_time" required>
            </div>
            <div class="box justify-content-evenly">
                <label class="form weight-bold col-5">Customer</label>
                <select class="custom-select border border-secondary rounded-1 col-6" id="inputGroupSelect01" name="customer">
                    @foreach ($customer as $cus)
                        <option value="{{ $cus->id }}">{{ $cus->name }}</option>
                    @endforeach
                </select>
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