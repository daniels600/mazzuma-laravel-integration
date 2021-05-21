@extends('layout.app')
@section('content')


<div class="container" style="margin-bottom: 5%">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Validate Account</h3>
                </div>
               
                <div class="card-body">
                    <!-- Form validation with parsley js and regex -->
                    <form action='validateAccount' method='POST' class='login-form' data-parsley-validate>
                        @csrf
                        <div class="form-group">
                            <label class="small mb-1">User's Name</label>
                            <input class="form-control py-4" type="tel" placeholder="Enter sender's number" name='username' data-parsley-pattern="^[a-zA-Z ]*$"  data-parsley-required="true" data-parsley-trigger="keyup" autofocus/>
                        </div>

                        <div class="form-group d-flex align-items-center justify-content-between ">
                            <input class="btn btn-primary" name="submit" type="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection