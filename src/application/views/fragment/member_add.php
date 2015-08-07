<div class="dv_member_add">
    <style scoped>

    </style>

    <form action="/member?action=create" method="post" enctype="multipart/form-data">

        <div class="dv_email">
            User Email <br>
            <input type="text" class="email" name="email">
        </div>

        <div class="dv_password">
            Password <br>
            <input type="password" class="password" name="password"> <br>
            Password Confirm <br>
            <input type="password" class="password_cfm" name="password_cfm">
        </div>

        <div class="dv_nickname">
            Nickname <br>
            <input type="text" class="nickname" name="nickname">
        </div>

        <div class="dv_photo">
            Photo <br>
            <input type="file" class="photo" name="photo">
            <div class="dv_preview"> <img class="preview"> </div>
        </div>

        <input type="submit">

    </form>

    <script>
        $('.photo').on('change', function(){
            var data = $(this).val();
            $('.preview').attr('src', data);
        });
    </script>
</div>