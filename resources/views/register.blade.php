<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{url('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    </head>
    <body>
    <div class="container mt-3">
        <!-- @if(session()->has('message'))
            <p class="alert alert-success" role="alert">{{ session()->get('message') }}</p>
        @endif -->
        
        <p class="alert alert-success d-none" role="alert" id='msg'> Inserted Successfully </p>

        <h2>Registration form</h2>
        <form class="needs-validation" id="student_registration" data-action="{{url('save-data')}}" enctype="multipart/form-data" novalidate>
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-6">
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required>
                        <div class="invalid-feedback"> This field is required.</div>
                        
                </div>
                <!-- @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror -->
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                    <div class="invalid-feedback"> This field is required.</div>
                </div>
                <!-- @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror -->
                <div class="mb-3 mt-3">
                    <label for="phone" class="form-label">Phone:</label>
                    <input type="tel" class="form-control" id="phone" placeholder="Enter phone" name="phone" required>
                    <div class="invalid-feedback"> This field is required.</div>
                </div>
                <!-- @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror -->
                <div class="mb-3 mt-3">
                    <label class="form-label">Pick Choice: </label>
                        <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" name="choice[]" value="hockey" id='choice1'><label for='choice1' class="form-label">Hockey</label></div>
                        <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" name="choice[]" value="football" id='choice2'><label for='choice2' class="form-label">Football</label></div>
                        <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" name="choice[]" value="cricket" id='choice3'><label for='choice3' class="form-label">Cricket</label></div>
                        <div class="invalid-feedback"> This field is required.</div>
                    </div>
                
                <!-- @error('choice')
                    <div class="text-danger">{{ $message }}</div>
                @enderror -->
                <div class="mb-3 mt-3">
                    <label class="form-label">Gender:</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="1" checked>
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="2">
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                </div>

                <div class="mb-3 mt-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter password" auto-complete="false" name="password" required>
                    <div class="invalid-feedback"> This field is required.</div>
                </div>
                <!-- @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror -->
                <div class="mb-3 mt-3">
                    <label for="images" class="form-label">Upload File</label>
                    <input class="form-control" type="file" accept=".jpeg,.png,.jpg," name="images[]" id="images" multiple>
                    <div class="invalid-feedback"> This field is required.</div>
                </div>
                <!-- @error('images')
                    <div class="text-danger">{{ $message }}</div>
                @enderror -->
                <div class="mb-3 mt-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
        <script src="{{url('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{url('assets/js/custom.js')}}"></script>
    </body>
</html>