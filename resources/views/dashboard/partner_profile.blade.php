@extends('template.template_1')
@section('title_top', 'Partner Profile')

@section('content')
    {{ csrf_field() }}
    <div class="" id="" role="" aria-labelledby="">
        <div class="alert alert-secondary p-1" role="alert">
            <strong>
                Partner Profile
            </strong>
        </div>

        <div>
            <input type="hidden" name="id" id="id">
            <div class="row m-1">
                <div class="col_left col-lg-5">
                    <div class="text-end">
                        <label for="name" class="col-form-label">Name :</label>
                    </div>
                </div>

                <div class="col_right col-lg-7">
                    <div class="row g-2 align-items-center">
                        <div class="col-lg-6">
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row m-1">
                <div class="col_left col-lg-5">
                    <div class="text-end">
                        <label for="gambar" class="col-form-label">Image :</label>
                    </div>
                </div>

                <div class="col_right col-lg-7">
                    <div class="row g-2 align-items-center">
                        <div class="col-lg-6">
                            <div class="text-center">
                                <img id="image_preview" class="col-lg-12">
                            </div>
                            <div>
                                <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*" onchange="loadFile(event)">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row m-1">
                <div class="col_left col-lg-5">
                    <div class="text-end">
                        <label for="alamat" class="col-form-label">Address :</label>
                    </div>
                </div>

                <div class="col_right col-lg-7">
                    <div class="row g-2 align-items-center">
                        <div class="col-lg-6">
                            <textarea name="alamat" id="alamat" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row m-1">
                <div class="col_left col-lg-5">
                    <div class="text-end">
                        <label for="telepon" class="col-form-label">Contact :</label>
                    </div>
                </div>

                <div class="col_right col-lg-7">
                    <div class="row g-2 align-items-center">
                        <div class="col-lg-6">
                            <input type="text" name="telepon" id="telepon" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row m-1">
                <div class="col_left col-lg-5">
                    <div class="text-end">
                        <label for="email" class="col-form-label">Email :</label>
                    </div>
                </div>

                <div class="col_right col-lg-7">
                    <div class="row g-2 align-items-center">
                        <div class="col-lg-6">
                            <input type="email" name="email" id="email" class="form-control" readonly>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row m-1 mt-4">
                <div class="col_left col-lg-5">
                </div>

                <div class="col_right col-lg-7">
                    <div class="d-grid gap-2 d-md-flex mr-5">
                        <button class="btn btn-secondary me-md-2" type="button" id="cancel" disabled>Cancel</button>
                        <button class="btn button-red" type="button" id="save" disabled>Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        let loadFile = function(event) {
            var image_preview = document.getElementById('image_preview');
            image_preview.src = URL.createObjectURL(event.target.files[0]);
            image_preview.onload = function() {
            URL.revokeObjectURL(image_preview.src) // free memory
            }
        };
    </script>
@endsection
