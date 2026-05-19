<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bank Details</title>
    <style>
        /* Reset styles to ensure better email client compatibility */
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        /* Wrapper styles */
        .wrapper {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        /* Header styles */
        .header {
            background-color: #f4f4f4;
            padding: 10px;
            text-align: center;
        }
        /* Body styles */
        .body {
            padding: 20px 0;
        }
        /* Footer styles */
        .footer {
            text-align: center;
            font-size: 0.8em;
            color: #888;
        }
        /* Bank details section */
        .bank-details {
            border: 1px solid #ccc;
            padding: 15px;
            margin-bottom: 20px;
            background-color: #f9f9f9;
        }
        /* Bank details table */
        .bank-details table {
            width: 100%;
        }
        .bank-details table td {
            padding: 8px;
        }
        .bank-details table td:first-child {
            font-weight: bold;
            width: 40%;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <h2>New Bank Details Info</h2>
        </div>
        <div class="body">
            <p>Dear Admin,</p>
            <div class="bank-details">
                <p>Here are  bank details:</p>
                <table>
                    <tr>
                        <td>Bank Name:</td>
                        <td><?php echo $bank_name; ?></td>
                    </tr>
                    <tr>
                        <td>Account Number:</td>
                        <td><?php echo $ac_number; ?></td>
                    </tr>
                    <tr>
                        <td>IFSC Code:</td>
                        <td><?php echo $ifsc; ?></td>
                    </tr>
                    <tr>
                        <td>Branch Name:</td>
                        <td><?php echo $branch_name; ?></td>
                    </tr>
                    <!-- Add more details as needed -->
                </table>
            </div>
        </div>
        <div class="footer">
            <p></p>
        </div>
    </div>
</body>
</html>
