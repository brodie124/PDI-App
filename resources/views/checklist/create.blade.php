@extends('macros.home')

@section('body')
    <div class="container">

        <h1>Create Checklist</h1>


        <form method="post" class="template-item">
            <div class="checklist-item template-item mt-3" data-checklist-item-id="{id}">
                {{--                    <div class="row">--}}
                {{--                        <label for="checklist-item[{id}]" class="form-label">Checklist Item</label>--}}
                {{--                    </div>--}}
                <div class="row">
                    <div class="col">
                        <input type="text" name="checklist-item[{id}][description]" id="checklist-item[{id}][description]" class="form-control form-control-sm" />
                    </div>
                    <div class="col">
                        <select name="checklist-item[{id}][type]" id="checklist-item[{id}][type]" class="form-control form-control-sm">
                            <option disabled>Please select a checklist item type...</option>
                            <option selected value="standard">Standard</option>
                        </select>
                    </div>

                    <div class="col-1">
                        <a href="#" class="btn-remove-checklist-item link-danger fa-lg"><i class="fas fa-times"></i></a>
                    </div>
                </div>
            </div>
        </form>

        <form method="post" action="{{ action(['App\Http\Controllers\ChecklistController', 'store']) }}">
            @csrf
            <h5>Checklist Information</h5>
            <div>
                <div class="row">
                    <div class="col">
                        <label for="name" class="form-label">Name</label>
                    </div>

                </div>
                <div class="row">
                    <div class="col">
                        <input type="text" name="name" id="name" class="form-control form-control-sm" />
                    </div>

                </div>
            </div>

            <h5 class="mt-5">Checklist Items <a href="#" class="btn btn-sm btn-info" id="btn-add-checklist-item">Add Checklist Item</a></h5>
            <div id="checklist-items">



                @if(old('checklist-item'))

                    @for($i = 0; $i < count(old('checklist-item')); $i++)
                        @php var_dump(old('checklist-item')) @endphp
                    @endfor

                @endif

            </div>


            <div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary mt-3">Create Checklist</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <script>
        jQuery(document).ready(function() {

            let $checklistItems = $('#checklist-items');
            let $templateItem = $('.checklist-item.template-item');

            let $addChecklistItemButton = $('a#btn-add-checklist-item');


            $addChecklistItemButton.on('click', function(e) {
                e.preventDefault();

                let $currentChecklistItems = $('.checklist-item');
                let lastId = $currentChecklistItems.last().attr('data-checklist-item-id');


                let id = parseInt(lastId);
                if(!id && id !== 0)
                    id = 0;
                else
                    id++;

                let $templateInstance = $templateItem.clone();
                $templateInstance.removeClass('template-item');

                $templateInstance.attr('data-checklist-item-id', id);

                let html = $templateInstance.html().replace(/{id}/gi, id);
                $templateInstance.html(html);

                $checklistItems.append($templateInstance);
            });

            $checklistItems.on('click', 'a.btn-remove-checklist-item', function(e) {
                e.preventDefault();

                $(this).closest('.checklist-item').remove();
            })



            // create the first instance of a checklist item
            if($templateItem) {
                $addChecklistItemButton.trigger('click');
            }

        });
    </script>
@endsection
