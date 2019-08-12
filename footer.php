<footer>



  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <p>Copyright &copy; 2017 PizzaVilla</p>
        <hr>
        <ul class="social-icon">
          <li><a href="#" class="fa fa-facebook"></a></li>
          <li><a href="#" class="fa fa-twitter"></a></li>
          <li><a href="#" class="fa fa-instagram"></a></li>
          <li><a href="#" class="fa fa-pinterest"></a></li>
          <li><a href="#" class="fa fa-google"></a></li>
          <li><a href="#" class="fa fa-github"></a></li>
          <li><a href="#" class="fa fa-apple"></a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>
<!-- end footer -->


<script src="js/plugins.js"></script>

<script src="js/custom.js"></script>

<script>
function editme() {

  var input = $('#editform input');
  input.toggleClass('readonly');
  input.toggleClass('form-control');
  console.log(input.prop("readonly"));
  input.attr('readonly', input.prop('readonly') == false ? true : false);
  $('#editform button').toggleClass("hidden");


}

function pswd_match() {
  var pswd=document.getElementById('pass');
  var cpswd=document.getElementById('confirmpass');

  if(pswd.value!=cpswd.value){
    alert("Password don't match"); cpswd.focus; return false;}
    else {
      return true;
    }
}

function Validation()
{
 var email = document.getElementById('inputEmail');
 var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

  if (!filter.test(email.value)) {
    alert('Please provide a valid email address');
    email.focus;
  return false;
}

if (!pswd_match()) {
  return false;
}

    var phone = document.getElementById('phoneno');
   var phoneNum = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
        if(phone.value.match(phoneNum)) {
            return true;
        }
        else {
            alert('Please provide a valid phone number');
      phone.focus;
    return false;
        }
}
</script>





</body>
</html>
