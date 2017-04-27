@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="login">
    <div class="row z-depth-3">
        <div class="col s12">
            <div class="row">
                <div class="col s12">
                    <h5>SIGN IN</h5>
                </div>
                <form action="{{ route('validateUser')}}" id="validateUser" class="signin">
                    <div class="input-field col s12">
                        <input type="email" class="validate" id="email" name="email"/>
                        <label for="email" data-error="Invalid e-mail">Email</label>
                    </div>
                    <div class="input-field col s12 next-step" hidden="">

                    </div>
                    <div class="col s12">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Next
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="row registration">
                <div class="col s12">
                    <span>Not yet registered?</span>
                    <a href="">Register now.</a>
                </div>
            </div>
            <div class="row signin-footer">
                <div class="col s12">
                    <a href="">Help</a>
                    <a href="">Privacy</a>
                    <a href="">Terms and use</a>
                </div>
            </div>
        </div>

    </div>
</div>

<style>.container {background: #fff3e0}</style>
@endsection