@extends('layout.app')
@section('content')


<div class="container" style="margin-bottom: 5%">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Mazzuma MOMO API</h3>
                </div>
               
                <div class="card-body">
                    <!-- Form validation with parsley js and regex -->
                    <form action='momo' method='POST' class='login-form' data-parsley-validate id="myFormID">
                        @csrf
                        <div class="form-group">
                            <label class="small mb-1">Sender's Number</label>
                            <input class="form-control py-4" type="tel" placeholder="Enter sender's number" name='sender_number' data-parsley-pattern="^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$"  data-parsley-required="true" data-parsley-trigger="keyup"  data-parsley-maxlength="13" autofocus/>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1">Recipient's Number</label>
                            <input class="form-control py-4" type="tel" placeholder="Enter sender's number" name='recipient_number' data-parsley-pattern="^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$" data-parsley-required="true" data-parsley-trigger="keyup" data-parsley-maxlength="13"/>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1">Price of Item</label>
                            <input class="form-control py-4" type="number" placeholder="Enter price" name='price' data-parsley-required="true" data-parsley-trigger="keyup" />
                        </div>

                        <input class="form-control py-4" type="hidden" placeholder="Enter price" name='orderID' id="orderID" />

                        {{-- <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Sender's Network</label>
                                <select class="custom-select mr-sm-2" id="sex" data-parsley-trigger="keyup" name='sender_network' required>
                                    <option value="">Choose...</option>
                                    <option value="mtn">MTN</option>
                                    <option value="airtel">Airtel/Tigo</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Recipient's Network</label>
                                <select class="custom-select mr-sm-2" data-parsley-trigger="keyup" name='recipient_network' required>
                                    <option value="">Choose...</option>
                                    <option value="mtn">MTN</option>
                                    <option value="airtel">Airtel/Tigo</option>
                                </select>
                            </div>
                        </div> --}}

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


