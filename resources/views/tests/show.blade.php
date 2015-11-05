@extends('layout')

@section('page_content')
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
                      <a href="#">NETIJELER</a>
                  </li>
                  <li>
                      <a href="#" class="active">ELÝETERLI NETIJELER</a>
                  </li>
              </ul>
              <!-- END BREADCRUMB -->
          </div>
          <!-- END CONTAINER FLUID -->

          <!-- START CONTAINER FLUID -->
          <div class="container-fluid container-fixed-lg">
            <!-- START PANEL -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="test-result">
                        <tr>
                            <td>
                                <p>Okuwçy:</p>
                            </td>
                            <td>
                                <p>{{ $test->getName() }}</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Synag mowzugy:</p>
                            </td>
                            <td>
                                <p>{{ $test->quiz->subject }}</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Dogry/Ýalňyş:</p>
                            </td>
                            <td>
                                <p>{{ $test->score . '/' . (count($test->results) - $test->score)  }}</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Senesi</p>
                            </td>
                            <td>
                                <p>{{ $test->created_at->format('d/m/Y') }}</p>
                            </td>
                        </tr>
                        @foreach($test->results as $key => $result)
                          <tr>
                            <td>
                              <p>{{ $key + 1 }}</p>
                            </td>
                            <td>
                              <p>{{ $result->getAnswer->correct ? 'Dogry' : 'Ýalňyş' }}</p>
                            </td>
                          </tr>
                        @endforeach

                    </table>
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
@stop