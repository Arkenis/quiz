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
                    <p class="pull-right">Gatnaşan okuwçy: {{ $test->getName() }}</p>
                    <hr>
                  </div>

                  <div class="panel-body">
                    <div class="col-md-4 center-margin" style="float:none">
                      <div class="col-md-7 b-grey b-r">
                        <p class="hinted-text text-left p-t-15 p-b-t-15">Bahasy:
                          <br>{{ (100 / $test->results->count()) * $test->score }} / {{ (100) }}</p>
                      </div>
                      <div class="col-md-5">
                        <p class="hinted-text text-left p-t-15 p-b-t-15 p-l-10">
                          Dogry : {{ $test->score }}
                          <br>Ýalňyş: {{ $test->results->count() - $test->score }}</p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-10">
                        @foreach($quiz->questions as $i => $question)
                        <?php if ( ! in_array($question->id, array_pluck($results, 'question_id'))) continue; ?>
                        <div class="form-group">
                          <div class="panel panel-transparent">
                            <div class="panel-heading">
                              <div class="panel-title">{!! ($i + 1) . ') ' . $question->text !!}</div>
                            </div>
                            <div class="panel-body">
                              <div class="row-fluid">

                                <div class="radio radio-success">
                                  @for ($j = 0; $j < sizeof($question->answers) / 4; $j += 1)
                                  @for ($k = 0; $k < 4 && (4 * $j + $k < sizeof($question->answers)); $k += 1)
                                  <div class="col-xs-12">
                                    <div class="checkbox check-{{ (array_key_exists($question->id, $qa) && ($qa[$question->id] == $question->answers[4 * $j + $k]->id) && ! $question->answers[4 * $j + $k]->correct ) ? 'danger' : 'success'  }}">
                                      <input disabled type="checkbox" id="{{ $question->answers[4 * $j + $k]->id }}" 
                                      {{ $question->answers[4 * $j + $k]->correct ? 'checked' : '' }}
                                      {{ (array_key_exists($question->id, $qa) && $qa[$question->id] == $question->answers[4 * $j + $k]->id) ? 'checked' : ''  }}>
                                      <label for="{{ $question->answers[4 * $j + $k]->id }}">{{ chr(65 + $k) . '. ' . $question->answers[4 * $j + $k]->text }}</label>
                                    </div>
                                  </div>
                                  @endfor
                                  @endfor
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        @endforeach
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


    <!-- END PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTAINER -->

@stop
@section('page_scripts')
    <script type="text/javascript">
        $('select').select2();
    </script>
@stop