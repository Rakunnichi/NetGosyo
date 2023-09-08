<!-- Product -->
<?php
include('config.php');
$id = $_GET['id'] ?? 1;
$user_id = $_SESSION['user_id']?? '3';

$sql = "SELECT * FROM user_form WHERE id=$user_id";
$user = mysqli_query($conn, $sql);

if (mysqli_num_rows($user) > 0) {
  $row = mysqli_fetch_assoc($user);
  $name = $row["fullname"];
}


$stmt = $conn->prepare('SELECT * FROM user_form');
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) :
  if ($row['id'] == $id) :
?>

<section class="py-3">


    <div class="container">

        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-9 col-xl-12">
                <div class="card">
                    <!-- style="background-image: url('./assets/SOBackground.jpg');" -->
                    <div class="rounded-top text-white d-flex flex-row"
                        style="background-image: url('./assets/sellerBG.jpeg'); height:200px;">
                        <div class="ms-4 mt-5 ml-3 d-flex flex-column" style="width: 160px;">
                            <img src="user-profiles/<?php echo $row['image']; ?>" alt="Generic placeholder image"
                                class="img-fluid img-thumbnail mt-4 mb-2" style="width: 150px; z-index: 1">
                        </div>
                        <div class="ms-3" style="margin-top: 120px;">
                            <h5><b><?php echo $row['shopname']; ?></b></h5>
                            <h6 class="ml-2"><?php echo $row['username'];?></h6>
                        </div>
                    </div>
                    <div class="p-4 text-black" style="background-color: #f8f9fa;">
                        <div class="d-flex justify-content-end text-center py-1">
                            <div>
                                <p class="mb-1 h5">253</p>
                                <p class="small text-muted mb-0">Sold</p>
                            </div>
                            <div class="px-3">
                                <p class="mb-1 h5">1026</p>
                                <p class="small text-muted mb-0">Products</p>
                            </div>
                            <div>
                                <p class="mb-1 h5">4.5</p>
                                <p class="small text-muted mb-0">Rating</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row py-4">
            <div class="col-12 pt-4">
                <h6 class="font-rubik">Shop Description Description</h6>
                <hr>
                <p class="font-rale font-size-14">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat
                    inventore vero numquam error est ipsa, consequuntur temporibus debitis nobis sit, delectus officia
                    ducimus dolorum sed corrupti. Sapiente optio sunt provident, accusantium eligendi eius reiciendis
                    animi? Laboriosam, optio qui? Numquam, quo fuga. Maiores minus, accusantium velit numquam a aliquam
                    vitae vel?</p>
                <p class="font-rale font-size-14">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat
                    inventore vero numquam error est ipsa, consequuntur temporibus debitis nobis sit, delectus officia
                    ducimus dolorum sed corrupti. Sapiente optio sunt provident, accusantium eligendi eius reiciendis
                    animi? Laboriosam, optio qui? Numquam, quo fuga. Maiores minus, accusantium velit numquam a aliquam
                    vitae vel?</p>
            </div>
        </div>
    </div>

    <!-- !Product -->
<?php
endif;
endwhile;
?>
  
</section>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
