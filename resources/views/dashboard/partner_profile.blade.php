@extends('template.template_1')
@section('title_top', 'Partner Profile')

@section('content')
    {{ csrf_field() }}
    <div class="" id="container-content" role="" aria-labelledby="">
        <div class="alert alert-secondary p-1" role="alert">
            <strong>
                Partner Profile
            </strong>
        </div>

        @if(!$data)
            <div class="alert alert-danger" role="alert">
                <strong>
                    No Partner Profile DATA!
                </strong>
            </div>
        @endif
        @php
            $id = '';
            $nama = '';
            $gambar = '';
            $alamat = '';
            $telepon = '';
            $email = '';

            if($data){
                $id = $data->id;
                $nama = $data->nama;
                $gambar = $data->gambar;
                $alamat = $data->alamat;
                $telepon = $data->telepon;
                $email = $data->email;
            }
        @endphp

        <div>
            <input type="hidden" name="id" id="id" value="{{ $id }}">
            <div class="row m-1">
                <div class="col_left col-lg-5">
                    <div class="text-end">
                        <label for="nama" class="col-form-label">Name :</label>
                    </div>
                </div>

                <div class="col_right col-lg-7">
                    <div class="row g-2 align-items-center">
                        <div class="col-lg-6">
                            <input type="text" name="nama" id="nama" class="form-control" value="{{ $nama }}">
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
                                @if($gambar)
                                    <img id="image_preview" class="col-lg-12" src="{!! $gambar !!}">
                                @else
                                    <img id="image_preview" class="col-lg-12">
                                @endif
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
                            <textarea name="alamat" id="alamat" class="form-control">{{ $alamat }}</textarea>
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
                            <input type="number" name="telepon" id="telepon" class="form-control" value="{{ $telepon }}">
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
                            <input type="email" name="email" id="email" class="form-control" value="{{ $email }}" readonly>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row m-1 mt-4">
                <div class="col_left col-lg-5">
                </div>

                <div class="col_right col-lg-7">
                    <div class="d-grid gap-2 d-md-flex mr-5">
                        <button class="btn button-red" type="button" id="save">Save</button>
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

    <script>
        let route_partner_profile_save = '{{ route('dashboard.partner-profile.save') }}';
    </script>

    <script>
        let loading_el = `
            <div class="spinner-border spinner-border-sm text-light" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        `;
        let save_button_caption = $('#save').text();
        let disableSaveButton = function(){
            $('#save').prop('disabled', true);
        }
        let enableSaveButton = function(){
            $('#save').prop('disabled', false);
            $('#save').html(save_button_caption);
        }
        function save(){
            disableSaveButton();
            $('#save').html(loading_el);

            let id = $('#id').val();
            let nama = $('#nama').val();
            let gambar = $('#gambar').prop('files')[0];
            let alamat = $('#alamat').val();
            let telepon = $('#telepon').val();
            let email = $('#email').val();

            let _token = $("input[name='_token']").val();
            var data_send = new FormData();
            data_send.append('_token', _token);
            data_send.append('id', id);
            data_send.append('nama', nama);
            data_send.append('alamat', alamat);
            data_send.append('telepon', telepon);
            data_send.append('email', email);
            data_send.append('gambar', gambar);
            $.ajax({
                url: route_partner_profile_save,
                type:'POST',
                data: data_send,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    if($.isEmptyObject(data.error)){
                        if(data.status == 'success'){
                            $('.message-success').html(data.message);
                            $('.message-success').show();
                        }else{
                            $('.message-failed').html(data.message);
                            $('.message-failed').show();
                        }
                    }else{
                        printErrorMsg(data.error);
                    }
                }
            }).always(function() {
                document.getElementById('nav_bar').scrollIntoView({block: 'start', behavior: 'smooth'});
                setTimeout(function(){
                    $('.print-error-msg').hide();
                    $('.message-success').hide();
                    $('.message-failed').hide();
                    location.reload();
                },4000);

                enableSaveButton();
            })
            .fail(function() {
                enableSaveButton();
                alert('server error');
            });
        }

        $(document).ready(function(){
            $('#save').on('click', function(){
                save();
            });
        });
    </script>
@endsection
