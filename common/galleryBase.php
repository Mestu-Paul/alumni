<style>
    img {
      width: 200px;
      /* height: 250px; */
      aspect-ratio: 1;
      transition: all 0.1s ease-in-out 0s;
    }
    img:hover{
      opacity: 0.8;
    }
    .card:hover{
      box-shadow: 0px 0px 10px 1px #d20452;
    }
</style>
<div class="row d-flex justify-content-center">
    <?php
        include_once '../../conn.php';
        $db = connect();
        $sql = "SELECT * FROM gallery;";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        
        $_SESSION['images'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $db=null;

        if (isset($_SESSION['images'])) {
            foreach ($_SESSION['images'] as $im) {
                echo '
            <div class="card m-3"   style="width: 18rem;">
                <img src="../../media/' . $im['photo'] . '" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">' . $im['title'] . '</h5>';
                    if (isset($_SESSION['user_email']) and $_SESSION['user_role']=='admin'){
                        echo '<div class="text-end">
                            <a type="button" class="btn btn-danger" href="../backend/gallery.php?id='.$im['id'].'">Delete</a>
                            </div>';
                    }
                echo '</div>
            </div>  
            ';
            }
        }
    ?>
</div>