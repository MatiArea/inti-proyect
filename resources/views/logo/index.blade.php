@extends('template.app')

@section('content')
    <div id="loader"></div>
    <main id="img-body" class="col-md-10 ms-sm-auto col-lg-12 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h2>Logo institucional</h2>
        </div>
        <div class="d-flex justify-content-center align-items-center p-2 m-3">
            <form method="POST" enctype="multipart/form-data" id="image-upload-preview" action="/icono/store">
                @csrf
                <div class="my-3"><input type="file" name="image" class="form-control" accept="image/png,image/jpeg"
                        placeholder="Seleccione una imagen" required id="image">
                    @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12 mb-2 d-flex justify-content-center align-items-center">
                    <img id="preview-image" src="https://teelindy.com/wp-content/uploads/2019/03/default_image.png"
                        alt="preview image" style="max-height: 250px;">
                    <div class="spinner-border" role="status" id="spinner-submit">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" id="button-submit" data-loading-text="Subiendo imagen..."
                        disabled>Guardar</button>
                </div>

            </form>
        </div>
        <script type="text/javascript">
            $(function() {
                $('#spinner-submit').hide();
            });
            $('#image').focus(function() {
                $('#spinner-submit').show();
                $('#preview-image').hide();
                $('#button-submit').attr('disabled', true);
            });
            $('#image').change(function() {

                let reader = new FileReader();

                reader.onload = (e) => {
                    $('#preview-image').attr('src', e.target.result);
                    $('#spinner-submit').hide();
                    $('#preview-image').show();
                    $('#button-submit').attr('disabled', false);
                }

                reader.onerror = function() {
                    $('#button-submit').attr('disabled', false);
                };
                reader.readAsDataURL(this.files[0]);

            });
        </script>
        </div>
    </main>
@endsection
