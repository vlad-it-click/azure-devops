#!/usr/bin/env bash

# Get system information
HOSTNAME=$(hostname)
IP_ADDRESS=$(hostname -I | awk '{print $1}')
USERNAME=$(whoami)
CURRENT_DATE=$(date '+%Y-%m-%d %H:%M:%S')

# Print HTTP header
echo "Content-type: text/html"
echo ""

# Print HTML content
cat << HTML
<!DOCTYPE html>
<html>
<head>
    <title>System Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .info-container {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .info-item {
            margin: 15px 0;
            padding: 10px;
            border-bottom: 1px solid #eee;
        }
        .label {
            font-weight: bold;
            color: #333;
            display: inline-block;
            width: 120px;
        }
        .refresh-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
        }
        .refresh-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="info-container">
        <h1>System Information</h1>
        <div class="info-item">
            <span class="label">Hostname:</span>
            <span>${HOSTNAME}</span>
        </div>
        <div class="info-item">
            <span class="label">IP Address:</span>
            <span>${IP_ADDRESS}</span>
        </div>
        <div class="info-item">
            <span class="label">Username:</span>
            <span>${USERNAME}</span>
        </div>
        <div class="info-item">
            <span class="label">Current Date:</span>
            <span>${CURRENT_DATE}</span>
        </div>
        <button class="refresh-btn" onclick="window.location.reload()">Refresh Data</button>
    </div>
</body>
</html>
HTML