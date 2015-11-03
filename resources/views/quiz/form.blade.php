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
            <div class="panel-title">Täze synagnama döret</div>
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
                            <div class="content-title m-t-10">
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

                  <div class="panel panel-default question">
                    <div class="panel-body">
                      <div class="form-group">

                        <div class="content-title m-t-10">
                          <p>Soraglar</p>
                        </div>

                        <div class="row">
                          <div class="col-xs-11">

                            <div class="input-title m-b-10">
                              <span class="bold"><span class="number">1. </span>Soragyň</span> teksti
                            </div>

                            <div class="m-b-20" >
                              {!! Form::text("questions[]['text']", null, ['class' => 'form-control']) !!}
                            </div>
                          </div>
                          <div class="col-xs-1">
                            <div class="input-title m-b-10">
                              <span>&nbsp;</span>
                            </div>

                            <div class="m-b-20" >
                              <a href="#" class="btn-new-question">Täze sorag</a>
                            </div>

                          </div>
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

<script type="text/javascript">
  
  $('.btn-new-question').click(function() {

    question = $('.question:last').clone();

    question.insertAfter($('.question:last'));

  });

</script>

@stop