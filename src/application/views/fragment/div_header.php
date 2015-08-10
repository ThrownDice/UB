<?php

?>

<div class="gnb">
    <ul class="header_menu">
        <li> <div class="logo" onclick="location.href='/term'"> 타이틀 미정 </div></li>
        <li><!--About--></li>
        <li><!--Rules--></li>
    </ul>
    <ul class="search_bar">
        <li> <input type="text" class="search_input"> </li>
        <li> <div class="btn">검색</div> </li>
        <li> <div class="btn add-term"> 단어 추가 </div></li>
    </ul>
    <ul>
        <li>  <div class="btn login"> 로그인 </div> </li>
        <li>  <div class="btn sign-up"> 회원가입 </div> </li>
    </ul>
</div>

<script>
    (function(window, document){
        //Event Handling
        $('.sign-up').on('click', function(){
            location.href = "member?action=create";
        });
        $('.login').on('click', function(){
            location.href = "login"
        })
    })(window, document);
</script>