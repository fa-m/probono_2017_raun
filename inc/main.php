<!-- Example row of columns -->


<div class="row searchBar">
    <div class="col-md-4">
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</div>
<div class="row dataGrid">
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Type</th>
                <th>User</th>
                <th>Download</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $gridData = json_decode(getGridData());


               foreach ($gridData as $index => $item) {
                   echo '<tr onclick="window.open(\''.$item->link.'\');">';
                    echo '<td>'.$item->id.'</td>';
                    echo '<td>'.$item->title.'</td>';
                    echo '<td>'.$item->description.'</td>';
                    echo '<td>'.$item->type.'</td>';
                    echo '<td>'.$item->user.'</td>';
                    echo '<td><a href="'.$item->link.'" target="_blank" class="i"><i class="fa fa-download" aria-hidden="true"></i></a></td>';
                   echo '</tr>';
                }
            ?>
            </tbody>
        </table>
    </div>
    <div class="col-md-12">
        <?php
        $cssfields = array('tag1','tag2','tag3','tag4','tag5');

        $x = 0;
        $tags[$x]['tag'] = 'Migration';
        $tags[$x]['url'] = '';
        $x++;
        $tags[$x]['tag'] = 'Environment';
        $tags[$x]['url'] = '';
        $x++;
        $tags[$x]['tag'] = 'Development';
        $tags[$x]['url'] = '';
        $x++;
        $tags[$x]['tag'] = 'Funktionsreferenz';
        $tags[$x]['url'] = '';
        $x++;
        $tags[$x]['tag'] = 'Crime';
        $tags[$x]['url'] = '';
        $x++;
        $tags[$x]['tag'] = 'Security';
        $tags[$x]['url'] = '';
        $x++;
        $tags[$x]['tag'] = 'Human Rights';
        $tags[$x]['url'] = '';
        $x++;
        $tags[$x]['tag'] = 'Scientific Article';
        $tags[$x]['url'] = '';

        $target = '_blank';

        echo'<div class="tagcloudbody">';
            echo'    <h2 class="tagcloudThema"><h2>Tagcloud</h2>';
            echo getTagCloud( $tags, $cssfields, $target );
            echo'</div>';
        ?>

    </div>
</div>