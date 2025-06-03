@extends('front/layout')


@section('container')





    <div class="OrderDetails pt-3 pb-3">





        <div class="container">





            <div class="row">





                <div class="col-md-12">


                    @if (session()->has('message'))
                        <div class="alert alert-success">





                            {{ session()->get('message') }}





                        </div>
                    @endif





                    @if (session()->has('error'))
                        <div class="alert alert-danger">





                            {{ session()->get('error') }}





                        </div>
                    @endif





                    @if ($errors->any())
                        <div class="alert alert-danger">


                            <ul>


                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach


                            </ul>


                        </div>
                    @endif





               
                    
                                <div class="ContentInfo pt-4 pb-4">

    <h1 class="text-black font-weight-bolder text-uppercase">Change Password</h1>



  </div>


                    <form method="post" action="{{ route('front.updatePassword') }}">


                        @csrf


                        <div class="row">


                            <div class="col-md-12">


                                <div class="form-group">


                                    <label for="">Old Password</label>


                                    <input type="password" name="oldpass" class="form-control" value="{{ old('oldpass') }}">


                                </div>


                            </div>





                            <div class="col-md-12">


                                <div class="form-group">


                                    <label for="">New Password</label>


                                    <input type="text" name="newpass" class="form-control newpass"
                                        value="{{ old('newpass') }}">


                                    <button type="button" class="btn btn-warning GeneratePass">Generate Password</button>


                                </div>


                            </div>





                            <div class="col-md-12">


                                <div class="form-group">


                                    <label for="">Confirm Password</label>


                                    <input type="text" name="confirmpass" class="form-control confirmpass"
                                        value="{{ old('confirmpass') }}">


                                </div>


                            </div>





                            <div class="col-12">


                                <div class="form-group">


                                    <input type="hidden" name="id" value="{{ $userid }}">


                                    <button type="submit" class="btn btn-success">Update</button>


                                </div>


                            </div>








                        </div>


                    </form>


                </div>


            </div>


        </div>


    </div>





@endsection
