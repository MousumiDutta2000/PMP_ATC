@extends('layouts.side_nav')

@section('pageTitle', 'Add users')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
    <li class="breadcrumb-item" aria-current="page">Profiles</li>
    <li class="breadcrumb-item active" aria-current="page">Add User</li>
@endsection

@section('project_css')
<link rel="stylesheet" href="{{ asset('css/form.css') }}"> 
<link rel="stylesheet" href="{{ asset('css/profile_create_form.css') }}"> 
<style>
.strength-meter {
    height: 6px;
    margin-top: 10px;
    margin-bottom: 10px;
    border-radius: 4px;
}

.strength-1 {
    background-color: #ff5454;
}

.strength-2 {
    background-color: #ff9f1a;
}

.strength-3 {
    background-color: #ffda1a;
}

.strength-4 {
    background-color: #cbe75c;
}

.strength-5 {
    background-color: #5ce75c;
}

.container {
  white-space: nowrap; /* Prevents line break between the divs */
}

.profile-details,
.page-number {
  display: inline-block; /* Display divs inline */
  vertical-align: top;

}


</style>
@endsection 

@section('content')
    <div class="titlebar"></div>

    @if($errors->any())
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-container w-50">
        <div class="container">
            <div class="page-number text-secondary" id="page-number-1" style="text-align: right; float:right">Page 1 of 3</div>
        </div>
        <form method="post" action="{{ route('profiles.store') }}" enctype="multipart/form-data">
            @csrf
            <div id="section-1">
                <div class="profile-details">
                  <h5>Add Profile Details</h5>
                </div>
                
                <div class="row">
                    <div>
                        <div class="d-flex flex-column align-items-center">
                            <div class="image-preview mb-2">
                                <div class="circle-preview" id="circle-preview"></div>
                            </div>
                            <div class="d-flex">
                                <input type="file" name="image" accept="image/*" id="image" style="display: none" onchange="showFile(event)">
                                <label for="image" class="btn btn-secondary">
                                    <i class="bi bi-camera"></i> Choose Image
                                </label>
                            </div>
                            <div class="text-secondary text-xs mt-1">Click to add profile picture</div>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label for="profile_name" class="mb-1" style="font-size: 15px;">Name:</label>
                            <input type="text" name="profile_name" id="profile_name" class="form-control shadow-sm" placeholder="Enter name" value="{{ old('profile_name') }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="contact_number" class="mb-1" style="font-size: 15px;">Contact Number:</label>
                            <input type="text" class="form-control shadow-sm" name="contact_number" id="contact_number" placeholder="Enter contact number" required maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10)" style="color: #858585; font-size: 14px;">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email" class="mb-1" style="font-size: 15px;">Email:</label>
                            <input type="text" class="form-control shadow-sm" name="email" id="email" placeholder="Enter email id" required style="color: #858585; font-size: 14px;">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="work_location" class="mb-1" style="font-size: 15px;">Work Location:</label>
                            <input type="text" name="work_location" id="work_location" class="form-control shadow-sm" placeholder="Enter work location" required style="color: #858585; font-size: 14px;">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="work_address" class="mb-1" style="font-size: 15px;">Work Address:</label>
                            <input type="text" name="work_address" id="work_address" class="form-control shadow-sm" placeholder="Enter work address" required style="color: #858585; font-size: 14px;">
                        </div>
                    </div>
                </div>
                <div style="text-align: right;">
                    <button type="button" class="btn btn-primary" onclick="showSection(2)">Next</button>
                </div>
            </div>

            <div class="page-number" id="page-number-2" style="display: none; text-align: right; float:right">Page 2 of 3</div>
            <div id="section-2" style="display: none;">
            <div class="profile-details">
                <h5>Set Password</h5>
            </div>
                <div>
                    <div>
                        <div class="form-group">
                            <label for="password" class="mb-1" style="font-size: 15px; padding-top: 15px;">Password:</label>
                            <div class="input-group">
                                <input type="password" class="form-control shadow-sm" name="password" id="password" placeholder="Enter password" required style="color: #858585; font-size: 14px; height: 39px; border-radius: 4px" onselectstart="return false" onpaste="return false;" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off/>
                                <button class="btn btn-outline-secondary" type="button" id="toggle-password"><i class="fas fa-eye"></i></button>
                            </div>
                            <div class="mt-2" id="password-strength-meter" style="padding-top: 5px;"></div>
                        </div>
                    </div>
                    <div>
                        <div class="form-group" style="padding-top: 15px;">
                            <label for="confirm_password" class="mb-1" style="font-size: 15px;">Confirm Password:</label>
                            <div class="input-group">
                                <input type="password" class="form-control shadow-sm" name="confirm_password" id="confirm_password" placeholder="Confirm password" required style="color: #858585; font-size: 14px; height: 39px; border-radius: 4px" onselectstart="return false" onpaste="return false;" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off/>
                                <button class="btn btn-outline-secondary" type="button" id="toggle-confirm-password"><i class="fas fa-eye"></i></button>
                            </div>
                            <span id="password-mismatch" style="color: red; display: none;"><i class="fas fa-exclamation-circle"></i> Passwords do not match</span>
                        </div>
                    </div>
                    <div>
                        <div class="form-group form-check form-switch mt-4 mb-4">
                            <label class="form-check-label mt-2" for="is_admin" style="margin-left:10px;">Is Admin</label>
                            <input class="form-check-input" role="switch" type="checkbox" name="is_admin" id="is_admin" style="width: 4em; height: 2em;">
                        </div>
                    </div>
                </div>
                <div style="text-align: right;">
                    <button type="button" class="btn btn-primary" onclick="showSection(1)">Previous</button>
                    <button type="button" class="btn btn-primary" onclick="showSection(3)">Next</button>
                </div>
            </div>

            <div class="page-number" id="page-number-3" style="display: none; text-align: right; float:right">Page 3 of 3</div>
            <div id="section-3" style="display: none;">
                <div class="profile-details"> 
                    <h5>Addition Details</h5>
                </div>
                <div class="row">
                    <div class="col-md-6 pt-4" style="padding-right: 50px padding-left: 50px">
                        <div class="form-group">
                            <label for="father_name" class="mb-1" style="font-size: 15px;">Father's Name:</label>
                            <input type="text" name="father_name" id="father_name" class="form-control shadow-sm" placeholder="Enter father's name" required style="color: #858585; font-size: 14px;">
                        </div>
                    </div>
                    <div class="col-md-6 pt-4" style="padding-right: 50px padding-left: 50px">
                        <div class="form-group">
                            <label for="DOB" class="mb-1" style="font-size: 15px;">Date of Birth:</label>
                            <input type="date" name="DOB" id="DOB" class="form-control shadow-sm" required style="color: #858585; font-size: 14px;">
                        </div>
                    </div>
                    <div class="col-md-6 pt-4" style="padding-right: 50px padding-left: 50px">
                        <div class="form-group">
                            <label for="highest_educational_qualification_id" class="mb-1" style="font-size: 15px;">Highest Educational Qualification:</label>
                            <select name="highest_educational_qualification_id" id="highest_educational_qualification_id" class="form-control shadow-sm" required style="color: #858585; font-size: 14px;">
                                <option value="">Select Highest Educational Qualification</option>
                                @foreach($qualifications as $qualification)
                                    <option value="{{ $qualification->id }}">{{ $qualification->highest_education_value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 pt-4" style="padding-right: 50px padding-left: 50px">
                        <div class="form-group">
                            <label for="designation_id" class="mb-1" style="font-size: 15px;">Designation:</label>
                            <select name="designation_id" id="designation_id" class="form-control shadow-sm" required style="color: #858585; font-size: 14px;">
                                <option value="">Select Designation</option>
                                @foreach ($designations as $designation)
                                    <option value="{{ $designation->id }}">{{ $designation->level }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 pt-4" style="padding-right: 50px padding-left: 50px">
                        <div class="form-group">
                            <label for="line_manager_id" class="mb-1" style="font-size: 15px;">Line Manager:</label>
                            <select name="line_manager_id" id="line_manager_id" class="form-control shadow-sm" required style="color: #858585; font-size: 14px;">
                                <option value="">Select Line Manager</option>
                                @foreach ($lineManagers as $lineManager)
                                    <option value="{{ $lineManager->id }}">{{ $lineManager->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 pt-4" style="padding-right: 50px padding-left: 50px">
                        <div class="form-group">
                            <label for="vertical_id" class="mb-1" style="font-size: 15px;">Vertical:</label>
                            <select name="vertical_id" id="vertical_id" class="form-control shadow-sm" required style="color: #858585; font-size: 14px;">
                                <option value="">Select Vertical</option>
                                @foreach ($verticals as $vertical)
                                    <option value="{{ $vertical->id }}">{{ $vertical->vertical_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div style="text-align: right;">
                    <button type="button" class="btn btn-primary mt-4" onclick="showSection(2)">Previous</button>
                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('custom_js')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>
    <script src="{{ asset('js/side_highlight.js') }}"></script>
    <script>
        function showSection(sectionNumber) {
            document.getElementById('section-1').style.display = 'none';
            document.getElementById('section-2').style.display = 'none';
            document.getElementById('section-3').style.display = 'none';

            document.getElementById('page-number-1').style.display = 'none';
            document.getElementById('page-number-2').style.display = 'none';
            document.getElementById('page-number-3').style.display = 'none';

            if (sectionNumber === 1) {
                document.getElementById('section-1').style.display = 'block';
                document.getElementById('page-number-1').style.display = 'block';
            } else if (sectionNumber === 2) {
                document.getElementById('section-2').style.display = 'block';
                document.getElementById('page-number-2').style.display = 'block';
            } else if (sectionNumber === 3) {
                document.getElementById('section-3').style.display = 'block';
                document.getElementById('page-number-3').style.display = 'block';
            }
        }

        function showFile(event) {
            var file = event.target.files[0];
            var reader = new FileReader();

            reader.onload = function (e) {
                var circlePreview = document.getElementById("circle-preview");
                circlePreview.style.backgroundImage = `url(${e.target.result})`;
                circlePreview.style.backgroundSize = "cover";
                circlePreview.style.backgroundPosition = "center";
            };

            reader.readAsDataURL(file);
        }

        document.addEventListener('DOMContentLoaded', function () {
            const passwordInput = document.querySelector('#password');
            const confirmPasswordInput = document.querySelector('#confirm_password');
            const togglePassword = document.querySelector('#toggle-password');
            const toggleConfirmPassword = document.querySelector('#toggle-confirm-password');
            const passwordMismatch = document.querySelector('#password-mismatch');
            const passwordStrengthMeter = document.querySelector('#password-strength-meter');

            function togglePasswordVisibility(input, toggleButton) {
                const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                input.setAttribute('type', type);
                toggleButton.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
            }

            togglePassword.addEventListener('click', function () {
                togglePasswordVisibility(passwordInput, togglePassword);
            });

            toggleConfirmPassword.addEventListener('click', function () {
                togglePasswordVisibility(confirmPasswordInput, toggleConfirmPassword);
            });

            function checkPasswordMatch() {
                const password = passwordInput.value;
                const confirmPassword = confirmPasswordInput.value;
                if (password !== confirmPassword) {
                    passwordMismatch.style.display = 'inline';
                } else {
                    passwordMismatch.style.display = 'none';
                }
            }

            passwordInput.addEventListener('input', checkPasswordMatch);
            confirmPasswordInput.addEventListener('input', checkPasswordMatch);

            passwordInput.addEventListener('input', function () {
                const password = passwordInput.value;
                const passwordStrength = zxcvbn(password);
                const strengthMeter = passwordStrength.score + 1; // Adding 1 to match the CSS classes
                passwordStrengthMeter.className = `strength-meter strength-${strengthMeter}`;
                passwordStrengthMeter.innerHTML = getPasswordStrengthText(passwordStrength.score);
            });

            function getPasswordStrengthText(score) {
                const labels = ['Weak', 'Weak', 'Fair', 'Good', 'Strong'];
                return labels[score];
            }
            
        });

        
    </script>
@endsection
