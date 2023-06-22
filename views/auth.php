

<link rel="stylesheet" type="text/css" href="../design/auth/style.css" /> 

<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form  action="../controllers/index.php?controller=user&action=register" method="post">
			<h1>Create Account</h1>
			
			<span>or use your email for registration</span>
			<input type="text" name="name" placeholder="Name" />
			<input type="email" name="email" placeholder="Email" />
			<input type="password" name="password" placeholder="Password" />	
			<button>Sign Up</button>
		</form>
	</div>


	<div class="form-container sign-in-container">
		<form action="../controllers/index.php?controller=user&action=login" method="post">
			<h1>Login</h1>
			
			<input type="email" name="email" placeholder="Email" />
			<input type="password" name="password" placeholder="Password" />
			<a href="#">Forgot your password?</a>
			<button>Login</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>



<script>
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});
    </script>