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
        <h2>Registration form</h2>
        <form class="needs-validation" id="student_registration" method="POST" action="{{route('student.save')}}" novalidate>
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-6">
                <div class="mb-3 mt-3">
                    <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required>
                        <div class="invalid-feedback"> This field is required.</div>
                </div>
                <div class="mb-3 mt-3">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                    <div class="invalid-feedback"> This field is required.</div>
                </div>
                <div class="mb-3 mt-3">
                    <label for="phone">Phone:</label>
                    <input type="tel" class="form-control" id="phone" placeholder="Enter phone" name="phone" required>
                    <div class="invalid-feedback"> This field is required.</div>
                </div>

                <div class="mb-3 mt-3">
                    <label>Pick Choice:
                        <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" name="choice[]" value="hockey">Hockey</div>
                        <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" name="choice[]" value="football">Football</div>
                        <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" name="choice[]" value="cricket" >Cricket</div>
                    </label>
                </div>

                <div class="mb-3 mt-3">
                    <label>Gender:</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="1">
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="2">
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                </div>

                <div class="mb-3">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" auto-complete="false" name="pwd" required>
                    <div class="invalid-feedback"> This field is required.</div>
                </div>
                    <button type="submit" onclick="validateForm('student_registration')" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
    <script src="{{url('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{url('assets/js/custom.js')}}"></script>
    </body>
</html>

<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
  <label class="form-check-label" for="inlineCheckbox1">1</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
  <label class="form-check-label" for="inlineCheckbox2">2</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" disabled>
  <label class="form-check-label" for="inlineCheckbox3">3 (disabled)</label>
</div>