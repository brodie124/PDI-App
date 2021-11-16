<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PDI</title>

    <script src="/javascript/jquery-3.6.0.js"></script>
    <script src="/javascript/bootstrap.js"></script>
    <script src="/javascript/all.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>

    <link href="/css/all.css" type="text/css" rel="stylesheet" />
    <link href="/css/bootstrap.css" type="text/css" rel="stylesheet" />
    <link href="/css/global.css" type="text/css" rel="stylesheet" />

</head>
<body>


<div class="container" style="margin: 20px 0; padding-bottom: 20px;">

    @if(count($errors) > 0)
    <div class="alert alert-danger">


        @php
        $pdi_check_errors = [];
        $other_errors = [];

        foreach($errors->getMessages() as $key => $message) {
            if(array_key_exists($key, $pdi_checks)):
                $pdi_check_errors[$key] = $message;
            else:
                $other_errors[$key] = $message;
            endif;
        }
        @endphp

        @if(count($other_errors) > 0)
{{--            The below PDI checks have not been specified;--}}
            <ul>
                @foreach($other_errors as $key => $message)
                    <li>
                        @php print_r($message); @endphp
                    </li>
                @endforeach
            </ul>
        @endif

        @if(count($pdi_check_errors) > 0)
            The below PDI checks have not been specified;
            <ul>
                @foreach($pdi_check_errors as $key => $message)
                    <li>
                        {{ $pdi_checks[$key] }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
    @endif

    <form method="post" id="pdi-form" action="{{ action('App\Http\Controllers\PdiController@store') }}">
        @csrf

        <input type="hidden" name="signature" id="signature" />
        <input type="hidden" name="signature_points" id="signature_points" />

        <div class="row">
            <div class="col col-4">
                <label for="asset-code" class="form-label"><strong>Asset Code:</strong></label>
            </div>
            <div class="col col-8">
                <div class="input-group">
                    <input type="text" id="asset-code" name="asset-code" class="form-control" placeholder="e.g. QI123"
                    value="{{ old('asset-code') }}">
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col col-4">
                <label for="hour-meter" class="form-label"><strong>Hour Meter:</strong></label>
            </div>
            <div class="col col-8">
                <div class="input-group">
                    <input type="number" id="hour-meter" name="hour-meter" class="form-control" placeholder="e.g. 1234"
                           value="{{ old('hour-meter') }}">
                    <div class="input-group-text" style="width: 66px;">hours</div>
                </div>
            </div>
        </div>
        <div class="row"  style="margin-bottom: 50px;">
            <div class="col col-4">
                <label for="vacuum" class="form-label"><strong>Vacuum:</strong></label>
            </div>
            <div class="col col-8">
                <div class="input-group">
                    <input type="number" id="vacuum" name="vacuum" class="form-control" placeholder="e.g. 18"
                           value="{{ old('vacuum') }}">
                    <div class="input-group-text" style="width: 66px;">inhg</div>
                </div>
            </div>
        </div>


        <table class="pdi-table">
            <tr>
                <th>Checks</th>
                <th>Unfixed</th>
                <th>Replaced</th>
                <th>Adjusted</th>
                <th>OK</th>
{{--                <th>Remarks</th>--}}
            </tr>

            @foreach($pdi_checks as $slug => $item)

                <tr class="selection-row @error($slug) is-invalid @enderror">
                    <td rowspan="2">
                        {{ ($item) }}
                    </td>
                    <td class="custom-radio">
                        <input type="radio" id="{{$slug}}-unfixed" class="radio-unfixed" name="{{$slug}}" value="unfixed"
                        {{ (old($slug) == 'unfixed') ? 'checked' : '' }} />
                        <label for="{{$slug}}-unfixed"><span class="unfixed"><i class="fas fa-times"></i></span></label>
                    </td>
                    <td class="custom-radio">
                        <input type="radio" id="{{$slug}}-replaced" class="radio-replaced" name="{{$slug}}" value="replaced"
                            {{ (old($slug) == 'replaced') ? 'checked' : '' }} />
                        <label for="{{$slug}}-replaced"><span class="replaced"><i class="fas fa-exchange-alt"></i></span></label>
                    </td>
                    <td class="custom-radio">
                        <input type="radio" id="{{$slug}}-adjusted" class="custom-radio radio-replaced" name="{{$slug}}" value="adjusted"
                            {{ (old($slug) == 'adjusted') ? 'checked' : '' }}/>
                        <label for="{{$slug}}-adjusted"><span class="adjusted"><i class="fas fa-wrench"></i></span></label>
                    </td>
                    <td class="custom-radio">
                        <input type="radio" id="{{$slug}}-ok" class="custom-radio radio-replaced" name="{{$slug}}" value="ok"
                            {{ (old($slug) == 'ok') ? 'checked' : '' }}/>
                        <label for="{{$slug}}-ok"><span class="ok"><i class="fas fa-check"></i></label></span>
                    </td>
                </tr>
                <tr class="remarks-row @error($slug) is-invalid @enderror">
                    <td colspan="4">
                        <input type="text" name="remarks-{{$slug}}" placeholder="Remarks" class="form-control"
                        value="{{ old('remarks-' . $slug) }}"/>
                    </td>
                </tr>

                <tr class="spacer-row">
                    <td></td>
                </tr>
            @endforeach
        </table>




    </form>


{{--    <h3 style="margin-top: 50px;">PDI Submission</h3>--}}
    <div class="row">
        <div class="col col-5">
            <strong>Submitted by:</strong>
        </div>
        <div class="col col-7">
            Brodie Pestell
        </div>
    </div>
    <div class="row">
        <div class="col col-5">
            <strong>Signed:</strong>
        </div>
    </div>
    <div class="row">
        <div class="col col-12" style="text-align: center;">
            <canvas id="signature-canvas" style="display: inline-block; border: 1px solid #ccc; margin: 0 auto;"></canvas>
            <br /><a href="#" id="clear-signature" style="display: inline-block; margin: 20px 0;">Clear Signature</a>
        </div>
    </div>
    <div class="row">
        <div class="col col-12">
            <button type="button" class="btn btn-primary btn-lg" style="width: 100%;" id="submit-button">Submit</button>
        </div>
    </div>


</div>


<script>
    jQuery(document).ready(function() {

        let signatureCanvas = document.querySelector("#signature-canvas");
        let signaturePad = new SignaturePad(signatureCanvas, {
            throttle: 8
        });

        let $signatureInput = jQuery('input#signature');
        let $signaturePointsInput = jQuery('input#signature_points');

        let $submitButton = jQuery('button#submit-button');
        let $clearSignatureButton = jQuery('#clear-signature');

        let $form = jQuery('form#pdi-form');

        @if(old('signature_points', null) != null)
            signaturePad.fromData(JSON.parse('{!! old('signature_points')  !!}'));
        @endif

        $clearSignatureButton.on('click', function(e) {
            e.preventDefault();
            signaturePad.clear();
        })

        $submitButton.on('click', function(e) {
            e.preventDefault();

            if(signaturePad.isEmpty()) {
                $signatureInput.val('');
            } else {
                $signatureInput.val(signaturePad.toDataURL());
                $signaturePointsInput.val(JSON.stringify(signaturePad.toData()));
            }

            $form.submit();
        })

    });
</script>
</body>
</html>
