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
          <li><a href="#">{{ $examinee->name }}</a></li>
          <li><a href="#" class="active">GATNAŞAN SYNAGLARY</a></li>
        </ul>
        <!-- END BREADCRUMB -->
      </div>
      <!-- END CONTAINER FLUID -->

      <div class="container-fluid container-fixed-lg bg-white">

        <div class="panel panel-transparent">
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr role="row">
                    <th style="width: 2%;">#</th>
                    <th style="width: 20%;">Synagnama</th>
                    <th style="width: 20%;">Bahasy</th>
                    <th style="width: 30%; text-align:right">Gör</th>
                  </tr>
                </thead>
                <tbody>

                @foreach ($tests as $key => $test)
                <tr role="row" class="odd">
                  <td class="v-align-middle">
                    <p>{{ $key + 1 }}</p>
                  </td>
                  <td class="v-align-middle">
                    <p>{{ $test->quiz->subject }}</p>
                  </td>
                  <td class="v-align-middle">
                    <p>{{ $test->score }}</p>
                  </td>
                  <td align="right">
                    <div class="btn-group">
                      <a title="Üýtget" href="{{ route('tests.show', $test->id) }}" class="btn btn-success"><i class="fa fa-eye"></i></a>
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