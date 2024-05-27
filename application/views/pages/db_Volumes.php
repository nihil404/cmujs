<!DOCTYPE html>
<html>
<head>
    <title>List of Volumes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        .table {
            background-color: #ffffff;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .table thead {
            background-color: green;
            color: #e6b400 ;
        }
        .table thead th {
            border: none;
            font-size: 12px !important;
            color:#e6b400  !important; /* Adjusted font size */
        }
        .table tbody tr {
            transition: background-color 0.2s ease-in-out;
            font-size: 12px !important;
        }
        .table tbody tr:hover {
            background-color: #f1f1f1;
        }
        .btn-create {
            background-color: green; /* Green */
            color: #e6b400;
        }
        .btn-create:hover {
            background-color: #388E3C; /* Darker Green */
        }
        .btn-edit {
            background-color: #007bff; /* Blue */
            color: #ffffff;
        }
        .btn-edit:hover {
            background-color: #0056b3; /* Darker Blue */
        }
        .btn-delete {
            background-color: #dc3545; /* Red */
            color: #ffffff;
        }
        .btn-delete:hover {
            background-color: #c82333; /* Darker Red */
        }
    </style>
</head>
<body>
    <div class="container">
    <h5 class="mb-4" style="text-align:center;">List of Volumes</h5>
    <a href="<?php echo base_url('volume/db_createVolumes'); ?>" class="btn btn-create" style="color:#e6b400; font-size:13px;">Create New Volume</a>
        <div style="height:10px"></div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Volume Name</th>
                    <th>Status</th>
                    
                    <th>Description</th>
                    <th>Date Created</th>
                    <th>Date Published</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($volumes as $volume): ?>
                    <tr>
                        
                        <td><?php echo $volume->vol_name; ?></td>
                        <td>
                            <form action="<?php echo base_url('volume/toggle_published/' . $volume->volumeid); ?>" method="post">
                                <select name="published" onchange="this.form.submit()" class="form-control form-control-sm">
                                    <option value="1" <?php echo $volume->published ? 'selected' : ''; ?>>Published</option>
                                    <option value="0" <?php echo !$volume->published ? 'selected' : ''; ?>>Unpublished</option>
                                </select>
                            </form>
                        </td>
                        <td><?php echo $volume->description; ?></td>
                        <td><?php echo $volume->date_at; ?></td>
                        <td><?php echo $volume->date_published; ?></td>
                        <td>
    <a href="<?php echo base_url('volume/db_editVolume/' . $volume->volumeid); ?>" style="color: green;">Edit</a >
    <p>   </p>
    <a href="<?php echo base_url('volume/delete/' . $volume->volumeid); ?>" onclick="return confirm('Are you sure you want to delete this volume?')" style="color: red;">Delete</a>
</td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
