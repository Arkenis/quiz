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
                    <a href="#">Ulanyjylar</a>
                  </li>
                  <li>
                    <a href="#" class="active">Täze ulanyjy goş</a>
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
              <div class="panel panel-transparent">
                  <div class="panel-heading">
                    <div class="panel-title">Täze ulanyjy goş</div>
                  </div>

                  <div class="panel-body">
                    <div class="row">
                      <div class="col-sm-10">
                        @if (isset($user))
                        {!! Form::model($user, ['method' => 'PATCH', 'route' => ['users.update', $user->id]]) !!}
                        @else
                        {!! Form::open(['route' => 'users.store']) !!}
                        @endif
                          <div class="row clearfix">
                            <div class="col-sm-6">
                              <div class="form-group form-group-default form-group-default-select2 required">
                                <label class="">Görnüşi</label>
                                <select name="type" class="full-width" data-placeholder="Görnüş saýla" data-init-plugin="select2">
                                  <option></option>
                                  <option {{ (isset($user) && $user->type == 'examinee') ? 'selected' : '' }} value="examinee">Okuwçy</option>
                                  <option {{ (isset($user) && $user->type == 'examiner') ? 'selected' : '' }} value="examiner">Mugallym</option>
                                  <option {{ (isset($user) && $user->type == 'admin') ? 'selected' : '' }} value="admin">Admin</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group form-group-default required" aria-required="true">
                                    <label>Ady</label>
                                    {!! Form::text("name", null, ['class' => 'form-control', 'placeholder' => 'Ady']) !!}
                                </div>
                            </div>
                          </div>
                          <div class="row clearfix">
                            <div class="col-sm-6">
                              <div class="form-group form-group-default required" aria-required="true">
                                <label>Login</label>
                                {!! Form::text("username", null, ['class' => 'form-control', 'placeholder' => 'Login']) !!}
                              </div>
                            </div>
                          </div>
                          <div class="row clearfix">
                            <div class="col-sm-6">
                              <div class="form-group form-group-default required" aria-required="true">
                                <label>Parol</label>
                                {!! Form::text("password", "", ['class' => 'form-control', 'placeholder' => 'Parol']) !!}
                              </div>
                            </div>
                          </div>

                          <div>
                            {!! Form::submit('Submit',['class' => 'btn btn-primary']) !!}
                          </div>

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