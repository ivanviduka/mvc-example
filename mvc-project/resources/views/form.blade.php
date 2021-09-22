<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
    @include('common.errors')

    <!-- New Task Form -->
        <form action="/submit" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- Task Name -->
            <div class="form-group">
                <h2 for="contact" class="col-sm-3 control-label">Contact</h2>

                <div class="col-sm-6">
                    <label for="first-name">First Name:     </label>
                    <input type="text" id="first-name" name="firstname" class="form-control" required />
                </div>

                <div class="col-sm-6">
                    <label for="last-name">Last Name:   </label>
                    <input type="text" id="last-name" name="lastname" class="form-control" required />
                </div>

                <div class="col-sm-6">
                    <label for="phone-number">Phone number: </label>
                    <input type="tel" id="phone-number" pattern="[0-9]+" name="phone" class="form-control" required />
                </div>

                <div class="col-sm-6">
                    <label for="email">Email:   </label>
                    <input type="email" id="email" name="email" class="form-control" required />
                </div>

                <button type="submit" name="contact_login" >Save contact</button>
            </div>

        </form>
    </div>

    <form action="/contacts" method="GET" class="form-horizontal">
        {{ csrf_field() }}
        <button type="submit" name="contacts_display" >See contacts</button>
    </form>
@endsection
