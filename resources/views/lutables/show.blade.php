@extends('layouts.master')

@section('content')
    <div class="container">

        <br> {{-- 
        <h1> Lu Tables </h1>
        <br> --}}

        <div class="row">
            <div class="col-3">
                @foreach ($tableNames as $tableName)
                    <a class="list-group-item" href='{{ url("lutables/$tableName") }}'> {{ $tableName }} </a>
                @endforeach
            </div>
            <div class="col-9">
                <h2> {{ $table }} </h2> <br>
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            @foreach ($columns as $col)
                                <th class="text-uppercase" @if (@$loop->first) style="width:50px;" @endif>
                                    {{$col}}
                                </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($records as $record)
                            <tr>
                                @foreach ($record as $val)
                                    <td>
                                        {{ $val }}
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection