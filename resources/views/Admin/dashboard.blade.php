<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
    <style>
        /* body{
            display: flex;
            align-items: center;
            height:70vh;
        } */
        #cityform {
            max-width: 500px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;

        }
    </style>
    <nav class="navbar navbar-expanded-sm">
        <h2 class="navbar-brand">Hello admin</h2>
        <div clas="navbar-nav">

            <form method="post" action="{{ route('admin.logout') }}" class="nav-items">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>

        </div>


    </nav>

    <style>
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .container {
            max-width: 600px;
            display: flex;
            flex-direction: column;
            gap: 40px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            margin-bottom: 10px;
        }

        textarea {
            width: 575px;
            height: 300px;
        }
    </style>
    <div class="container mt-5">
        <div id="output"></div>
        <form id="details">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp"
                    placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label for="dob">Age</label>
                <input type="date" class="form-control" name="dob" id="dob" aria-describedby="emailHelp"
                    placeholder="Enter DOB">
            </div>

            <div class="form-group">
                <label for="phno">Phone Number</label>
                <input type="number" class="form-control" id="phno" name="phone" aria-describedby="emailHelp"
                    placeholder="Enter Phone Number">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp"
                    placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="state">Select State</label>
                <select id="state" name="state">
                    @foreach ($states as $state)
                        <option value="{{ $state->id }}">{{ $state->state_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="description" class="mb-2">Description</label>
                <textarea name="description" id="description">
    </textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>
    <script>
        $(document).ready(function () {
            $('#details').on('submit', function (e) {
                e.preventDefault();
                let form = $(this);
                let formdata = form.serialize();
                $.ajax({
                    url: '{{ route('details.store')}}',
                    method: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                    },
                    data: formdata,
                    success: function (response) {
                        $('#output').text(response.message).css('color', 'green');
                        $('#details')[0].reset();
                        $('html, body').animate({
                            scrollTop: 0
                        }, 100);
                    },
                    error: function (xhr, status, error) {
                        let errorMessage = 'Data not saved successfully';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }
                        $('#output').text(errorMessage).css('color', 'red');
                        $('#details')[0].reset();
                        $('html, body').animate({
                            scrollTop: 0
                        }, 100);
                    }
                })

            })
        })
    </script>

</body>

</html>