<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fulfill Prescription - MyHealth</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* --- General Setup --- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f4f7f6;
            color: #333;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 30px;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .page-header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #eee;
            padding-bottom: 15px;
        }

        .page-header h1 {
            color: #007bff;
            font-size: 30px;
            margin-bottom: 10px;
        }

        /* --- Prescription Card List --- */
        .prescription-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .prescription-card {
            background-color: #f8fafd; /* Very light blue background */
            padding: 20px;
            border-radius: 8px;
            border-left: 5px solid #007bff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s;
        }

        .prescription-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
        }

        .details {
            flex-grow: 1;
        }
        
        .details h3 {
            margin-top: 0;
            color: #2c3e50;
            font-size: 20px;
            margin-bottom: 5px;
        }

        .details p {
            font-size: 14px;
            color: #666;
            margin: 3px 0;
        }

        .status-tag {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: bold;
            margin-top: 10px;
        }
        
        .status-tag.active {
            background-color: #d4edda;
            color: #155724; /* Green */
        }
        
        .status-tag.expired {
            background-color: #f8d7da;
            color: #721c24; /* Red */
        }

        /* --- Action Button --- */
        .action-area {
            text-align: right;
            padding-left: 20px;
        }

        .fulfill-btn {
            background-color: #28a745; /* Green */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-bottom: 10px;
        }

        .fulfill-btn:hover {
            background-color: #218838;
        }
        
        .view-btn {
            background: none;
            border: none;
            color: #007bff;
            cursor: pointer;
            font-size: 14px;
        }
        
        /* Mobile adjustments */
        @media (max-width: 600px) {
            .prescription-card {
                flex-direction: column;
                align-items: flex-start;
            }
            .action-area {
                width: 100%;
                text-align: left;
                padding-left: 0;
                margin-top: 15px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="page-header">
            <h1>My Active E-Prescriptions <i class="fas fa-file-prescription"></i></h1>
            <p>Select a prescription below to send your medicine order to the affiliated pharmacy.</p>
        </div>

        <div class="prescription-list">
            
            <div class="prescription-card">
                <div class="details">
                    <h3>Treatment for Recurring Headaches</h3>
                    <p><strong>Issued by:</strong> Dr. Ram Sharma (Cardiologist)</p>
                    <p><strong>Issued on:</strong> 2025-11-30 | Valid until: 2026-02-28</p>
                    <span class="status-tag active">Active</span>
                </div>
                <div class="action-area">
                    <button class="fulfill-btn"><i class="fas fa-paper-plane"></i> Send to Pharmacy</button>
                    <button class="view-btn"><i class="fas fa-search"></i> View Prescription</button>
                </div>
            </div>

            <div class="prescription-card">
                <div class="details">
                    <h3>Asthma Follow-up Medication</h3>
                    <p><strong>Issued by:</strong> Dr. Suman KC (General Physician)</p>
                    <p><strong>Issued on:</strong> 2025-08-15 | Valid until: 2025-11-15</p>
                    <span class="status-tag expired">Expired (Needs Renewal)</span>
                </div>
                <div class="action-area">
                    <button class="fulfill-btn" disabled style="background-color: #ccc; cursor: not-allowed;"><i class="fas fa-paper-plane"></i> Cannot Order</button>
                    <button class="view-btn"><i class="fas fa-search"></i> View Prescription</button>
                </div>
            </div>
            
            <div class="prescription-card">
                <div class="details">
                    <h3>Vitamin D Supplement Refill</h3>
                    <p><strong>Issued by:</strong> Dr. Ram Sharma (Cardiologist)</p>
                    <p><strong>Issued on:</strong> 2025-11-01 | Valid until: 2026-01-31</p>
                    <span class="status-tag active">Active (Refill Available)</span>
                </div>
                <div class="action-area">
                    <button class="fulfill-btn"><i class="fas fa-paper-plane"></i> Send to Pharmacy</button>
                    <button class="view-btn"><i class="fas fa-search"></i> View Prescription</button>
                </div>
            </div>

        </div>
    </div>

</body>
</html>
