@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="row login">
        <div class="input-field col s12">
            <input type="email" class="validate" id="email"/>
            <label for="email" data-error="Invalid e-mail">Email</label>
        </div>
        <div class="input-field col s12">
            <input type="password" class="validate" id="password"/>
            <label for="password">Password</label>
        </div>
        <div>
            <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                <i class="material-icons right">send</i>
            </button>
        </div>
    </div>
@endsection