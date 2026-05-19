<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bank Details Submitted</title>
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
        /* Confirmation message */
        .confirmation {
            border: 1px solid #ccc;
            padding: 15px;
            margin-bottom: 20px;
            background-color: #f9f9f9;
        }
        /* Confirmation details table */
        .confirmation table {
            width: 100%;
        }
        .confirmation table td {
            padding: 8px;
        }
        .confirmation table td:first-child {
            font-weight: bold;
            width: 40%;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <h2>Bank Details Submitted</h2>
        </div>
        <div class="body">
            <p>Dear User,</p>
            <div class="confirmation">
                <p>Your bank details have been successfully submitted. Thank you for providing the following information:</p>
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
            <p>We will review the provided information and get in touch if further verification or clarification is required.</p>
            <p>Thank you for choosing us!</p>
            <p>Best regards,<br>[PMSWala Support Team]<br></p>
        </div>
        <div class="footer">
            <p></p>
        </div>
    </div>
</body>
</html>
