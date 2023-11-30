<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>La table d'Hélène</title>
    <link rel="stylesheet" href="css/login.css" />
</head>

<body>
    <section class="user">
        <div class="user_options-container">
            <div class="user_options-text">
                <div class="user_options-unregistered">
                    <h2 class="user_unregistered-title">Vous n'avez pas de compte ?</h2>
                    <p class="user_unregistered-text">Inscrivez vous pour devenir un membre !</p>
                    <button class="user_unregistered-signup" id="signup-button">Inscription</button>
                </div>

                <div class="user_options-registered">
                    <h2 class="user_registered-title">Déjà inscrit ?</h2>
                    <p class="user_registered-text">Connectez vous sans plus attendre !</p>
                    <button class="user_registered-login" id="login-button">Login</button>
                </div>
            </div>
            
            <div class="user_options-forms" id="user_options-forms">
            <div class="user_forms-login">
                <h2 class="forms_title">Login</h2>
                <form class="forms_form" action="index.php" method="POST">
                <fieldset class="forms_fieldset">
                    <div class="forms_field">
                    <input type="text" name="login" placeholder="Nom d'utilisateur" class="forms_field-input" autofocus />
                    </div>
                    <div class="forms_field">
                    <input type="password" name="mdp" placeholder="Mot de passe" class="forms_field-input" required />
                    </div>
                </fieldset>
                <div class="forms_buttons">
                    <button type="button" class="forms_buttons-forgot">Forgot password?</button>
                    <input type="submit" value="Log In" class="forms_buttons-action">
                </div>
                </form>
            </div>
            <div class="user_forms-signup">
                <h2 class="forms_title">Sign Up</h2>
                <form class="forms_form">
                <fieldset class="forms_fieldset">
                    <div class="forms_field">
                    <input type="text" placeholder="Full Name" class="forms_field-input" required />
                    </div>
                    <div class="forms_field">
                    <input type="email" placeholder="Email" class="forms_field-input" required />
                    </div>
                    <div class="forms_field">
                    <input type="password" placeholder="Password" class="forms_field-input" required />
                    </div>
                </fieldset>
                <div class="forms_buttons">
                    <input type="submit" value="Sign up" class="forms_buttons-action">
                </div>
                </form>
            </div>
            </div>
        </div>
    </section>
    <!-- Script icone eyes -->
    <script src="JS/login.js"></script>
</body>

</html>