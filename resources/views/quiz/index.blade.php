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
                        <a href="#" class="active">SYNAGLAR</a>
                    </li>
                </ul>
                <!-- END BREADCRUMB -->
            </div>

            <!-- END CONTAINER FLUID -->

            <!-- START CONTAINER FLUID -->
            <div class="container-fluid container-fixed-lg">
                <!-- START PANEL -->
                <div class="panel panel-transparent">
                    <div class="panel-heading">
                        <div class="panel-title">SYNAGLAR
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="panel-body">

                            <a href="{{ URL::route('quizzes.create') }}">
                                <button class="btn btn-success btn-cons m-b-10" type="button">
                                    <i class="fa fa-file-text-o"></i>
                                    <span class="bold">Synag döret</span>
                                </button>
                            </a>

                            <div class="table-responsive">
                                <div id="basicTable_wrapper" class="dataTables_wrapper form-inline no-footer">
                                  <table class="table table-hover dataTable no-footer" id="basicTable" role="grid">
                                    <thead>
                                    <tr role="row">
                                      <th style="width: 20%;" aria-controls="basicTable">#</th>
                                      <th style="width: 30%;" aria-controls="basicTable">Temasy</th>
                                      <th style="width: 30%;" aria-controls="basicTable">Mugallymy</th>
                                      <th style="width: 20%;" aria-controls="basicTable"></th>
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
                                            <p>{{ $quiz->getUser->name }}</p>
                                        </td>
                                        <td class="v-align-middle">
                                            <div class="btn-group">
                                                <a href="{{ URL::route('quizzes.edit', ['id' => $quiz->id]) }}">
                                                    <button type="button" class="btn btn-success">
                                                        <i class="fa fa-pencil"></i>
                                                    </button>
                                                </a>
                                            </div>
                                            <div class="btn-group">
                                                {!! Form::model($quiz, ['method' => 'DELETE', 'route' => ['quizzes.destroy', $quiz->id]]) !!}
                                                    <button type="submit" class="btn btn-success">
                                                      <i class="fa fa-trash"></i>
                                                    </button>
                                                  {!! Form::close() !!}
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


    <!-- END PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTAINER -->

@stop