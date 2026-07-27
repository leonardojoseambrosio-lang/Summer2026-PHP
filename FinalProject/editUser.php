        <!-- Edit User-->
        
            <?php
                //User variables
                $userId = htmlspecialchars($user->user_id);
                $userName = htmlspecialchars($user->user_name);
                $userEmail = htmlspecialchars($user->user_email);
                $permission = htmlspecialchars($user->permission);
            ?>

       <!--Title-->
    <h1 class="title-general">Edit</h1>
    <main class="contactUs-wrap">
        <article class="contactUs-text">
            <p>
                Area to edit the user: <?php echo $userName ?>
            </p>
        </article>
        <!--Area do Edit User Info-->
        <form class="contact-form"  action="index.php" method="POST">
            <fieldset class="contact-fieldset">
                <h2>Edit User</h2>
                <!-- Hidden input to add the id to the $_POST-->
                <input type="hidden" name="product_id" value="<?php echo $userId; ?>">

                <label for="user_name">User Name: </label>
                <input type="text" id="user_name" name="user_name" value="<?php echo $userName ?>" required>

                <label for="user_email">Email: </label>
                <input type="text" id="user_email" name="user_email" value="<?php echo  $userEmail ?>" required>
                
                <label for="user_email">Password: </label>
                <input type="password" id="user_password" name="user_password" required>
                
                <label for="permission" class="form-label">Permission: </label>
                    <select name="permission" id="permission" class="contact-form-option" required>
                        <option value="user" <?php echo ($permission === 'user') ? 'selected' : '' ?>>User</option>
                        <option value="user" <?php echo ($permission === 'admin') ? 'selected' : '' ?>>Admin</option>
                    </select>

                <button type="submit"  class="fieldset-btn" name="edit_product" value="edit_product">Modify User</button>
            </fieldset>
        </form>
    </main>