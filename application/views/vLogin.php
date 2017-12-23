<!DOCTYPE html>
<html>
<head>
    <title>Dine-Admin Module</title>
    <link rel='stylesheet' href='assets/css/loginAssets.css'>
    <link rel='stylesheet' href='assets/semantic/semantic.min.css'>
    <script src='assets/jquery.min.js'></script>
    <script src='assets/semantic/semantic.min.js'></script>
</head>
<body>

<div class='page-bg'></div>
<div class='ui middle aligned center aligned stackable relaxed grid'>
    <div class='eight wide column'>
        <img class='ui fluid medium center aligned middle aligned image' src='assets/images/logo.png'>
    </div>
    <div class='column'></div>
    <div class='eight wide column'>
        <form class='ui tiny form'>
            <div class='ui basic secondary segment'>
                <h3 class='ui middle aligned header'>
                    <div class='content'>
                        Welcome!
                    </div>
                </h3>
                <div class='required field'>
                    <div class='ui left icon input'>
                        <i class='user icon'></i>
                        <input type='text' name='username' placeholder='Username' id='username'>
                    </div>
                </div>
                <div class='required field'>
                    <div class='ui left icon input'>
                        <i class='lock icon'></i>
                        <input type='password' name='password' placeholder='Password' id='password'>
                    </div>
                </div>
                <a href=''><div class='ui fluid teal medium submit button sbutton'>Admin Login</div></a>
                <div class='ui error message'></div>
            </div>
        </form>
    </div>
</div>
</body>
</html>