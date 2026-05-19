<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Invoice</title>
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
    .invoice-details {
      background-color: #f9f9f9;
      padding: 15px;
      margin-top: 20px;
      border-radius: 6px;
    }
    .invoice-details p {
      margin: 5px 0;
    }
    .invoice-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    .invoice-table th, .invoice-table td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }
    .invoice-table th {
      background-color: #f2f2f2;
    }
    .total {
      margin-top: 20px;
      text-align: right;
    }
    .total p {
      margin: 5px 0;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Invoice</h1>
    <p>Dear [Recipient Name],</p>
    <p>Thank you for your business. Below is the invoice for your recent purchase:</p>
    
    <div class="invoice-details">
      <p><strong>Invoice Number:</strong> [Invoice Number]</p>
      <p><strong>Invoice Date:</strong> [Invoice Date]</p>
      <p><strong>Due Date:</strong> [Due Date]</p>
    </div>
    
    <table class="invoice-table">
      <tr>
        <th>Description</th>
        <th>Quantity</th>
        <th>Unit Price</th>
        <th>Total</th>
      </tr>
      <!-- Sample row, replace with your invoice items -->
      <tr>
        <td>Item 1</td>
        <td>2</td>
        <td>$50.00</td>
        <td>$100.00</td>
      </tr>
      <!-- More rows if needed -->
    </table>
    
    <div class="total">
      <p><strong>Total:</strong> [Total Amount]</p>
    </div>
    
    <p>Please ensure payment is made by the due date. If you have any questions regarding this invoice, feel free to contact us.</p>
    
    <p>Best regards,<br> [Your Company Name]</p>
  </div>
</body>
</html>
