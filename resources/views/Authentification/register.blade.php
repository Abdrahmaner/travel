  <!-- Modal -->
  <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">New Admin</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div> 
        <form id="admin_register" >

            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                    <label  class="form-label">Nom Complet</label>
                    <input
                        type="text"
                        id="nom"
                        name="nom"
                        class="form-control"
                        placeholder="Entrer nom complet"
                    />
                    {{-- name error --}}
                    <span class="text-danger">
                      <strong id="name-error"></strong>
                  </span>
                    </div>
                   
                </div>
                <div class="row g-2">
                        <div class="col mb-0">
                        <label  class="form-label">Tel</label>
                        <input
                            type="text"
                            id="tel"
                            name="tel"
                            class="form-control"
                            placeholder="Enter numéro"
                        />
                         {{-- tel error --}}
                    <span class="text-danger">
                      <strong id="tel-error"></strong>
                  </span>
                        </div>
                        <div class="col mb-0">
                        <label class="form-label">Email</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-control"
                            placeholder="xxxx@xxx.xx"
                        />
                         {{-- email error --}}
                    <span class="text-danger">
                      <strong id="email-error"></strong>
                  </span>
                        </div>
                </div>
                <div class="col mb-3">
                    <label  class="form-label">Ville</label>
                    <input
                    type="text"
                    id="ville"
                    name="ville"
                    class="form-control"
                    placeholder="Entrer ville"
                    />
                     {{-- ville error --}}
                     <span class="text-danger">
                      <strong id="ville-error"></strong>
                  </span>
                </div>
                <div class="row g-2">
                    <div class="col mb-0">
                    <label  class="form-label">Password</label>
                    <input
                        type="password"
                        id="password" 
                        name="password"
                        class="form-control"
                        placeholder="*******"
                      />
                     {{-- password error --}}
                     <span class="text-danger">
                      <strong id="password-error"></strong>
                       </span>
                    </div>
                    <div class="col mb-0">
                    <label class="form-label">Confirmation password</label>
                    <input
                        type="password"
                        id="password_confirm"
                        name="password_confirmation "
                        class="form-control"
                        placeholder="********"
                    />
                    </div>
                    <div class="row">
                      <div class="col mb-3">
                      <label  class="form-label">Role</label>
                    
                      <div class="col mb-0">
                        <input
                          name="role"
                          class="form-check-input"
                          type="radio"
                          value="admin"
                          id="role"
                        />
                        <label class="form-check-label" for="defaultRadio1"> Admin </label>
                      </div>
                      <div class="col mb-0">
                        <input
                          name="role"
                          class="form-check-input 1"
                          type="radio"
                          value="superAdmin"
                          id="role1"
                        />
                        <label class="form-check-label" for="defaultRadio1"> Super Admin</label>
                      </div>
                      {{-- name error --}}
                      <span class="text-danger">
                        <strong id="name-error"></strong>
                    </span>
                      </div>
                     
                  </div>
                    
            </div>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            Close
          </button>
          <button type="submit" class="btn btn-primary save" id="btn-save" >Save changes</button>
         
        </div>
      </div>
    </div>
  </div>
       
  <script>
    $(document).ready(function() {
      $.ajaxSetup({
            headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
      $(".save").click(function (e) {
      
          
            e.preventDefault();
            var getSelectedValue = document.querySelector(   
                'input[name="Role"]:checked');   
             
      
          let  formData = {
          nom: $("#nom").val(),
          tel: $("#tel").val(),
          email: $("#email").val(),
          ville: $("#ville").val(),
          password: $("#password").val(),
          password_confirm: $("#password_confirm").val(),
          role:$('#role').val(),
          };
          
          $.ajax({
              type:'POST',
              url: "{{ route('storeAdmin') }}",
              data:formData,
              dataType: 'json',
              success: function(res){
                $("#admin_register").trigger("reset");
              $('#modalCenter').modal('hide');
              swal("Good job!", "admin registred!", "success");
            
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