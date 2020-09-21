<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order #{{$order->id}}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  </head>
  <body>
    <div class="jumbotron">
      <h1 class="display-4">Order</h1>
      <p class="lead">Patient: {{ $order->consultation->patient->firstname }} {{ $order->consultation->patient->lastname }}</p>
      <hr class="my-4">
      <p>Medicaments:</p><br>
      @foreach ($order->medicaments as $medicament)
        <p>{{ $medicament->medicament->name }}</p>
        <p>{{ $medicament->description }}</p>
      @endforeach
      <p class="lead">
      </p>
    </div>
  </body>
</html>