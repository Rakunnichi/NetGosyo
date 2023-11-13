
<?php
  include('header.php');

  
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

$currentMonth = date('m');

$monthData = array();

for ($month = 1; $month <= $currentMonth; $month++) {
    $orders_query = mysqli_query($conn, "SELECT * FROM orders WHERE seller_id = '$user_id' AND MONTH(order_added) = $month");
    $orders = array();
    $totalMonthSales = 0;
    $totalPredictedMonthSales = 0;
    
    while ($order_row = mysqli_fetch_assoc($orders_query)) {
        $order_id = $order_row['order_id'];
    
        $sql = "SELECT *
            FROM  items
            JOIN products ON products.id = items.product_id
            WHERE items.order_id='$order_id' ";
        $items_query = mysqli_query($conn, $sql);
    
        $total = 0; 
        $items_rows = [];
        
        while ($item_row = mysqli_fetch_assoc($items_query)) {
            $subtotal = $item_row['price'] * $item_row['qty'];
            $total += $subtotal;
            $items_rows[] = $item_row;
        }

        
    
        $order_row['total'] = $total;
        $order_row['items'] = $items_rows;
        $orders[] = $order_row;

        if( $order_row['order_updated'] != NULL){
          $totalMonthSales += $total; 
        }

        $totalPredictedMonthSales += $total; 
    }
    
    $data = array();
    $data['month'] = date('F', mktime(0, 0, 0, $month, 1));
    $data['total'] = $totalMonthSales;
    $data['totalPredicted'] = $totalPredictedMonthSales;
    
    array_push($monthData, $data);
}



  ?>  


  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
   
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Sales Report</li>
          </ol>
        </nav>
        

        <?php
        include('navbar.php');
         ?>

       
      </div>
    </nav>
      
    <div class="container">
            <h2>Sales Report for the Year</h2>
            <div>
                <canvas id="myChart"></canvas>
            </div>
        </div>
    

   
<script>
let orderData = <?php echo json_encode($monthData); ?>;

// Extracting labels (months) and datasets from orderData
let labels = orderData.map(monthData => monthData['month']);
let monthDataTotal = orderData.map(monthData => monthData['total']);
let monthDataPredictedTotal = orderData.map(monthData => monthData['totalPredicted']);

let test = document.getElementById("myChart").getContext("2d");
let myChart = new Chart(test, {
    type: "line",
    data: {
        labels: labels,
        datasets: [
            {
                label: "Total Sales",
                data: monthDataTotal,
                backgroundColor: "rgba(0, 128, 0, 0.6)",
            },
            {
                label: "Total Predicted Sales",
                data: monthDataPredictedTotal,
                backgroundColor: "rgba(135, 206, 235, 0.6)",
            }
        ],
    },
});
</script>

  

  <?php
  include('footer.php');
  ?>  