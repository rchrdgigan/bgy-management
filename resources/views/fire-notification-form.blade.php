@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-fire"></i> Fire Notification Form</h3>
        </div>
        <div class="card-body">
            <form action="{{route('fire.notif')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="purok">Purok/Street</label>
                    <input type="text" name="purok" class="form-control" id="purok" placeholder="Enter purok" required>
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea type="text" name="msg" class="form-control" id="message" maxlength="100" placeholder="Enter message" style="height:200px"></textarea>
                </div>
                <a href="{{route('list.notif')}}" class="btn btn-danger"><i class="fas fa-backspace"></i> Back</a>
                <button type="submit" class="btn btn-danger float-right"><i class="fas fa-paper-plane"></i> Send</button>
            </form>
        </div>
    </div>
</div>
@endsection