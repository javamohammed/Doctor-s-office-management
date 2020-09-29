
<!-- header -->
@include('../layouts/header')

<main class="main-content bgc-grey-100">
   <!-- Main -->
    <div id="mainContent">
           
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Edit Role</h2>
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
                
                
                {!! Form::open(array('route' => ['roles.update', $role->id],'method'=>'POST')) !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            {!! Form::text('name', $role->name, array('placeholder' => 'Name','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Permission:</strong>
                            <br/>
                            @foreach($permission as $value)
                                <label>
                                    @if (array_key_exists($value->id, $rolePermissions))
                                        {{ Form::checkbox('permission[]', $value->id, true, array('class' => 'name')) }}
                                    @else
                                        {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                    @endif
                                    {{ $value->name }}
                                </label>
                                <br/>
                            @endforeach
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