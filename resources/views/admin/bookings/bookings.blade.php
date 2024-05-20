@extends('layout/layout')
@section('content')
<div class="mt-5">
    <div class="col-12 table-responsive">
    <a class="btn btn-secondary" href="{{route('bookings.create')}}">Create</a>
    <a class="btn btn-warning" href="{{route('bookings.history')}}">History</a>
        <table id="table" class="table table-striped table-secondary table-hover table-borderless">
            <thead>
                <tr>
                    <th>Customer</th>
                    <th>Date</th>
                    <th>Paket</th>
                    <th>Payment status</th>
                    <th>Status</th>
                    <th>Action</th> 
                </tr>
            </thead>
            <tbody>
            @foreach ($bookings as $book)
                <tr>
                    <td>
                        {{$book->customer->name}}
                    </td>
                    <td>
                        {{$book->booking_date}}
                    </td>
                    <td>
                        {{$book->paket}}
                    </td>
                    <td>
                        {{$book->payment_status}}
                    </td>
                    <td>
                        {{$book->status}}
                    </td>
                    <td>
                        <a href="{{ route('bookings.editpage', $book->id)}}" class="btn btn-success"><i class="fa-solid fa-pencil"></i></a>
                        <a class="btn btn-danger" data-toggle="modal" data-target="#softdel{{ $book->id }}"><i class="fa-solid fa-trash"></i></a>
                        <form action="{{ route('bookings.softdelete', $book->id) }}" method="POST" class="modal fade" id="softdel{{ $book->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            @csrf
                            @method('PUT')
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete item</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                Are you sure you want to delete this item?
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                            </div>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
<style>
    #table{
        border-radius: 10px;
        margin-top: 10px;
        margin-bottom: 10px;
        border-collapse: collapse; 
        border: none
    }
</style>
