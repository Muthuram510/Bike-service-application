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

<p><strong>Model:</strong> <?php echo e($booking->model); ?></p>
<p><strong>Body:</strong> <?php echo e($booking->body); ?></p>
<h2>Services</h2>
<?php if($booking->option1!=null): ?><?php echo e($booking->option1); ?><br><?php endif; ?>
<?php if($booking->option2!=null): ?><?php echo e($booking->option2); ?><br><?php endif; ?>
<?php if($booking->option3!=null): ?><?php echo e($booking->option3); ?><br><?php endif; ?>
<p><strong>Date:</strong> <?php echo e($booking->date); ?></p>
</body>
</html>
<?php /**PATH D:\bike service\Bike-service-application\bikeservice\resources\views/email/booking.blade.php ENDPATH**/ ?>