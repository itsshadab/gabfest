<script type="text/javascript">
    function post_like(uid, pid, btn) {
        $.post("actions/like.php?uid="+uid+"&pid="+pid, function(data, status) {
            if ($("#post-"+pid+" div.likers").text().length == 0 ) {
                $("#post-"+pid+" div.likers").prepend("You ");
            } else {
                $("#post-"+pid+" div.likers").prepend("You and ");
            }
            btn.onclick = function() { post_unlike(uid, pid, this); }
            btn.innerHTML = "<span class='glyphicon glyphicon-thumbs-down'></span> Unlike";
        });
    }
    function post_unlike(uid, pid, btn) {
        $.post("actions/unlike.php?uid="+uid+"&pid="+pid, function(data, status) {
            // alert(data + " " + status + " Done");
            // $(this).attr("onclick", "post_like("+uid+","+pid+","+this+");");
            btn.onclick = function() { post_like(uid, pid, this); }
            var str = $("#post-"+pid+" div.likers").text();
            if (str.indexOf("and") != -1) {
                str = str.slice(7, str.length);
            } else {
                str = str.slice(4, str.length);
            }
            // alert(str);
            $("#post-"+pid+" div.likers").text(str);
            // alert();
            btn.innerHTML = "<span class='glyphicon glyphicon-thumbs-up'></span> Like";
        });
    }   
    function delete_post(pid) {
        window.location.href="actions/del-post.php?pid="+pid;
    }
</script>
<?php 
$conn = mysqli_connect("localhost", "root", "", "connecton");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT members.fname, members.lname,posts.pid, posts.msg,posts.time, posts.image, members.src FROM posts LEFT JOIN members ON posts.uid=members.uid ORDER BY posts.time DESC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<div class='well' id='post-".$row['pid']."'>
        		<a href='components/profile.php'><img src='".$row['src']."' class='img-circle post-avatar shift-left'></a>
                <span class='shift-right dropdown'><a class=' dropdown-toggle' data-toggle='dropdown' href=''><span class='fa fa-angle-down'></span></a>
                    <ul class='dropdown-menu' role='menu'>
                        <li role='presentation'><a class='menuitem' tabindex='-1' href='#'>Edit Post</a></li>
                        <li role='presentation' name=><a tabindex='-1' href='#' onclick='delete_post(".$row['pid'].");'>Delete Post</a></li>
                    </ul>
                </span>
                <span class='shift-right'>".$row['time']."</span>
        		<a href='components/profile.php'><h4>". $row['fname'] . " " . $row['lname'] ."</h4></a>
        		<hr>
        		<p>" . $row['msg'] . "</p>";
        		if (!empty($row['image'])) {
        			echo "<img class='post-img' src=".$row['image'].">";
        		}
	        	$sql3 = "SELECT * FROM likes WHERE pid=".$row['pid']." AND uid=".$_SESSION['uid'];
				$result3 = mysqli_query($conn, $sql3);
                $sql2 = "SELECT likes.uid, members.fname, members.lname FROM likes LEFT JOIN members ON likes.uid=members.uid WHERE pid=".$row['pid'];
                $result2 = mysqli_query($conn, $sql2);

                echo "<div class='likers'>";
                if (mysqli_num_rows($result2) > 0) {
    	        	if (mysqli_num_rows($result3) > 0) {
                        if (mysqli_num_rows($result2) > 1) {
                            echo "You and ";
                        } else {
                            echo "You ";
                        }
                    }
                    while($row2 = mysqli_fetch_assoc($result2)) {
                        if ($row2['uid'] == $_SESSION['uid']) {
                            continue;
                        }
                        echo $row2['fname']. " " . $row2['lname']. " " ."like this.";
                    }
                }
                echo "</div>";
                if (mysqli_num_rows($result3) > 0) {
	        		echo "<button type='button' name='like' class='btn btn-default btn-sm' onclick='post_unlike(".$_SESSION['uid'].",".$row['pid'].", this);'><span class='glyphicon glyphicon-thumbs-down'></span> Unlike</button>";
	        	} else {
	        		echo "<button type='button' name='like' class='btn btn-default btn-sm' onclick='post_like(".$_SESSION['uid'].",".$row['pid'].", this);'><span class='glyphicon glyphicon-thumbs-up'></span> Like</button>";
	        	}
        		echo "<button type='button' name='share' class='btn btn-default shift-right btn-sm'><span class='glyphicon glyphicon-share'></span> Share</button>";
                $sql4 = "SELECT comments.uid, comments.comment, members.fname, members.lname FROM comments LEFT JOIN members ON comments.uid=members.uid WHERE pid=".$row['pid'];
                $result4 = mysqli_query($conn, $sql4);
                $sql5 = "SELECT * FROM comments WHERE pid=".$row['pid'];
                $result5 = mysqli_query($conn, $sql5);
                $row3 = mysqli_fetch_assoc($result5);
                if (mysqli_num_rows($result4) > 0) {
                    if (mysqli_num_rows($result5) > 0) {
                        echo "<div class='media'>
                            <div class='media-left'>
                                <img class='media-object comment-img' src='".$row['src']."'>
                            </div>
                            <div class='media-body'>
                                <h4>". $row['fname'] . " " . $row['lname'] ."</h4>
                                    <p>".$row3['comment']."</p>
                            </div>
                        </div>";
                    }
                }
                echo "<div class='media'>
                    <div class='media-left'>
                        <img class='media-object comment-img' src='".$row['src']."'>
                    </div>
                    <div class='media-body'>
                        <h4>". $_SESSION['fname'] . " " . $_SESSION['lname'] ."</h4>
                            <form action='actions/comment.php'><input type='text' class='form-control' name='comment'></form>
                    </div>
                </div>
            </div>";
    }
} else {
    echo "0 results";
}
mysqli_close($conn);
?>