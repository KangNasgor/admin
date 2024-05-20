@extends('layout/layout')
@section('content')
<a type="button" class="btn btn-danger" href="{{ route('photography_sessions') }}">Back</a>
<table id="table" class="table table-striped table-secondary table-hover table-borderless">
    <thead>
        <tr>
            <th>Photographer</th>
            <th>Date</th>
            <th>Start time</th>
            <th>End time</th>
            <th>Paket</th>
            <th>Action</th> 
        </tr>
    </thead>
    <tbody>
         @foreach ($photography_sessions as $pho)
                    <tr>
                        <td>
                            {{$pho->photographer->name}}
                        </td>
                        <td>
                            {{$pho->booking->booking_date}}
                        </td>
                        <td>
                            {{$pho->start_time}}
                        </td>
                        <td>
                            {{$pho->end_time}}
                        </td>
                        <td>
                            {{$pho->paket}}
                        </td>
                        <td>
                            <a href="{{ route('photography_sessions.restore', $pho->id) }}" class="btn btn-primary"><i class="fa-solid fa-arrow-rotate-left"></i></a>
                            <a class="btn btn-danger" data-toggle="modal" data-target="#del{{ $pho->id }}"><i class="fa-solid fa-trash"></i></a>
                            <form action="{{ route('photography_sessions.delete', $pho->id) }}" method="POST" class="modal fade" id="del{{ $pho->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                @csrf
                                @method('DELETE')
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
