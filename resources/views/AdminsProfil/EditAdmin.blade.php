<div class="modal fade" id="basicModal"  aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Modal title</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <label for="nameBasic" class="form-label">Nom</label>
              <input type="text" id="nom1" class="form-control" placeholder="Enter Name" />
              <input type="hidden" id="idAdmin" class="form-control"  />
            </div>
          </div>
          <div class="row g-2">
            <div class="col mb-0">
                <label for="dobBasic" class="form-label">Tel</label>
                <input type="text" id="tel1" class="form-control" placeholder="DD / MM / YY" />
              </div>
            <div class="col mb-0">
              <label for="emailBasic" class="form-label">Email</label>
              <input type="email" id="email1" class="form-control" placeholder="xxxx@xxx.xx" />
            </div>
            
          </div>
          <div class="row g-2">
            <div class="col mb-0">
                <label for="dobBasic" class="form-label">Ville</label>
                <input type="text" id="ville1" class="form-control" placeholder="DD / MM / YY" />
              </div>
            <div class="col mb-0">
              <label for="emailBasic" class="form-label">Password</label>
              <input type="password" id="password1" class="form-control" placeholder="xxxx@xxx.xx" />
            </div>
            
          </div>
          <div class="row">
            <div class="col mb-3">
              <label  class="form-label">Role</label>
              <div class="col mb-0">
                  <input
                  name="role"
                  class="form-check-input admin"
                  type="radio"
                  value="admin"
                  id="role admin"
                />
                <label class="form-check-label" for="defaultRadio1"> Admin </label>
              </div>
              <div class="col mb-0">
                <input
                            name="role"
                            class="form-check-input sup"
                            type="radio"
                            value="superAdmin"
                            id="role super_admin"
                          />
                  <label class="form-check-label" for="defaultRadio1"> Super Admin </label>
              </div>
            </div>
          </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            Close
          </button>
          <button type="submit"  class="btn btn-primary edit">Save changes</button>
        </div>
      </div>
    </div>
  </div>
{{-- TODO CALL  getadmins() fuction --}}
  <script>
    $(document).ready(function() {
    
      $.ajaxSetup({
            headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
              
        
               
          $(".edit").click(function (e) {
                   //TODO add spinner before loading the data to the page
                  //  TODO show data without refreshing the page
                  let  formData = {
                    nom: $("#nom1").val(),
                    tel: $("#tel1").val(),
                    email: $("#email1").val(),
                    ville: $("#ville1").val(),
                    password: $("#password1").val(),
                    role:$('#role').val(),
                    
                    };
                    let id= $("#idAdmin").val()
                  $.ajax({
              type:'POST',
              url: "/admin/modifierAdmin/"+id,
              data:formData,
              dataType: 'json',
              success: function(res){
              //   $("#admin_register").trigger("reset");
              $('#basicModal').modal('hide');
              swal("Good job!","admin modifié" ,"success");
              
            
            },
            error: function (err) {
         if (err.status == 422) { 
            const errors =err.responseJSON.errors;
         
            if(errors.nom)
            {
            $( '#name-error' ).html(errors.nom[0] );
            
            } if(errors.tel)
            {
              $( '#tel-error' ).html(errors.tel[0] );
            }
             if(errors.email){
             
            $( '#email-error' ).html(errors.email[0] );
            } if(errors.ville)
            {
            $( '#ville-error' ).html(errors.ville[0] );
            }if(errors.password)
            {
            $( '#password-error' ).html(errors.password[0] );
            }
            
          
           
         }
      }
           
          });
                  
        });
         
       
    });

     

    
      </script>