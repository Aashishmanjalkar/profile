// const hamburger = document.querySelector(".hamburger");
// const navLinks = document.querySelector(".nav-links");
// const links = document.querySelectorAll(".nav-links li");

// hamburger.addEventListener('click', ()=>{
//    //Animate Links
//     navLinks.classList.toggle("open");
//     links.forEach(link => {
//         link.classList.toggle("fade");
//     });

//     //Hamburger Animation
//     hamburger.classList.toggle("toggle");
// });
let url;
$(".update").on('click',function(){
    $("#modalLabel").html('Update Project');
    $("#save").html('Update');
    $("#form").attr("action", window.location.origin+"/updateProject");
    $("#description").val($(this).attr("data-description"));
    $("#projectUrl").val($(this).attr("data-link"));
    $("#data-id").val($(this).attr("data-id"));
    url = $("#form").attr("action");
});

$(".btn-close, .closeBtn").on('click',function(){
    $("#modalLabel").html('Add Project');
    $("#save").html('Add');
    $("#form").attr("action", window.location.origin+"/addProject");
    $("#description").val('');
    $("#projectUrl").val('');
    $("#data-id").val('');
});

$(".delete").on("click",function(){
    $("#deleteModule").html($(this).attr("data-description"));
    $(".delete_id").val($(this).attr("data-id"));
});


$('#deleteBtn').on("click",function(){
    console.log("fdfdf",$(this).attr("data-id"));
    console.log("fdfdfddd",$(".delete_id").val());
    $.ajax({
        type:'post',
        url:'deleteProject',
        data :{
            '_token':$('meta[name="csrf-token"]').attr('content'),
            'id':$(".delete_id").val()
        },
        success:function(){
            $(".deleteCloseBtn").click();
            location.reload();
        }
    })
});
