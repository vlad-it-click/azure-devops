<?php
// Get system information
$hostname = gethostname();
$ip_address = $_SERVER['SERVER_ADDR'] ?? gethostbyname($hostname);
$username = get_current_user();
$current_date = date('Y-m-d H:i:s');

// Additional system information
$os = PHP_OS;
$server_software = $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown';
$php_version = PHP_VERSION;
$memory_usage = memory_get_usage(true) / 1024 / 1024; // Convert to MB
?>

<!DOCTYPE html>
<html>
<head>
    <title>Web Server System Information</title>
    <meta http-equiv="refresh" content="60"> <!-- Auto refresh every 60 seconds -->
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
            display: flex;
            align-items: center;
        }
        .label {
            font-weight: bold;
            color: #333;
            width: 180px;
            flex-shrink: 0;
        }
        .value {
            color: #666;
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
        .timestamp {
            font-size: 0.8em;
            color: #888;
            text-align: right;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="info-container">
        <h1>System Information</h1>
        
        <div class="info-item">
            <span class="label">Hostname:</span>
            <span class="value"><?php echo htmlspecialchars($hostname); ?></span>
        </div>
        
        <div class="info-item">
            <span class="label">IP Address:</span>
            <span class="value"><?php echo htmlspecialchars($ip_address); ?></span>
        </div>
        
        <div class="info-item">
            <span class="label">Username:</span>
            <span class="value"><?php echo htmlspecialchars($username); ?></span>
        </div>
        
        <div class="info-item">
            <span class="label">Current Date:</span>
            <span class="value"><?php echo htmlspecialchars($current_date); ?></span>
        </div>
        
        <div class="info-item">
            <span class="label">Operating System:</span>
            <span class="value"><?php echo htmlspecialchars($os); ?></span>
        </div>
        
        <div class="info-item">
            <span class="label">Web Server:</span>
            <span class="value"><?php echo htmlspecialchars($server_software); ?></span>
        </div>
        
        <div class="info-item">
            <span class="label">PHP Version:</span>
            <span class="value"><?php echo htmlspecialchars($php_version); ?></span>
        </div>
        
        <div class="info-item">
            <span class="label">Memory Usage:</span>
            <span class="value"><?php echo number_format($memory_usage, 2); ?> MB</span>
        </div>

        <button class="refresh-btn" onclick="window.location.reload()">Refresh Data</button>
        
        <div class="timestamp">
            Last updated: <?php echo htmlspecialchars($current_date); ?>
        </div>
    </div>

    <script>
        // Update the current time every second
        setInterval(function() {
            const now = new Date();
            const formattedDate = now.toISOString().slice(0, 19).replace('T', ' ');
            document.querySelector('.timestamp').textContent = 'Last updated: ' + formattedDate;
        }, 1000);
    </script>
</body>
</html>