$(document).ready(function(){
    
    uri=window.location.href;
    e=uri.split("=");
    // console.log("uri: "+uri+" hasil: "+e[1]);
    if(e[1]=="user" || e[1] == "user_edit&nik") {
        console.log("cek diiini");
        if(e[1] == "user") $("#summary,#chart,#user_add").hide();
        else if(e[1] == "user_edit&nik") {
            console.log("cek diiini2");

            $("#summary,#chart,#user_list").hide();
            $("#user_add").show();
            $("#user_form input[name='NIK'] input[name='username']").attr("disabled", true);
            $("#user_form button").val('user_edit');
            $("#user_form").append("<input type=hidden name=nik value="+e[2]+">"); 
        } 
        if($("#alert-user").hasClass("alert-danger")) { //jika saat entri data ada error
            $("#user_list").hide();
            $("#user_add").show();
        } else if($("#alert-user").hasClass("alert-success")) {
            $("#user_list").show();
            $("#user_add").hide();
        }
    }
    // $("button type=button class=\"btn btn-outline-success float-start\">Tambah Data</button").insertBefore(".datatable-dropdown");
    $(".datatable-dropdown").append("<button type=button class=\"btn btn-outline-success float-start me-2\">Tambah Data</button>");

    $(".datatable-dropdown button").click(function(){
        $("#user_list").hide();
        $("#user_add").show();
        $("#user_form input,#user_form textarea, user_form select").val('');
        $("#user_form button").val('user_add)');
        $("#user_form input[name='NIK'],#user_form input[name=' NAMA'],#user_form input[name='PASSWORD']").attr("disabled",false); 
    });

    $("button[data-bs-toggle='modal']").click(function(){
        NIK=$(this).attr('data-nik');
        $("#myModal .modal-body").text("Yakin hapus data NIK "+NIK+"?");
        $(".modal-footer form").append("<input type=hidden name=nik value="+NIK+">");
    })
})