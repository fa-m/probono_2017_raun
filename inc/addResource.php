<?php
/**
 * Created by PhpStorm.
 * User: fmalik
 * Date: 22.04.17
 * Time: 17:04
 */

?>

<h1>Add new Resource</h1>
<p></p>


<div class="form-group row">
    <label for="title" class="col-2 col-form-label">Title</label>
    <div class="col-10">
        <input class="form-control" name="title" type="text" id="title">
    </div>
</div>
<div class="form-group row">
    <label for="description" class="col-2 col-form-label">Description</label>
    <div class="col-10">
        <input class="form-control" name="description" type="text" id="description">
    </div>
</div>
<div class="form-group row">
    <label for="description" class="col-2 col-form-label">Link</label>
    <div class="col-10">
        <input class="form-control" name="link" type="text" id="link">
    </div>
</div>
<div class="form-group row">
    <label for="type" class="col-2 col-form-label">Type</label>
    <div class="col-10">
        <div class="row formCheckBoxGroup">
            <?php
            $tags = getResourceType();

            foreach ($tags as $index => $item) {
                echo '<div class="col-3">';
                echo '<input type="checkbox" name="type" id="type'.$index.'" /> <label for="type'.$index.'">'.$item.'</label>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="category" class="col-2 col-form-label">Category</label>
    <div class="col-10">
        <div class="row formCheckBoxGroup">
            <?php
            $cats = getCategories();

            foreach ($cats as $index => $item) {
                echo '<div class="col-3">';
                echo '<input type="checkbox" name="category" id="category_'.$index.'" /> <label for="category_'.$index.'">'.$item.'</label>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="category" class="col-2 col-form-label">Tags</label>
    <div class="col-10">
        <div id="tags">
            <input type="text" value="" placeholder="Add a tag" />
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="category" class="col-2 col-form-label"></label>
    <div class="col-10">
        <input type="submit" class="btn btn-lg btn-success" value="Submit" />
    </div>
</div>