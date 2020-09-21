
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
                         <h4 class="c-grey-900 mB-20">All Consultations</h4>
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
                            <tbody>
                              @foreach ($consultations as $consultation)
                                  <tr>
                                      <td>{{$consultation->patient->firstname}}</td>
                                      <td>{{$consultation->patient->lastname}}</td>
                                      <td>{{$consultation->patient->birthday}}</td>
                                      <td>{{$consultation->patient->sex}}</td>
                                      <td>{{$consultation->patient->address}}</td>
                                      <td>{{$consultation->patient->phone}}</td>
                                      <td>{{$consultation->patient->email}}</td>
                                      <td>
                                          <a class="btn btn-outline-success" href="{{route('edit_consultation', $consultation->id)}}" >Edit</a>
                                          <a class="btn btn-outline-info" href="{{route('print_consultation', $consultation->id)}}" >Print</a>
                                          <a class="btn btn-outline-secondary" href="{{route('order_consultation', $consultation->id)}}" >Order</a>
                                      </td>
                                  </tr>
                              @endforeach
                          </tbody>
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
                                
                            </tbody>
                         </table>
                      </div>
                   </div>
                </div>
             </div>
    </div>
 </main>

 @include('../layouts/footer')