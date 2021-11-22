<!DOCTYPE html>
<?php
session_start();
 ?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Portfolio</title>

        <style>
            body{
                position: absolute;
                top: 0;
                left: 0;
                margin: 0;

                width: 1903px;
                height: 100vh;
            }

            .side-bar {
                position: fixed;
                top: 0;
                left: 0;
                width: 300px;
                height :100vh;
                border-right: 1px solid #e3e3e3;
                box-sizing: border-box;
            }

            .side-bar-title {
                width: inherit;
                height: 100px;
                background-color: #333333;
                text-align: center;
                line-height: 100px;

                color: white;
                font-size: 42px;
                font-weight: bold;
                text-shadow: black 3px 3px;
            }

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

            button.user-submit > a{
                text-decoration: none;
                color: black;
            }

            .user-submit:hover{
                cursor: pointer;
            }

            [contenteditable] {
                outline: none;
            }

            [contenteditable]:focus{
                background-color: #e3e3e3;
            }

            [contenteditable]:hover{
                background-color: #e3e3e3;
                transition:background-color .5s;
            }

            [contenteditable]:not(:hover){
                background-color: white;
                transition:background-color .5s;
            }

            [contenteditable]:empty:focus:before{
                content: attr(placeholder);
                color: gray;
                cursor: text;
            }

            .editable-wrapper{
                display:flex;
                width: 900px;
            }

            .editable{
                width: 850px;
                border-right: 1px solid #e3e3e3;
                padding: 0 10px;
            }

            .editable-number{
                color: #e2e2e2;
                width: 50px;
                text-align: center;
                border-right: 1px solid #e3e3e3;
                border-left: 1px solid #e3e3e3;
            }

            .text-area-wrapper{
                position: relative;
                width: calc(100vw - (100vw - 100%) - 300px);
                height: 10px;
                margin-left: 300px;
                justify-content: center;
            }

            #text-area{
                position: absolute;
                left: calc(50% - 450px);

                display:flex;
                flex-direction: column;
                width: 900px;
                margin-top : 100px;
                box-sizing: border-box;
            }

            .selected > div{
                background-color: skyblue !important;
            }
        </style>

        <script src='./Scripts/functions.js'></script>
        <script src='./Scripts/keyEvents.js'></script>
        <script src='./Scripts/mouseEvents.js'></script>
        <script>
            window.onload = function(){
                var div = createDiv();
                var wrapperDiv = document.getElementById('text-area');

                linkParentChild(wrapperDiv, div);

                div.childNodes[1].focus();
            }
        </script>
    </head>
    <body>
        <div class="side-bar">
            <div class="side-bar-title">Portfolio</div>
            <div class="user-form-wrapper">
            <?php
                if(isset($_SESSION['userID'])){ ?>
                    <div><?php echo $_SESSION['userID']; ?> 로그인 됨</div>
                    <button class="user-submit"><a href="./logout.php">로그아웃</a></button>
                <?php
                }
                else if (!isset($_SESSION['userID']) || !isset($_SESSION['userPW'])) { ?>
                    <form method="POST" action="login_check.php">
                        <div class="user-ID">
                            <div class="user-label" id="user-ID-label">ID</div>
                            <input type="text" class="user-input" id="user-ID-input" name="userID">
                        </div>
                        <br>
                        <div class="user-PW">
                            <div class="user-label" id="user-PW-label">PW</div>
                            <input type="text" class="user-input" id="user-PW-input" name="userPW">
                        </div>
                        <br>
                        <button type="submit" class="user-submit">Submit</button>
                        <br>
                        <button class="user-submit"><a href="./signup.php">회원가입</a></button>
                    </form><?php
                }
                ?>
            </div>
        </div>
        <div class="text-area-wrapper">
            <div id="text-area"></div>
        </div>
    </body>
</html>
