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
            <div class="panel-title">Synagnamany üýtget</div>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-sm-10">
                {!! Form::open(['route' => ['quizzes.update', $quiz->id], 'method' => 'put', 'autocomplete' => 'off']) !!}
                  <div class="panel panel-default">
                    <div class="panel-body">
                      <div class="form-group">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="content-title m-t-10">
                              <p>Synagnamanyň ady / mowzugy</p>
                            </div>
                            <div>
                              {!! Form::text('subject', $quiz->subject, ['class' => 'form-control', 'placeholder' => 'Mysal: Pifagor teoremasy', 'id' => 'subject']) !!}
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  @foreach ($quiz->questions as $i => $question)
                  <div class="panel panel-default question">
                    <div class="panel-body">
                      <div class="form-group">
                        <div class="content-title m-t-10">
                          <p>Soraglar</p>
                        </div>

                        <div class="row">
                          <div class="col-xs-12">
                            <div class="input-title m-b-10">
                              <span class="bold"><span class="number">{{ $i + 1 }}. </span>Soragyň</span> teksti
                            </div>

                            <div class="m-b-20" >
                              {!! Form::text("questions[$question->id][text]", $question->text, ['class' => 'form-control']) !!}
                            </div>
                          </div>
                        </div>
                        <p>Jogaplar</p>

                        @foreach ($question->answers as $j => $answer)
                        <div class="form-group">
                          <label>{{ chr(65 + $j) }}.</label>
                          <span class="radio radio-success" style="display: inline;">
                            <input type="radio" {{ ($answer->correct) ? 'checked' : '' }}  value="{{ $answer->id }}" name="questions[{{ $question->id }}][correct_answer]" id="{{ $i }}-{{ $j }}">
                            <label for="{{ $i }}-{{ $j }}">Dogry jogap</label>
                          </span>
                          <input type="text" value="{{ $answer->text }}" name="questions[{{ $question->id }}][answers][{{$answer->id}}]" class="form-control" required>
                        </div>
                        @endforeach

                      </div>
                    </div>
                  </div>
                  @endforeach

                  <div class="row">
                    <div class="col-xs-12">
                      <button class="pull-right btn btn-success" type="submit">Üýtget</button>
                      <button type="button" href="#" class="btn btn-new-question pull-right" style="margin-right: 15px;">Täze sorag</button>
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
  var i = 2;

  $('.btn-new-question').click(function() {

//    question = $('.question:last').clone();

//    question.insertAfter($('.question:last'));

    $.get('/question', {
      question_number: i
    }).done(function(data) {
      $(data).insertAfter('.question:last');
      i++;

      //console.log(i);
    });
  });

</script>

@stop