<div class="dv_login">
    <style scoped>

        .dv_login{
            width : 250px;
            margin : 0px auto;
            margin-top : 50px;
        }

        .dv_header{
            background : #FFAD0B;
            color : white;
            font-weight: bold;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            font-size : 15pt;
        }

        .dv_email, .dv_password{
            font-size : 10pt;
            color : dimgray;
        }

        input{
            width : 100%;
            border-radius: 10px;
            border : 1px solid lightgray;
        }

        input:focus{
            border-color : #FFAD0B;
        }
    </style>

    <form action="/login" method="post">
    <div class="dv_header"> <!--로그인--> &nbsp;Login </div>
    <div class="dv_email">
        <!--이메일--> Email <br>
        <input type="text" class="email" name="email">
    </div>
    <div class="dv_password">
        <!--비밀번호--> Password <br>
        <input type="password" class="password" name="password">
    </div>

    </form>

    <script>

    </script>
</div>
<?php
/**
 * Created by PhpStorm.
 * User: TD
 * Date: 2015-08-07
 * Time: 오후 5:06
 */