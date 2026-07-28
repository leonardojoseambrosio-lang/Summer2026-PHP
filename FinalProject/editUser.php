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
        <form class="contact-form"  action="index.php?page=editUser&id=<?php echo $userId; ?>" method="POST">
            <fieldset class="contact-fieldset">
                <h2>Edit User</h2>
                <!-- Hidden input to add the id to the $_POST-->
                <input type="hidden" name="user_id" value="<?php echo $userId; ?>">

                <label for="user_name">User Name: </label>
                <input type="text" id="user_name" name="user_name" value="<?php echo htmlspecialchars($_POST['user_name'] ?? $userName);?>" required>

                <label for="user_email">Email: </label>
                <input type="text" id="user_email" name="user_email" value="<?php echo htmlspecialchars($_POST['user_email'] ?? $userEmail);?>" required>
                
                <label for="user_email">New Password (not required): </label>
                <input type="password" id="user_password" name="user_password">

                <label for="user_email">Confirm New Password (not required): </label>
                <input type="password" id="user_password_confirm" name="user_password_confirm">
                
                <label for="permission" class="form-label">Permission: </label>
                    <select name="permission" id="permission" class="contact-form-option" required>
                        <option value="user" <?php echo ($permission === 'user') ? 'selected' : '' ?>>User</option>
                        <option value="admin" <?php echo ($permission === 'admin') ? 'selected' : '' ?>>Admin</option>
                    </select>

                <button type="submit"  class="fieldset-btn" name="edit_user" value="edit_user">Modify User</button>
                
                 <!-- Messages about user edition -->
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
                    <!-- Link to return to Create / Delete Users -->
                     <a href="index.php?page=createOrDeleteUsers"> Return </a>
            </fieldset>
        </form>
    </main>