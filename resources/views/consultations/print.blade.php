<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Demo in Laravel 7</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  </head>
  <body>
    <div class="jumbotron">
      <h1 class="display-4">Consultation</h1>
      <p class="lead">Patient: {{ $consultation->patient->firstname }} {{ $consultation->patient->lastname }}</p>
      <hr class="my-4">
      <p>Diagnostic:</p><br>
      <p>{{ $consultation->diagnostic }}</p>
      <p class="lead">
      </p>
    </div>
  </body>
</html>