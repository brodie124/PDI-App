@extends('macros.home')

@section('body')
    <div class="container">

        <h1>
            Checklists
            <a href="{{ action(['App\Http\Controllers\ChecklistController', 'create']) }}" class="btn btn-sm btn-secondary">Add</a>
        </h1>

        @if(count($checklists) > 0)
            <table>
                <tr>
                    <th>Name</th>
                </tr>

                @foreach($checklists as $checklist)



                @endforeach

            </table>
        @else
            No checklists have been created yet. Why not create one using the button above?
        @endif

    </div>
@endsection
