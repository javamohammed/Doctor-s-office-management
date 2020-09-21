
<!-- header -->
@include('../layouts/header')

<main class="main-content bgc-grey-100">
   <!-- Main -->
    <div id="mainContent">
           
            <div class="container-fluid">
                <h4 class="c-grey-900 mT-10 mB-30">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif</h4>
                <div class="row">
                   <div class="col-md-12">
                      <div class="bgc-white bd bdrs-3 p-20 mB-20">
                         <h4 class="c-grey-900 mB-20">All Patients</h4>
                         <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                               <tr>
                                  <th>First Name</th>
                                  <th>Last Name</th>
                                  <th>Birthday</th>
                                  <th>sex</th>
                                  <th>Address</th>
                                  <th>phone</th>
                                  <th>Email</th>
                                  <th>#</th>
                               </tr>
                            </thead>
                            <tfoot>
                               <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Birthday</th>
                                <th>sex</th>
                                <th>Address</th>
                                <th>phone</th>
                                <th>Email</th>
                                <th></th>
                               </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($patients as $patient)
                                    <tr>
                                        <td>{{$patient->firstname}}</td>
                                        <td>{{$patient->lastname}}</td>
                                        <td>{{$patient->birthday}}</td>
                                        <td>{{$patient->sex}}</td>
                                        <td>{{$patient->address}}</td>
                                        <td>{{$patient->phone}}</td>
                                        <td>{{$patient->email}}</td>
                                        <td>
                                            <a class="btn btn-outline-success" href="{{route('edit_patient', $patient->id)}}" >Edit</a>
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
 </main>

 @include('../layouts/footer')