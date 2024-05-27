<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .container {
            padding-top: 30px;
            margin: auto;
            max-width: 1400px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th, td {
            padding: 12px;
            border: 1px solid #dee2e6;
            text-align: left;
        }

        th {
            background-color: green;
            color: #e6b400;
        }

        td a {
            color: #007bff;
            text-decoration: none;
        }

        td a:hover {
            text-decoration: underline;
        }

        .actions a {
            margin-right: 5px;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 12px;
            transition: background-color 0.3s ease;
        }

        .actions .btn-assign-evaluator {
            background-color: #4CAF50;
            
        }

        .actions .btn-assign-evaluator:hover {
            background-color: #388E3C;
        }

        .actions .btn-update {
            background-color: #e6b400;
        }

        .actions .btn-update:hover {
            background-color: #cc9a00;
        }

        .actions .btn-delete {
            background-color: #dc3545;
        }

        .actions .btn-delete:hover {
            background-color: #c82333;
        }

        h1.title {
            text-align: center;
            color: #4CAF50;
            margin-bottom: 30px;
            text-transform: uppercase;
            font-size: 32px;
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="container" style="font-size: 12px;" >
    <h4 class="title" style="text-align:center;">Articles</h4>

    <a href="<?php echo base_url('pages/db_authSubmission2') ?>" class="btn btn-darkgreen text-white" target="_blank" fontstyle="bold" ><strong style="color:green;">ADD ARTICLE</strong></a>

    <table>
        <thead>
            <tr>
                
                <th>Volume</th>
                <th>Title</th>
                <th>Author Name</th>
                <th>File</th>
                <th>Payment</th>
                <th>Date Paid</th>
                <th>Review Status</th>
                <th>Date Forwarded to Review</th>
                <th>Approval Status</th>
                <th>Date Approved</th>
                <th>Publishing Status</th>
                <th>Date Published</th>
                
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($submittedArticles as $article): ?>
                <tr>

                    <td><?= $article->volume_name ?></td> <!-- Update this line -->
                    <td><?= strlen($article->title) > 20 ? substr($article->title, 0, 20) . '...' : $article->title ?></td>
                    <td><?= $article->author_name ?></td>
                    <td>
                        <?php if ($article->filename): ?>
                            <a href="<?= base_url('files/' . $article->filename); ?>" class="file-link">View</a>
                        <?php else: ?>
                            No file uploaded
                        <?php endif; ?> </td>
                    <td><?= $article->payment ? 'Paid' : 'Not Paid' ?></td>
                    <td><?= $article->date_paid ? date('Y-m-d', strtotime($article->date_paid)) : 'N/A' ?></td>
                    <td><?= $article->review ? 'Reviewed' : 'Not Reviewed' ?></td>
                    <td><?= $article->date_forwarded_review ? date('Y-m-d', strtotime($article->date_forwarded_review)) : 'N/A' ?></td>
                    <td><?= $article->approved ? 'Approved' : 'Unapproved' ?></td>
                    <td><?= $article->date_approved ? date('Y-m-d', strtotime($article->date_approved)) : 'N/A' ?></td>
                    <td><?= $article->published ? 'Published' : 'Unpublished' ?></td>
                    <td><?= $article->date_published ? date('Y-m-d', strtotime($article->date_published)) : 'N/A' ?></td>
                    
                    <td class="actions" style="text-align:center;" >
                        <a href="<?= base_url('pages/db_AdminUpdate/' . $article->slug); ?>" class="btn-assign-evaluator" style="font-size:7px;">Edit Art</a>
                        <a href="<?= base_url('pages/editArticle/' . $article->articleid); ?>" class="btn-update" style="font-size:7px; margin-top:10px;" >Edit Sub</a>
                        <a href="#" onclick="confirmDelete('<?= $article->articleid; ?>')" class="btn-delete" style="font-size:7px;">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    function confirmDelete(articleId) {
        var confirmation = confirm("Are you sure you want to delete this article?");
        if (confirmation) {
            window.location.href = "<?php echo base_url('pages/deleteArticle/') ?>" + articleId;
        }
    }
</script>

</body>
</html>
