<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">

        <h2> Your Contact is saved successfully!</h2>

    <!-- New Task Form -->
        <form action="/contacts" method="GET" class="form-horizontal">
        {{ csrf_field() }}
                <button type="submit" name="contacts_display" >See contacts</button>
        </form>

        <form action="/" method="GET" class="form-horizontal">
            {{ csrf_field() }}
            <button type="submit" name="contact_login" >Add new contacts</button>
        </form>
    </div>

@endsection
