<style>
    .info{
        width : 90%;
        margin : 10px 0px 20px 0px;
    }
    .info_header{
        width : 80%;
        border-bottom : 2px solid #2D79B2;
        margin-bottom : 5px;
        font-size : 15pt;
    }

    .fm-add-term .btn{
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

    .fm-add-term .btn:hover{
        background : #74C3FF;
    }
</style>

<div class="info">
    <div class="info_header"> 단어 추가 </div>
    <div class="info_subtitle"> UB의 모든 단어들은 사용자들과 함게 만들어갑니다. 당신의 손으로 단어를 추가해보세요. </div>
</div>

<form action="/term?action=create" method="post" class="fm-add-term">
    <div class="dv_word">
        단어 <br>
        <input type="text" class="word" name="word">
    </div>
    <div class="dv_definition">
        뜻 <br>
        <textarea class="definition" name="def"></textarea>
    </div>
    <input type="submit">
    <div class="btn submit">
        추가하기
    </div>
</form>

<script>
    $('.submit').on('click', function(){
        console.log('submit');
        //todo : validate form data
        $('.fm-add-term').submit();
    });
</script>
