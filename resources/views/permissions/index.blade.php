
<!-- header -->
@include('../layouts/header')

<main class="main-content bgc-grey-100">
   <!-- Main -->
    <div id="mainContent">
           
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Permission Management</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('permissions.create') }}"> Create New Permission</a> 
                        </div>
                    </div>
                </div>
                
                
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                
                
                <table class="table table-bordered">
                  <tr>
                     <th>No</th>
                     <th>Name</th>
                     <th width="280px">Action</th>
                  </tr>
                    @foreach ($permissions as $key => $permission)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>
                            {!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $permission->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </table>
                
                
                {!! $permissions->render() !!}
                
             </div>
    </div>
 </main>
 @include('../layouts/footer')