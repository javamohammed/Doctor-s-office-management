
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
                         <h4 class="c-grey-900 mB-20">All Orders</h4>
                         <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                               <tr>
                                  <th>ID</th>
                                  <th>Date Order</th>
                                  <th>Consultation ID</th>
                                  <th>Patient</th>
                                  <th>Finish Order</th>
                               </tr>
                            </thead>
                            <tfoot>
                              <tr>
                                 <th>ID</th>
                                  <th>Date Order</th>
                                  <th>Consultation ID</th>
                                  <th>Patient</th>
                                  <th>Finish Order</th>
                              </tr>
                            </tfoot>
                            <tbody>
                              @foreach ($orders as $order)
                                  <tr>
                                      <td>{{ $order->id  }}</td>
                                      <td>{{ $order->date_order }}</td>
                                      <td>{{ $order->consultation->id }}</td>
                                      <td>{{ $order->consultation->patient->firstname }} {{ $order->consultation->patient->lastname }}</td>
                                      <td>
                                         @if (count($order->medicaments) > 0)
                                          <a class="btn btn-outline-success" href="{{route('print_set_medicaments', $order->id)}}" >Print Order</a>
                                         @else
                                          <a class="btn btn-outline-secondary" href="{{route('set_medicaments', $order->id)}}" >set Midecaments</a>
                                         @endif
                                         
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