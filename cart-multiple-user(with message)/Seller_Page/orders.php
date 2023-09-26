  <?php
   ob_start();
  include('header.php');

  function dd($data) {
    echo "<pre>";
    print_r(var_dump($data));
    die;
}

$user_id = $_SESSION["user_id"];
$result = mysqli_query($conn, "SELECT * FROM user_form WHERE id = '$user_id'");
if ($res = mysqli_fetch_array($result)) {
    $fullname = $res['fullname'] ?? '';
    $username = $res['username']  ?? '';
    $oldusername = $res['username']  ?? '';
    $email = $res['email']  ?? '';
    $phonenumber = $res['phonenumber']  ?? '';
    $address = $res['address']  ?? '';
    $dateofbirth = $res['dateofbirth']  ?? '';
    $gender = $res['gender']  ?? '';
    $image = $res['image']  ?? '';
}

$orders_query = mysqli_query($conn, "SELECT * FROM orders");
$orders = array();

while ($order_row = mysqli_fetch_assoc($orders_query)) {
    $order_id = $order_row['order_id'];

    if ($_SESSION['role'] == 'user') {
        $sql = "SELECT *
            FROM orders
                    JOIN items ON items.order_id = orders.order_id
            JOIN products ON products.id = items.product_id
                    WHERE items.order_id='$order_id' AND orders.user_id='$user_id'";
    } else {
        $sql = "SELECT *
            FROM orders
                    JOIN items ON items.order_id = orders.order_id
            JOIN products ON products.id = items.product_id
            WHERE items.order_id='$order_id'";
    }
    $items_query = mysqli_query($conn, $sql);

    $total = 0;
    $items = [];

    while ($item_row = mysqli_fetch_assoc($items_query)) {
        $subtotal = $item_row['price'] * $item_row['qty'];
        $total += $subtotal;
        array_push($items, $item_row);
    }
    $order_row['total'] = $total;
    $order_row['items'] = $items;
    $orders[] = $order_row;
}
  ?>  


  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
   
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Orders</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Orders</h6>
        </nav>

        <?php  include('navbar.php'); ?>
        
       
      </div>
    </nav>

    <div class="container-fluid py-4">

      <div class="row">
        <div class="col-12">

          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="color-orange-bg shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Orders</h6>
              </div>
            </div>

            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">

                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Order#</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Address</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>

                  <tbody>
                  <?php foreach ($orders as $row) { ?>
                    <tr>

                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="assets/img/images.png" class="avatar avatar-sm me-3 border-radius-lg" alt="ShoppingBag">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><a href="javascript:" class="order" data-items='<?= json_encode($row["items"]); ?>'><?= $row['order_number'] ?></a></h6>
                            <p class="text-xs text-secondary mb-0"><b><?= $row['status'] ?></b></p>
                          </div>
                        </div>
                      </td>

                      <td>
                        <p class="text-s font-weight-bold mb-0"> <?= $row['name'] ?></p>
                        <p class="text-xs text-secondary mb-0"><b><?= $row['contact'] ?></b></p>
                      </td>

                      <td>
                      <b><?= $row['address'] ?>, <?= $row['city'] ?>, <?= $row['state'] ?>, <?= $row['zip'] ?></b>
                      </td>

                      <td class="align-middle text-center">
                        <p class="text-s font-weight-bold mb-0"> ₱<?= number_format($row['total'], 2) ?></p>
                        <p class="text-xs text-secondary mb-0"><b><?= $row['order_added'] ?></b></p>
                       
                      </td>

                     <?php if ($row['status'] == 'Pending') { ?>
                      <td class="align-middle text-center text-sm">
                        <a href="../action.php?action=accept&id=<?= $row['order_id'] ?>&user_id=<?= $row['user_id'] ?>"onclick="return confirm('Are you sure do you want to ACCEPT this order?')">
                        <span class="badge badge-sm bg-gradient-success cursor-pointer">Accept</span>
                        </a>
                        <a href="../action.php?action=reject&id=<?= $row['order_id'] ?>&user_id=<?= $row['user_id'] ?>"onclick="return confirm('Are you sure do you want to REJECT this order?')">
                        <span class="badge badge-sm bg-gradient-danger cursor-pointer">Reject</span>
                        </a>
                        <!-- <span class="badge badge-sm bg-gradient-success cursor-pointer" href="../action.php?action=accept&id=<?= $row['order_id'] ?>&user_id=<?= $row['user_id'] ?>"onclick="return confirm('Are you sure do you want to ACCEPT this order?')">Accept</span>
                        <span class="badge badge-sm bg-gradient-danger cursor-pointer" href="../action.php?action=reject&id=<?= $row['order_id'] ?>&user_id=<?= $row['user_id'] ?>"onclick="return confirm('Are you sure do you want to REJECT this order?')">Reject</span> -->
                      </td>


                      <?php }else if($row['status'] == 'Accepted'){ ?>

                         <td class="align-middle text-center text-sm">
                         <span class="badge badge-sm bg-gradient-success cursor-pointer" disabled>Accepted</span>
                         </td>
                      
                      <?php }else if($row['status'] == 'Rejected'){ ?>

                         <td class="align-middle text-center text-sm">
                         <span class="badge badge-sm bg-gradient-danger cursor-pointer"disabled>Rejected</span>
                         </td>
                        
                      <?php } ?>
                    
                    
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
  
                
                <!-- Modal -->
                <div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalTitle">Modal title</h5>  
                      </div>
                      <div class="modal-body">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>Item Name</th>
                              <th>Price</th>
                              <th>Qty</th>
                              <th>Total</th>
                            </tr>
                          </thead>
                          <tbody id="tbody">
                            <!-- javascript -->
                          </tbody>
                        </table>
                      </div>
                      <div class="modal-footer">
                        <span class="badge badge-sm bg-gradient-danger cursor-pointer" data-dismiss="modal">Close</span>
                      </div>
                    </div>
                  </div>
                </div>           
                <!-- Modal -->
              </div>
            </div>
          </div>
        </div>
      </div>
    <div class="container-fluid py-4">
    


  <?php
  include('footer.php');
  ?>  
 