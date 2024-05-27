<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="text-center">Article Submission Form</h2>
            <?php echo form_open('posts/create');  ?>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Add Title" required>
                </div>
                <div class="form-group">
                    <label for="title">Keywords</label>
                    <input type="text" class="form-control" id="keywords" name="keywords" placeholder="Add Title" required>
                </div>
                <div class="form-group">
                    <label for="body">Abstract</label>
                    <textarea class="form-control" id="body" name="body" placeholder="Add Abstract" required></textarea>
                </div>
                <label for="file">Upload File:</label>
                    <input type="file" id="file" name="file" accept=".pdf" required>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
