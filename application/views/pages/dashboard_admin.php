<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMU Journal of Science</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }
        .header {
            background-color: #8db600; /* Green */
            color: #fff;
            padding: 20px;
            width: 100%;
            text-align: center;
        }
        .content {
            background-color: #ffffcc; /* Yellow */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-top: 20px;
            width: 80%;
            max-width: 600px;
        }
        .content h5 {
            margin-top: 0;
            color: #333;
        }
        .content p {
            color: #555;
        }
        .card {
            background-color: #e6ffe6; /* Light Green */
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-title {
            color: #333;
            font-size: 20px;
            margin-bottom: 15px;
        }
        .card-text {
            color: #555;
            font-size: 18px;
        }
    </style>
</head>
<body>
    
<div class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Published Items</h5>
                    <p class="card-text"><?php echo $publishedCount; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Unpublished Items</h5>
                    <p class="card-text"><?php echo $unpublishedCount; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
