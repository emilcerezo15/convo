@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="side-container">
        <div class="me-header">
            <img src="{{ URL::to('/img/default-photo.png') }}" alt="avatar-image" />
            <p>Emil Cerezo</p>
            <i>Online</i>
        </div>

        <div class="search">
            <form class="col s12" action="">
                <div class="input-field col-s12">
                    <input type="text" class="validate" />
                    <label for="icon_prefix">Search</label>
                </div>
            </form>
        </div>

        <div class="me-thread-list">
            <ul>
                <li>
                    <img src="{{ URL::to('/img/default-photo.png') }}" alt="avatar-image" />
                    <p>Emil Cerezo</p>
                    <i>Online</i>
                </li>
                <li>
                    <img src="{{ URL::to('/img/default-photo.png') }}" alt="avatar-image" />
                    <p>Emil Cerezo</p>
                    <i>Online</i>
                </li>
                <li>
                    <img src="{{ URL::to('/img/default-photo.png') }}" alt="avatar-image" />
                    <p>Emil Cerezo</p>
                    <i>Online</i>
                </li>
                <li>
                    <img src="{{ URL::to('/img/default-photo.png') }}" alt="avatar-image" />
                    <p>Emil Cerezo</p>
                    <i>Online</i>
                </li>
                <li>
                    <img src="{{ URL::to('/img/default-photo.png') }}" alt="avatar-image" />
                    <p>Emil Cerezo</p>
                    <i>Online</i>
                </li>
                <li>
                    <img src="{{ URL::to('/img/default-photo.png') }}" alt="avatar-image" />
                    <p>Emil Cerezo</p>
                    <i>Online</i>
                </li>
                <li>
                    <img src="{{ URL::to('/img/default-photo.png') }}" alt="avatar-image" />
                    <p>Emil Cerezo</p>
                    <i>Online</i>
                </li>
                <li>
                    <img src="{{ URL::to('/img/default-photo.png') }}" alt="avatar-image" />
                    <p>Emil Cerezo</p>
                    <i>Online</i>
                </li>
                <li>
                    <img src="{{ URL::to('/img/default-photo.png') }}" alt="avatar-image" />
                    <p>Emil Cerezo</p>
                    <i>Online</i>
                </li>
            </ul>
        </div>
    </div>

    <div class="chat-container">
        <div class="conversation-header">
            <img src="{{ URL::to('/img/default-photo.png') }}" alt="avatar-image" width="75px" />
            <p>John Doe</p>
            <i>Online</i>
        </div>
    </div>

@endsection