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
          <li>
            <a href="#">SYNAGLAR</a>
          </li>
          <li>
            <a href="#" class="active">{{ $quiz->subject }}</a>
          </li>
        </ul>
        <!-- END BREADCRUMB -->
      </div>

      <!-- END CONTAINER FLUID -->

      <!-- START CONTAINER FLUID -->
      <div class="container-fluid container-fixed-lg">

        @if (count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

          <!-- START PANEL -->
          <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                  {{ $quiz->subject }}
                </div>
                <p class="pull-right">Sorag sany: {{ count($questions) }}</p>
                <hr>
            </div>

            <div class="panel-body">
              <div class="row">
                <div class="col-sm-10">
                  {!! Form::open(['route' => 'tests.store']) !!}

                  @foreach($questions as $i => $question)
                    <div class="form-group">
                      <div class="panel panel-transparent">
                        <div class="panel-heading">
                          <div class="panel-title">{{ ($i + 1) . '. ' . $question->text }}</div>
                        </div>
                        <div class="panel-body">
                          <div class="row-fluid">
                            <div class="radio radio-success">
                            @for ($j = 0; $j < sizeof($question->answers) / 4; $j += 1)
                            @for ($k = 0; $k < 4 && (4 * $j + $k < sizeof($question->answers)); $k += 1)
                              <div class="col-xs-12">
                                <input type="radio" value="{{ $question->answers[4 * $j + $k]->id }}" name="{{ $question->id }}" id="{{ $question->answers[4 * $j + $k]->id }}" aria-invalid="false">
                                <label for="{{ $question->answers[4 * $j + $k]->id }}">{{ $choices[$k] . '. ' . $question->answers[4 * $j + $k]->text }}</label>
                              </div>
                            @endfor
                            @endfor
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach

                  <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                  <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">

                  {!! Form::submit('Göýber', ['class' => 'btn btn-primary']) !!}

                  {!! Form::token() !!}

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

    <!-- START COPYRIGHT -->
    <!-- START CONTAINER FLUID -->
    <div class="container-fluid container-fixed-lg footer">
        <div class="copyright sm-text-center">
            <p class="small no-margin pull-left sm-pull-reset">
                <span class="hint-text">Copyright © 2015 </span>
                <span class="font-montserrat">Belgi Labs</span>.
                <span class="hint-text">All rights reserved. </span>
                <span class="sm-block"><a href="#" class="m-l-10 m-r-10">Terms of use</a> | <a href="#" class="m-l-10">Privacy Policy</a></span>
            </p>
            <p class="small no-margin pull-right sm-pull-reset">
                <a href="#">Hand-crafted</a> <span class="hint-text">&amp; Made with Love ®</span>
            </p>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- END COPYRIGHT -->
  </div>
  <!-- END PAGE CONTENT WRAPPER -->


  <!-- END PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTAINER -->

@stop
@section('page_scripts')
    <script type="text/javascript">
        $('select').select2();
    </script>
@stop