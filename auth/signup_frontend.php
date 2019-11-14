<?php 
header('Access-Control-Allow-Origin: *');
$xpub = "xpub6CYa7C43tAZeyyWbEvVAGuMmEMQWLou4RJavDaSSi5iqtKsp2QDdoBvPG3FqJxZkx3zxrHpQEN1KVbJjV2ZEgTTBwNNf75cn4ak8ojNXuMA";
$url = "https://api.smartbit.com.au/v1/blockchain/address/".$xpub; 
$token = "1aMN8kGNUmmHqESBhf8gMzxc7gy4Z3QeX";
$fgc = json_decode(file_get_contents($url), true);
$next =  $fgc["address"]["extkey_next_receiving_address"];
?> 
<!DOCTYPE html>
<html lang="en">
  <title>Register page</title>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="https://npmcdn.com/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://npmcdn.com/vue-router/dist/vue-router.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script type="application/javascript" src="https://static.plenigo.com/static_resources/javascript/COMPANY_ID/plenigo_sdk.min.js" data-client-paywall="true" data-paywall-type="show" data-paywall-source-element-id="sourceId" data-paywall-target-element-id="targetId" data-product-id="YOUR_PRODUCT_ID" data-test-mode="true"> </script>
</head>
<body>
   <a href="http://157.245.80.125:8000/login_frontend.php">Login</a>
   <div id="vueapp">
      <section class="bg-primary p-3">
        <h3 class="text-center pt-2 text-light">Sign-Up</h3>
    </section>
    <div class="container-fluid bg ">
      <div class="row">
        <div class="col-md-7 col-sm-5 pt-5">
        <img  class="img-fluid" src="http://dev.conitor.in/Benito/chat/ChatAppWithVue_Socket.io/prasanna/auth/images/2452485.jpg">
        </div>
          <div class="col-md-5 col-sm-5 pt-3">
          <form id="demo">
              <label>FullName</label>
              <input class="form-control" placeholder="Fullname" type="text" name="fullname" v-model="fullname">
              <label>Email</label>
              <input class="form-control" placeholder="Email" type="email" name="email" v-model="email">
              <label>Password</label>
              <input class="form-control" placeholder="Password" type="password" name="password" v-model="password">
              <label>Confirm Password</label>
              <input class="form-control" placeholder="Re-enter Password" type="password" name="validate_password" v-model="validate_password" required>
              <div class="pt-2"></div>
              <!-- <button :disabled='!isComplete' onclick="plenigo.checkout({paymentData: 'CHECKOUT_STRING'})" class="btn btn-primary">click to signup</button>
              <div class="pt-3 text-center"> -->
              <!-- <div id="sourceId" style="display:none;"> -->
            <button type="button" name="add" class="btn btn-success px-5" @click="create()">Submit</button>
        <!-- </div> -->
              </form>
          </div>
        </div>
    </div>
</div>
</div>
</div>
    <!-- SCRIPT -->
<script type="application/javascript"> 
var app = new Vue({
  el: '#vueapp',
  data: {
      fullname: '',
      email: '',
      password: '',
      validate_password:'',
  },

  methods: {
    create: function(){
      let formData = new FormData();
      formData.append('fullname', this.fullname)
      formData.append('email', this.email)
      formData.append('password', this.password)
      formData.append('validate_password', this.validate_password)
      var user = [];
      formData.forEach(function(value, key){
          user[key] = value;
      });
    axios({
      method: 'POST',
      url: '/signup_backend.php',
      data: formData,
      config: { headers: {'Content-Type': 'multipart/form-data' }}
    })
    .then(function (response) {
     user.push(user)
  
      // alert(response.data);
     if (response.data == "granted") {
      // alert("oho it seems your new user click on okay")
      window.location.href="/login_frontend.php";

     }
     else{
      window.location.href="login_frontend.php";
      // alert(response.data);
      
     }
    })
    .catch(function (response) {
    });
    }
},
    resetForm: function(){
      this.fullname = '';
      this.email = '';
      this.password = '';
      this.validate_password = '';
   }
})    
</script>
</body>
</html>


