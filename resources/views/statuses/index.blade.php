@extends('index', ['pageTitle' => '_camelUpper_casePlural_ &raquo; Index'])

@section('content')

    <div class="ui fluid container">
        <div class="row">
            <div class="ui four column grid">
                <div class="column">
                    <h1>Statuses</h1>
                </div>
                <div class="column right floated">
                    <div class="ui two column grid">
                        <div class="column">
                            {!! Form::open(['route' => 'statuses.search', 'class' => 'ui form']) !!}
                            <div class="field">
                                <input class="fluid" name="search" placeholder="Search">
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <div class="column">
                            <a class="ui button primary right floated" href="{!! route('statuses.create') !!}">Add New</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="column">
                @if ($statuses->isEmpty())
                <div class="raw-margin-top-24">
                    <div class="ui raised segment">
                        <p class="well center aligned">No statuses found.</p>
                    </div>
                </div>
                @else
                    <div class="raw-margin-top-24">
                        <table class="ui table striped">
                            <thead>
                                <th>Name</th>
                                <th width="250px" class="right aligned">Action</th>
                            </thead>
                            <tbody>
                            @foreach($statuses as $status)
                                <tr>
                                    <td>
                                        <a href="{!! route('statuses.edit', [$status->id]) !!}">{{ $status->name }}</a>
                                    </td>
                                    <td class="text-right">
                                        <form method="post" action="{!! route('statuses.destroy', [$status->id]) !!}">
                                            {!! csrf_field() !!}
                                            {!! method_field('DELETE') !!}
                                            <button class="ui button mini red right floated" type="submit" onclick="return confirm('Are you sure you want to delete this status?')"><i class="fa fa-trash"></i> Delete</button>
                                        </form>
                                        <a class="ui button mini primary right floated" href="{!! route('statuses.edit', [$status->id]) !!}"><i class="fa fa-pencil"></i> Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>

        <div class="row raw-margin-top-24">
            <div class="column center aligned">
                {{ $statuses }}
            </div>
        </div>
    </div>

@stop
