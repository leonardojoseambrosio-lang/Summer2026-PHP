    <!-- Register-->
       <!--Title-->
    <h1 class="title-general">Register</h1>
    <main class="contactUs-wrap">
        <article class="contactUs-text">
            <p>
                Area to register
            </p>
        </article>
        <!--Register-->

        <!--Register a new user-->
        <form class="contact-form"  action="index.php?page=register" method="POST">
            <fieldset class="contact-fieldset">
                <h2>Register</h2>
                <label for="user_name">User Name: </label>
                <input type="text" id="user_name" name="user_name" value="<?php echo htmlspecialchars($_POST['user_name'] ?? ''); ?>" required>
                
                <label for="user_email">Email: </label>
                <input type="email" id="user_email" name="user_email" value="<?php echo htmlspecialchars($_POST['user_email'] ?? ''); ?>"  required>

                <label for="user_password">Password: </label>
                <input type="password" id="user_password" name="user_password" required>


                <label for="user_password_confirm">Confirm Password: </label>
                <input type="password" id="user_password_confirm" name="user_password_confirm" required>


                <button type="submit"  class="fieldset-btn" name="register_user" value="register_user">Register</button>
                <a href="index.php?page=login">Login Page</a>
                <!-- Messages about user creation -->
                 <?php if (!empty($successMessage)): ?>
                <div class="success-message">
                    <p> <?php echo htmlspecialchars($successMessage); ?> </p>
                </div>
                <?php 
                    endif; ?>

                <?php if (!empty($errorMessage)): ?>
                <div class="error-message">
                    <p> <?php echo htmlspecialchars($errorMessage); ?> </p>
                </div>
                <?php endif; ?>
            </fieldset>
        </form>
    </main>