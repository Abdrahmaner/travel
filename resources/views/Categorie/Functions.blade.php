<script>
 

    $(document).ready(function() {
         displayCtg();
         $.ajaxSetup({
               headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             
         //display categories

         function displayCtg (){
            $.ajax({
                 type:'GET',
                 url: "{{ ('Categories/show') }}",
                 dataType: 'json',
                 success: function(res){
                  let  links=res.links;
                    // console.log(links);
                    let data='';
                             
                             $.each (res.categorie.data, function (key, value) {
                              
                              let id=value.id;
                              let image =`{{ asset('images/${value.image}') }}`
                                    data +=
                                    '<tr>'+
                                        '<td>'+value.nom+'</td>'+
        '<td><img src="'+image+'" alt="Aleq" width="100" height="100"/></td>'+
      
                                        
                                        `<td><div class="dropdown"> <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu">
                            
                            
                            <a href="javascript:void(0)" 
                            class="dropdown-item editCtg"
                            data-bs-toggle="modal"
                             data-bs-target="#exampleModal"
                              data-id=${value.id}>
                            <i class="bx bx-edit-alt me-1"></i>
                            Edit</a>
                          
                          
                            <a href="#" class="dropdown-item" id="deleteCatg" data-id=${value.id}
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
        
             // adding new categorie
              $('#ctgForm').submit(function(e) {
          
         
             
               e.preventDefault();
              
          
               let formData = new FormData(this);
             
             $.ajax({
                 type:'POST',
                 url: "{{ ('Categories/store') }}",
                 data:formData,
                 contentType: false,
                 cache: false,
                 processData: false,
                 dataType: 'json',
                 success: function(res){
                   
                   $("#ctgForm").trigger("reset");
                $('#modalCenter').modal('hide');
                  displayCtg();
                 swal("Good job!", "Categorie ajouté!", "success");
                 
               
               },
               error: function (err) {
            if (err.status == 422) { 
               const errors = err.responseJSON.errors;
                
               if(errors.nom)
               {
               $( '#nom-error' ).html(errors.nom[0] );
               
               } if(errors.image)
               {
                 $( '#image-error' ).html(errors.image[0] );
               }
           
             
              
            }
         }
              
             });
            
   
             
         });
        //  delete ctg
     
        $('body').on('click', '#deleteCatg', function (e){
          var id = $(this).attr('data-id');
            $.ajax({
                 type:'DELETE',
                 url: "/admin/Categories/delete/"+id,
                 dataType: 'json',
                 success: function(res){
             
                 displayCtg();
                 swal("Good job!", "Categorie supprimer!", "success");
                
               },
               error: function (err) {
                console.log(err);
           
         }
              
             });
            
         });
          // show edit admin
          $('body').on('click', '.editCtg', function () {
            var ctg_id = $(this).attr('data-id');
            $.get("/admin/Categories/show/"+ctg_id, function (data) {
                
                $('#idCtg').val(data.id);
                $('#nom1').val(data.nom);
                $('#imageCtg').attr('src', "/images/"+ data.image);
              
               })
            });
         
          //  update ctg
          $('body').on('click', '.edit', function (e){
         
             
               e.preventDefault();
              
               var ctg_id = $("#idCtg").val();
               var form = $("#editctgForm")[0];
             
               // Create an FormData object
                 var formData = new FormData(form);
           
               $.ajax({
              type:'POST',
              enctype: "multipart/form-data",
              url: "/admin/Categories/modifier/"+ctg_id,
              data:formData,
              cache: false,
              contentType: false,
              processData: false,
              dataType: 'json',
              success: function(res){
                displayCtg();
              $('#exampleModal').modal('hide');
              swal("Good job!","categorie modifié" ,"success");
              
            
            },
            error: function (err) {
             console.log(err);
      }
           
          });
            
   
             
         });

      });
   //pagination links
      $(function () {
        $('body').on('click', '.pagination a', function (e) {
            e.preventDefault();
            // $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 10000;" src="https://i.imgur.com/v3KWF05.gif />');
            var url = $(this).attr('href');
            window.history.pushState("", "", url);
            loadPosts(url);
        });
        function loadPosts(url) {
            $.ajax({
                url: url
            }).done(function (data) {
                
                let  links=data.links;
                    // console.log(links);
                    let dt='';
                             
                             $.each (data.categorie.data, function (key, value) {
                              
                              let id=value.id;
                              let image =`{{ asset('images/${value.image}') }}`
                                    dt +=
                                    '<tr>'+
                                        '<td>'+value.nom+'</td>'+
        '<td><img src="'+image+'" alt="Aleq" width="100" height="100"/></td>'+
      
                                        
                                        `<td><div class="dropdown"> <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu">
                            
                            
                            <a href="javascript:void(0)" 
                            class="dropdown-item editCtg"
                            data-bs-toggle="modal"
                             data-bs-target="#exampleModal"
                              data-id=${value.id}>
                            <i class="bx bx-edit-alt me-1"></i>
                            Edit</a>
                          
                          
                            <a href="#" class="dropdown-item" id="deleteCatg" data-id=${value.id}
                            ><i class="bx bx-trash me-1"></i> Delete</a
                            >
                          </div>
                        </div></td>`
                                  '</tr>';
      
                          });
      
                         $('tbody').html(dt);
                         $('.flex').html(links);
                    
            }).fail(function () {
                console.log("Failed to load data!");
            });
        }
    });
   
     </script>