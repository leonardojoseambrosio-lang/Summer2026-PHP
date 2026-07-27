        <!-- Create/Delete-->
       <!--Title-->
    <h1 class="title-general">Create/Delete Users</h1>
    <main class="contactUs-wrap">
        <article class="contactUs-text">
            <p>
                Area to crete/delete users
            </p>
        </article>
        <!--Create or Delete User-->

        <!--Create a New User-->
        <form class="contact-form"  action="index.php" method="POST">
            <fieldset class="contact-fieldset">
                <h2>Create a New Users</h2>
                <label for="user_name">User Name: </label>
                <input type="text" id="user_name" name="user_name" required>
                
                <label for="user_email">Email: </label>
                <input type="email" id="user_email" name="user_email" required>

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
            </fieldset>
        </form>
        <table class="product-table">

        <!--List Users - Delete and Edit option-->
            <h2>User List</h2>

            <thead class="table-head">
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Permission</th>
                    <th>Created at</th>
                    <th>Delete/Edit</th>
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
                    <td>
                        <form action="index.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                            <button type="submit"  class="" name="delete_user" value="<?php echo $userId?>">Delete</button> 
                            <a href="index.php?page=editUser&id=<?php echo $userId; ?>">Edit</a>
                        </form>
                    </td>
                </tr>
                <?php } //forach end?>
            </tbody>
        </table>
    </main>