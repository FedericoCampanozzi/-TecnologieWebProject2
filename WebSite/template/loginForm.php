<section class="container top-40">
    <form action="utils/update.php" method="post">
        <fieldset class="border p-3">
            <legend class="w-auto text-big">Login Form</legend>
            <input type="hidden" value="login" id="codiceUpdate" name="codiceUpdate">
            <div class="form-group">
                <label for="user">Email Address or Username</label>
                <input type="text" class="form-control" name="user" id="user" placeholder="Enter Email or Username" tabindex="1">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" tabindex="2">
            </div>
            <button type="submit" class="custom-btn" tabindex="3">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z" />
                        <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                    </svg> Login
                </span>
            </button>
        </fieldset>
    </form>
</section>
<section class="container top-40">
      <p>Clicca <a href="recoveryAccountPage.php">qui</a> per recuperare la password</p>
      <p>Clicca <a href="registerUserPage.php">qui</a> per creare un account</p>
      <p><a href="logoutPage.php">DBG LOGOUT PAGE</a></p>
</section>