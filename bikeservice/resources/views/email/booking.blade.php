<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
</head>
<body>
<h1>Booking Confirmation</h1>
<p>Thank you for booking our service. Here are the details:</p>

<p><strong>Model:</strong> {{ $booking->model }}</p>
<p><strong>Body:</strong> {{ $booking->body }}</p>
<h2>Services</h2>
@if($booking->option1!=null){{ $booking->option1 }}<br>@endif
@if($booking->option2!=null){{ $booking->option2 }}<br>@endif
@if($booking->option3!=null){{ $booking->option3 }}<br>@endif
<p><strong>Date:</strong> {{ $booking->date }}</p>
</body>
</html>
