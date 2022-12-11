<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

    <!-- jQuery Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Bootstrap CSS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <title>Edit Form</title>

    <style>
    </style>
</head>

<body>
    <section class="vh-100 gradient-custom">
        <!-- <div class="container py-5 h-100"> -->

        <div class="row justify-content-center align-items-center h-100">

            <div class="col-10 col-lg-10 col-xl-9">

                <div class="card shadow-2-strong card-Edit" style="border-radius: 15px;">

                    <div class="card-body p-4 p-md-5">

                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Edit Form</h3>
                        {{-- <pre>
                        {{print_r($user)}}
                        </pre> --}}
                        <form action='{{ route('update', $user->id) }}' method="POST">
                            @csrf
                            <div class="col-md-8 mb-4">
                                <div class="form-outline">
                                    <input type="text" id="name" name="name" class="form-control"
                                        placeholder="Enter Your Name *" value="{{ $user->name }}">
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
                                        placeholder="Enter Your Email" value="{{ $user->email }}">
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
                                        placeholder="Enter Your Phone" value="{{ $user->phone }}">
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
                                        value="{{ $user->dob }}">
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
                                        {{ in_array('cricket', $hobbie) ? 'checked' : '' }}>
                                    Cricket
                                    <input type="checkbox" name="hobbie[]" value="reading"
                                        {{ in_array('reading', $hobbie) ? 'checked' : '' }}> Reading
                                    <input type="checkbox" name="hobbie[]" value="other"
                                        {{ in_array('other', $hobbie) ? 'checked' : '' }}>
                                    other
                                </div>
                            </div>

                            <div class="col-md-8 mb-4">
                                <div class="form-outline">
                                    <input type="radio" class="gender" name="gender" value="male"
                                        {{ $user->gender == 'male' ? 'checked' : '' }}>Male
                                    <input type="radio" class="gender" name="gender" value="female"
                                        {{ $user->gender == 'female' ? 'checked' : '' }}>Female
                                    <span class="text text-danger">
                                        @error('gender')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-8 mb-4">
                                <div class="dropzone" id="dropzone">
                                    @foreach ($image as $item)
                                        <img class="" src="{{ asset('dropzone/' . $item) }}" class="img-thumbnail"
                                            height="90px" width="150px" />
                                    @endforeach
                                </div>
                            </div>

                            <input type="submit" class="btn btn-info" name="submit" id="submit" value="update   ">
                            <a href="{{ route('user_view') }}" type="button" class="btn btn-danger">Close</a>
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
        success: function(data, response) {
            newimage.push(response);
            console.log(newimage);
            $(".newimage").val(newimage);

        }
    });
</script>

</html>
