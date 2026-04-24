<?php
/**
 * LogHive - Database Connection Test
 * Use this to test database connection on cPanel
 * DELETE THIS FILE after testing!
 */

// Update these with your cPanel database credentials
$db_host = 'localhost';
$db_name = 'YOUR_DATABASE_NAME';  // e.g., username_loghive
$db_user = 'YOUR_DATABASE_USER';  // e.g., username_loghive_user
$db_pass = 'YOUR_DATABASE_PASSWORD';

echo "<!DOCTYPE html>
<html>
<head>
    <title>Database Connection Test</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 50px auto; padding: 20px; }
        .success { color: #28a745; font-weight: bold; }
        .error { color: #dc3545; font-weight: bold; }
        .info { background: #f8f9fa; padding: 15px; border-radius: 5px; margin: 20px 0; }
    </style>
</head>
<body>
    <h1>LogHive - Database Connection Test</h1>";

try {
    $dsn = "mysql:host={$db_host};dbname={$db_name};charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];
    
    $pdo = new PDO($dsn, $db_user, $db_pass, $options);
    
    echo "<div class='info'>";
    echo "<p class='success'>✅ Database connection successful!</p>";
    echo "<p><strong>Host:</strong> {$db_host}</p>";
    echo "<p><strong>Database:</strong> {$db_name}</p>";
    echo "<p><strong>User:</strong> {$db_user}</p>";
    
    // Test query
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM users");
    $result = $stmt->fetch();
    echo "<p><strong>Users in database:</strong> " . $result['count'] . "</p>";
    
    // Check tables
    $stmt = $pdo->query("SHOW TABLES");
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    echo "<p><strong>Tables found:</strong> " . count($tables) . "</p>";
    
    echo "</div>";
    echo "<p class='success'>✅ Your database configuration is correct!</p>";
    echo "<p><strong>⚠️ IMPORTANT:</strong> Delete this file after testing for security!</p>";
    
} catch (PDOException $e) {
    echo "<div class='info'>";
    echo "<p class='error'>❌ Connection Failed!</p>";
    echo "<p><strong>Error:</strong> " . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<p><strong>Common Issues:</strong></p>";
    echo "<ul>";
    echo "<li>Database name incorrect (include username prefix)</li>";
    echo "<li>Database user incorrect</li>";
    echo "<li>Password incorrect</li>";
    echo "<li>Database doesn't exist yet</li>";
    echo "<li>User doesn't have privileges</li>";
    echo "</ul>";
    echo "</div>";
}

echo "</body></html>";
?>

