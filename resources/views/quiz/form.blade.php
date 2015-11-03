@extends('layout')

@section('page_content')

<!-- START PAGE-CONTAINER -->
<div class="page-container">

  @include('partials.header')

  <!-- START PAGE CONTENT WRAPPER -->
  <div class="page-content-wrapper">
    <!-- START PAGE CONTENT -->
    <div class="content">
      <!-- START CONTAINER FLUID -->
      <div class="container-fluid container-fixed-lg">
        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
          <li><a href="#">Synagnamalar</a></li>
          <li><a href="#" class="active">Täze synagnama döret</a></li>
        </ul>
        <!-- END BREADCRUMB -->

        @if (count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
          </ul>
        </div>
        @endif
      </div>

      <!-- END CONTAINER FLUID -->

      <!-- START CONTAINER FLUID -->
      <div class="container-fluid container-fixed-lg">
        <!-- START PANEL -->
        <div class="panel panel-transparent">
          <div class="panel-heading">
            <div class="panel-title">Täze synagnama döret
            </div>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-sm-10">
                {!! Form::open(['route' => 'quizzes.store', 'method' => 'post', 'autocomplete' => 'off']) !!}
                  <div class="panel panel-default">
                    <div class="panel-body">
                      <div class="form-group">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="content-title">
                              <p>Synagnamanyň ady / mowzugy</p>
                            </div>
                            <div>
                              {!! Form::text('subject', null, ['class' => 'form-control', 'placeholder' => 'Mysal: Pifagor teoremasy', 'id' => 'subject']) !!}
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="panel panel-default">
                    <div class="panel-body">
                      <div class="form-group">
                        <div class="content-title">
                          <p>Soraglar</p>
                        </div>

                        <div class="input-title">
                          <span class="bold">Menýudaky</span> ady
                        </div>
                        <div class="m-b-30" >
                          {!! Form::text("questions[]", null, ['class' => 'form-control']) !!}
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-xs-12">
                      <button class="pull-right btn btn-success" type="submit">Döret</button>
                    </div>
                  </div>

                {!! Form::close() !!}
              </div>
            </div>
          </div>
        </div>
        <!-- END PANEL -->
      </div>
      <!-- END CONTAINER FLUID -->
    </div>
    <!-- END PAGE CONTENT -->
    @include('partials.footer')
  </div>
  <!-- END PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTAINER -->

@stop

@section('page_scripts')

@stop