<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .users-heading {
            text-align: center;
            margin-bottom: 20px;
            color: #4CAF50; /* Green */
        }

        .add-user-link {
            display: block;
            text-align: right;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dee2e6;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: green;
            color: #e6b400;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .action-links a {
            text-decoration: none;
            color: #007bff;
            margin-right: 10px;
        }

        .action-links a:hover {
            text-decoration: underline;
        }

        .profile-pic {
            max-width: 50px;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <div class="container" style="font-size: 12px">

        <a href="<?php echo site_url('users/create'); ?>" class="add-user-link">Add User</a>
        <table>
            <thead>
                <tr>
                    <th>Profile Pic</th>
                    <th>Complete Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Date Created</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><img src="<?php echo base_url('./images/'.$user->profile_pic); ?>" alt="Profile Pic" class="profile-pic"></td>
                        <td><?php echo $user->complete_name; ?></td>
                        <td><?php echo $user->email; ?></td>
                        <td><?php echo ($user->role == 0) ? 'Admin' : 'Researcher'; ?></td>
                        <td><?php echo ($user->status == 1) ? 'Active' : 'Inactive'; ?></td>
                        <td><?php echo $user->date_created; ?></td>
                        <td class="action-links">
    <a href="<?php echo site_url('users/edit/'.$user->userid); ?>" style="color: #4CAF50;">Edit</a>
    <a href="<?php echo site_url('users/delete/'.$user->userid); ?>" onclick="return confirm('Are you sure you want to delete this user?')" style="color: #dc3545;">Delete</a>
</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
