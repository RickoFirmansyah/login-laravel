@extends('layouts.app')

<link href="{{ asset('css/style-mprofile.css') }}" rel="stylesheet">
@section('content')
<div class="wrapper bg-white mt-sm-5">
    <h4 class="pb-4 border-bottom">Account settings</h4>
    <div class="d-flex align-items-start py-3 border-bottom">
        <img src="https://images.pexels.com/photos/1037995/pexels-photo-1037995.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
            class="img" alt="">
        <div class="pl-sm-4 pl-2" id="img-section">
            <b>Profile Photo</b>
            <form id="uploadForm" class="d-flex flex-column">
                <input type="file" id="fileInput" class="mb-2">
                <button type="button" class="btn btn-primary border"><b>Upload</b></button>
            </form>
        </div>
    </div>
    <div class="py-2">
        <form>
            <div class="row py-2">
                <div class="col-md-6">
                    <label for="firstname">First Name</label>
                    <input type="text" class="bg-light form-control" placeholder="Steve" id="firstname">
                </div>
                <div class="col-md-6 pt-md-0 pt-3">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="bg-light form-control" placeholder="Smith" id="lastname">
                </div>
            </div>
            <div class="row py-2">
                <div class="col-md-6">
                    <label for="email">Email Address</label>
                    <input type="email" class="bg-light form-control" placeholder="steve_@email.com" id="email">
                </div>
                <div class="col-md-6 pt-md-0 pt-3">
                    <label for="phone">Phone Number</label>
                    <input type="text" class="bg-light form-control" placeholder="+1 213-548-6015" id="phone">
                </div>
            </div>
            <div class="row py-2">
                <div class="col-md-6">
                    <label for="country">Country</label>
                    <select class="bg-light form-control" id="country">
                        <option value="India">India</option>
                        <option value="USA">USA</option>
                        <option value="UK">UK</option>
                        <option value="Canada">Canada</option>
                    </select>
                </div>
                <div class="col-md-6 pt-md-0 pt-3" id="lang">
                    <label for="language">Language</label>
                    <select class="bg-light form-control" id="language">
                        <option value="English">English</option>
                        <option value="Spanish">Spanish</option>
                        <option value="French">French</option>
                        <option value="German">German</option>
                    </select>
                </div>
            </div>
            <div class="py-3 pb-4 border-bottom">
                <button class="btn btn-primary mr-3">Save Changes</button>
                <button class="btn border button">Cancel</button>
            </div>
        </form>
    </div>
</div>

@endsection