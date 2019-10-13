<!-- Modal Structure -->
<div class="modal" id="loginModal">
    <div class="modal-content">        
        <div class="logo">
            <img src="img/LoginIcon.png" alt="" width="100px" 
                style="display:flex;margin: 0 auto;">
        </div>  
        <div id="err-div"></div>
        <div id="success-div"></div>      
        <form action="#" id="login">
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" name="uname" id="uname">
                    <label for="uname">Username</label>
                </div>
                <div class="input-field col s12">
                    <input type="password" name="password" id="pass">
                    <label for="pass">Password</label>
                </div>
                <p class="text-grey underline" id="registerLink">
                    <a href="#">Click here to Register</a>
                </p>
                <button type="submit" class="btn waves-effect black block" 
                    style="margin: 10px 0;">login</button>
            </div>
        </form>
        <form action="#" id="register" style="display: none">
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" name="username" id="name">
                    <label for="name">Username</label>
                </div>
                <div class="input-field col s12">
                    <input type="text" name="email" id="email">
                    <label for="email">E-mail</label>
                </div>
                <div class="input-field col s12">
                    <input type="password" name="password" id="pwd">
                    <label for="pwd">Password</label>
                </div>
                <div class="input-field col s12">
                    <input type="password" name="password_repeat" id="pwd-repeat">
                    <label for="pwd-repeat">Confirm Password</label>
                </div>
                <p class="text-grey underline" id="loginLink">
                    <a href="#">Click Here to Login</a>
                </p>
                <button type="submit" class="btn waves-effect black block" 
                    style="margin: 10px 0;">Register</button>
            </div>
        </form>
    </div>    
</div>