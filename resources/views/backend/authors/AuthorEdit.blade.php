@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Authors
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                <div class="panel-heading">Edit Author</div>

                <div class="panel-body">
                    @if ($errors->count() > 0)
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <form action="{{ route('authors.update', $author->id) }}" method="post">
                        <input type="hidden" name="_method" value="PUT">
                        {{ csrf_field() }}
                        First name:
                        <br />
                        <input type="text" name="first_name" value="{{ $author->first_name }}" />
                        <br /><br />
                        Last name:
                        <br />
                        <input type="text" name="last_name" value="{{ $author->last_name }}" />
                        <br /><br />
                        <input type="submit" value="Submit" class="btn btn-default" />
                    </form>
                </div>
            </div>
        </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection