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
          <li><a href="#">SORAGNAMALAR</a></li>
          <li><a href="#" class="active">SORAGNAMALAR</a></li>
        </ul>
        <!-- END BREADCRUMB -->
      </div>
      <!-- END CONTAINER FLUID -->

      <!-- START CONTAINER FLUID -->
      <div class="container-fluid container-fixed-lg">
        <!-- START PANEL -->
        <div class="panel panel-transparent">
          @if (Session::has('limit_reached'))
          <div class="alert alert-danger" role="alert">
            <button class="close" data-dismiss="alert"></button>
            wow wow wow cool down: 3 times only
          </div>
          @endif
          <div class="panel-heading">
            <div class="panel-title">SORAGNAMALAR
            </div>
          </div>
          <div class="panel-body">
            <div class="panel-body">
              @if ($user->type != 'examinee')
              <a href="{{ URL::route('quizzes.create') }}">
                <button class="btn btn-success btn-cons m-b-10" type="button">
                  <i class="fa fa-file-text-o"></i>
                  <span class="bold">Soragnama döret</span>
                </button>
              </a>
              @endif

              <div class="table-responsive">
                <div id="basicTable_wrapper" class="dataTables_wrapper form-inline no-footer">
                  <table class="table table-hover dataTable no-footer" id="basicTable" role="grid">
                    <thead>
                    <tr role="row">
                      <th style="width: 20%;">#</th>
                      <th style="width: 20%;">Temasy</th>
                      <th style="width: 20%;">Döreden</th>
                      <th style="width: 30%;">
                        @if (auth()->user()->isAdmin())
                          Üýtget/Poz/Gör/Gatnaşanlar
                        @elseif (auth()->user()->isExaminer())
                          Gör/Gatnaşanlar
                        @else
                          Gatnaş
                        @endif
                      </th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($quizzes as $quiz)
                    <tr role="row" class="odd">
                      <td class="v-align-middle">
                        <p>{{ $quiz->id }}</p>
                      </td>
                      <td class="v-align-middle">
                        <p>{{ $quiz->subject }}</p>
                      </td>
                      <td class="v-align-middle">
                        <p>{{ $quiz->user->name }}</p>
                      </td>
                      <td class="v-align-middle">
                        <div class="btn-group">
                          @if (auth()->user()->isAdmin())
                          <a title="Üýtget" href="{{ URL::route('quizzes.edit', $quiz->id) }}" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                          <a title="Poz" href="{{ URL::route('quizzes.destroy', $quiz->id) }}" class="btn btn-success"><i class="fa fa-trash"></i></a>
                          @endif
                          @if (auth()->user()->isExaminee() && auth()->user()->limitReached($quiz->id))
                          <a title="Gatnaş/Gör" href="{{ URL::route('quizzes.show', $quiz->id) }}" class="btn btn-success limit-reached"><i class="fa fa-file-o"></i></a>
                          @else
                          <a title="Gatnaş/Gör" href="{{ URL::route('quizzes.show', $quiz->id) }}" class="btn btn-success"><i class="fa fa-file-o"></i></a>
                          @endif
                          <a title="Gatnaşanlar" href="#" class="btn btn-success"><i class="fa fa-users"></i></a>
                        </div>
                      </td>
                    </tr>
                    </a>
                    @endforeach
                    </tbody>
                  </table>
                </div>
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
    <!-- END COPYRIGHT -->
  </div>
  <!-- END PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTAINER -->

@stop