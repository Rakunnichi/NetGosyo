<div class="overlay" id="overlay"></div>
<div class="popup">
            <div class="contentBox">

                <div class="close-ad">
                    
                </div>

                <div class="imgBx">
                    <img src="assets/online-shopping.png" alt="gift.png">
                </div>

                <div class="content">
                    <div>
                        <h3>Special Offers</h3>
                        <h2>50<sup>%</sup><span> Off</span></h2>
                        <p><b>Local Products made with high quality materials.</b></p>
                        <a href="view-top-products.php">Shop Now!</a>
                    </div>
                   
                </div>
               
            </div>
        </div>
     
        <script>
            const popup = document.querySelector('.popup');
            const close = document.querySelector('.close-ad');
            const overlay = document.querySelector('.overlay');

            window.onload = function(){
                setTimeout(function(){
                    popup.style.display = "block";
                    overlay.style.display = "block";


                }, 2000);
            }

            close.addEventListener('click', () => {
                popup.style.display = "none";
                overlay.style.display = "none";
            })
        </script>
