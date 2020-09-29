
<!-- header -->
@include('../layouts/header')

<main class="main-content bgc-grey-100">
   <!-- Main -->
    <div id="mainContent">
           
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Create New Role</h2>
                        </div>
                        <div class="pull-right">
                            
                        </div>
                    </div>
                </div>
                
                
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                
                
                {!! Form::open(array('route' => 'permissions.store','method'=>'POST')) !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Action:</strong>
                            <br/>
                            <select class="form-control form-control-sm" name="actions[]" id="actions" multiple>
                                @foreach ($actions as $action)
                                <option value="{{$action}}">{{$action}}</option>    
                            @endforeach
                              </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Model:</strong>
                            <br/>
                            <select class="form-control form-control-sm" name="model">
                                @foreach ($models as $model)
                                    <option value="{{$model}}">{{$model}}</option>    
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                {!! Form::close() !!}
             </div>
    </div>
 </main>
 @include('../layouts/footer')