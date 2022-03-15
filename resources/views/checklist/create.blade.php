@extends('macros.home')

@section('body')
    <div class="container">

        <h1>Create Checklist</h1>

        <form method="post" action="{{ action(['App\Http\Controllers\ChecklistController', 'store']) }}">
            @csrf

            <div class="row">
                <div class="col-1">
                    <label for="name">Name</label>
                </div>
                <div class="col">
                    <input type="text" name="name" id="name" class="form-control" />
                </div>
            </div>
        </form>
    </div>
@endsection
