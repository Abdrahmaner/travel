@extends('layouts.app')

@section('content')
@include('Authentification.register')
@include('AdminsProfil.EditAdmin')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admins /</span> informations
        
        <span style="margin-left:70%">
          <button
          type="button"
          class="btn btn-primary"
          data-bs-toggle="modal"
          data-bs-target="#modalCenter"
        >
        <i class="fa-solid fa-plus"></i> 
        </button>
         
      </span></h4>
     
      <!-- Basic Bootstrap Table -->
      <div class="card">
        <h5 class="card-header">Admin</h5>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>Nom</th>
                <th>Tel</th>
                <th>Email</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
             
            </tbody>
          </table>
          <div class="pagination"></div>
        </div>
      </div>
      <!--/ Basic Bootstrap Table -->

    
    


   

    </div>
    <!-- / Content -->

   
  </div>
  <!-- Content wrapper -->
   {{-- register modal --}}

   <script>
    $(document).ready(function() {
      getAdmins();
      $.ajaxSetup({
            headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
     
               
                //  get data admins
                function getAdmins() {
                   //TODO add spinner before loading the data to the page
                  //  TODO show data without refreshing the page
                   $.ajax({
                      type:'get',
                      url: "{{ route('showAdmins') }}",
                      dataType: 'json',
                    
                      success: function(res){
                     
                        let links = res.links;
                              var data='';
                             
                       $.each (res.admins.data, function (key, value) {
                        let id=value.id;
                              data +=
                              '<tr>'+
                                  '<td>'+value.nom+'</td>'+
                                  '<td>'+value.tel+'</td>'+
                                  '<td>'+value.email+'</td>'+

                                  
                                  `<td><div class="dropdown"> <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                      
                      
                      <a href="javascript:void(0)" 
                      data-toggle="tooltip"  data-id=${value.id} 
                       class="dropdown-item editAdmin" >
                      <i class="bx bx-edit-alt me-1"></i>
                      Edit</a>
                    
                    
                      <a class="dropdown-item" id="deleteAdmin" data-id=${value.id}
                        ><i class="bx bx-trash me-1"></i> Delete</a
                      >
                    </div>
                  </div></td>`
                            '</tr>';

                    });

                   $('tbody').html(data);
                   $('.pagination').html(links);
                    },
                    //TODO add fail function
              //       error: function (err) {
              //   // if (err.status == 422) { 
              //   //     const errors =err.responseJSON.errors;
                
              //   //     if(errors.nom)
              //   //     {
              //   //     $( '#name-error' ).html(errors.nom[0] );
                    
              //   //     } if(errors.tel)
              //   //     {
              //   //       $( '#tel-error' ).html(errors.tel[0] );
              //   //     }
              //   //     if(errors.email){
                    
              //   //     $( '#email-error' ).html(errors.email[0] );
              //   //     } if(errors.ville)
              //   //     {
              //   //     $( '#ville-error' ).html(errors.ville[0] );
              //   //     }if(errors.password)
              //   //     {
              //   //     $( '#password-error' ).html(errors.password[0] );
              //   //     }
                    
                  
                  
              //   // }
               
              // }
                  
                  });
                  
                }
         
             //DeleteAdmin
          $('body').on('click', '#deleteAdmin', function (e) {
              if(!confirm("Do you really want to do this?")) {
                return false;
              }

              e.preventDefault();
              var id = $(this).attr('data-id');
            
              $.ajax(
                  {
                     url: "/admin/deleteAdmins/"+id,
                    type: 'DELETE',
                    data: {
                          id: id
                  },
                  success: function (response){
                    getAdmins();
                    swal("Good job!", "admin deleted ", "success");
                   
                  }
              });
                return false;
            });

              
            });
            // show edit admin
                  $('body').on('click', '.editAdmin', function () {
            var admin_id = $(this).attr('data-id');
            $.get("/admin/editAdmin/"+admin_id, function (data) {
                $('#basicModal').modal('show');
                $('#nom1').val(data.nom);
                $('#tel1').val(data.tel);
                $('#email1').val(data.email);
                $('#ville1').val(data.ville);
                $('#idAdmin').val(admin_id);
              
                const role_admin = document.getElementById('role admin');
                const role_super_admin = document.getElementById('role super_admin');
              
                  if(data.role == "admin")
                  {
                    role_admin.checked= true;
                  }else {
                    role_super_admin.checked= true;

                  }
            })
    });

     //pagination links
     $(function () {
        $('body').on('click', '.pagination a', function (e) {
            e.preventDefault();
            // $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 10000;" src="https://i.imgur.com/v3KWF05.gif />');
            var url = $(this).attr('href');
            window.history.pushState("", "", url);
            loadAdmins(url);
        });
        function loadAdmins(url) {
            $.ajax({
                url: url
            }).done(function (data) {
                
              let links = data.links;
                              var dt='';
                             
                       $.each (data.admins.data, function (key, value) {
                        let id=value.id;
                              dt +=
                              '<tr>'+
                                  '<td>'+value.nom+'</td>'+
                                  '<td>'+value.tel+'</td>'+
                                  '<td>'+value.email+'</td>'+

                                  
                                  `<td><div class="dropdown"> <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                      
                      
                      <a href="javascript:void(0)" 
                      data-toggle="tooltip"  data-id=${value.id} 
                       class="dropdown-item editAdmin" >
                      <i class="bx bx-edit-alt me-1"></i>
                      Edit</a>
                    
                    
                      <a class="dropdown-item" id="deleteAdmin" data-id=${value.id}
                        ><i class="bx bx-trash me-1"></i> Delete</a
                      >
                    </div>
                  </div></td>`
                            '</tr>';

                    });

                   $('tbody').html(dt);
                   $('.pagination').html(links);
                    
            }).fail(function () {
                console.log("Failed to load data!");
            });
        }
    });

    
      </script>
@endsection