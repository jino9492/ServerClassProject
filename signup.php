<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Portfolio</title>
    </head>
    <style>
        .user-form-wrapper{
                padding-top: 20px;
                padding-left: 40px;
                height: 100px;
            }

            .user-form-wrapper > form{
                position: relative;
                display: flex;
                flex-direction: column;
            }

            .user-Email{
                display: inline;
                width: 221px;
                padding-bottom: 4px;
                border-bottom: 1px solid #e3e3e3;
            }

            .user-ID{
                display: inline;
                width: 221px;
                padding-bottom: 4px;
                border-bottom: 1px solid #e3e3e3;
            }

            .user-PW{
                display: inline;
                width: 221px;
                padding-bottom: 4px;
                border-bottom: 1px solid #e3e3e3;
            }

            .user-label{
                display: inline-block;
                width: 40px;
                text-align: center;
                color: gray;
            }

            .user-input{
                outline: none;
                border: none;
            }

            .user-submit{
                width: 220px;

                padding: 4px;
                border: none;
                border-radius: 5px;
            }

            .user-submit:hover{
                cursor: pointer;
            }
    </style>
    <body>
        <div class="user-form-wrapper">
            <form method="POST" action="signup_check.php">
                <div class="user-Email">
                    <div class="user-label" id="user-Email-label">Email</div>
                    <input type="email" class="user-input" id="user-Email-input" name="userEmail">
                </div>
                <br>
                <div class="user-ID">
                    <div class="user-label" id="user-ID-label">ID</div>
                    <input type="text" class="user-input" id="user-ID-input" name="userID">
                </div>
                <br>
                <div class="user-PW">
                    <div class="user-label" id="user-PW-label">PW</div>
                    <input type="password" class="user-input" id="user-PW-input" name="userPW">
                </div>
                <br>
                <button type="submit" class="user-submit">SignUp</button>
            </form>
        </div>
    </body>
</html>
