<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PDI</title>

    <script src="/javascript/jquery-3.6.0.js"></script>
    <script src="/javascript/bootstrap.js"></script>
    <script src="/javascript/all.js"></script>

    <link href="/css/all.css" type="text/css" rel="stylesheet" />
    <link href="/css/bootstrap.css" type="text/css" rel="stylesheet" />
    <link href="/css/global.css" type="text/css" rel="stylesheet" />

</head>
<body>


<div class="container">

    <form method="post">
        <div class="row" style="margin-bottom: 50px;">
            <div class="col col-4">
                <label for="asset-code" class="form-label">Asset Code:</label>
                <input type="text" id="asset-code" name="asset-code" class="form-control">
            </div>
            <div class="col col-4">
                <label for="hour-meter" class="form-label">Hour Meter:</label>
                <input type="number" id="hour-meter" name="hour-meter" class="form-control">
            </div>
            <div class="col col-4">
                <label for="vacuum" class="form-label">Vacuum:</label>
                <input type="number" id="vacuum" name="vacuum" class="form-control">
            </div>
        </div>

        <table class="pdi-table">
            <tr>
                <th>Checks</th>
                <th>Replaced</th>
                <th>Adjusted</th>
                <th>OK</th>
{{--                <th>Remarks</th>--}}
            </tr>

            @foreach($pdi_checks as $item => $slug)
                <tr>
                    <td>
                        {{ ($item) }}
                    </td>
                    <td class="custom-radio">
                        <input type="radio" id="{{$slug}}-replaced" class="radio-replaced" name="{{$slug}}" value="replaced" />
                        <label for="{{$slug}}-replaced"><span class="replaced"><i class="fas fa-exchange-alt"></i></span></label>
                    </td>
                    <td class="custom-radio">
                        <input type="radio" id="{{$slug}}-adjusted" class="custom-radio radio-replaced" name="{{$slug}}" value="adjusted" />
                        <label for="{{$slug}}-adjusted"><span class="adjusted"><i class="fas fa-wrench"></i></span></label>
                    </td>
                    <td class="custom-radio">
                        <input type="radio" id="{{$slug}}-ok" class="custom-radio radio-replaced" name="{{$slug}}" value="ok" />
                        <label for="{{$slug}}-ok"><span class="ok"><i class="fas fa-check"></i></label></span>
                    </td>
                </tr>
                <tr class="remarks-row">
                    <td></td>
                    <td colspan="3">
                        <input type="text" name="remarks-{{$slug}}" placeholder="Remarks" class="form-control"/>
                    </td>
                </tr>
            @endforeach
        </table>


    </form>

</div>

</body>
</html>
