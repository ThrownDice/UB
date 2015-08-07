<div class="dv_login">
    <style scoped>

        .dv_login{
            width : 400px;
            margin : 0px auto;
            margin-top : 50px;
            background : white;
            padding-bottom : 10pt;
            border : 2px solid #2D79B2;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .dv_header{
            background : #2D79B2;
            color : white;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            font-size : 15pt;
        }

        .dv_email, .dv_password{
            font-size : 12pt;
            color : dimgray;
            margin-top : 10px;
            text-align : center;
            height : 50px;
        }

        input{
            width : 80%;
            border-radius: 10px;
            border : 1px solid lightgray;
            margin : 0px auto;
            padding : 2px 5px 2px 5px;
        }

        input:focus{
            border-color : #FFAD0B;
        }

        .btn{
            height : 40px;
            background : #2D79B2;
            color : white;
            line-height : 40px;
            text-align : center;
            margin : 10px;
            padding : 0px 10px 0px 10px;
            -webkit-border-radius : 5px;
            -moz-border-radius : 5px;
            border-radius : 5px;
            font-size : 11pt;
            cursor : pointer;
        }

        .btn:hover{
            background : #FFAD0B;
        }
    </style>

    <form action="/login" method="post" class="fm_login">
    <div class="dv_header"> &nbsp;로그인 <!--&nbsp;Login--> </div>
    <div class="dv_email">
        이메일 <!--Email--> <br>
        <input type="text" class="email" name="email">
    </div>
    <div class="dv_password">
        비밀번호 <!--Password--> <br>
        <input type="password" class="password" name="password">
    </div>
    <div class="dv_menu">
        <div class="btn login"> 로그인 </div>
        <div class="btn sign-up"> 회원가입 </div>
    </div>
    </form>

    <script>
        (function(window, document){
            $('.sign-up').on('click', function(){
                location.href = "member?action=create";
            });
            $('.login').on('click', function(){
                $('.fm_login').submit();
            })
        })(window, document);
    </script>
</div>
