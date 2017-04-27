@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="side-container">
    <div class="me-header">
        <img src="{{ URL::to('/img/default-photo-v2-45px.png') }}" alt="avatar-image" />

        <p>Emil Cerezo</p>
        <i>Online</i>
    </div>

    <div class="search">
        <input type="text" class="validate" placeholder="Search" />
    </div>
    </form>
</div>

<div class="me-thread-list">
    <ul >
        <!--                <li>-->
        <form class="col s12" action="">
            <div class=" col-s12">
                <!--                    <img src="{{ URL::to('/img/default-photo-45px.png') }}" alt="avatar-image" />-->
                <!--                    <p>Emil Cerezo</p>-->
                <!--                    <i>Online</i>-->
                <!--                </li>-->
    </ul>
</div>
</div>

<div class="chat-container">

    <div class="conversation-header">
        <div class="row">
            <div class="col s10">
                <img src="{{ URL::to('/img/default-photo-v2-45px.png') }}" alt="avatar-image" />
                <p>John Doe</p>
                <i>Online</i>
            </div>
            <div class="col s2"></div>
        </div>
    </div>

    <div class="conversation-body">
        <div class="conversation-thread">
            <div class="row">
                <div class="bubble other-bubble left">
                    <div class="left-arrow-bubble"></div>
                    <div class="conversation-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                    </div>
                </div>

                <div class="bubble me-bubble right">
                    <div class="right-arrow-bubble"></div>
                    <div class="conversation-content">
                        <p>Phasellus neque metus, malesuada non purus ut, aliquet fermentum arcu.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="conversation-textarea">
        <textarea placeholder="Type a message here"></textarea>
        <button> <i class="material-icons">send</i>
    </div>

</div>

@endsection