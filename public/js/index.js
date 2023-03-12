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
    // url = $("#form").attr("action");
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
    $(".deleteModule").html($(this).attr("data-description"));
    $(".delete_id").val($(this).attr("data-id"));
    url = $(this).attr("data-url");
});


$('#deleteBtn').on("click",function(){

    $.ajax({
        type:'post',
        url:url,
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

$(".updateSkill").on('click',function(){
    $("#skillModalLabel").html('Update Skill');
    $("#addSkillsBtn").html('Update');
    $("#skillForm").attr("action", window.location.origin+"/updateSkill");
    $("#skillName").val($(this).attr("data-name"));
    $("#skillPercentage").val($(this).attr("data-percentage"));
    $("#color").val($(this).attr("data-color"));
    $("#data-skill-id").val($(this).attr("data-id"));
});


$(".skill-btn-close, .skillCloseBtn").on('click',function(){
    $("#skillModalLabel").html('Add Skill');
    $("#addSkillsBtn").html('Add');
    $("#form").attr("action", window.location.origin+"/addSkill");
    $("#skillName").val('');
    $("#skillPercentage").val('');
    $("#color").val('');
    $("#data-skill-id").val('');
});
