  // Show image sebelum upload 
$(document).ready(function (e) {


    $('#image_post_adps').change(function(){
                
        let reader = new FileReader();

        reader.onload = (e) => { 

        $('#preview-image-before-upload').attr('src', e.target.result); 
        }

        reader.readAsDataURL(this.files[0]); 

    });

    $('#image_post_pm').change(function(){
                
        let reader = new FileReader();
    
        reader.onload = (e) => { 
    
        $('#preview-image-before-upload').attr('src', e.target.result); 
        }
    
        reader.readAsDataURL(this.files[0]); 
    
    });

    $('#TM_gambar').change(function(){
                
        let reader = new FileReader();
    
        reader.onload = (e) => { 
    
        $('#preview-image-before-upload').attr('src', e.target.result); 
        }
    
        reader.readAsDataURL(this.files[0]); 
    
    });

});


// Dynamic dropdown dependent category
$(document).on('change','.jenis_hewan',function(){
    // console.log("hmm its change");

    var jenis_hewan_ID=$(this).val();
    
    // console.log(cat_id);
    var div=$(this).parent().parent();

    var op=" ";

    $.ajax({
        type:'get',
        url:'create/findRasHewan',
        data:{'id':jenis_hewan_ID},
        success:function(data){
            //console.log('success');

            //console.log(data);

            //console.log(data.length);
            op+='<option value="0" selected disabled>Pilih Ras Hewan</option>';
            for(var i=0;i<data.length;i++){
            op+='<option value="'+data[i].id+'">'+data[i].nama_ras_hewan+'</option>';
        }

        div.find('.ras_hewan').html(" ");
        div.find('.ras_hewan').append(op);
        },
        error:function(){

        }
    });
});


$(document).on('change','.jenis_hewan',function(){
    // console.log("hmm its change");

    var jenis_hewan_ID=$(this).val();
    
    // console.log(cat_id);
    var div=$(this).parent().parent();

    var op=" ";

    $.ajax({
        type:'get',
        url:'edit/findRasHewanOnEdit',
        data:{'id':jenis_hewan_ID},
        success:function(data){
            //console.log('success');

            //console.log(data);

            //console.log(data.length);
            op+='<option value="0" selected disabled>Pilih Ras Hewan</option>';
            for(var i=0;i<data.length;i++){
            op+='<option value="'+data[i].id+'">'+data[i].nama_ras_hewan+'</option>';
        }

        div.find('.ras_hewan').html(" ");
        div.find('.ras_hewan').append(op);
        },
        error:function(){

        }
    });
});




// Hide submenus
// $('#body-row .collapse').collapse('hide'); 

// // Collapse/Expand icon
// $('#collapse-icon').addClass('fa-angle-double-left'); 

// // Collapse click
// $('[data-toggle=sidebar-colapse]').click(function() {
//     SidebarCollapse();
// });

// function SidebarCollapse () {
//     $('.menu-collapsed').toggleClass('d-none');
//     $('.sidebar-submenu').toggleClass('d-none');
//     $('.submenu-icon').toggleClass('d-none');
//     $('#sidebar-container').toggleClass('sidebar-expanded sidebar-collapsed');
    
//     // Treating d-flex/d-none on separators with title
//     var SeparatorTitle = $('.sidebar-separator-title');
//     if ( SeparatorTitle.hasClass('d-flex') ) {
//         SeparatorTitle.removeClass('d-flex');
//     } else {
//         SeparatorTitle.addClass('d-flex');
//     }
    
//     // Collapse/Expand icon
//     $('#collapse-icon').toggleClass('fa-angle-double-left fa-angle-double-right');
// }