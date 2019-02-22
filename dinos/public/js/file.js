$(document).ready(function (e) {
    $(function() {
        $("#file").change(function() {
            $("#message").empty(); // To remove the previous error message
            const file = this.files[0];
            const imagefile = file.type;
            const match= ["image/jpeg","image/png","image/jpg", "image/gif"];
            if(!((imagefile===match[0]) || (imagefile===match[1]) || (imagefile===match[2]) || (imagefile===match[3])))
            {
                $('#previewing').attr('src','noimage.png');
                $("#message").html("<p id='error' class='text-danger'>Please Select A valid Image File</p>"+"<h4 class='text-danger font-weight-bold'>Note:</h4>"+"<span class='text-danger'>Only jpeg, jpg and png Images type allowed</span>");
                return false;
            }
            else
            {
                const reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
            }
        });
    });
    function imageIsLoaded(e) {
        $('#image_preview').css("display", "block");
        $('#previewing').attr('src', e.target.result);
        $('#previewing').attr('width', '300px');
        $('#previewing').attr('height', '240px');
    };
});