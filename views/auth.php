

<link rel="stylesheet" type="text/css" href="../design/auth/style.css" /> 

<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form  action="../controllers/index.php?controller=user&action=register" method="post">
			<h1>Create Account</h1>
			
			<span>or use your email for registration</span>
			<span id="nameError" style="color:red;"></span>
			<input type="text" id="nameInput" name="name" placeholder="Name" />
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

var nameInput = document.getElementById('nameInput');
var nameError = document.getElementById('nameError');

nameInput.addEventListener('input', function(e) {
    var name = e.target.value;
    if (/[^a-zA-Z0-9]/.test(name)) {
        nameError.textContent = "Le nom ne doit contenir que des caractères alphanumériques.";
        e.target.classList.add("error");
    } else {
        nameError.textContent = "";
        e.target.classList.remove("error");
    }
});


var form = document.querySelector('.sign-up-container form');

form.addEventListener('submit', function(e) {
    var name = nameInput.value;
    if (/[^a-zA-Z0-9]/.test(name)) {
        e.preventDefault();
        nameError.textContent = "Le nom ne doit contenir que des caractères alphanumériques.";
        nameInput.classList.add("error");
    }
});



var emailInput = document.querySelector('input[type="email"]');
var emailError = document.createElement('span');
emailError.style.color = 'red';
emailInput.parentNode.insertBefore(emailError, emailInput.nextSibling);

var passwordInput = document.querySelector('input[type="password"]');
var passwordError = document.createElement('span');
passwordError.style.color = 'red';
passwordInput.parentNode.insertBefore(passwordError, passwordInput.nextSibling);

emailInput.addEventListener('input', function(e) {
    var email = e.target.value;
    if (email && !/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/.test(email)) {
        emailError.textContent = "Veuillez entrer un email valide.";
        e.target.classList.add("error");
    } else {
        emailError.textContent = "";
        e.target.classList.remove("error");
    }
});

passwordInput.addEventListener('input', function(e) {
    var password = e.target.value;
    if (password && password.length < 6) {
        passwordError.textContent = "Le mot de passe doit comporter au moins 6 caractères.";
        e.target.classList.add("error");
    } else {
        passwordError.textContent = "";
        e.target.classList.remove("error");
    }
});

form.addEventListener('submit', function(e) {
    var email = emailInput.value;
    var password = passwordInput.value;
    // On répète les validations au moment de la soumission du formulaire
    if (!/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/.test(email)) {
        e.preventDefault();
        emailError.textContent = "Veuillez entrer un email valide.";
        emailInput.classList.add("error");
    }
    if (password.length < 6) {
        e.preventDefault();
        passwordError.textContent = "Le mot de passe doit comporter au moins 6 caractères.";
        passwordInput.classList.add("error");
    }
});


    </script>