
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            margin: 0 auto; /* Center the table horizontally */
            width: 60%;
            border-collapse: collapse;
            text-align: center; /* Center the content inside table cells */
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Users Table</h1>
    
    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Role</th>
                <th>Status</th>
                <th>Date Created</th>
                <th>Profile Picture</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo isset($user['userid']) ? $user['userid'] : ''; ?></td>
                    <td><?php echo isset($user['complete_name']) ? $user['complete_name'] : ''; ?></td>
                    <td><?php echo isset($user['email']) ? $user['email'] : ''; ?></td>
                    <td><?php echo isset($user['pword']) ? $user['pword'] : ''; ?></td>
                    <td><?php echo isset($user['role']) ? $user['role'] : ''; ?></td>
                    <td><?php echo isset($user['status']) ? ($user['status'] ? 'Active' : 'Inactive') : ''; ?></td>
                    <td><?php echo isset($user['date_created']) ? $user['date_created'] : ''; ?></td>
                    <td><?php echo isset($user['profile_pic']) ? $user['profile_pic'] : ''; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
