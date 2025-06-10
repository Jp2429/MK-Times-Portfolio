<div class="col-md-4 d-flex justify-content-center">
            <div class="card shadow p-3 mb-5 bg-body rounded" style="width: 25rem; min-width: 20rem;">
                <img src="'. $row['item_img'].'" class="card-img-top" alt="T-Shirt">
                <div class="card-body">
                    <h5 class="card-title text-center">' . $row['item_name'] .'</h5>
                    <p class="card-text">'. $row['item_desc'] . '</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><p class="text-center">&pound' . $row['item_price'] . '</p></li>
                    <li class="list-group-item btn btn-dark"><a class="btn btn-dark btn-lg btn-block" href="added.php?id='.$row['item_id'].'">  Add to Cart</a> </li>
                </ul>
            </div>
        </div>';