<script>
 

             $(document).ready(function() {
              displayPrd();
              $.ajaxSetup({
               headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
              // adding new produit
 $('#produitForm').submit(function(e) {
          
         
             
          e.preventDefault();
         
     
          let formData = new FormData(this);
         
        $.ajax({
            type:'POST',
            url: "{{ ('produits/add') }}",
            data:formData,
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json',
            success: function(res){
             
            $("#produitForm").trigger("reset");
           $('#exampleModal').modal('hide');
             displayPrd();
            swal("Good job!", "Produit bien ajouté!", "success");
            
          
          },
          error: function (err) {
       if (err.status == 422) { 
          const errors = err.responseJSON.errors;
            // console.log(errors);
          if(errors.titre)
          {
          $( '#titre-error' ).html(errors.titre[0] );
          
          }
          if(errors.prix)
          {
          $( '#prix-error' ).html(errors.prix[0] );
          
          }
          if(errors.description)
          {
          $( '#description-error' ).html(errors.description[0] );
          
          }
           if(errors.image)
          {
            $( '#image-error' ).html(errors.image[0] );
          }
           if(errors.category_id)
          {
            $( '#categorie-error' ).html(errors.category_id[0] );
          }
      
        
         
       }
    }
         
        });
    
        
        
    });
                  //  display produit
        function displayPrd(){
            $.ajax({
                 type:'GET',
                 url: "{{ ('produits/all') }}",
                 dataType: 'json',
                 success: function(res){
                 let  links=res.links;
                  
                    let data='';
                             
                             $.each (res.prd.data, function (key, value) {
                              
                              let id=value.id;
                              let image =`{{ asset('images/${value.image}') }}`
                                    data +=
                                    '<tr>'+
                                        '<td>'+value.nom+'</td>'+
        '<td><img src="'+image+'" alt="Aleq" width="100" height="100"/></td>'+
       '<td>'+value.prix+' DH</td>'+
       '<td>'+value.categories.nom+'</td>'+`<td><div class="dropdown"> <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu">
                            
                            
                            <a href="javascript:void(0)" 
                            class="dropdown-item editPrd"
                            data-bs-toggle="modal"
                             data-bs-target="#exampleModalUpdate"
                              data-id=${value.id}>
                            <i class="bx bx-edit-alt me-1"></i>
                            Edit</a>
                          
                          
                            <a href="#" class="dropdown-item delete" id="deletePrd" data-id=${value.id}
                            ><i class="bx bx-trash me-1"></i> Delete</a
                            >
                          </div>
                        </div></td>`
                                  '</tr>';
      
                          });
      
                         $('tbody').html(data);
                         $('.flex').html(links);
                        
                     
               
               },
               error: function (err) {
                console.log(err);
           
         }
              
             });
            
         }

           //  delete prd
        $('body').on('click', '.delete', function (e){
          var id = $(this).attr('data-id');
            $.ajax({
                 type:'DELETE',
                 url: "/admin/produits/delete/"+id,
                 dataType: 'json',
                 success: function(res){
            
                 displayPrd();
                 swal("Good job!", "produit supprimer!", "success");
                
               },
               error: function (err) {
                console.log(err);
           
         }
              
             });
  
            
         });
          // show edit produit
          $('body').on('click', '.editPrd', function () {
            var prd_id = $(this).attr('data-id');
          
            $.get("/admin/produits/show/"+prd_id, function (data) {
           
                  $('#idPrd').val(data.id);
                 $('#titre1').val(data.nom);
                 $('#description1').val(data.description);
                 $('#categorie1').val(data.category_id);
                 $('#imagePrd').attr('src', "/images/"+ data.image);
                $('#prix1').val(data.prix);
               
              
               })
            });
             //  update prd
          $('body').on('click', '.valider', function (e){
         
             
                    e.preventDefault();
                    
                    var Prd_id = $("#idPrd").val();
                    var form = $("#UpdateproduitForm")[0];
                
                    // Create an FormData object
                     var formData = new FormData(form);
               
                  
                    $.ajax({
                    type:'POST',
                    enctype: "multipart/form-data",
                    url: "/admin/produits/modifier/"+Prd_id,
                    data:formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(res){
                      
                      displayPrd();
                    $('#exampleModalUpdate').modal('hide');
                    swal("Good job!","Produit modifié" ,"success");
                    
                  
                  },
                  error: function (err) {
                  console.log(err);
            }
                
                });
                  

                  
              });
            
















              });




</script>