        <!-- Create/Delete-->
       <!--Title-->
       <?php if (isset($_SESSION['user_id']) && $_SESSION['permission'] === 'admin'): ?>
        <h1 class="title-general">Create/Delete Users</h1>
        <?php else : ?>
        <h1 class="title-general">Users</h1>
        <?php endif; ?>
    
    <main class="contactUs-wrap">
        <article class="contactUs-text">
            <p>
                Area to crete/delete users
            </p>
        </article>
        <!--Create or Delete User-->

        <!--Create a New User-->
        <?php if (isset($_SESSION['user_id']) && $_SESSION['permission'] === 'admin'): ?>
        <form class="contact-form"  action="index.php?page=createOrDeleteUsers" method="POST">
            <fieldset class="contact-fieldset">
                <h2>Create a New Users</h2>
                <label for="user_name">User Name: </label>
                <input type="text" id="user_name" name="user_name" value="<?php echo htmlspecialchars($_POST['user_name'] ?? ''); ?>" required>
                
                <label for="user_email">Email: </label>
                <input type="email" id="user_email" name="user_email" value="<?php echo htmlspecialchars($_POST['user_email'] ?? ''); ?>"  required>

                <label for="user_password">Password: </label>
                <input type="password" id="user_password" name="user_password" required>


                <label for="user_password_confirm">Confirm Password: </label>
                <input type="password" id="user_password_confirm" name="user_password_confirm" required>


                <label for="permission" class="form-label">Permission: </label>
                    <select name="permission" id="permission" class="contact-form-option" required>
                        <option value="user" selected>User</option>
                        <option value="admin">Admin</option>
                    </select>

                <button type="submit"  class="fieldset-btn" name="create_new_user" value="create_new_user">Add User</button>

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
        <?php endif; ?>
        <!--List Users - Delete and Edit option-->
        <table class="product-table" id="product-table">

            <h2>User List</h2>

            <thead class="table-head">
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Permission</th>
                    <th>Created at</th>
                    <?php if (isset($_SESSION['user_id']) && $_SESSION['permission'] === 'admin'): ?>
                    <th>Delete/Edit</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody class="table-body">
                
                <?php
                //Foreach to list all products
                foreach ($users as $user){
                $userId = htmlspecialchars($user->user_id);
                $userName = htmlspecialchars($user->user_name);
                $userEmail = htmlspecialchars($user->user_email);
                $permission = htmlspecialchars($user->permission);
                $created = htmlspecialchars($user->created);
               
            ?>
                <tr>
                    <td><?php echo $userId?></td>
                    <td><?php echo $userName?></td>
                    <td><?php echo $userEmail?></td>
                    <td><?php echo $permission?></td>
                    <td><?php echo $created?></td>
                    <?php if (isset($_SESSION['user_id']) && $_SESSION['permission'] === 'admin'): ?>
                    <td>
                        <form class="table-options" action="index.php?page=createOrDeleteUsers" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                            <button type="submit"  class="" name="delete_user" value="<?php echo $userId?>">&#9746; Delete</button> 
                            <div class="edit-link">
                                <a href="index.php?page=editUser&id=<?php echo $userId; ?>">&#9965; Edit</a>
                            </div>    
                        </form>
                    </td>
                    <?php endif; ?>
                </tr>
                <?php } //forach end?>
            </tbody>
        </table>
    </main>