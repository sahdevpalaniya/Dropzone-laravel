<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

    <!-- jQuery Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Bootstrap CSS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

    <title>Register Form</title>

    <style>
    </style>
</head>

<body>
    <section class="vh-100 gradient-custom">
        <!-- <div class="container py-5 h-100"> -->

        <div class="row justify-content-center align-items-center h-100">

            <div class="col-10 col-lg-10 col-xl-9">

                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">

                    <div class="card-body p-4 p-md-5">

                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>

                        <form action='{{ url('/') }}/register' id="form" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-8 mb-4">
                                <div class="form-outline">
                                    <input type="text" id="name" name="name" class="form-control"
                                        placeholder="Enter Your Name *" value="{{ old('name') }}">
                                    <span class="text text-danger">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-8 mb-4">
                                <div class="form-outline">
                                    <input type="text" id="email" name="email" class="form-control"
                                        placeholder="Enter Your Email" value="{{ old('email') }}">
                                    <span class="text text-danger">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-8 mb-4">
                                <div class="form-outline">
                                    <input type="text" id="phone" name="phone" class="form-control"
                                        placeholder="Enter Your Phone" value="{{ old('phone') }}">
                                    <span class="text text-danger">
                                        @error('phone')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>


                            <div class="col-md-8 mb-4">
                                <div class="form-outline">
                                    <input type="date" id="date" name="date" class="form-control"
                                        value="{{ old('date') }}">
                                    <span class="text text-danger">
                                        @error('date')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>


                            <div class="col-md-8 mb-4">
                                <div class="form-outline">
                                    <input type="checkbox" name="hobbie[]" value="cricket"
                                        {{ old('hobbie[]') == 'cricket' ? 'checked' : '' }}>
                                    Cricket
                                    <input type="checkbox" name="hobbie[]" value="reading"
                                        {{ old('hobbie[]') == 'reading' ? 'checked' : '' }}> Reading
                                    <input type="checkbox" name="hobbie[]" value="other"
                                        {{ old('hobbie[]') == 'other' ? 'checked' : '' }}>
                                    other
                                </div>
                            </div>


                            <div class="col-md-8 mb-4">
                                <div class="form-outline">
                                    <input type="radio" class="gender" name="gender" value="male"
                                        {{ old('gender') == 'male' ? 'checked' : '' }}>Male
                                    <input type="radio" class="gender" name="gender" value="female"
                                        {{ old('gender') == 'female' ? 'checked' : '' }}>Female
                                    <span class="text text-danger">
                                        @error('gender')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-8 mb-4">
                                <div class="dropzone" id="dropzone"></div>
                                <input type="hidden" readonly class="newimage" name="image" value="">
                            </div>

                            <div class="col-md-8 mb-4">
                                <div class="form-outline">
                                    <input type="password" id="password" name="password" class="form-control"
                                        placeholder="Enter Strong Password">
                                    <span class="text text-danger">
                                        @error('password')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-info" name="submit" id="submit" value="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<script type="text/javascript">
    var newimage = [];
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("#dropzone", {
        url: '{{ route('dropzone.store') }}',
        // type='post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        // url:"/dropzonestore",
        parallelUploads: 1,
        uploadMultiple: true,
        acceptedFiles: '.png,.jpg,.jpeg',
        addRemoveLinks: true,
        dictDefaultMessage: "<h3 class='sbold'>Drop files here or click to upload document(s)<h3>",
        removedfile: function(file) {
            var removeimageName = $(file.previewElement).find('.dz-filename span').data('dz-name');
            $.ajax({
                type: 'POST',
                url: '{{ route('remove.file') }}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    removeimageName: removeimageName
                },
                success: function(data) {
                    console.log(data);
                    for (var i = 0; i < newimage.length; i++) {
                        if (newimage[i] === data) {
                            newimage.splice(i, 1);
                        }
                    }
                    $(".newimage").val(newimage);
                }
            });
            var _ref;
            return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) :
                void 0;
        },
        success: function(file, response) {
            console.log(file);
            newimage.push(response);
            console.log(newimage);
            $(".newimage").val(newimage);
            $(file.previewTemplate).find('.dz-filename span').data('dz-name', response);
            $(file.previewTemplate).find('.dz-filename span').html(response);
        }
    });
</script>

</html>
