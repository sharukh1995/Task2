<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Customization</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="toolbar">
        <button onclick="toggleAllContainers()">Toggle All Containers</button>
        <button onclick="showHiddenContainers()">Show Hidden Containers</button>
    </div>
    <div class="container" id="container-list">
        <!-- Containers will be dynamically added here by PHP -->
        <?php include 'load_containers.php'; ?>
    </div>

    <div id="hidden-container-list" class="hidden-container-list"></div>

    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script src="scripts.js"></script>
</body>
</html>
