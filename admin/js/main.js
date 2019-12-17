$(document).ready(function(){


  $(document).on("submit","#add", function(e){
      e.preventDefault();
      var formData = new FormData($("#add")[0]);
      formData.append('action','additem');
      var url = $(this).data('url');
     console.log(url);
      $.ajax({
        url : url,
        type : 'post',
        dataType : 'json',
        data :formData,
        cache:false,
        processData:false, 
        contentType:false,
        success:function(data){
            Swal.fire({
              type: data.type,
              title: data.message,
              showConfirmButton: false,
              timer: 1500
            })
          
        }
      });
  });


  $(document).on("submit","#edit", function(e){
      e.preventDefault();
      //console.log("uuuuuuu");
      var formData = new FormData($("#edit")[0]);
      formData.append('editactionaction','edititem');
      var url = $(this).data('url');
      //console.log(url);
      $.ajax({
        url : url,
        type : 'post',
        dataType : 'json',
        data :formData,
        cache:false,
        processData:false,
        contentType:false,
        success:function(data){
            Swal.fire({
              type: data.type,
              title: data.message,
              showConfirmButton: false,
              timer: 1500
            })
          
        }
      });
  });

  $(document).on("click",".delitem", function(){
    var url = $(this).data('url');
    var id = '#'+$(this).data('id');

    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: url,
          type:'get',
          dataType:'text',
          success:function(data){
            $(id).remove();
            Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
          }

        });
      }
    })

  });






});
