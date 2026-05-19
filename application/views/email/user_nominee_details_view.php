<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nominee Details Submitted</title>
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
            <h2>Nominee Details Submitted</h2>
        </div>
        <div class="body">
            <p>Dear User,</p>
            <div class="confirmation">
                <p>Your nominee details have been successfully submitted. Thank you for providing the following information:</p>
                <table>
                    <tr>
                        <td>Nominee Name:</td>
                        <td><?php echo $nominee_name;?></td>
                    </tr>
                    <tr>
                        <td>Nominee Name:</td>
                        <td><?php echo $nominee_email;?></td>
                    </tr>
                    <tr>
                        <td>Contact Number:</td>
                        <td><?php echo $nominee_phone;?></td>
                    </tr>
                    <tr>
                        <td>ID Proof:</td>
                        <td><img src="<?php echo $nominee_id_proof;?>" alt="logo" height="100px"></td>
                    </tr>
                    <!-- Add more details as needed -->
                </table>
            </div>
            <p>We have recorded this information and will reach out if any further details are required.</p>
            <p>Thank you for providing this valuable information!</p>
            <p>Best regards,<br>[PMSWala Support Team]<br></p>
        </div>
        <div class="footer">
            <p></p>
        </div>
    </div>
</body>
</html>
