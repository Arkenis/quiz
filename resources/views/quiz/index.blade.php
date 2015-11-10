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

      <div class="container-fluid container-fixed-lg bg-white">

        <div class="panel panel-transparent">
          <div class="panel-heading">
            <div class="btn-group pull-right m-b-10">
              @if ($user->type != 'examinee')
              <form action="{{ route('quizzes.create') }}">
                <button type="submit" class="btn btn-default">Soragnama döret</button>
              </a>
              @endif
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Settings</a>
                </li>
                <li><a href="#">Help</a>
                </li>
              </ul>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-hover dataTable no-footer" id="basicTable" role="grid">
                <thead>
                  <tr role="row">
                    <th style="width: 2%;">#</th>
                    <th style="width: 20%;">Temasy</th>
                    <th style="width: 20%;">Döreden</th>
                    <th style="width: 30%; text-align:right">
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
                  <td align="right">
                    <div class="btn-group">
                      @if (auth()->user()->isAdmin() || auth()->user()->isExaminer())
                      <a title="Üýtget" href="{{ route('quizzes.edit', $quiz->id) }}" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                      <a title="Poz" href="{{ route('quizzes.destroy', $quiz->id) }}" class="btn btn-success"><i class="fa fa-trash"></i></a>
                      @endif

                      <a title="Gatnaş/Gör" href="{{ route('quizzes.show', $quiz->id) }}" class="btn btn-success"><i class="fa fa-file-o"></i></a>
                      @if (auth()->user()->isAdmin() || auth()->user()->isExaminer())
                      <a title="Gatnaşanlar" href="{{ route('quizzes.examinees', $quiz->id) }}" class="btn btn-success"><i class="fa fa-users"></i></a>
                      @endif
                    </div>
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>

    </div>
    <!-- END PAGE CONTENT -->

    @include('partials.footer')

  </div>
  <!-- END PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTAINER -->

@stop