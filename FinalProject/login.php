        <!-- Login-->
       <!--Title-->
    <h1 class="title-general">Login</h1>
    <main class="contactUs-wrap">
        <article class="contactUs-text">
            <p>
                Area to login
            </p>
        </article>
        <!--Login-->

        <!--Login user-->
        <form class="contact-form"  action="index.php?page=login" method="POST">
            <fieldset class="contact-fieldset">
                <h2>Login</h2>
                
                <?php if (isset($_GET['success']) && $_GET['success'] === 'created'): ?>
                <div class="success-message">
                   <p> User created successfully!</p>
                   <p> Please log in.</p>
                </div>
                <?php endif; ?>
                <label for="user_name">User: </label>
                <input type="text" id="user_name" name="user_name" value="<?php echo htmlspecialchars($_POST['user_name'] ?? ''); ?>" required>
                
                <label for="user_password">Password: </label>
                <input type="password" id="user_password" name="user_password" required>


                <button type="submit"  class="fieldset-btn" name="login" value="login">Login</button>
                <a href="index.php?page=register">Register User</a>
                <!-- Error login messages -->
                <?php if (!empty($errorMessage)): ?>
                <div class="error-message">
                    <p> <?php echo htmlspecialchars($errorMessage); ?> </p>
                </div>
                <?php endif; ?>
            </fieldset>
        </form>
    </main>