
<div class="grid_2">
            <div class="box sidemenu">
                <div class="block" id="section-menu">
                    <ul class="section menu">
                       <li><a class="menuitem">Site Option</a>
                            <ul class="submenu">
                                <li><a href="titleslogan.php">Title & Slogan</a></li>
                                <li><a href="social.php">Social Media</a></li>
                                <li><a href="copyright.php">Copyright</a></li>

                            </ul>
                        </li>

                         <li><a class="menuitem"> Pages</a>
                            <ul class="submenu">
                                <li><a href = "addpage.php">Add new page</a></li>
                                <?php
                                $query_page = "SELECT * FROM tbl_page";
                                $select_page = $db->select($query_page);
                                if($select_page->num_rows > 0){
                                    while($row_page = $select_page->fetch_assoc()){
                                        echo "<li><a href = 'page.php?pageid={$row_page['id']}'>{$row_page['name']}</a></li>";
                                    }
                                }
                                ?>
                            </ul>
                        </li>
                        <li><a class="menuitem">Category Option</a>
                            <ul class="submenu">
                                <li><a href="addcat.php">Add Category</a> </li>
                                <li><a href="catlist.php">Category List</a> </li>
                            </ul>
                        </li>
                        <li><a class="menuitem">Post Option</a>
                            <ul class="submenu">
                                <li><a href="addpost.php">Add Post</a> </li>
                                <li><a href="postlist.php">Post List</a> </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
