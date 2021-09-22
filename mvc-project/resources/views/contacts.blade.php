@extends('layouts.app')

@section('content')
    <!-- Current Tasks -->
    @if (count($contacts) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Contacts
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <!-- Task Name -->
                            <td class="table-text">
                                <div>{{ $contact->first_name }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $contact->last_name }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $contact->phone }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $contact->email }}</div>
                            </td>

                            <td>
                                <form action="/contact/{{ $contact->id }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button>Delete Contact</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

    <form action="/" method="GET" class="form-horizontal">
        {{ csrf_field() }}
        <button type="submit" name="contact_login" >Add new contacts</button>
    </form>
@endsection
