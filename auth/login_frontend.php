<?php

   session_start();
?>
<!DOCTYPE html>
<html>
<title>Login form</title>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" 
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
	<div id="login">
    <section class="bg-primary p-3">
        <h3 class="text-center pt-2 text-light">Login Form
</h3>
    </section>
		<div class="container-fluid">
		    <div class="row">
		        <div class="col-md-7 pt-5">
 		        </div>
		        <div class="col-md-5 pt-5">
                    <article class="text-right">
                        <p>New User Signup here</p>
                          <a href="http://157.245.80.125:8000/signup_frontend.php">
                         <button class="bt btn-outline-success"> Signup</button>
                      </a>
                    </article>
		            <form method="post" action="">
                    <div class="form-group">
                      <label for="fullname">Email</label>
                      <input type="email" v-validate="'required|email'" name="email" class="form-control" v-model="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" v-validate="'required|password'" name="password" class="form-control" v-model="password" placeholder="Password">
                    </div>
                    <section class="text-center">
                    <button :disabled='!isComplete' @click="login()" class="btn btn-primary" type="button">login</button>

                    </section>
                </form>
		            <hr>
		        </div>    
		    </div>
		</div>
</div>
<!-- script -->
	<script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="https://npmcdn.com/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://npmcdn.com/vue-router/dist/vue-router.js"></script>
	<script type="application/javascript">
    var app = new Vue ({
        el: `#login`,
        data() {
            return {
              email: '',
              password: '',
            }
            },
            computed: {
          isComplete () {
            return this.password && this.email;
          }
        },
        methods: {
            login: function() {
         // alert("Login user!")
        let formData = new FormData();
        formData.append('email', this.email)
        formData.append('password', this.password)
        var user = [];
        formData.forEach(function(value, key){
            user[key] = value;
        });
    axios({
            method: 'post',
            url: '/login_backend.php',
            data: formData,
            config: { headers: {'Content-Type': 'multipart/form-data' }}
        })
        .then(function (response) {
           user.push(user)
           if (response.data == "your logged in") {
      window.location.href="http://members.truetrader.net:4015/";
     }
     else{
            alert("incorect login credentials")
        window.location.href="login_frontend.php";
     }
     })
        .catch(function (response) {
            //handle error
        });
    }
},

    resetForm: function(){
        this.email = '';
        this.password = '';
    }
}) 

	</script>

	</body>
</html> 

