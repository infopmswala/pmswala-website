<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>New Contact Information</title>
  <style>
    /* Style the email content */
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 20px;
    }
    .container {
      max-width: 600px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h1 {
      color: #333;
      text-align: center;
    }
    p {
      color: #555;
      line-height: 1.6;
    }
    .contact-details {
      background-color: #f9f9f9;
      padding: 15px;
      margin-top: 20px;
      border-radius: 6px;
    }
    .contact-details p {
      margin: 5px 0;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>New Contact Information</h1>
    <p>Hello,</p>
    <p>A new contact has provided their information. Here are the details:</p>
    
    <div class="contact-details">
      <p><strong>Name:</strong> <?php echo $name; ?></p>
      <p><strong>Email:</strong> <?php echo $email; ?></p>
      <p><strong>Phone:</strong> <?php echo $phone_no; ?></p>
      <p><strong>city:</strong> <?php echo $city; ?></p>
      <p><strong>country:</strong> <?php echo $country; ?></p>

      <p><strong>Message:</strong> <?php echo $message; ?></p>
    </div>
    
    <p>Thank you!</p>
    
   
  </div>
</body>
</html>
