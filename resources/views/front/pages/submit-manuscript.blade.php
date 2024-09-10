<?php
use App\Models\Notice;
use App\Models\Manuscript;

?>
<section class="journal_layout_system">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="text-center">
                    <h1>Journal of Educare</h1>
                    <h3>Published by Department of Education</h3>
                </div>
            </div>
        </div><!--
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="about-left justify-content-center">
                    <h2><?= $page_header ?></h2>
                </div>
            </div>
        </div> -->
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="about-left">
                    <h2><?= $page_header ?></h2>
                    <a href="<?= url('/') ?>" class="achive">Recent</a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-12">
                @if (session('success_message'))
                    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show autohide"
                        role="alert">
                        {{ session('success_message') }}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif
                @if (session('error_message'))
                    <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show autohide"
                        role="alert">
                        {{ session('error_message') }}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif
            </div>

            <div class="col-md-8">
                <small class="text-danger">Star (*) marks fields are mandatory</small>
                <form class="row g-3" action="" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="col-md-6">


                        <div class="form-check form-check-inline">
                            <input class="form-check-input userType" checked type="radio" id="inlineCheckbox1"
                                name="userType" value="1">
                            <label class="form-check-label" for="inlineCheckbox1">Single Author</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input userType" type="radio" id="inlineCheckbox2" name="userType"
                                value="2">
                            <label class="form-check-label" for="inlineCheckbox2">Multiple Authors</label>
                        </div>



                    </div>
                    <div id="userDesc" class="row">
                        {{-- <div class="col-md-6">
                            <label for="author_name" class="form-label">Name <small
                                    class="text-danger">*</small></label>
                            <input type="text" class="form-control" id="author_name" name="author_name"
                                placeholder="Name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="author_designation" class="form-label">Designation <small
                                    class="text-danger">*</small></label>
                            <input type="text" class="form-control" id="author_designation" name="author_designation"
                                placeholder="Designation" required>
                        </div>
                        <div class="col-md-12">
                            <label for="author_affiliation" class="form-label">Affiliation <small
                                    class="text-danger">*</small></label>
                            <input type="text" class="form-control" id="author_affiliation" name="author_affiliation"
                                placeholder="Affiliation" required>
                        </div>
                        <div class="col-md-6">
                            <label for="author_email" class="form-label">Email <small
                                    class="text-danger">*</small></label>
                            <input type="email" class="form-control" id="author_email" name="author_email"
                                placeholder="Email" required>
                        </div>
                        <div class="col-md-6">
                            <label for="author_phone" class="form-label">Mobile Number <small
                                    class="text-danger">*</small></label>
                            <input type="text" class="form-control" id="author_phone" name="author_phone"
                                placeholder="Mobile Number" required onkeypress="return isNumber(event)" maxlength="10"
                                minlength="10">
                        </div> --}}
                    </div>

                    <div class="col-md-12">
                        <label for="inputCity" class="form-label">Plagiarism Certificate</label>
                        <div class="input-group">
                            <input type="file" class="form-control" id="plagiarism_certificate"
                                name="plagiarism_certificate" accept=".pdf,.jpg,.jpeg,.png">
                            <label class="input-group-text" for="plagiarism_certificate">Upload</label><br>
                        </div>
                        <p id="errorMessage1" style="color: red;"></p>
                        <p id="successMessage1" style="color: green;"></p>
                        <p><span class="text-primary">Upload max 5mb and only pdf,jpg,jpeg,png files are allowed</span>
                        </p>
                    </div>
                    <div class="col-md-12">
                        <label for="inputCity" class="form-label">Manuscript <small
                                class="text-danger">*</small></label>
                        <div class="input-group">
                            <input type="file" class="form-control" id="manuscript_file" name="manuscript_file"
                                accept=".pdf,.doc,.docx,.odt" required>
                            <label class="input-group-text" for="manuscript_file">Upload</label><br>
                        </div>
                        <p id="errorMessage2" style="color: red;"></p>
                        <p id="successMessage2" style="color: green;"></p>
                        <p><span class="text-primary">Upload max 5mb and only docs are allowed</span></p>
                    </div>
                    <div class="col-md-12">
                        <label for="inputCity" class="form-label">Payment Receipt</label>
                        <div class="input-group">
                            <input type="file" class="form-control" id="payment_receipt" name="payment_receipt"
                                accept=".pdf,.jpg,.jpeg,.png">
                            <label class="input-group-text" for="payment_receipt">Upload</label><br>
                        </div>
                        <p id="errorMessage3" style="color: red;"></p>
                        <p id="successMessage3" style="color: green;"></p>
                        <p><span class="text-primary">Upload max 5mb and only pdf,jpg,jpeg,png files are allowed</span>
                        </p>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }

    document.getElementById('plagiarism_certificate').addEventListener('change', function() {
        const fileInput = this;
        const file = fileInput.files[0];
        const errorMessage = document.getElementById('errorMessage1');
        const successMessage = document.getElementById('successMessage1');

        // Clear previous messages
        errorMessage.textContent = '';
        successMessage.textContent = '';

        if (file) {
            // Validate file extension
            const allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'pdf']; // Allowed extensions
            const fileExtension = file.name.split('.').pop().toLowerCase();

            if (!allowedExtensions.includes(fileExtension)) {
                errorMessage.textContent = `Invalid file type. Allowed types: ${allowedExtensions.join(', ')}`;
                fileInput.value = ''; // Clear the input to prevent submission of invalid file
                return;
            }

            // Validate file size (e.g., 2MB limit)
            const maxSizeInBytes = 5 * 1024 * 1024; // 2MB
            if (file.size > maxSizeInBytes) {
                errorMessage.textContent = 'File size exceeds 5MB limit.';
                fileInput.value = ''; // Clear the input to prevent submission of invalid file
                return;
            }

            // If validation passes
            successMessage.textContent = 'File is valid and ready for upload!';
        }
    });
    document.getElementById('manuscript_file').addEventListener('change', function() {
        const fileInput = this;
        const file = fileInput.files[0];
        const errorMessage = document.getElementById('errorMessage2');
        const successMessage = document.getElementById('successMessage2');

        // Clear previous messages
        errorMessage.textContent = '';
        successMessage.textContent = '';

        if (file) {
            // Validate file extension
            const allowedExtensions = ['doc', 'docx']; // Allowed extensions
            const fileExtension = file.name.split('.').pop().toLowerCase();

            if (!allowedExtensions.includes(fileExtension)) {
                errorMessage.textContent = `Invalid file type. Allowed types: ${allowedExtensions.join(', ')}`;
                fileInput.value = ''; // Clear the input to prevent submission of invalid file
                return;
            }

            // Validate file size (e.g., 2MB limit)
            const maxSizeInBytes = 5 * 1024 * 1024; // 2MB
            if (file.size > maxSizeInBytes) {
                errorMessage.textContent = 'File size exceeds 5MB limit.';
                fileInput.value = ''; // Clear the input to prevent submission of invalid file
                return;
            }

            // If validation passes
            successMessage.textContent = 'File is valid and ready for upload!';
        }
    });
    document.getElementById('payment_receipt').addEventListener('change', function() {
        const fileInput = this;
        const file = fileInput.files[0];
        const errorMessage = document.getElementById('errorMessage3');
        const successMessage = document.getElementById('successMessage3');

        // Clear previous messages
        errorMessage.textContent = '';
        successMessage.textContent = '';

        if (file) {
            // Validate file extension
            const allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'pdf']; // Allowed extensions
            const fileExtension = file.name.split('.').pop().toLowerCase();

            if (!allowedExtensions.includes(fileExtension)) {
                errorMessage.textContent = `Invalid file type. Allowed types: ${allowedExtensions.join(', ')}`;
                fileInput.value = ''; // Clear the input to prevent submission of invalid file
                return;
            }

            // Validate file size (e.g., 2MB limit)
            const maxSizeInBytes = 5 * 1024 * 1024; // 2MB
            if (file.size > maxSizeInBytes) {
                errorMessage.textContent = 'File size exceeds 5MB limit.';
                fileInput.value = ''; // Clear the input to prevent submission of invalid file
                return;
            }

            // If validation passes
            successMessage.textContent = 'File is valid and ready for upload!';
        }
    });



    // userType select

    function handeleMultiUsers(userType) {
        let maxLoop = userType === '2' ? 3 : 1
        var userDesc = document.getElementById('userDesc');
        userDesc.innerHTML = ''; // Clear existing fields
        let html = '';

        // Loop to add the same HTML structure three times with indexed IDs
        for (let i = 1; i <= maxLoop; i++) {
            html += `
    <div class="my-3 h5 author"> Author ${i} </div>
    <div class="col-md-6">
        <label for="author_name_${i}" class="form-label">
            Name ${i <= 2 ? '<small class="text-danger">*</small>' : ''}
        </label>
        <input type="text" class="form-control" id="author_name_${i}" name="author_name[]" placeholder="Name" ${i <= 2 ? 'required' : ''}>
    </div>
    <div class="col-md-6">
        <label for="author_designation_${i}" class="form-label">
            Designation ${i <= 2 ? '<small class="text-danger">*</small>' : ''}
        </label>
        <input type="text" class="form-control" id="author_designation_${i}" name="author_designation[]" placeholder="Designation" ${i <= 2 ? 'required' : ''}>
    </div>
    <div class="col-md-12">
        <label for="author_affiliation_${i}" class="form-label">
            Affiliation ${i <= 2 ? '<small class="text-danger">*</small>' : ''}
        </label>
        <input type="text" class="form-control" id="author_affiliation_${i}" name="author_affiliation[]" placeholder="Affiliation" ${i <= 2 ? 'required' : ''}>
    </div>
    <div class="col-md-6">
        <label for="author_email_${i}" class="form-label">
            Email ${i <= 2 ? '<small class="text-danger">*</small>' : ''}
        </label>
        <input type="email" class="form-control" id="author_email_${i}" name="author_email[]" placeholder="Email" ${i <= 2 ? 'required' : ''}>
    </div>
    <div class="col-md-6">
        <label for="author_phone_${i}" class="form-label">
            Mobile Number ${i <= 2 ? '<small class="text-danger">*</small>' : ''}
        </label>
        <input type="text" class="form-control" id="author_phone_${i}" name="author_phone[]" placeholder="Mobile Number" ${i <= 2 ? 'required' : ''} onkeypress="return isNumber(event)" maxlength="10" minlength="10">
    </div>
    `;
        }
        userDesc.innerHTML += html;
    }

    document.addEventListener('DOMContentLoaded', function() {
        handeleMultiUsers(1);
    });


    // Get all elements with the class 'userType'
    var userTypeElements = document.getElementsByClassName('userType');

    // Loop through each element and add an event listener
    for (var i = 0; i < userTypeElements.length; i++) {
        userTypeElements[i].addEventListener('change', function() {

            var selectedValue = this.value;
            handeleMultiUsers(selectedValue);
        });
    }
</script>
