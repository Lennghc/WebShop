<div class="footer mt-auto">

    <div class="container">

            <div class="all_columns">
                <div class="row">
                    <div class="offset-md-3">
                    </div>
                    <div class="col-md-6">
                        <div class="bottom_footer">
                            <div class="logos">
                                <div class="imgbox_footer">
                                    <img width="100%" height="100%" src="view/assets/payment/apple.svg" alt="apple-pay-logo">
                                </div>
                                <div class="imgbox_footer">
                                    <img width="100%" height="100%" src="view/assets/payment/iDEAL.svg" alt="iDEAL-logo">
                                </div>
                                <div class="imgbox_footer">
                                    <img width="100%" height="100%" src="view/assets/payment/mastercard.svg" alt="mastercard-logo">
                                </div>
                                <div class="imgbox_footer">
                                    <img width="100%" height="100%" src="view/assets/payment/paypal-logo.svg" alt="paypal-logo-logo">
                                </div>
                                <div class="imgbox_footer">
                                    <img width="100%" height="100%" src="view/assets/payment/Visa.svg" alt="Visa-logo">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <div class="top_footer">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-2 footer_column">
<!--                    Links-->
                    <h2>Andere pagina's</h2>
                    <ul>
                        <li>
                            <a href="#"><p>Veelgestelde vragen</p></a>
                        </li>
                        <li>
                            <a href="#"><p>Contact</p></a>
                        </li>
                        <li>
                            <a href="#"><p>About us</p></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-2 footer_column">
                    <h2>Privacy en voorwaarden</h2>
                    <ul>
                        <li>
                            <a href="#"><p>Veelgestelde vragen</p></a>
                        </li>
                        <li>
                            <a href="#"><p>Contact</p></a>
                        </li>
                        <li>
                            <a href="#"><p>About us</p></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-2 footer_column">
                    <h2>Social media</h2>
                    <ul>
                        <li>
                            <a href="#"><p>Veelgestelde vragen</p></a>
                        </li>
                        <li>
                            <a href="#"><p>Contact</p></a>
                        </li>
                        <li>
                            <a href="#"><p>About us</p></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 footer_column">
                    <div class="top_footer_imgbox">
                        <img width="100%" height="100" src="view/assets/payment/logo.png" alt="logo_website">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>

$(document).on("click",".add_cart", function(event){
       	event.preventDefault();
           var id = $(this).attr("id");
           var action = "add";


           $.ajax({
              url: "index.php?con=cart&op=add",
              method:"POST",
              dataType:"JSON",
              data: {id:id,action:action},
              success:function(data){
                $("#cart").text(data.da);
                toastr.success(`Product toegevoegd`);

              }
           });


       });

       $(document).on("click",".remove",function(){
             var id = $(this).attr("id");
             var action = "delete";

              $.ajax({
              url: "index.php?con=cart&op=remove",
              method:"POST",
              data:{id:id,action:action},
              dataType:"JSON",
              success:function(data){
                location.reload();
              }
           });
	 	});


         $(document).ready(function(){


               $.ajax({
               url: "index.php?con=cart",
               method:"POST",
               dataType:"JSON",
               success:function(data){
                $("#cart").text(data.da);
               }
            });


     });


    $(document).ready(function(){

           function show_mycart(){
              $.ajax({
              url: "shoppingcard.php",
              method:"POST",
              dataType:"JSON",
              success:function(data){
                $(".get_cart").html(data.out);
                $("#cart").text(data.da);
              }
           });
           }

    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.0.0/tinymce.min.js" integrity="sha512-XQOOk3AOZDpVgRcau6q9Nx/1eL0ATVVQ+3FQMn3uhMqfIwphM9rY6twWuCo7M69rZPdowOwuYXXT+uOU91ktLw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    tinymce.init({
    selector: 'textarea#other_product_details',
    height: 500,
    plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table paste imagetools wordcount'
    ],
    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });

</script>

<script>
function loadDoc($url) {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("main").innerHTML =
    this.responseText;
  }
  xhttp.open("GET", $url);
  xhttp.send();
}

function aboutTxt($txt) {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("side h2").innerHTML = "about you"
    this.responseText;
  }
  xhttp.open("GET", $txt);
  xhttp.send();
}
</script>