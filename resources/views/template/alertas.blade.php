<div class="" style="position: absolute; top: 3%; left: 33%; z-index: 1021;width:50vw">

    @if ($notification = Session::get('success'))
        <div class="alert alert-success alert-block" data-valor="success">
            <!-- <button type="button" class="close" data-dismiss="alert">×</button> -->
            <strong>@php print($notification) @endphp</strong>
        </div>
    @endif


    @if ($notification = Session::get('error'))
        <div class="alert alert-danger alert-block" data-valor="danger">
            <!-- <button type="button" class="close" data-dismiss="alert">×</button> -->
            <strong>@php print($notification) @endphp</strong>
        </div>
    @endif


    @if ($notification = Session::get('warning'))
        <div class="alert alert-warning alert-block" data-valor="warning">
            <!-- <button type="button" class="close" data-dismiss="alert">×</button> -->
            <strong>@php print($notification) @endphp</strong>
        </div>
    @endif


    @if ($notification = Session::get('info'))
        <div class="alert alert-info alert-block" data-valor="info">
            <!-- <button type="button" class="close" data-dismiss="alert">×</button> -->
            <strong>@php print($notification) @endphp</strong>
        </div>
    @endif

    {{-- @if ($errors->any())
    <div class="alert alert-danger" data-valor="error">
        <!-- <button type="button" class="close" data-dismiss="alert">×</button> -->
        Please check the form under for errors
    </div>
    @endif --}}
</div>
@if ($notification = Session::get('mensaje'))
    <script type="text/javascript">
        $(document).ready(function() {
            $('#modal_mensaje').modal({
                show: true,
            })
        })
    </script>
    <div class="modal fade" id="modal_mensaje" tabindex="-1" aria-labelledby="modal_mensajeLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    @php print($notification) @endphp
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-terciario" data-dismiss="modal"
                        aria-label="Close">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
@endif
