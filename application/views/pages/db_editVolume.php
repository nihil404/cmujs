<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Volume</title>
</head>
<body>
    <h2>Edit Volume</h2>
    
    <?php echo validation_errors(); ?>
    
    <?php echo form_open('volume/update/' . $volume->volumeid); ?>
    
    <label for="vol_name">Volume Name:</label>
    <input type="text" name="vol_name" value="<?php echo $volume->vol_name; ?>"><br>
    
    <label for="description">Description:</label>
    <textarea name="description"><?php echo $volume->description; ?></textarea><br>
    
    <button type="submit">Update</button>
    
    </form>
</body>
</html>
